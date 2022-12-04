@extends('admin.layout.master')
@section('main_content')
<style type="text/css">
    .imp{display: none !important}
</style>
<div class="container-fluid">
   @include('admin.layout.breadcrumb')

   <div class="row">
        <div class="col-sm-12">
            <div class="white-box p-l-20 p-r-20">
                @include('admin.layout._operation_status')
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('/')}}/admin/blogs/update/{{ base64_encode($arr_data['id']) }}" id="frm_admin" name="frm_admin" class="form-horizontal cmxform" method="post" enctype="multipart/form-data">
                               {{csrf_field()}}
                            <div class="form-body">
                                <h3 class="box-title">Blogs Information</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4 col-md-4 col-lg-3" >Blog Image  <i class="red" >*</i></label>
                                            <div class="col-sm-8 col-md-8 col-lg-9">
                                            @if(isset($arr_data['image']) && !empty($arr_data['image']) && File::exists($blog_image_base_path.$arr_data['image']))
                                                <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="{{ $blog_image_public_path.$arr_data['image'] }}"  value="{{ $blog_image_public_path.$arr_data['image']  ?? ''}}"/>
                                                <input type="hidden" name="oldimage" id="oldimage" value="{{ $arr_data['image'] }}"/>
                                            @else
                                                <input type="file" name="image" id="input-file-now" class="dropify"  />
                                                <input type="hidden" name="oldimage" id="oldimage" value="{{ $arr_data['image'] }}"/>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <label id="input-file-now-error" class="error" for="input-file-now"></label>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group ">
                                            <label class="control-label col-sm-4 col-md-4 col-lg-3">Select Category <i class="red" >*</i></label>
                                            <div class="col-sm-8 col-md-8 col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-menu-alt"></i></span>
                                                   <select name="category_id" id="category_id" class="required form-control chosen-select" data-rule-required="true">
                                                   <option value="">---Select category---</option>
                                                    @if(isset($arr_category) && sizeof($arr_category)>0)
                                                        @foreach( $arr_category as $key => $value )
                                                        <option {{($value['id'] == $arr_data['category_id']) ? 'selected' : '' }} value="{{$value['id']}}">{{$value['title']}}</option>
                                                        @endforeach
                                                    @endif
                                                   </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4 col-md-4 col-lg-3" >Blog title  <i class="red" >*</i>
                                            </label>
                                            <div class="col-sm-8 col-md-8 col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-marker-alt"></i></span>
                                                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter Blog title" data-rule-required="true" value="<?php echo isset($arr_data['title'])? $arr_data['title']: '' ?>" maxlength="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4 col-md-4 col-lg-3" >Blog slug <i class="red" >*</i>
                                            </label>
                                            <div class="col-sm-8 col-md-8 col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-shortcode"></i></span>
                                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Slug" data-rule-required="true"  value="<?php echo isset($arr_data['slug'])? $arr_data['slug']: '' ?>" readonly="true" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4 col-md-4 col-lg-3" >Meta Title  <i class="red" >*</i></label>
                                            <div class="col-sm-8 col-md-8 col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-marker-alt"></i></span>
                                                    <input type="text" id="meta_title" name="meta_title" class="form-control" placeholder="Enter Meta title" data-rule-required="true" value="<?php echo isset($arr_data['meta_title'])? $arr_data['meta_title']: '' ?>" maxlength="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4 col-md-4 col-lg-3" >Meta Keyword  <i class="red" >*</i></label>
                                            <div class="col-sm-8 col-md-8 col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-key"></i></span>
                                                    <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" placeholder="Enter Meta keyword" data-rule-required="true" value="<?php echo isset($arr_data['meta_keyword'])? $arr_data['meta_keyword']: '' ?>" maxlength="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4 col-md-4 col-lg-3" >Meta Description  <i class="red" >*</i></label>
                                            <div class="col-sm-8 col-md-8 col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-receipt"></i></span>
                                                    <input type="text" id="meta_description" name="meta_description" class="form-control" placeholder="Enter Meta description" data-rule-required="true" value="<?php echo isset($arr_data['meta_description'])? $arr_data['meta_description']: '' ?>" maxlength="255">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group ">
                                            <label class="control-label col-sm-4 col-md-4 col-lg-3" >Short Description <i class="red" >*</i></label>
                                            <div class="col-sm-8 col-md-8 col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-receipt"></i></span>
                                                    <input type="text" id="short_description" name="short_description" class="form-control" placeholder="Enter Short description" data-rule-required="true" value="<?php echo isset($arr_data['short_description'])? $arr_data['short_description']: '' ?>" maxlength="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group ">
                                        <label class="control-label col-sm-4 col-md-4 col-lg-3" >Blog Content <i class="red" >*</i></label>
                                        <div class="col-sm-8 col-md-8 col-lg-9">
                                            <textarea  name="description" id="description" class="form-control" data-rule-required="true" rows="15" tabindex="1"><?php echo isset($arr_data['description'])? $arr_data['description']: '' ?>
                                            </textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                  <div class="col-md-8">
                                    <div class="form-group">
                                          <label class="control-label col-sm-4 col-md-4 col-lg-3"  for="exampleFormControlSelect1">Language</label>
                                           <div class="col-sm-8 col-md-8 col-lg-9">
                                              <select name="lang" class="form-control" id="exampleFormControlSelect1">
                                                <option @if($arr_data['lang']==1) selected @endif value="1">Thai</option>
                                                <option @if($arr_data['lang']==2) selected @endif value="2">Eng</option>
                                              </select>
                                            </div>
                                    </div>
                                  </div>
                                </div>


                                <div class="row">
                                     <div class="col-md-8">
                                        <div class="form-group">
                                             <label class="control-label col-sm-4 col-md-4 col-lg-3" ></label>
                                            <div class="col-sm-8 col-md-8 col-lg-9">
                                                <div class="form-actions">
                                                    <button type="submit" class="fcbtn btn btn-danger btn-1g"> Save</button>
                                                    <a href="{{ $module_url_path }}"  class="fcbtn btn btn-danger btn-1g">Back</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script src="{{url('/')}}/assets/admin_assets/js/bootstrap-inputmask.min.js"></script>
