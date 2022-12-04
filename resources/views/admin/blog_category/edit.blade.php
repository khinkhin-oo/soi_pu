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
                                     <form action="{{url('/')}}/admin/blog_category/update/{{ $enc_id }}" id="frm_admin" name="frm_admin"  class="form-horizontal cmxform"   method="post" enctype="multipart/form-data">
                                           {{csrf_field()}}
                                        <div class="form-body">
                                            <h3 class="box-title">Blogs Information</h3>
                                            <hr>
                                            
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-4 col-md-4 col-lg-3" >Blog Category title <i class="red" >*</i></label>
                                                        <div class="col-sm-8 col-md-8 col-lg-9">
                                                        <input type="text" id="category" name="category" class="form-control" placeholder="Enter Blog title" value="{{$arr_data['title'] ?? 'NA' }}" data-rule-required="true" maxlength="100"> 
                                                        <label id="category-error" class="error" for="slug"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-4 col-md-4 col-lg-3" >Blog Category slug <i class="red" >*</i></label>
                                                        <div class="col-sm-8 col-md-8 col-lg-9">
                                                        <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Meta title" data-rule-required="true" readonly="true" value="{{$arr_data['slug'] ?? 'NA' }}"> 
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
                                                                <button type="submit" id="submit" class="btn btn-success"> <i class="fa fa-check"></i> Edit</button>
                                                                <a href="{{ $module_url_path }}"  class="btn btn-default">Back</a>
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
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
        $(document).ready(function () {
            // Basic
            $('#frm_admin').validate();
            $('#category').on('change',function(){
                var category = $('#category').val();
                $.ajax({
                    url : '{{ $module_url_path }}/check_category',
                    data: { category: category },
                    type : "GET",
                    dataType: 'JSON',
                    success:function(resp){
                        if(resp.status=='true'){
                            $('#slug').val(resp.data);
                            $('#category-error').html('');
                            document.getElementById("submit").disabled = false;
                            return true;
                        }else if(resp.status=='false'){
                            $('#category-error').html('Category with this name already exists');
                            document.getElementById("submit").disabled = true;
                            return false;
                        }else{
                            $('#category-error').html('');
                            document.getElementById("submit").disabled = false;
                            return true;
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
                        if (e < 1000 || a < 1000) 
                            return showAlert("Sorry,Please upload image with Height and Width greater than or equal to 1000 X 1000 for best result", "error"), $("#input-file-now").val(""),$('.dropify-preview').addClass('imp'),  $(".fileupload-preview").attr("src", r), !1
                    }, $(".fileupload-preview").attr("src", e.target.result)
                }, n.readAsDataURL(e.files[0])
            }
        })
    });

    </script>

    <script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection
