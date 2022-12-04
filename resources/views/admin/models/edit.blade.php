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
<script src="{{ url('/')}}/assets/multi_image_assets/js/bootstrap1.min.js"></script>
<link href="{{url('/')}}/assets/multi_image_assets/css/bootstrap-multiselect.css" rel="stylesheet"/>
<!-- <script src="script.js"></script> -->

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
                            {{-- {{dd($arr_data['get_companies'][0]['id'])}} --}}
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-body">

                                <h3 class="box-title">Edit Model</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Name EN/ ชื่อภาษาอังกฤษ<i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-user"></i></span>
                                                <input type="text" id="first_name" required="" name="first_name" class="form-control" placeholder="Enter your Name" maxlength="40" value="<?php echo isset($arr_data['first_name'])? $arr_data['first_name']: '' ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Name TH/ ชื่อภาษาไทย<i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-user"></i></span>
                                                <input type="text" id="first_name_th" required="" name="first_name_th" class="form-control" placeholder="Enter your Name" maxlength="40" value="<?php echo isset($arr_data['first_name_th'])? $arr_data['first_name_th']: '' ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Donation / บริจาค <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <textarea rows="5" cols="100" style="resize: none" class="form-control" id="editor" data-rule-number="true" name="price" data-rule-number="true" name="price" data-rule-number="true" type="text" placeholder="Price" id="editor"><?php echo isset($arr_data['price'])? $arr_data['price']: '' ?></textarea>
                                                <span style="color: red;">{{$errors->first('price')}}</span>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Whats App<i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-phone"></i></span>

                                                <input class="form-control required valid"  value="<?php echo isset($arr_data['last_name'])? $arr_data['last_name']: '' ?>" data-rule-number="true" name="last_name" type="text" placeholder="Whats App"  id="whatsapp" data-rule-required="true">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">We Chat</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-phone"></i></span>
                                                <input type="text" id="wechat" name="wechat" class="form-control" placeholder="We Chat" data-rule-number="true" value="<?php echo isset($arr_data['wechat'])? $arr_data['wechat']: '' ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Line</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-phone"></i></span>
                                                <input class="form-control required valid" value="<?php echo isset($arr_data['line'])? $arr_data['line']: '' ?>" data-rule-number="true" name="line" data-rule-number="line" type="line" placeholder="Line" id="line">
                                                <span style="color: red;">{{$errors->first('price')}}</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
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
                                                    <option value="{{$company['id']}}" @if($arr_data['company'] == $company['id']) selected="selected" @endif>{{$company['company_name']}}</option>
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
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                                <select name="category" required="" data-rule-required="true" id="category" class="form-control">
                                                    <option value="">Select Category / เลือกประเภท่</option>
                                                    @if(isset($arr_category) && count($arr_category)>0)
                                                    @foreach($arr_category as $category)
                                                        <option value="{{$category['id']}}" @if($arr_data['category'] == $category['id']) selected="selected" @endif>{{$category['category_name']}} {{$category['category_name_th']}}</option>
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
                                            <label class="control-label">Services / บริการ <i class="red">*</i></label>
                                            <span style="color: red;">{{$errors->first('services')}}</span>
                                            <div class="input-group">{{-- {{dd($arr_data['get_models_services'] )}} --}}
                                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                                <select id="services" required="" name="services[]" multiple >
                                                  @if(isset($arr_services) && count($arr_services)>0)
                                                  @foreach($arr_services as $services)
                                                  <option value="{{$services['id']}}" @foreach($arr_data['get_models_services'] as $model_services) @if($model_services['service_id'] == $services['id']) selected="selected" @endif @endforeach>{{$services['service_name']}} {{$services['service_name_th']}}</option>
                                                  @endforeach
                                                  @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Age / อายุ <i class="red">*</i></label>
                                            <span style="color: red;">{{$errors->first('age')}}</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                                <input type="text" value="<?php echo isset($arr_data['age'])? $arr_data['age']: '' ?>" name="age" data-type="contact-number" data-rule-required="true" class="form-control" placeholder="age">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Height / ส่วนสูง (CM)<i class="red" >*</i></label>
                                            <span style="color: red;">{{$errors->first('height')}}</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                                <input type="text" value="<?php echo isset($arr_data['height'])? $arr_data['height']: '' ?>" name="height" data-type="contact-number" data-rule-required="true" class="form-control" placeholder="height">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Weight / น้ำนัก (KG)<i class="red" >*</i></label>
                                            <span style="color: red;">{{$errors->first('weight')}}</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                                <input type="text" value="<?php echo isset($arr_data['weight'])? $arr_data['weight']: '' ?>" name="weight" data-type="contact-number" data-rule-required="true" class="form-control" placeholder="weight">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Availability(From) / เวลาว่าง <i class="red">*</i></label>
                                            <span style="color: red;">{{$errors->first('from_time')}}</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-timer"></i></span>
                                                <input type="text" required="" value="{{ isset($arr_data['from_time'])? $arr_data['from_time']: ''}} " name="from_time" data-rule-required="true" class="form-control" placeholder="Availability(From)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Availability(To) / ว่างจนถึง <i class="red">*</i></label>
                                            <span style="color: red;">{{$errors->first('to_time')}}</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-timer"></i></span>
                                                <input type="text" required="" value="{{ isset($arr_data['to_time'])? $arr_data['to_time']: ''}} " name="to_time" data-rule-required="true" class="form-control" placeholder="Availability(To)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Body Size / รุ่นร่าง <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-receipt"></i></span>
                                                <input class="form-control required valid" value="<?php echo isset($arr_data['size'])? $arr_data['size']: '' ?>" name="size" type="text" placeholder="Size" required="" id="size" data-rule-required="true" maxlength="20">
                                                <span style="color: red;">{{$errors->first('size')}}</span>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <label class="control-label">Country / ประเทศ <i class="red">*</i></label>-->
