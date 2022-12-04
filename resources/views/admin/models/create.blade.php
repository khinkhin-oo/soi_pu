@extends('admin.layout.master')
@section('main_content')
<style>
#multiprice_div {border: 1px solid #ddd;padding: 20px 0;margin-bottom: 30px;}
#multiprice_div .add-remove-btn {position: absolute;right: 8px;top: 39px;padding: 0px 8px;line-height: 30px;font-size: 14px;}
#multiprice_div .remove-btn-block {position: absolute;right: 8px;top: 20px;padding: 0px 8px;line-height: 30px;font-size: 14px;}
.label-block {margin-bottom: 15px;margin-top: -5px;}
.generate-group {border-top: 1px solid #ddd;padding-top: 20px;margin-top: -5px;position: relative}
.modifiers-add-button .add-remove-btn {right: -30px;top: 3px;padding: 0px 7px;}
/*#modifiers {max-width: 717px;width: 100%;}*/
#modifiers .remove-btn-block{position: absolute;top: 2px;right: -30px;padding: 0 7px;line-height: 30px;}
.upload-photo {display: inline-block;border: 1px dashed #dddddd;position: relative;width: 100px;height: 100px;margin-right: 10px;margin-bottom: 10px;}
.upload-photo img {width: 100%;height: 100%;}
.upload_pic_btn {width: 100px;height: 100px;position: absolute;top: 0;left: 0;opacity: 0;cursor: pointer;}
input.error.upload_pic_btn{position: absolute !important;}
.upload-photo label.error {left: 0;bottom: -25px;white-space: nowrap;}
.upload-close {display: block;height: 30px;width: 30px;position: absolute;border-radius: 50%;background: #fff;left: 0;top: 0;right: 0;bottom: 0;margin: auto;transform: translateY(-15px);-webkit-transform: translateY(-15px);-moz-transform: translateY(-15px);-ms-transform: translateY(-15px);-o-transform: translateY(-15px);opacity: 0;visibility: hidden;transition: 0.5s}
.upload-close a{display: block;text-align: center;color: #f83e3f;font-size: 19px;padding-top: 1px;}
.upload-photo:hover .upload-close{transform: translateY(0px);-webkit-transform: translateY(0px);-moz-transform: translateY(0px);-ms-transform: translateY(0px);-o-transform: translateY(0px);opacity: 1;visibility: visible;transition: 0.5s}
.user-box-upload-section{margin-bottom: 20px;}
.add-busine-multi span div {position: relative;height: 100px;width: 100px;display: inline-block;border: 1px dashed #dddddd;margin-right: 10px;margin-bottom: 10px;}
.add-busine-multi span.upload-photo {display: inline-block;border: 1px dashed #dddddd;position: relative;width: 100px;height: 100px;margin-right: 10px;margin-bottom: 10px;}
.add-busine-multi span.upload-photo span {display: none;}
.add-busine-multi span.upload-photo .image-note span{display: block;height: auto;width: auto;}
.add-busine-multi span.upload-photo .image-note{position: absolute;right: -230px;top: 0;width: 200px;padding: 10px;height: auto;border: 1px solid #dddddd;background: #f4f4f4;font-size: 12px;line-height: 22px;transform: translateX(-15px);-webkit-transform: translateX(-15px);-moz-transform: translateX(-15px);-ms-transform: translateX(-15px);-o-transform: translateX(-15px);visibility: hidden;opacity: 0;transition: 0.5s}
.add-busine-multi span.upload-photo:hover .image-note,.add-busine-multi span.upload-photo .upload_pic_btn:focus ~ .image-note{transform: translateX(0px);-webkit-transform: translateX(0px);-moz-transform: translateX(0px);-ms-transform: translateX(0px);-o-transform: translateX(0px);visibility: visible;opacity: 1;transition: 0.5s}
.add-busine-multi span.upload-photo .image-note:before{border-top: 10px solid transparent;border-bottom: 10px solid transparent;border-right: 10px solid #dddddd;position: absolute;top: 20px;left: -10px;content: "";}
.add-busine-multi span.upload-photo .image-note:after{border-top: 8px solid transparent;border-bottom: 8px solid transparent;border-right: 8px solid #f4f4f4;position: absolute;top: 22px;left: -8px;content: "";}
.error-current
{
	border: 1px solid #fd1716;
    background: #ff00003b;
}
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
{{-- <script src="script.js"></script> --}}

<div class="container-fluid">
   @include('admin.layout.breadcrumb')
   <div class="row">
      <div class="col-sm-12">
         <div class="white-box p-l-20 p-r-20">
            @include('admin.layout._operation_status')
            <div class="row">
               <div class="col-md-12">
                  <form action="{{url('/')}}/admin/models/store" method="post" enctype="multipart/form-data" onsubmit='addLoader()';>
                     {{csrf_field()}}
                    <div class="form-body">
                        <p style="color: red;">Please note that all fields that have an asterisk (*) are required.</p>
                        <br/>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Name EN/ ชื่อภาษาอังกฤษ<i class="red" >*</i></label>
                              <span style="color: red;">{{$errors->first('first_name')}}</span>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="ti-user"></i></span>
                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter your First Name" required="" value="{{old('first_name')}}" data-rule-required="true" maxlength="20">
                              </div>
                            </div>
                          </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Name TH/ ชื่อภาษาไทย<i class="red" >*</i></label>
                                    <span style="color: red;">{{$errors->first('first_name_th')}}</span>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ti-user"></i></span>
                                        <input type="text" id="first_name_th" name="first_name_th" class="form-control" placeholder="Enter your First Name" required="" value="{{old('first_name_th')}}" data-rule-required="true" maxlength="20">
                                    </div>
                                </div>
                            </div>

                           <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Donation / บริจาค<i class="red" >*</i></label>
                                <span style="color: red;">{{$errors->first('price')}}</span>
                                <div class="input-group">
                                  <span class="input-group-addon">$</span>
                                  <textarea rows="5" cols="100" style="resize: none" class="form-control" id="editor" data-rule-number="true" name="price" data-rule-number="true" type="text" placeholder="Donation" data-rule-required="true">{{old('price')}}</textarea>
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group ">
                              <label class="control-label">Whats App<i class="red" ></i></label>
                              <span style="color: red;">{{$errors->first('last_name')}}</span>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="icon-phone"></i></span>

                                 <input class="form-control required valid"  value="{{old('last_name')}}" data-rule-number="true" name="last_name" type="text" placeholder="Whats App"  id="whatsapp" data-rule-required="true">
                              </div>
                            </div>
                          </div>




                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">We Chat</label>
                                <span style="color: red;">{{$errors->first('wechat')}}</span>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="icon-phone"></i></span>
                                <input class="form-control required valid"  value="{{old('wechat')}}" data-rule-number="true" name="wechat" type="text" placeholder="Contact Number"  id="s-option1" data-rule-required="true">
                              </div>
                            </div>
                          </div>


                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Line</label>
                                <span style="color: red;">{{$errors->first('line')}}</span>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-phone"></i> </span>
                                  <input class="form-control required valid" value="{{old('line')}}" data-rule-number="true" name="line" data-rule-number="true" type="text" placeholder="line"   id="s-option1" data-rule-required="true">
                                  </div>
                              </div>
                            </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Company / บริษัท<i class="red" >*</i></label>
                              <span style="color: red;">{{$errors->first('company')}}</span>
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
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Category / ประเภท <i class="red" >*</i></label>
                              <span style="color: red;">{{$errors->first('category')}}</span>
                              <select name="category" required="" data-rule-required="true" id="category" class="form-control">
                                <option value="">Select Category / เลือกประเภท </option>
                                @if(isset($arr_category) && count($arr_category)>0)
                                @foreach($arr_category as $category)
                                    <option value="{{$category['id']}}" @if(old('category') == $category['id']) selected="selected" @endif>{{$category['category_name']}} {{$category['category_name_th']}}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                           </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Services / บริการ <i class="red" >*</i></label>
                              <span style="color: red;">{{$errors->first('services')}}</span>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                <select id="services"  data-rule-required="true" name="services[]" multiple >
                                  @if(isset($arr_services) && count($arr_services)>0)
                                  @foreach($arr_services as $services)
                                  <option value="{{$services['id']}}" @if(old('services') == $services['id']) selected="selected" @endif>{{$services['service_name']}} {{$services['service_name_th']}}</option>
                                  @endforeach
                                  @endif
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Age / อายุ<i class="red" >*</i></label>
                              <span style="color: red;">{{$errors->first('age')}}</span>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                <input type="text" required="" data-type="contact-number" maxlength="2"  value="{{old('age')}}" name="age" data-rule-required="true" class="form-control" placeholder="Age">
                              </div>
                            </div>
                          </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Height / ส่วนสูง (CM)<i class="red" >*</i></label>
                                    <span style="color: red;">{{$errors->first('height')}}</span>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                        <input type="text" required="" data-type="contact-number" value="{{old('height')}}" name="height" data-rule-required="true" class="form-control" placeholder="Height">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Weight / น้ำนัก (KG)<i class="red" >*</i></label>
                                    <span style="color: red;">{{$errors->first('weight')}}</span>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                        <input type="text" required="" data-type="contact-number" value="{{old('weight')}}" name="weight" data-rule-required="true" class="form-control" placeholder="Weight">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">Availability(From) / เวลาว่าง <i class="red" >*</i></label>
                                  <span style="color: red;">{{$errors->first('from_time')}}</span>
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="ti-timer"></i></span>
                                    <input type="text" required="" value="{{old('from_time')}}" name="from_time" data-rule-required="true" class="form-control" placeholder="Availability(From)">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">Availability(To) / ว่างจนถึง<i class="red" >*</i></label>
                                  <span style="color: red;">{{$errors->first('to_time')}}</span>
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="ti-timer"></i></span>
                                    <input type="text" required="" value="{{old('to_time')}}" name="to_time" data-rule-required="true" class="form-control" placeholder="Availability(To)">
                                  </div>
                              </div>
                            </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                  <label class="control-label">Body Size / รุ่นร่าง<i class="red" >*</i></label>
                                  <span style="color: red;">{{$errors->first('size')}}</span>
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="ti-receipt"></i></span>
                                      <input type="text" required="" value="{{old('size')}}" name="size" data-rule-required="true" class="form-control" placeholder="Body Size">
                                   </div>
                               </div>
                           </div>
<!--                          <div class="col-md-6">-->
<!--                            <div class="form-group">-->
<!--                              <label class="control-label">Country / ประเทศ <i class="red" >*</i></label>-->
<!--                              <span style="color: red;">{{$errors->first('country')}}</span>-->
<!--                              <div class="input-group">-->
<!--                                <span class="input-group-addon"><i class="ti-location-pin"></i></span>-->
<!--                                <input class="form-control required valid" required=""  value="Thailand" name="country" data-rule-number="true" type="text" placeholder="Country"   id="country" data-rule-required="true" maxlength="20">-->
<!--                              </div>-->
<!--                            </div>-->
<!--                          </div>-->
                          <div class="col-md-6">
                              <div class="form-group ">
                                 <label class="control-label">Location / ที่ตั้ง <i class="red" >*</i></label>
                                 <span style="color: red;">{{$errors->first('location')}}</span>
                                 <select name="location[]" multiple="" required="" data-rule-required="true" id="location" class="form-control">
                                    <option value="">Select Location </option>
                                    @if(isset($arr_location) && count($arr_location)>0)
                                    @foreach($arr_location as $location)
                                        <option value="{{$location['id']}}" @if(old('location') == $location['id']) selected="selected" @endif>{{$location['location_name']}} {{$location['location_name_th']}}</option>
                                    @endforeach
                                    @endif
                                  </select>
                              </div>
                           </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Gender / เพศ<i class="red" >*</i></label>
                                    <span style="color: red;">{{$errors->first('gender')}}</span>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                        <select name="gender" required="" data-rule-required="true" id="gender" class="form-control">
                                            <option value="">Select Gender </option>
                                            <option value="male" @if(old('gender') == 'Male') selected="selected" @endif>Male</option>
                                            <option value="female" @if(old('gender') == 'Female') selected="selected" @endif>Female</option>
                                            <option value="ladyboy" @if(old('gender') == 'LadyBoy') selected="selected" @endif>LadyBoy</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
<!--                           <div class="col-md-6">-->
<!--                              <div class="form-group ">-->
<!--                                 <label class="control-label">Address / ที่อยู่ <i class="red" >*</i></label>-->
<!--                                 <span style="color: red;">{{$errors->first('address')}}</span>-->
<!--                                 <div class="input-group">-->
<!--                                     <span class="input-group-addon"><i class="ti-location-pin"></i></span>-->
<!--                                     <input class="form-control required valid" required="" value="{{old('address')}}"  data-rule-number="true" name="address"  type="text" placeholder="Address" data-rule-required="true" maxlength="100">-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                           </div>-->

                           <div class="col-md-6">
                              <div class="form-group ">
                                 <label class="control-label">Meta Desc </label>
                                 <div class="input-group">
                                     <span class="input-group-addon"><i class="ti-comment-alt"></i></span>
                                     <input class="form-control" value="{{old('meta_desc')}}"  data-rule-number="true" name="meta_desc"  type="text" placeholder="Meta Desc" data-rule-required="true" maxlength="500">
                                  </div>
                              </div>
                           </div>
                            <div class="col-md-6">
                              <div class="form-group ">
                                 <label class="control-label">Bio / อัตชีวประวัติ</label>
                                  <div class="input-group">
                                      <span class="input-group-addon">$</span>
                                      <textarea rows="5" cols="100" style="resize: none" class="form-control" id="editor2" data-rule-number="true" name="bio" data-rule-number="true" type="text" placeholder="Bio" data-rule-required="true">{{old('bio')}}</textarea>
                                  </div>
                              </div>
                           </div>
                           @if(session('subadmin_id')==null)
                            <div class="col-md-4">
                              <div class="form-group ">
                                 <label class="control-label">Index of order in list</label>
                                 <div class="input-group">
                                     <span class="input-group-addon"><i class="ti-comment-alt"></i></span>
                                     <select name="order_list"
                                             class="form-control">
                                          <option value="-1">First list up to 1 hour</option>
                                          <option value="-2">Generated randomly</option>
                                          @for($i=0;$i < $totalmodels;$i++)
                                              <option value="{{$i}}">{{$i}}</option>
                                          @endfor
                                     </select>
                                  </div>
                              </div>
                           </div>
                           @Endif
                        </div>

                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-sm-5 ol-md-6 col-xs-12">
                                <div style="margin-bottom 20px;position: relative">
                                    <label class="control-label">COVID-19 Vaccine Certificate</label>
                                    <span style="color: red;">{{$errors->first('banner_image')}}</span>
                                    <input type="file" style="padding: 10px" name="vaccine_doc" id="vaccine" class="dropify" onchange="preview()"/>
                                    <img id="prevaccine" style="width: 150px;height: 150px;display: none;" src="{{ url('/assets/multi_image_assets') }}/images/plus-img.jpg">
                                    <p class="supported-file-note-section">Supported File Types: jpg, jpeg, png</p>
                                </div>
                            </div>
                        </div>

                        <div class="user-box user-box-upload-section">
                            <div class="main-abt-title">
                            <label class="control-label">Profile Images / รูปแบบ <span class="busine-span-smll"> ( Maximum 5 Images ) </span></label>
                            </div>
                            <div class="add-busine-multi">
                              <span data-multiupload="3">
                                <span data-multiupload-holder></span>
                                <span class="upload-photo">
                                    <img src="{{ url('/assets/multi_image_assets') }}/images/plus-img.jpg" alt="plus img">
                                    <input data-multiupload-src class="upload_pic_btn" type="file" multiple="" data-rule-required="false">
                                    <span data-multiupload-fileinputs></span>
                                    <div class="image-note" style="margin-bottom: 15px;">{!!get_image_upload_note('admin_profile',800,800)!!}</div>
                                </span>
                              </span>
                                <div class="clerfix"></div>
                            </div>
                            <div class="clearfix"></div>
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

<script src="{{url('/')}}/assets/js/loader.js"></script>
<script src="{{url('/')}}/assets/js/jquery.cropit.js"></script>

{{-- Mutiprice div dynamic --}}

<script type="text/javascript">

    function preview() {
        var a = event.target.files[0],
            n = a.name.substring(a.name.lastIndexOf(".") + 1),
            r = new FileReader;
        if ("JPEG" != n && "jpeg" != n && "jpg" != n && "JPG" != n && "png" != n && "PNG" != n && "BMP" != n && "bmp" != n) {
            vaccine.value = null;
            vaccine.type = "text";
            vaccine.type = "file";
            prevaccine.style.display = "none";
            return showAlert("Sorry, " + a.name + " is invalid, allowed extensions are: jpeg , jpg , png", "error");
        }

        prevaccine.style.display = "block";
        prevaccine.src=URL.createObjectURL(event.target.files[0]);
    }


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
</script>
<script>
$.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };

  $('[data-type="contact-number"]').inputFilter(function(value) {
    return /^[+0-9]+$/.test(value);    // Allow digits only, using a RegExp
  });
   $('[data-type="contact-number-new"]').inputFilter(function(value) {
    return /^[+0-9]+$/.test(value);    // Allow digits only, using a RegExp
  });

</script>

<script type="text/javascript">
   function checkType(e) {
        return e.split(";")[0].split("/")[1]
    }

    function checkSize(e) {
        var t = e.length - "data:image/png;".length;
        return 4 * Math.ceil(t / 3) * .5624896334383812 / 1e3
    }
    $(".image-editor").cropit({
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
                    setTimeout(function() {
                        hideProcessingOverlay()
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
                        }(a)
                    }, a.files && e.each(a.files, function(e, t) {
                        var a = new FileReader;
                        a.onload = function(e) {
                            n(!1, e.target.result);
                            var image = document.createElement('img');
                            image.addEventListener('load', function() {
                                var aspect = image.width / image.height;
                                if(aspect > 1)
                                {
                                  return showAlert("Uploading images smaller than 800*900px may result in distortion and stretch of the picture.", "error")
                                }
                            });
                            image.src = e.target.result;
                        }, a.readAsDataURL(t)
                    }), n(!0, !1)
                });
                var g = 1
            })

        }(jQuery)
</script>


{{-- Form validation with submit loader --}}
<script type="text/javascript">

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
$('#location').multiselect({
nonSelectedText: 'Select Services'
});
});
</script>
<script src="https://cdn.tiny.cloud/1/pkec4xjg8t0vigamnl7ueyppxoxpoh20lf5jh4zn3lvehbty/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    $(document).ready(function(){

        /*TINY Text */
            tinymce.init({
            selector: '#editor',
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
     });

    $(document).ready(function(){

        /*TINY Text */
        tinymce.init({
            selector: '#editor2',
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
    });
</script>

@endsection
