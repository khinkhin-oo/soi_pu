@extends('admin.layout.master')    
@section('main_content')
<style type="text/css">
  img{
  max-width:180px;
}
input[type=file]{
padding:10px;}
</style>
<div class="container-fluid">
   @include('admin.layout.breadcrumb')
   <div class="row">
      <div class="col-sm-12">
         <div class="white-box p-l-20 p-r-20">
            @include('admin.layout._operation_status')
            <div class="row">
               <div class="col-md-12">
                  <form action="{{url('/')}}/admin/banners/store" method="post" enctype="multipart/form-data" onsubmit='addLoader()';>
                     {{csrf_field()}}
                    <div class="form-body">
                      {{--   <h3 class="box-title">Add Customer</h3>
                        <hr> --}}
                        <p style="color: red;">Please note that all fields that have an asterisk (*) are required.</p>
                        <br/>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Title</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa-square-o"></i></span>
                                <input type="text" id="title"  name="title" class="form-control" placeholder="Enter Banner Title"  value="{{old('title')}}" lettersonlywithspace="true" maxlength="20">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">URL Link</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa-square-o"></i></span>
                                <input type="text" id="url"  name="url" class="form-control" placeholder="Enter Link Banner"  value="{{old('url')}}" lettersonlywithspace="true">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Company</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                <select name="company" required="" data-rule-required="true" id="company" class="form-control">
                                  <option value="">Select Company </option>
                                  @if(isset($arr_companies) && count($arr_companies)>0)
                                  @foreach($arr_companies as $company)
                                      <option value="{{$company['id']}}" @if(old('company') == $company['id']) selected="selected" @endif>{{$company['company_name']}}</option>
                                  @endforeach
                                  @endif
                                </select> 
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-5 ol-md-6 col-xs-12">
                            <div class="profile-image-section-main" style="position: relative">
                              <label class="control-label">Banner Image</label>
                               <span style="color: red;">{{$errors->first('banner_image')}}</span>
                              <input type="file" name="banner_image" id="input-file-now" class="dropify"  />
                              <p class="supported-file-note-section">Supported File Types: jpg, jpeg, png.,.gif</p>
                            </div>
                          </div>
                        </div>
                      </div>
                     <div class="form-actions">
                        <button type="submit" id="proceed" class="fcbtn btn btn-danger btn-1g">  Save</button>
                        <a href="{{ $module_url_path }}"  class="fcbtn btn btn-primary btn-outline btn-1e">Back</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
function checkImageValidation(ref){
    const file = ref.files[0];
    const  fileType = file['type'];
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
    alert(validImageTypes);
    if (!validImageTypes.includes(fileType))
    {
       swal('please select valid file');
       $('#profile_image').val('');
       return false;
    }
}
</script>
<script type="text/javascript">

$(document).ready(function() {

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
            if ("JPEG" != t && "jpeg" != t && "jpg" != t && "JPG" != t && "png" != t && "PNG" != t && "GIF" != t && "gif" != t) 
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