<!--                                            <div class="input-group">-->
<!--                                                <span class="input-group-addon"><i class="ti-location-pin"></i></span>-->
<!--                                                <input class="form-control required valid" required="" value="--><?php //echo isset($arr_data['country'])? $arr_data['country']: '' ?><!--" name="country" type="text" placeholder="Country" data-rule-required="true" maxlength="20">-->
<!--                                                <span style="color: red;">{{$errors->first('country')}}</span>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Location / ที่ตั้ง<i class="red" >*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-location-pin"></i></span>
                                                <select name="location[]" multiple="" required="" data-rule-required="true" id="location" class="form-control">
                                                    <option value="">Select Location </option>
                                                    @if(isset($arr_location) && count($arr_location)>0)
                                                        @foreach($arr_location as $location)
                                                            <?php $check = false ?>
                                                            @if(!empty($arr_data['locations']))
                                                                @foreach (json_decode($arr_data['locations']) as $item)
                                                                    @if($item == $location['id'])
                                                                        <?php $check = true ?>
                                                                    @endif
                                                                @endforeach
                                                            @endif

                                                            @if($check==true)
                                                                <option value="{{$location['id']}}" selected="selected">{{$location['location_name']}} {{$location['location_name_th']}}</option>
                                                            @else
                                                                <option value="{{$location['id']}}">{{$location['location_name']}} {{$location['location_name_th']}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span style="color: red;">{{$errors->first('category')}}</span>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <label class="control-label">Address / ที่อยู่ <i class="red">*</i></label>-->
<!--                                            <div class="input-group">-->
<!--                                                <span class="input-group-addon"><i class="ti-location-pin"></i></span>-->
<!--                                                <input type="text" required="" id="autocomplete" name="address" class="form-control" placeholder="Enter your Address" data-rule-required="true" maxlength="255" value="--><?php //echo isset($arr_data['address'])? $arr_data['address']: '' ?><!--">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Gender / เพศ<i class="red" >*</i></label>
                                            <span style="color: red;">{{$errors->first('gender')}}</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                                <select name="gender" required="" data-rule-required="true" id="gender" class="form-control">
                                                    <option value="">Select Gender </option>
                                                    <option value="male" @if($arr_data['gender'] == 'Male') selected="selected" @endif>Male</option>
                                                    <option value="female" @if($arr_data['gender'] == 'Female') selected="selected" @endif>Female</option>
                                                    <option value="ladyboy" @if($arr_data['gender'] == 'LadyBoy') selected="selected" @endif>LadyBoy</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group ">
                                         <label class="control-label">Meta Desc </label>
                                         <div class="input-group">
                                             <span class="input-group-addon"><i class="ti-comment-alt"></i></span>
                                             <input class="form-control" value="<?php echo isset($arr_data['meta_desc'])? $arr_data['meta_desc']: '' ?>"  data-rule-number="true" name="meta_desc"  type="text" placeholder="Meta Desc" data-rule-required="true" maxlength="500">
                                          </div>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group ">
                                         <label class="control-label">Bio / อัตชีวประวัติ</label>
                                          <div class="input-group">
                                              <span class="input-group-addon">$</span>
                                              <textarea rows="5" cols="100" style="resize: none" class="form-control" id="editor2" data-rule-number="true" name="bio" data-rule-number="true" type="text" placeholder="Bio" ><?php echo isset($arr_data['bio'])? $arr_data['bio']: '' ?></textarea>
                                              <span style="color: red;">{{$errors->first('price')}}</span>
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
                                                @if($arr_data['type_order']==1)
                                                     <option selected value="-2">Generated randomly</option>
                                                @else
                                                    <option value="-2">Generated randomly</option>
                                                @endif
                                                @for($i=0;$i < $totalmodels;$i++)
                                                    <option @if($arr_data['order_list']==$i && $arr_data['type_order']!=1) selected @endif value="{{$i}}">{{$i}}</option>
                                                @endfor
                                              </select>
                                          </div>
                                      </div>
                                   </div>

                                    <div class="col-md-2">
                                      <div class="form-group " style="
    padding-top: 30px;
">
                                         <div class="input-group">
                                        <p>
                                        @if($arr_data['type_order']==1)
                                            Random with autorefresh / {{$arr_data['order_list']}}
                                        @else
                                            Manual bump
                                        @endif
                                       </p>
                                   </div>
                                      </div>
                                  </div>

                                   <div class="col-md-4">
                                      <div class="form-group ">
                                         <label class="control-label"> Expire Date </label>
                                         <div class="input-group">
                                             <span class="input-group-addon"><i class="ti-calendar"></i></span>
                                             <input class="form-control" @if(!empty($arr_data['expiredate'])) <?php $ex = explode(' ', $arr_data['expiredate']) ?> value="{{$ex[0]}}" @endif  data-rule-number="true" name="expiredate" id="expiredate"  type="date" placeholder="Expire Date" data-rule-required="true">
                                          </div>
                                      </div>
                                       <div style="text-align: left;">
                                    <button type="button" class="btn btn-warning" id="clearex">clear expiredate</button>
                                   </div>
                                   </div>


                                   <script type="text/javascript">
                                       $( "#clearex" ).click(function() {
                                            $("#expiredate").val("");
                                       });
                                   </script>

                                   @endif
                                </div>
                                <div class="clearfix"></div>

                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-sm-5 ol-md-6 col-xs-12">
                                        <div style="margin-bottom 20px;position: relative">
                                            <label class="control-label">COVID-19 Vaccine Certificate</label>
                                            <?php if ($arr_data['vaccine_status'] =='REJECTED') {?>
                                                <br>
                                                <label style="color: red;"><?php echo 'Your documents were rejected, please re-upload again.' ?></label>
                                                <br>
                                            <label style="color: red;"><?php echo 'Note : '.$arr_data['vaccine_reason']; ?></label>
                                            <?php } else if ($arr_data['vaccine_status'] =='APPROVED') {?>
                                                <br>
                                                <label style="color: green;"><?php echo 'Your documents were approved.' ?></label>
                                            <?php } else if ($arr_data['vaccine_status'] =='PENDING') {?>
                                                <br>
                                                <label style="color: blue;"><?php echo 'Your document are pending' ?></label>
                                                <?php
                                            }
                                            if ($arr_data['vaccine_status'] != 'APPROVED') {
                                            ?>
                                            <input type="file" style="padding: 10px" name="vaccine_doc" id="vaccine" class="dropify" onchange="preview()"/>
                                            <?php }?>
                                            <input type="hidden" name="oldimage" id="oldimage" value="{{ $arr_data['vaccine_doc_path'] }}"/>
                                            <img id="prevaccine" style="width: 150px;height: 150px; display: <?php echo $arr_data['vaccine_status'] != 'NOTHING' ? 'block' : 'none'; ?>"
                                                 src="{{$public_img_path}}vaccine_document/{{$arr_data['vaccine_doc_path']}}">
                                            <p class="supported-file-note-section">Supported File Types: jpg, jpeg, png</p>
                                        </div>
                                    </div>
                                </div>

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
                                                    <label class="name-labell">Profile Images / รูปแบบ<span class="busine-span-smll"> ( Maximum 5 Images ) </span></label>
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



  // $.validator.addMethod('customphone', function (value, element) {
  // return this.optional(element) || /(5|6|7|8|9)\d{9}/.test(value);
  // }, "Please enter a valid phone number");

  // $.validator.addClassRules('customphone', {
  // customphone: true
  // });


  // $(document).ready(function(){
  //   /*$( "#datepicker" ).datepicker();*/
  //   jQuery.validator.addMethod("lettersonly", function(value, element) {
  //     return this.optional(element) || /^[a-z]+$/i.test(value);}, "Letters only please");

  // $('#frm_create_page').validate({
  //                   rules: {
  //                     gender: {
  //                       required: true
  //                     },
  //                      voting_surety: {
  //                       required: true
  //                     },
  //                      face_color: {
  //                       required: true

  //                   }
  //                 }
  //           })

  // });
  // $('[data-type="contact-number"]').keyup(function() {
  //   var value = $(this).val();
  //   value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("");
  //   $(this).val(value);
  // });

  $('[data-type="contact-number"]').on("change, blur", function() {
    var value = $(this).val();
    var maxLength = $(this).attr("maxLength");
    if (value.length != maxLength) {
      $(this).addClass("highlight-error");
    } else {
      $(this).removeClass("highlight-error");
    }
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

  $( '[data-type="contact-number-new"]' ).keyup(function() {
      var value = this.value;
      var patt = new RegExp("^[+]{1}[0-9]{11}$");
      var res = patt.test(value);
      if(res)
      {
        $(this).removeClass("error-current");
      }
      else
      {
        $(this).addClass("error-current");
      }
  });

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
})
}(jQuery)

</script>
{{-- Form validation with submit loader --}}
<script type="text/javascript">
$(document).ready(function(){
// $('#frm_store_menu').validate();
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
$('#services').multiselect({ nonSelectedText: 'Select Services'});
$('#location').multiselect({ nonSelectedText: 'Select Location'});
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

            ]
        });
            });
</script>
<script type="text/javascript">
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

            ]
        });
    });
</script>
@endsection
