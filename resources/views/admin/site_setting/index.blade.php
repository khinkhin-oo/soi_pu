@extends('admin.layout.master')
@section('main_content')
<style type="text/css">
    .file {
  position: relative;
  display: inline-block;
  cursor: pointer;
  height: 2.5rem;
}
.file input {
  min-width: 14rem;
  margin: 0;
  filter: alpha(opacity=0);
  opacity: 0;
}
.file-custom {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  z-index: 5;
  height: 3.5rem;
  padding: .5rem 1rem;
  line-height: 1.5;
  color: #555;
  background-color: #fff;
  border: .075rem solid #ddd;
  border-radius: .25rem;
  box-shadow: inset 0 .2rem .4rem rgba(0,0,0,.05);
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.file-custom:after {
  content: "Choose file...";
}
.file-custom:before {
  position: absolute;
  top: -.075rem;
  right: -.075rem;
  bottom: -.075rem;
  z-index: 6;
  display: block;
  content: "Browse";
  height: 3.5rem;
  padding: .5rem 1rem;
  line-height: 1.5;
  color: #555;
  background-color: #eee;
  border: .075rem solid #ddd;
  border-radius: 0 .25rem .25rem 0;
}

/* Focus */
.file input:focus ~ .file-custom {
  box-shadow: 0 0 0 .075rem #fff, 0 0 0 .2rem #0074d9;
}



/*
 * Progress
 */

.progress {
  display: inline-block;
  height: 1rem;
}
.progress[value] {
  /* Reset the default appearance */
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  /* Remove Firefox and Opera border */
  border: 0;
  /* IE10 uses `color` to set the bar background-color */
  color: #0074d9;
}
.progress[value]::-webkit-progress-bar {
  background-color: #eee;
  border-radius: .2rem;
}
.progress[value]::-webkit-progress-value {
  background-color: #0074d9;
  border-top-left-radius: .2rem;
  border-bottom-left-radius: .2rem;
}
.progress[value="100"]::-webkit-progress-value {
  border-top-right-radius: .2rem;
  border-bottom-right-radius: .2rem;
}

/* Firefox styles must be entirely separate or it busts Webkit styles. */
@-moz-document url-prefix() {
  .progress[value] {
    background-color: #eee;
    border-radius: .2rem;
  }
  .progress[value]::-moz-progress-bar {
    background-color: #0074d9;
    border-top-left-radius: .2rem;
    border-bottom-left-radius: .2rem;
  }
  .progress[value="100"]::-moz-progress-bar {
    border-top-right-radius: .2rem;
    border-bottom-right-radius: .2rem;
  }
}

/* IE9 hacks to accompany custom markup. We don't need to scope this via media queries, but I feel better doing it anyway. */
@media screen and (min-width:0\0) {
  .progress {
    background-color: #eee;
    border-radius: .2rem;
  }
  .progress-bar {
    display: inline-block;
    height: 1rem;
    text-indent: -999rem; /* Simulate hiding of value as in native `<progress>` */
    background-color: #0074d9;
    border-top-left-radius: .2rem;
    border-bottom-left-radius: .2rem;
  }
  .progress[width="100%"] {
    border-top-right-radius: .2rem;
    border-bottom-right-radius: .2rem;
  }
}

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
                @include('admin.layout.breadcrumb')
                @include('admin.layout._operation_status')
               <!--  <div class="breadcrumb-section-main">
                    <ol class="breadcrumb">
                        <li><a href="http://192.168.1.236/lawtally/admin/dashboard"><i class="ti-home"></i> Dashboard</a></li>
                        <li class="active">Edit Profile</li>
                    </ol>
                </div> -->
                <!-- <div class="navbar navbar-inverse bg-indigo-400 navbar-component">
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
                <div class="white-box">
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#site_settings" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-settings"></i></span><span class="hidden-xs"> Site Configuration</span></a></li>
                        <li role="presentation" class=""><a href="#social_links" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-sharethis"></i></span> <span class="hidden-xs">Social Links</span></a></li>
                        <li role="presentation" class=""><a href="#site_logo" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-bookmark-alt"></i></span> <span class="hidden-xs">Site Logo</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="site_settings">
                            <form action="{{url('/')}}/admin/site_setting/update" id="frm_gener_setting" name="frm_gener_setting"  method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Title HomePage Thai<i class="red">*</i></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title HomePage" data-rule-required="true"  maxlength="200" value="<?php echo isset($arr_site_settings['title'])? $arr_site_settings['title']: '' ?>">
                                                </div>
                                            </div>
                                             <div class="col-md-6 m-b-25">
                                                <label class="control-label">H1 HomePage Thai</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="h1_home" name="h1_home" class="form-control" placeholder="H1 HomePage Thai"  maxlength="1000" value="<?php echo isset($arr_site_settings['h1_home'])? $arr_site_settings['h1_home']: '' ?>">
                                                </div>
                                            </div>


                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Title HomePage English<i class="red">*</i></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="title_en" name="title_en" class="form-control" placeholder="Enter Title HomePage English" data-rule-required="true"  maxlength="200" value="<?php echo isset($arr_site_settings['title_en'])? $arr_site_settings['title_en']: '' ?>">
                                                </div>
                                            </div>
                                             <div class="col-md-6 m-b-25">
                                                <label class="control-label">H1 HomePage English</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="h1_home_en" name="h1_home_en" class="form-control" placeholder="H1 HomePage English"  maxlength="1000" value="<?php echo isset($arr_site_settings['h1_home_en'])? $arr_site_settings['h1_home_en']: '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Admin Text of Line</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="adminline" name="adminline" class="form-control" placeholder="Admin Text of Line"  maxlength="500" value="<?php echo isset($arr_site_settings['adminline'])? $arr_site_settings['adminline']: '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Group Text of Line</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="groupline" name="groupline" class="form-control" placeholder="Group Text of Line"  maxlength="500" value="<?php echo isset($arr_site_settings['groupline'])? $arr_site_settings['groupline']: '' ?>">
                                                </div>
                                            </div>


                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Admin Text of Line English</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="adminline_en" name="adminline_en" class="form-control" placeholder="Admin Text of Line English"  maxlength="500" value="<?php echo isset($arr_site_settings['adminline_en'])? $arr_site_settings['adminline_en']: '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Group Text of Line English</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="groupline_en" name="groupline_en" class="form-control" placeholder="Group Text of Line"  maxlength="500" value="<?php echo isset($arr_site_settings['groupline_en'])? $arr_site_settings['groupline_en']: '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Admin Link of Line</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="adminline_link" name="adminline_link" class="form-control" placeholder="Admin Link of Line"  maxlength="1000" value="<?php echo isset($arr_site_settings['adminline_link'])? $arr_site_settings['adminline_link']: '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Group Link of Line</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="groupline_link" name="groupline_link" class="form-control" placeholder="Group Link of Line"  maxlength="1000" value="<?php echo isset($arr_site_settings['groupline_link'])? $arr_site_settings['groupline_link']: '' ?>">
                                                </div>
                                            </div>


                                             <div class="col-md-6 m-b-25">
                                                <label class="control-label">Title Ads</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="title_ads" name="title_ads" class="form-control" placeholder="Enter Title Ads"  maxlength="60" value="<?php echo isset($arr_site_settings['title_ads'])? $arr_site_settings['title_ads']: '' ?>">
                                                </div>
                                            </div>

                                             <div class="col-md-6">
                                                <label class="control-label">Meta Ads</label>
                                                <div class="input-group m-b-25 ">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" placeholder="Enter Meta Ads" data-rule-required="true" maxlength="255" value="<?php echo isset($arr_site_settings['meta_keyword'])? $arr_site_settings['meta_keyword']: '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="control-label">Meta ForgotPassword</label>
                                                <div class="input-group m-b-25 ">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="meta_forgot" name="meta_forgot" class="form-control" placeholder="Enter Meta ForgotPassword" data-rule-required="true" maxlength="255" value="<?php echo isset($arr_site_settings['meta_forgot'])? $arr_site_settings['meta_forgot']: '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="control-label">Meta Register</label>
                                                <div class="input-group m-b-25 ">
                                                    <span class="input-group-addon"><i class="ti-tag"></i></span>
                                                    <input type="text" id="meta_register" name="meta_register" class="form-control" placeholder="Enter Meta Register" data-rule-required="true" maxlength="255" value="<?php echo isset($arr_site_settings['meta_register'])? $arr_site_settings['meta_register']: '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Order Email<i class="red">*</i></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-email"></i></span>
                                                    <input type="text" id="send_order_email" name="send_order_email" class="form-control" placeholder="Enter Order Email" data-rule-required="true" data-rule-email="true"  maxlength="255" value="<?php echo isset($arr_site_settings['send_order_email'])? $arr_site_settings['send_order_email']: '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Meta Description Thai<i class="red">*</i></label>
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="ti-clipboard"></i></span>
                                                    <textarea style="resize: none" class="form-control" placeholder="Meta Description Thai" name="meta_description" data-rule-reuired="true">{{ isset($arr_site_settings['meta_description']) ? $arr_site_settings['meta_description']:''}}</textarea>
                                                </div>
                                            </div>

                                             <div class="col-md-6 m-b-25">
                                                <label class="control-label">Meta Description English<i class="red">*</i></label>
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="ti-clipboard"></i></span>
                                                    <textarea style="resize: none" class="form-control" placeholder="Meta Description English" name="meta_description_en" data-rule-reuired="true">{{ isset($arr_site_settings['meta_description_en']) ? $arr_site_settings['meta_description_en']:''}}</textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Aboutus in Contactus</label>
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="ti-file"></i></span>
                                                    <textarea rows="4" cols="50" style="resize: none" class="form-control" placeholder="Aboutus in Contactus" name="description" data-rule-reuired="true">{{ isset($arr_site_settings['description']) ? $arr_site_settings['description']:''}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Address</label>
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="ti-location-arrow"></i></span>
                                                    <textarea rows="1" cols="50" style="resize: none" class="form-control" placeholder="Address" name="address" data-rule-reuired="true">{{ isset($arr_site_settings['address']) ? $arr_site_settings['address']:''}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Tel</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-id-badge"></i></span>
                                                    <input type="text" id="tel" name="tel" class="form-control" placeholder="Tel"  maxlength="20" value="<?php echo isset($arr_site_settings['tel'])? $arr_site_settings['tel']: '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Top Of HomePage Thai</label>
                                                <div class="input-group ">
                                                    <textarea rows="5" cols="100" style="resize: none" class="form-control" placeholder="Top Of HomePage" name="tophome" data-rule-reuired="true" id="editor">{{ isset($arr_site_settings['tophome']) ? $arr_site_settings['tophome']:''}}</textarea>
                                                </div>
                                            </div>


                                             <div class="col-md-6 m-b-25">
                                                <label class="control-label">Top Of HomePage English</label>
                                                <div class="input-group ">
                                                    <textarea rows="5" cols="100" style="resize: none" class="form-control" placeholder="Top Of HomePage" name="tophome_en" data-rule-reuired="true" id="editor4">{{ isset($arr_site_settings['tophome_en']) ? $arr_site_settings['tophome_en']:''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Bottom Of HomePage Thai</label>
                                                <div class="input-group ">
                                                    <textarea rows="5" cols="100" id="editor2" style="resize: none" class="form-control" placeholder="Bottom Of HomePage Thai" name="bottomhome" data-rule-reuired="true">{{ isset($arr_site_settings['bottomhome']) ? $arr_site_settings['bottomhome']:''}}</textarea>
                                                </div>
                                            </div>

                                             <div class="col-md-6 m-b-25">
                                                <label class="control-label">Bottom Of HomePage English</label>
                                                <div class="input-group ">
                                                    <textarea rows="5" cols="100" id="editor3" style="resize: none" class="form-control" placeholder="Bottom Of HomePage English" name="bottomhome_en" data-rule-reuired="true">{{ isset($arr_site_settings['bottomhome_en']) ? $arr_site_settings['bottomhome_en']:''}}</textarea>
                                                </div>
                                            </div>

                                               <div class="col-md-6 m-b-25">
                                                <label class="control-label">
                                                    <input type="checkbox" @if($arr_site_settings['hideforum']==2)checked="checked" @endif name="hideforum">
                                                    Hide Forum
                                                </label>
                                            </div>

                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">
                                                    <input type="checkbox" @if($arr_site_settings['hideblog']==2)checked="checked" @endif name="hideblog">
                                                    Hide Blog
                                                </label>
                                            </div>






                                            <div class="row">

                                                <div class="col-md-6 m-b-25">
                                                <label class="control-label">Slide1 Image</label>
                                                <div class="input-group">
                                                    <label class="file">
                                                      <input type="file" name="slide1image" aria-label="File browser example">
                                                      <span class="file-custom"></span>
                                                    </label>
                                                </div>
                                                @if(!empty($arr_site_settings['slide1image']))
                                                    <img src="{{asset($arr_site_settings['slide1image'])}}"
                                                    style="width:313px;margin-top:10px" />
                                                @endif
                                            </div>

                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide1 Link</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="ti-link"></i></span>
                                                        <input type="text" name="slide1link" value="<?php echo isset($arr_site_settings['slide1link'])? $arr_site_settings['slide1link']: '' ?>" class="form-control valid">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide2 Image</label>
                                                    <div class="input-group">
                                                        <label class="file">
                                                          <input type="file" name="slide2image" aria-label="File browser example">
                                                          <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                    @if(!empty($arr_site_settings['slide2image']))
                                                        <img src="{{asset($arr_site_settings['slide2image'])}}"
                                                        style="width:313px;margin-top:10px" />
                                                    @endif
                                                </div>
                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide2 Link</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="ti-link"></i></span>
                                                        <input type="text" name="slide2link" value="<?php echo isset($arr_site_settings['slide2link'])? $arr_site_settings['slide2link']: '' ?>" class="form-control valid">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide3 Image</label>
                                                    <div class="input-group">
                                                        <label class="file">
                                                          <input type="file" name="slide3image"  aria-label="File browser example">
                                                          <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                    @if(!empty($arr_site_settings['slide3image']))
                                                        <img src="{{asset($arr_site_settings['slide3image'])}}"
                                                        style="width:313px;margin-top:10px" />
                                                    @endif
                                                </div>


                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide3 Link</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="ti-link"></i></span>
                                                        <input type="text" value="<?php echo isset($arr_site_settings['slide3link'])? $arr_site_settings['slide3link']: '' ?>" name="slide3link" class="form-control valid">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide4 Image</label>
                                                    <div class="input-group">
                                                        <label class="file">
                                                          <input type="file" name="slide4image" aria-label="File browser example">
                                                          <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                    @if(!empty($arr_site_settings['slide4image']))
                                                    <img src="{{asset($arr_site_settings['slide4image'])}}" style="width:313px;margin-top:10px" />
                                                    @endif
                                                </div>


                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide4 Link</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="ti-link"></i></span>
                                                        <input type="text" value="<?php echo isset($arr_site_settings['slide4link'])? $arr_site_settings['slide4link']: '' ?>" name="slide4link" class="form-control valid">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide5 Image</label>
                                                    <div class="input-group">
                                                        <label class="file">
                                                          <input type="file" name="slide5image" aria-label="File browser example">
                                                          <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                    @if(!empty($arr_site_settings['slide5image']))
                                                    <img src="{{asset($arr_site_settings['slide5image'])}}" style="width:313px;margin-top:10px" />
                                                    @endif
                                                </div>


                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide5 Link</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="ti-link"></i></span>
                                                        <input type="text" value="<?php echo isset($arr_site_settings['slide5link'])? $arr_site_settings['slide5link']: '' ?>" name="slide5link" class="form-control valid">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                    <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide6 Image</label>
                                                    <div class="input-group">
                                                        <label class="file">
                                                          <input type="file" name="slide6image" aria-label="File browser example">
                                                          <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                    @if(!empty($arr_site_settings['slide6image']))
                                                    <img src="{{asset($arr_site_settings['slide6image'])}}" style="width:313px;margin-top:10px" />
                                                    @endif
                                                </div>


                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide6 Link</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="ti-link"></i></span>
                                                        <input type="text" value="<?php echo isset($arr_site_settings['slide6link'])? $arr_site_settings['slide6link']: '' ?>" name="slide6link" class="form-control valid">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                    <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide7 Image</label>
                                                    <div class="input-group">
                                                        <label class="file">
                                                          <input type="file" name="slide7image" aria-label="File browser example">
                                                          <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                    @if(!empty($arr_site_settings['slide7image']))
                                                    <img src="{{asset($arr_site_settings['slide7image'])}}" style="width:313px;margin-top:10px" />
                                                    @endif
                                                </div>


                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide7 Link</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="ti-link"></i></span>
                                                        <input type="text" value="<?php echo isset($arr_site_settings['slide7link'])? $arr_site_settings['slide7link']: '' ?>" name="slide7link" class="form-control valid">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide8 Image</label>
                                                    <div class="input-group">
                                                        <label class="file">
                                                          <input type="file" name="slide8image" aria-label="File browser example">
                                                          <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                    @if(!empty($arr_site_settings['slide8image']))
                                                    <img src="{{asset($arr_site_settings['slide8image'])}}" style="width:313px;margin-top:10px" />
                                                    @endif
                                                </div>


                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide8 Link</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="ti-link"></i></span>
                                                        <input type="text" value="<?php echo isset($arr_site_settings['slide8link'])? $arr_site_settings['slide8link']: '' ?>" name="slide8link" class="form-control valid">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide9 Image</label>
                                                    <div class="input-group">
                                                        <label class="file">
                                                          <input type="file" name="slide9image" aria-label="File browser example">
                                                          <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                    @if(!empty($arr_site_settings['slide9image']))
                                                    <img src="{{asset($arr_site_settings['slide9image'])}}" style="width:313px;margin-top:10px" />
                                                    @endif
                                                </div>


                                                <div class="col-md-6 m-b-25">
                                                    <label class="control-label">Slide9 Link</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="ti-link"></i></span>
                                                        <input type="text" value="<?php echo isset($arr_site_settings['slide9link'])? $arr_site_settings['slide9link']: '' ?>" name="slide9link" class="form-control valid">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">
                                                    <input type="checkbox" @if($arr_site_settings['hideslider']==2)checked="checked" @endif name="hideslider">
                                                    Hide Slider
                                                </label>
                                            </div>

                                            {{-- <div class="col-md-6 m-b-25">
                                                <label class="control-label">Slide10 Image</label>
                                                <div class="input-group">
                                                    <label class="file">
                                                      <input type="file" name="slide10image" aria-label="File browser example">
                                                      <span class="file-custom"></span>
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Slide10 Link</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-link"></i></span>
                                                    <input type="text" name="slide10link" class="form-control valid">
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="fcbtn btn btn-danger btn-1g"> Update</button>
                                    </div>
                                </form>
                            <div class="clearfix"></div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade " id="social_links">
                            <form action="{{url('/')}}/admin/site_setting/update_social_links" id="frm_social_links" name="frm_social_links"  method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Facebook Link<i class="red">*</i></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-facebook"></i></span>
                                                    <input type="text" id="facebook_link" name="facebook_link" class="form-control" placeholder="Facebook Link" data-rule-url="true"  data-rule-required="true" value="<?php echo isset($arr_site_settings['facebook_link'])? $arr_site_settings['facebook_link']: '' ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Instagram Link<i class="red">*</i></label>
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="ti-instagram"></i></span>
                                                    <input type="text" id="instagram_link" name="instagram_link" class="form-control" placeholder="Instagram Link" data-rule-url="true"  data-rule-required="true" value="<?php echo isset($arr_site_settings['instagram_link'])? $arr_site_settings['instagram_link']: '' ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6 m-b-25">
                                                <label class="control-label">Twitter link<i class="red">*</i></label>
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="ti-twitter"></i></span>
                                                    <input type="text" id="twitter_link" name="twitter_link" class="form-control" placeholder="Twitter link" data-rule-url="true"  data-rule-required="true" value="<?php echo isset($arr_site_settings['twitter_link'])? $arr_site_settings['twitter_link']: '' ?>">
                                                </div>
                                            </div>
                                            <!--/span-->

                                            <!--/span-->
                                        </div>

                                        <!--/row-->

                                    </div>
                                    <!--/row-->
                                    <div class="form-actions">
                                        <button type="submit" class="fcbtn btn btn-danger btn-1g"> Update</button>
                                    </div>
                                </form>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade " id="site_logo">
                            <form action="{{url('/')}}/admin/site_logo/update" id="frm_social_links" name="frm_social_links"  method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Logo</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-shield"></i></span>
                                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                        </div>
                                                        <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                        <input type="file" data-validation-allowing="jpg, jpeg, png" id="site_logo" name="site_logo" onchange="checkImageValidation(this);"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                                <p style="margin-top: 5px">Supported File Types: gif, jpg, jpeg, png.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                    if(isset($arr_site_settings['logo']) && $arr_site_settings['logo']!='' && file_exists($base_img_path.$arr_site_settings['logo']))
                                    {
                                        $logo_image_path = $public_img_path.$arr_site_settings['logo'];
                                    }
                                    else
                                    {
                                        $logo_image_path = url('/uploads/default/default.jpg');
                                    }

                                    ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Current Logo</label>
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <img src="{{$logo_image_path}}" alt="Site Current Logo" style="height: 50; width: 250px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Favicon</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-shield"></i></span>
                                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                        <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                        <input type="file" id="favicon" name="favicon"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                                <p style="margin-top: 5px">Supported File Types: ico.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php

                                    if(isset($arr_site_settings['favicon']) && $arr_site_settings['favicon']!='' && file_exists($base_img_path.$arr_site_settings['favicon']))
                                    {
                                        $favicon_image_path = $public_img_path.$arr_site_settings['favicon'];
                                    }
                                    else
                                    {
                                        $favicon_image_path = url('/uploads/default/default.jpg');
                                    }

                                    ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Current Favicon</label>
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <img src="{{$favicon_image_path}}" alt="Favicom Icon" style="height: 15px; width: 15px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="fcbtn btn btn-danger btn-1g"> Update</button>
                            </form>
                        </div>

                        <div class="clearfix"></div>
                    </div>

                </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<script type="text/javascript">

$(document).ready(function(){

    $('#frm_gener_setting').validate();

    $('#frm_social_links').validate();

    $('#frm_admin').validate();
});

</script>

<script type="text/javascript">

function checkImageValidation(ref)
{
    const file = ref.files[0];
    const fileType = file['type'];
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

    if (!validImageTypes.includes(fileType)) {
       swal('please select valid file');
       $('#logo').val('');
       return false;
    }
}

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


        tinymce.init({
            selector: '#editor3',
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

        tinymce.init({
            selector: '#editor4',
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

@endsection