<script src="https://cdn.tiny.cloud/1/pkec4xjg8t0vigamnl7ueyppxoxpoh20lf5jh4zn3lvehbty/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#frm_admin').validate({
        highlight: function(element) { },
        ignore: []
    });
        /*TINY Text */
            tinymce.init({
            selector: 'textarea',
            height:350,
            valid_elements: "*[*]",
            force_p_newlines : !1,
            forced_root_block : !1,

            plugins: ['code',
            'advlist autolink lists link charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime table contextmenu paste code'
            ],
            toolbar:
            'code | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            content_css: [

            ],
        });

        $('#btn_add_front_page').click(function(){
            tinyMCE.triggerSave();
        });
    });
        $('#frm_admin').each(function () {
    if ($(this).data('validator'))
        $(this).data('validator').settings.ignore = ".note-editor *";
});
</script>

<script>
    $(document).ready(function () {
        // Basic

        $('#frm_admin').validate();
            $('#title').on('change',function(){
                var title = $('#title').val();
                $.ajax({
                    url : '{{ $module_url_path }}/check_category',
                    data: { title: title },
                    type : "GET",
                    dataType: 'JSON',
                    success:function(resp){
                        if(resp.status=='true'){
                            $('#slug').val(resp.data);
                            $('#title-error').html('');
                            document.getElementById("submit").disabled = false;
                            return true;
                        }else if(resp.status=='false'){
                            $('#title-error').html('Category with this name already exists');
                            document.getElementById("submit").disabled = true;

                            return false;
                        }else{
                            $('#title-error').html('');
                            document.getElementById("submit").disabled = false;
                            return true;
                        }
                    }
                })
            });

            $('#slug').on('change',function(){
                var slug = $('#slug').val();
                $.ajax({
                    url : '{{ $module_url_path }}/check_slug',
                    data: { slug: slug },
                    type : "GET",
                    dataType: 'JSON',
                    success:function(resp){
                        if(resp.status=='true'){
                            $('#slug').val(resp.data);
                            $('#slug-error').html('');

                        }else if(resp.status=='false'){
                            $('#slug-error').html('Category with this name already exists');

                        }else{
                            $('#slug-error').html('');

                        }
                    }
                })
            });

        $('.dropify').dropify();
        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez'
                , replace: 'Glissez-déposez un fichier ou cliquez pour remplacer'
                , remove: 'Supprimer'
                , error: 'Désolé, le fichier trop volumineux'
            }
        });
        // Used events
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')

        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            }
            else {
                drDestroy.init();
            }
        })

        $('.dropify-clear').on('click', function () {
            $('#oldimage').val('');
        })

    });
</script>
<script type="text/javascript">
    $(document).ready(function()
    {

        var e = document.getElementById("input-file-now"),
        r = $("#default-image").val();
        $(e).change(function()
        {
            $('.dropify-preview').removeClass('imp');
            if (e.files && e.files[0])
            {
                var a = e.files,
                t = a[0].name.substring(a[0].name.lastIndexOf(".") + 1),
                n = new FileReader;
                if ("JPEG" != t && "jpeg" != t && "jpg" != t && "JPG" != t && "png" != t && "PNG" != t)
                    return showAlert("Sorry, " + a[0].name + " is invalid, allowed extensions are: jpeg , jpg , png", "error"),$("#input-file-now").val(""),$('.dropify-preview').addClass('imp'), $(".fileupload-preview").attr("src", r), !1;
                if (a[0].size > 2e6) return showAlert("Sorry, " + a[0].name + " is invalid, Image size should be upto 2 MB only", "error"), $("#input-file-now").val(""),$('.dropify-preview').addClass('imp'),  $(".fileupload-preview").attr("src", r), !1;
                n.onload = function(e)
                {
                    var a = new Image;
                    a.src = e.target.result, a.onload = function()
                    {
                        var e = this.height,
                        a = this.width;
                    }, $(".fileupload-preview").attr("src", e.target.result)
                }, n.readAsDataURL(e.files[0])
            }
        })
    });

    </script>
<script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection
