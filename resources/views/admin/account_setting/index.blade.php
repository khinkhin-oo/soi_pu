@extends('admin.layout.master')    
@section('main_content')
<style type="text/css">
    .imp{display: none !important}
</style>
<div class="container-fluid">    
    <div class="row">
        <div class="col-sm-12">
            @include('admin.layout.breadcrumb')
            <!--<div class="navbar navbar-inverse bg-indigo-400 navbar-component">
                <div class="navbar-collapse" id="navbar-demo">
                    <ul class="nav navbar-nav">
                        <li class="mega-menu mega-menu-wide active">
                            <a href="http://webwingdemo.com/beta/abcartridge/admin/vendor-catalog/product/rental-plans/">
                                Rental Plans
                                <span class="badge bg-indigo-800 badge-inline position-right" id="forRentalPlansCount">8</span>
                            </a>
                        </li>
                        <li class="mega-menu mega-menu-wide ">
                            <a href="http://webwingdemo.com/beta/abcartridge/admin/vendor-catalog/product/supply-based-rental-plans/">
                                Supply Based Rental Plans
                                <span class="badge bg-indigo-800 badge-inline position-right" id="forSupplyBasedRentalPlansCount">0</span>
                            </a>
                        </li>
                        <li class="mega-menu mega-menu-wide ">
                            <a href="http://webwingdemo.com/beta/abcartridge/admin/vendor-catalog/product/usage-based-rental-plans/">
                                Usage Based Rental Plans
                                <span class="badge bg-indigo-800 badge-inline position-right" id="forUsageBasedRentalPlansCount">11</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right"></ul>
                </div>
            </div> -->
            <div class="white-box p-l-20 p-r-20">
                @include('admin.layout._operation_status')
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('/')}}/admin/account_setting/update" id="frm_admin" name="frm_admin"   method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-body">                                
                                <small class="note">Please note that all fields that have an asterisk (*) are required.</small>
                                <div class="row">
                                    <div class="col-sm-5 ol-md-6 col-xs-12">
                                        <div class="profile-image-section-main" style="position: relative">
                                            <label class="control-label">Profile Image</label>
                                            <!--@if(isset($arr_admin_details['profile_image']) && $arr_admin_details['profile_image'] != '')
                                                <input type="file" name="file" id="input-file-now-custom-1" class="dropify" data-validation-allowing="jpg, jpeg, png" data-default-file="{{$profile_image_public_img_path}}{{$arr_admin_details['profile_image']}}"  onchange="checkImageValidation(this);" />
                                            @else
                                                <input type="file" name="file" id="input-file-now-custom-1" class="dropify" data-validation-allowing="jpg, jpeg, png" data-default-file="{{url('/uploads/default/no-img-user-profile.jpeg')}}"  onchange="checkImageValidation(this);" />
                                            @endif -->
                                            @if(isset($arr_admin_details['profile_image']) && !empty($arr_admin_details['profile_image']) && File::exists($profile_image_base_img_path.$arr_admin_details['profile_image']))
                                                <input type="file" name="profile_image" id="input-file-now" class="dropify" data-default-file="{{ $profile_image_public_img_path.$arr_admin_details['profile_image'] }}"  value="{{ $arr_admin_details['profile_image']  or ''}}" />
                                                <input type="hidden" name="oldimage" id="oldimage" value="{{ $arr_admin_details['profile_image'] }}"/>
                                            @else
                                                <input type="file" name="profile_image" id="input-file-now" class="dropify"  />
                                                <input type="hidden" name="oldimage" id="oldimage" value="{{ $arr_admin_details['profile_image'] }}"/>
                                            @endif
                                            <p class="supported-file-note-section">Supported File Types: jpg, jpeg, png.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 m-b-25">
                                        <label class="control-label">First Name <i class="red" >*</i></label>
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="ti-user"></i></span>
                                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter your First Name" data-rule-required="true"  maxlength="40" value="<?php echo isset($arr_admin_details['first_name'])? $arr_admin_details['first_name']: '' ?>"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6 m-b-25">
                                        <label class="control-label">Last Name <i class="red" >*</i></label>
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="ti-user"></i></span>
                                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter your Last Name" data-rule-required="true"  maxlength="40" value="<?php echo isset($arr_admin_details['last_name'])? $arr_admin_details['last_name']: '' ?>"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6 m-b-25">
                                        <label class="control-label">Email <i class="red" >*</i></label>
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="ti-email"></i></span>
                                            <input type="text" id="email" name="email" class="form-control" placeholder="Enter your Email" data-rule-required="true" data-rule-email="true" value="<?php echo isset($arr_admin_details['email'])? $arr_admin_details['email']: '' ?>"> 
                                        </div>
                                    </div>                                
                                    <div class="col-md-6 m-b-25">
                                        <label class="control-label">Phone Number <i class="red" >*</i></label>
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="icon-phone"></i></span>                                            
                                            <input type="text" id="mobile_number" name="mobile_number" class="form-control" placeholder="Enter your Phone Number" maxlength="10" data-rule-number="true" data-rule-required="true" value="<?php echo isset($arr_admin_details['contact'])? $arr_admin_details['contact']: '' ?>"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6 m-b-25">
                                        <label class="control-label">Address <i class="red" >*</i></label>
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="icon-location-pin"></i></span>
                                            <input type="text" id="address" name="address" class="form-control" placeholder="Enter your Address" data-rule-required="true" maxlength="255" value="<?php echo isset($arr_admin_details['address'])? $arr_admin_details['address']: '' ?>"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="fcbtn btn btn-danger btn-1g">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3&key={{ config('app.project.google_map_api_key') }}&libraries=places"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#frm_admin').validate();
});
</script>
<script>
$(document).ready(function (){
    $("#address").geocomplete({
        details: ".geo-details",
        detailsAttribute: "data-geo"
    }).bind("geocode:result", function (event, result){                       
        $("#latitude").val(result.geometry.location.lat());
        $("#longitude").val(result.geometry.location.lng());
        var searchAddressComponents = result.address_components,
        searchPostalCode="";
    });
    // Basic
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
function checkImageValidation(ref){
    const file = ref.files[0];
    const  fileType = file['type'];
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
    if (!validImageTypes.includes(fileType))
    {
       swal('please select valid file');
       $('#profile_image').val('');
       return false;
    }
}
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var e = document.getElementById("input-file-now"),
        r = $("#default-image").val();
        $(e).change(function(){
            $('.dropify-preview').removeClass('imp');
            if (e.files && e.files[0]){
                var a = e.files,
                t = a[0].name.substring(a[0].name.lastIndexOf(".") + 1),
                n = new FileReader;
                if ("JPEG" != t && "jpeg" != t && "jpg" != t && "JPG" != t && "png" != t && "PNG" != t) 
                    return showAlert("Sorry, " + a[0].name + " is invalid, allowed extensions are: jpeg , jpg , png", "error"),$("#input-file-now").val(""),$('.dropify-preview').addClass('imp'),$('#oldimage').val(''), $(".fileupload-preview").attr("src", r), !1;
                if (a[0].size > 2e6) return showAlert("Sorry, " + a[0].name + " is invalid, Image size should be upto 2 MB only", "error"), $("#input-file-now").val(""),$('.dropify-preview').addClass('imp'),$('#oldimage').val(''),  $(".fileupload-preview").attr("src", r), !1;
                n.onload = function(e){
                    var a = new Image;
                    a.src = e.target.result, a.onload = function(){ 
                        var e = this.height,
                        a = this.width;
                        /*if (e < 250 || a < 150) 
                            return showAlert("Sorry,Please upload image with Height and Width greater than or equal to 200 X 150 for best result", "error"), $("#input-file-now").val(""),$('.dropify-preview').addClass('imp'),$('#oldimage').val(''),  $(".fileupload-preview").attr("src", r), !1*/
                    }, $(".fileupload-preview").attr("src", e.target.result)
                }, n.readAsDataURL(e.files[0])
            }
        })
    });
</script>
<script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection