@extends('admin.layout.master')    
@section('main_content')
<script type="text/javascript">
for (var e = $(document).height(), c = ($(document).width(), 1); c <= 9; c++) "<div class='sk-cube sk-cube" + c + "'></div>";
$("body").append('<div class="se-pre-con"></div>'), $(".se-pre-con").css({
 opacity: .9,
 'text-align': 'center',
 'vertical-align': 'middle',
 "background-color": "white",
 'margin': 'auto',
 'top': 0,
 'left': 0,
 "z-index": 999999
});
setTimeout(function(){ $(".se-pre-con").remove(); }, 1000);

</script>
<style type="text/css">
input[type='file'] {
color: transparent;
}
</style>
<style>
#multiprice_div {border: 1px solid #ddd;padding: 20px 0;margin-bottom: 30px;}
#multiprice_div .add-remove-btn {position: absolute;right: 8px;top: 67px;padding: 0px 8px;line-height: 30px;font-size: 14px;z-index: 9}
#multiprice_div .remove-btn-block {position: absolute;right: 8px;top: 20px;padding: 0px 8px;line-height: 30px;font-size: 14px;}
.label-block {margin-bottom: 9px;margin-top: -5px;}
.generate-group {border-top: 1px solid #ddd;padding-top: 20px;margin-top: -5px;position: relative}
.modifiers-add-button .add-remove-btn {right: -30px;top: 3px;padding: 0px 7px;}
#modifiers {max-width: 717px;width: 100%;}
#modifiers .remove-btn-block{position: absolute;top: 23px;right: 13px;padding: 0 7px;line-height: 30px;}
.upload-photo {display: inline-block;border: 1px dashed #c4c4c4;position: relative;width: 100px;height: 100px;margin-right: 10px;margin-bottom: 10px;}
.upload-photo img {width: 100%;height: 100%;}
.upload_pic_btn {width: 100px;height: 100px;position: absolute;top: 0;left: 0;opacity: 0;cursor: pointer;}
input.error.upload_pic_btn{position: absolute !important;}
.upload-photo label.error {left: 0;bottom: -25px;white-space: nowrap;}
.upload-close {display: block;height: 30px;width: 30px;position: absolute;border-radius: 50%;background: #fff;left: 0;top: 0;right: 0;bottom: 0;margin: auto;transform: translateY(-15px);-webkit-transform: translateY(-15px);-moz-transform: translateY(-15px);-ms-transform: translateY(-15px);-o-transform: translateY(-15px);opacity: 0;visibility: hidden;transition: 0.5s}
.upload-close a{display: block;text-align: center;color: #f83e3f;font-size: 19px;padding-top: 1px;}
.upload-photo:hover .upload-close{transform: translateY(0px);-webkit-transform: translateY(0px);-moz-transform: translateY(0px);-ms-transform: translateY(0px);-o-transform: translateY(0px);opacity: 1;visibility: visible;transition: 0.5s}
.user-box-upload-section{margin-bottom: 20px;}    
.add-busine-multi span div {position: relative;height: 100px;width: 100px;display: inline-block;border: 1px dashed #c4c4c4;margin-right: 10px;margin-bottom: 10px;}
.add-busine-multi span.upload-photo {display: inline-block;border: 1px dashed #c4c4c4;position: relative;width: 100px;height: 100px;margin-right: 10px;margin-bottom: 10px;}
.add-busine-multi span.upload-photo span {display: none;}  
.add-busine-multi span.upload-photo .image-note span{display: block;height: auto;width: auto;}
.add-busine-multi span.upload-photo .image-note{position: absolute;right: -230px;top: 0;width: 200px;padding: 10px;height: auto;border: 1px solid #dddddd;background: #f4f4f4;font-size: 12px;line-height: 22px;transform: translateX(-15px);-webkit-transform: translateX(-15px);-moz-transform: translateX(-15px);-ms-transform: translateX(-15px);-o-transform: translateX(-15px);visibility: hidden;opacity: 0;transition: 0.5s}
.add-busine-multi span.upload-photo:hover .image-note,.add-busine-multi span.upload-photo .upload_pic_btn:focus ~ .image-note{transform: translateX(0px);-webkit-transform: translateX(0px);-moz-transform: translateX(0px);-ms-transform: translateX(0px);-o-transform: translateX(0px);visibility: visible;opacity: 1;transition: 0.5s}
.add-busine-multi span.upload-photo .image-note:before{border-top: 10px solid transparent;border-bottom: 10px solid transparent;border-right: 10px solid #dddddd;position: absolute;top: 20px;left: -10px;content: "";}
.add-busine-multi span.upload-photo .image-note:after{border-top: 8px solid transparent;border-bottom: 8px solid transparent;border-right: 8px solid #f4f4f4;position: absolute;top: 22px;left: -8px;content: "";}
.size_div {position: relative;border-top: 1px solid #dddddd;padding-top: 25px;}   
.size_div .size-section-delete {position: absolute;top: 28px;right: 7px;border: 1px solid #f83e3f;height: 32px;width: 32px;display: block;text-align: center;padding: 3px 0 0;font-size: 18px;color: #f83e3f;} 
.modify-delete{position: absolute;top: 3px;right: -35px;border: 1px solid #f83e3f;height: 32px;  width: 32px;display: block;text-align: center;padding: 3px 0 0;font-size: 18px;color: #f83e3f;}
</style>

<link href="{{url('/')}}/assets/multi_image_assets/css/multiselect.css" rel="stylesheet"/>
<link href="{{url('/')}}/assets/multi_image_assets/css/jquery.multiselect.css" rel="stylesheet" />
<script src="{{ url('/')}}/assets/multi_image_assets/js/multiselect.min.js"></script>
<script src="{{ url('/')}}/assets/multi_image_assets/js/jquery.multiselect.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/clock/dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/clock/assets/css/github.min.css">

<link href="{{url('/')}}/assets/multi_image_assets/css/bootstrap-theme.min.css" rel="stylesheet"/>
<script src="{{ url('/')}}/assets/multi_image_assets/js/jquery.min.js"></script>
<script src="{{ url('/')}}/assets/multi_image_assets/js/bootstrap1.min.js""></script>
<link href="{{url('/')}}/assets/multi_image_assets/css/bootstrap-multiselect.css" rel="stylesheet"/>
<script src="script.js"></script>

<!-- Menu CSS -->
<div class="container-fluid">
    @include('admin.layout.breadcrumb')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box p-l-20 p-r-20">
                @include('admin.layout._operation_status')
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ $module_url_path.'/update/'.base64_encode($arr_data['id']) }}" id="frm_store_menu" name="frm_store_menu" method="post" enctype="multipart/form-data" onsubmit='addLoader()' ;>
                            {{csrf_field()}}
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-body">

                                <h3 class="box-title">Edit Model</h3>
                                <hr>
                                <div class="row">                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">First Name <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-user"></i></span>
                                                <input type="text" id="first_name" required="" name="first_name" class="form-control" placeholder="Enter your First Name" data-rule-required="true" lettersonlywithspace="true" maxlength="40" value="<?php echo isset($arr_data['first_name'])? $arr_data['first_name']: '' ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Last Name <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-user"></i></span>
                                                <input type="text" id="last_name" required="" name="last_name" class="form-control" placeholder="Enter your Last Name" data-rule-required="true" lettersonlywithspace="true" maxlength="40" value="<?php echo isset($arr_data['last_name'])? $arr_data['last_name']: '' ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                                     
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">Email <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-email"></i></span>
                                                <input type="text" id="email" required="" name="email" class="form-control" placeholder="Enter your Email" data-rule-email="true" value="<?php echo isset($arr_data['email'])? $arr_data['email']: '' ?>" readonly="true" style="cursor: not-allowed;" maxlength="50">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">Contact Number <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-phone"></i></span>
                                                <input type="text" required="" id="mobile_number" name="mobile_number" class="form-control" placeholder="Enter your Mobile Number" data-rule-number="true" data-type="contact-number" maxlength="10" value="<?php echo isset($arr_data['mobile_number'])? $arr_data['mobile_number']: '' ?>" maxlength="16">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                                               
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">We Chat:</label><br>
                                            <div class="sicial-radio-btns">
                                                <input type="radio" id="s-option1" name="wechat" value="yes" @if($arr_data['wechat']=='yes' ) checked='checked' @endif />
                                                <label class="control-label">Yes</label>
                                            </div>
                                            <div class="sicial-radio-btns">
                                                <input type="radio" id="s-option1" name="wechat" value="no" @if($arr_data['wechat']=='no' ) checked='checked' @endif />
                                                <label class="control-label">No</label>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">Line:</label>
                                            <br>
                                            <div class="sicial-radio-btns">
                                                <input type="radio" id="s-option1" name="line" value="yes" @if($arr_data['line']=='yes' ) checked='checked' @endif />
                                                <label class="control-label">Yes</label>
                                            </div>
                                            <div class="sicial-radio-btns">
                                                <input type="radio" id="s-option1" name="line" value="no" @if($arr_data['line']=='no' ) checked='checked' @endif />
                                                <label class="control-label">No</label>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="row">                                  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Price <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input class="form-control required valid" value="<?php echo isset($arr_data['price'])? $arr_data['price']: '' ?>" data-rule-number="true" data-type="contact-number" required="" name="price" data-rule-number="true" type="text" placeholder="Price" id="price" data-rule-required="true" maxlength="8">
                                                <span style="color: red;">{{$errors->first('price')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Country <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-location-pin"></i></span>
                                                <input class="form-control required valid" required="" value="<?php echo isset($arr_data['country'])? $arr_data['country']: '' ?>" name="country" type="text" placeholder="Country" data-rule-required="true" maxlength="20">
                                                <span style="color: red;">{{$errors->first('country')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Category <i class="red" >*</i></label>
                                                <span style="color: red;">{{$errors->first('category')}}</span>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <select name="category" required="" data-rule-required="true" id="category" class="form-control">
                                                    <option value="">Select Category </option>
                                                    @if(isset($arr_category) && count($arr_category)>0)
                                                    @foreach($arr_category as $category)
                                                        <option value="{{$category['id']}}" @if($arr_data['category'] == $category['id']) selected="selected" @endif>{{$category['category_name']}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Services <i class="red">*</i></label>
                                            <span style="color: red;">{{$errors->first('services')}}</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                                <select id="services" required="" name="services[]" multiple >
                                                  @if(isset($arr_services) && count($arr_services)>0)
                                                  @foreach($arr_services as $services)
                                                  <option value="{{$services['service_name']}}" @foreach($arr_data['get_models_services'] as $model_services) @if($model_services['service_name'] == $services['service_name']) selected="selected" @endif @endforeach>{{$services['service_name']}}</option>
                                                  @endforeach
                                                  @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">                                                              
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Availability(From) <i class="red">*</i></label>
                                            <span style="color: red;">{{$errors->first('from_time')}}</span>
                                            <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="top" data-autoclose="true">
                                                <span class="input-group-addon"><i class="ti-timer"></i></span>
                                                <input type="text" class="form-control" required="" value="{{ isset($arr_data['from_time'])? $arr_data['from_time']: ''}} "name="from_time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Availability(To) <i class="red">*</i></label>
                                            <span style="color: red;">{{$errors->first('to_time')}}</span>
                                            <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="top" data-autoclose="true">
                                                <span class="input-group-addon"><i class="ti-timer"></i></span>
                                                <input type="text" class="form-control" required="" value="{{ isset($arr_data['to_time'])? $arr_data['to_time']: ''}} "name="to_time">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">                                                            
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Body Size <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-receipt"></i></span>
                                                <input class="form-control required valid" value="<?php echo isset($arr_data['size'])? $arr_data['size']: '' ?>" name="size" type="text" placeholder="Size" required="" id="size" data-rule-required="true" maxlength="20">
                                                <span style="color: red;">{{$errors->first('size')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Date of Birth <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                                <input type="text" id="" readonly="date_of_birth"  value="<?php echo isset($arr_data['date_of_birth'])? $arr_data['date_of_birth']: '' ?>" name="date_of_birth" data-type="contact-number" data-rule-required="true" class="form-control" placeholder="Date of Birth">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Location <i class="red" >*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-location-pin"></i></span>
                                                <select name="location" required="" data-rule-required="true" id="location" class="form-control">
                                                    <option value="">Select Location </option>
                                                    @if(isset($arr_location) && count($arr_location)>0)
                                                    @foreach($arr_location as $location)
                                                        <option value="{{$location['id']}}" @if($arr_data['location'] == $location['id']) selected="selected" @endif>{{$location['location_name']}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span style="color: red;">{{$errors->first('category')}}</span>
                                            </div>
                                        </div>
                                    </div>                                                      
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Address <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-location-pin"></i></span>
                                                <input type="text" required="" id="autocomplete" name="address" class="form-control" placeholder="Enter your Address" data-rule-required="true" maxlength="255" value="<?php echo isset($arr_data['address'])? $arr_data['address']: '' ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row">
                                    @php
                                    $profile_images = (isset($arr_data['get_images']) && is_array($arr_data['get_images']) && sizeof($arr_data['get_images'])>0)? $arr_data['get_images']:[];
                                    $image_count = (sizeof($profile_images)>0)? (sizeof($profile_images)+1):1;
                                    // dd($image_count);
                                    @endphp
                                    <div class="col-md-12">
                                        <div class="user-box user-box-upload-section">
                                            <div class="control-label">
                                                <div class="main-abt-title">
                                                    <label class="name-labell">Profile Images <span class="busine-span-smll"> ( Maximum 5 Images ) </span></label>
                                                </div>
                                            </div>                                        
                                            <div class="add-busine-multi">
                                                <span data-multiupload="3">
                                                    <span data-multiupload-holder>
                                                        @php
                                                            $arr_image_data  = [];
                                                        @endphp
                                                        @if( isset($profile_images) && is_array($profile_images) && sizeof($profile_images)>0 )
                                                            @foreach($profile_images as $key =>$profile)
                                                                @if(isset($profile['profile_image']) && file_exists($base_img_path.'/'.$profile['profile_image']))
                                                                    @php
                                                                    $profile_image_url = imageToBase64($base_img_path.$profile['profile_image']);
                                                                    $image_id = $profile['id'];
                                                                    $arr_temp = [];
                                                                    $arr_temp['profile_image'] = $profile_image_url;
                                                                    $arr_temp['id'] = $image_id;
                                                                    array_push($arr_image_data, $arr_temp);
                                                                    @endphp
                                                                    <div class="upload-photo" id="multiupload_img_3_{{$image_id}}">
                                                                        <span class="upload-close" onclick="remove_data('multiupload_img_3_{{$image_id}}', '{{$image_id}}')">
                                                                            <a href="javascript:void(0)" id="multiupload_img_remove3_{{$image_id}}">
                                                                                <i class="fa fa-trash-o"></i>
                                                                            </a>
                                                                        </span>
                                                                        <img src="{{ $profile_image_url }}">
                                                                    </div>

                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </span>
                                                    <span class="upload-photo">
                                                        <img src="{{ url('/assets/multi_image_assets') }}/images/plus-img.jpg" alt="plus img">
                                                        <input data-multiupload-src class="upload_pic_btn" type="file" multiple="">
                                                        <span data-multiupload-fileinputs>
                                                            @if(isset($arr_image_data) && is_array($arr_image_data) && sizeof($arr_image_data)>0)
                                                                @foreach($arr_image_data as $image_data)
                                                                    <input type="text" name="file[]" id="multiupload_img_3_data_{{ $image_data['id'] ?? '' }}" value="{{ $image_data['image'] ?? '' }}">
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                        <div class="image-note" style="margin-bottom: 15px;">{!!get_image_upload_note('admin_profile',800,800)!!}</div>
                                                    </span>
                                                </span>
                                                <div class="clearfix"></div>
                                            </div>     
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">  
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-actions">
                                                <button type="submit" id="proceed" class="fcbtn btn btn-danger btn-1g">Update</button>
                                            </div>                                        
                                            <div class="clearfix"></div>
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

<script>
  $(function() {
        $( "#datepicker" ).datepicker({
            dateFormat : 'dd/mm/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d',
            closeOnDateSelect : true,
            scrollMonth : false,
            scrollInput : false,
            
        });
    });



  $.validator.addMethod('customphone', function (value, element) {
  return this.optional(element) || /(5|6|7|8|9)\d{9}/.test(value);
  }, "Please enter a valid phone number");

  $.validator.addClassRules('customphone', {
  customphone: true
  });


  $(document).ready(function(){
    /*$( "#datepicker" ).datepicker();*/
    jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-z]+$/i.test(value);}, "Letters only please");

  $('#frm_create_page').validate({
                    rules: {
                      gender: {
                        required: true
                      },
                       voting_surety: {
                        required: true
                      },
                       face_color: {
                        required: true

                    }
                  }
            })

  });
  $('[data-type="contact-number"]').keyup(function() {
    var value = $(this).val();
    value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("");
    $(this).val(value);
  });

  $('[data-type="contact-number"]').on("change, blur", function() {
    var value = $(this).val();
    var maxLength = $(this).attr("maxLength");
    if (value.length != maxLength) {
      $(this).addClass("highlight-error");
    } else {
      $(this).removeClass("highlight-error");
    }
  });

  
</script>


<script src="{{url('/')}}/assets/js/loader.js"></script>
<script src="{{url('/')}}/assets/js/jquery.cropit.js"></script>
{{-- Mutiprice div dynamic --}}
<script type="text/javascript">
function multiPrice()
{
var multiprice = $('#multiprice').is(':checked')

if(multiprice==true)
{
   $("#amount_div").css("display", "none");
   $("#multiprice_div").css("display", "block");
}
else
{
 $("#amount_div").css("display", "block");  
 $("#multiprice_div").css("display", "none");
}
}
</script>

<script type="text/javascript">
function checkType(e) {
return e.split(";")[0].split("/")[1]
}

function checkSize(e) {
var t = e.length - "data:image/png;base64,".length;
return 4 * Math.ceil(t / 3) * .5624896334383812 / 1e3
}

var g = {{$image_count}};
function checkType(e) {
return e.split(";")[0].split("/")[1]
}

$(document).ready(function() {
smallImage: "allow"
}), $(".btn-upload").click(function() {
$(".cropit-image-input").trigger("click")
}), $(document).ready(function() {
var e = document.getElementById("image-data"),
t = $("#default-image").val();
$(e).change(function() {
if ($("#error-background").html(""), e.files && e.files[0]) {
  var a = e.files,
  n = a[0].name.substring(a[0].name.lastIndexOf(".") + 1),
  r = new FileReader;
  if ("JPEG" != n && "jpeg" != n && "jpg" != n && "JPG" != n && "png" != n && "PNG" != n && "BMP" != n && "bmp" != n) return showAlert("Sorry, " + a[0].name + " is invalid, allowed extensions are: jpeg , jpg , png", "error"), $("#image-data").val(""), $(".cropit-preview-image").attr("src", t), !1;
  r.onload = function(e) {
    var t = new Image;
    t.src = e.target.result, t.onload = function() {
      this.height, this.width
   }
}, r.readAsDataURL(e.files[0])
}
})
}), $("#btn-background").click(function() {
$("#error-background").html("");
var e = $("#image-data").val(),
t = $(".image-editor").cropit("export", {
originalSize: !0
});
e && t ? ($(".cover-preview").attr("src", t), $("#business-cover-image").val(t), $("#myModal").modal("hide")) : $("#error-background").html("Please Select cover image.")
}), $(document).ready(function() {
var e = document.getElementById("logo"),
t = "{{ url('/front') }}/images/add-logo.png";
$(e).change(function() {
if (e.files && e.files[0]) {
  var a = e.files,
  n = a[0].name.substring(a[0].name.lastIndexOf(".") + 1),
  r = new FileReader;
  if ("JPEG" != n && "jpeg" != n && "jpg" != n && "JPG" != n && "png" != n && "PNG" != n) return showAlert("Sorry, " + a[0].name + " is invalid, allowed extensions are: jpeg , jpg , png", "error"), $(".image-logo").attr("src", t), !1;
  if (a[0].size > 2e6) return showAlert("Sorry, " + a[0].name + " is invalid, Image size should be upto 2 MB only", "error"), $("#logo").val(""), $(".image-logo").attr("src", t), !1;
  r.onload = function(e) {
    var a = new Image;
    a.src = e.target.result, a.onload = function() {
      var e = this.height,
      a = this.width;
      if (e < 120 || a < 120) return showAlert("Sorry,Please upload image with Height and Width greater than or equal to 120 X 120 for best result", "error"), $("#logo").val(""), $(".image-logo").attr("src", t), !1
   }, $(".image-logo").attr("src", e.target.result)
}, r.readAsDataURL(e.files[0])
}
})
}),
function(e) {
var t = e("span[data-multiupload]");
t.length > 0 && e.each(t, function(t, a) {
var n = e(a).attr("data-multiupload"),
r = "multiupload_img_" + n + "_",
o = "multiupload_img_remove" + n + "_",
i = r + "_file",
l = "data-multiupload-src-" + n,
s = "data-multiupload-holder-" + n,
u = "data-multiupload-fileinputs-" + n,
d = e(a).find("input[data-multiupload-src]");
e(d).removeAttr("data-multiupload-src").attr(l, "");
var c = e(a).find("span[data-multiupload-holder]");
e(c).removeAttr("data-multiupload-holder").attr(s, "");
var m = e(a).find("span[data-multiupload-fileinputs]");
e(m).removeAttr("data-multiupload-fileinputs").attr(u, ""), e(d).on("change", function(t) {
  showProcessingOverlay();
  setTimeout(function() {hideProcessingOverlay()
  }, 600)
  var a, n;
  a = t.target, n = function(t, a) {
    0 == t && function(t) {
      if (e(".upload_pic_btn").val(""), g > 5) return showAlert("Sorry, only 5 images are allowed to upload.", "error"), !1;
      var a = checkType(t);
      if ("jpeg" != a && "jpg" != a && "png" != a && "gif" != a) return showAlert("Sorry,Please upload image with extension png, jpg, jpeg, gif.", "error"), !1;
      if (!(2e3 > checkSize(t))) return showAlert("Sorry, Image size should be upto 2 MB only.", "error"), !1;
      var n, l = Math.random().toString(36).substring(2, 10),
      s = '<div class="upload-photo" id="' + r + l + '"><span class="upload-close"><a href="javascript:void(0)" id="' + o + l + '" ><i class="fa fa-trash-o"></i></a></span><img src="' + t + '" ></div>',
      u = '<input type="text" name="file[]" id="' + i + l + '"  value="' + t + '" />';
      e(c).append(s), e(m).append(u), e("#" + o + (n = l)).on("click", function() {
        e("#" + r + n).remove(), e("#" + i + n).remove(), g--
     }), g++
      $('#image-change').val('yes');
   }(a)
}, a.files && e.each(a.files, function(e, t) {
 var a = new FileReader;
 a.onload = function(e) {
   n(!1, e.target.result)
}, a.readAsDataURL(t)
}), n(!0, !1)
});
})
}(jQuery)

</script>
{{-- Form validation with submit loader --}}
<script type="text/javascript">
$(document).ready(function(){
$('#frm_store_menu').validate();
});

function addLoader() {
$('#frm_store_menu').submit(function(event) {
  if($("#frm_store_menu").valid()==true)
  {
    $("#proceed").html("<b><i class='fa fa-spinner fa-spin'></i></b> Processing...");
    $("#proceed").attr('disabled', true);
 } 
 else
 {
    event.preventDefault();
 }
});
}

</script>
<script type="text/javascript">
function remove_data(DivId,Random)
{
swal({
 title: "Are you sure ?",
 text: 'Do you want to remove image?',
 type: "warning",
 showCancelButton: !0,
 confirmButtonColor: "#FF6347",
 confirmButtonText: "Yes",
 cancelButtonText: "No",
 closeOnConfirm: !0,
 closeOnCancel: !0
}, function(e) {
 if (!e) return !1;
 $('#multiupload_img_3_data_'+Random).remove();
 $('#'+DivId).remove();
 $('#image-change').val('yes');

 var id = Random;
  if(id!='')
  { 
    var url = '{{$module_url_path}}/delete_image';
 console.log('{{$module_url_path}}/delete_image');
    var csrf_token      = '{{csrf_token()}}';

    $.ajax({
        type:'POST',
        url: url,
        data:{id:id,_token:'{{csrf_token()}}'},
        
        success:function(resp){
            $('#booth').html(resp);
        }
    });
  }
 g--;
})
}

</script>

<script type="text/javascript">
function confirm_delete_size(ref,evt,msg)
{
var msg = msg || false;

evt.preventDefault();  
swal({  
title: "Are you sure?",
text: msg,
type: "warning",
showCancelButton: true,
confirmButtonColor: "#FF6347",
confirmButtonText: "Yes",
cancelButtonText: "No",
closeOnConfirm: false,
closeOnCancel: true
},

function(isConfirm)
{
  console.log('here');
if(isConfirm==true)
{
window.location = $(ref).attr('{{$module_url_path}}/delete_image');
}
});
} 
</script>


<script type="text/javascript" src="{{url('/')}}/assets/clock/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/assets/clock/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/assets/clock/dist/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
$('.clockpicker').clockpicker()
  .find('input').change(function(){
    console.log(this.value);
  });
var input = $('#single-input').clockpicker({
  placement: 'bottom',
  align: 'left',
  autoclose: true,
  'default': 'now'
});

$('.clockpicker-with-callbacks').clockpicker({
    donetext: 'Done',
    init: function() { 
      console.log("colorpicker initiated");
    },
    beforeShow: function() {
      console.log("before show");
    },
    afterShow: function() {
      console.log("after show");
    },
    beforeHide: function() {
      console.log("before hide");
    },
    afterHide: function() {
      console.log("after hide");
    },
    beforeHourSelect: function() {
      console.log("before hour selected");
    },
    afterHourSelect: function() {
      console.log("after hour selected");
    },
    beforeDone: function() {
      console.log("before done");
    },
    afterDone: function() {
      console.log("after done");
    }
  })
  .find('input').change(function(){
    console.log(this.value);
  });

// Manually toggle to the minutes view
$('#check-minutes').click(function(e){
  // Have to stop propagation here
  e.stopPropagation();
  input.clockpicker('show')
      .clockpicker('toggleView', 'minutes');
});
if (/mobile/i.test(navigator.userAgent)) {
  $('input').prop('readOnly', true);
}
</script>
<script type="text/javascript" src="{{url('/')}}/assets/clock/assets/js/highlight.min.js"></script>
<script type="text/javascript">
hljs.configure({tabReplace: '    '});
hljs.initHighlightingOnLoad();
</script>


<script src="{{ url('/')}}/assets/multi_image_assets/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#services').multiselect({
nonSelectedText: 'Select Services'
});
});
</script>

@endsection