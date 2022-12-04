<!DOCTYPE html>  
<html lang="en">

<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2017 10:36:35 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  {{-- <link rel="icon" type="{{ url('/') }}/assets/admin_assets/image/png" sizes="16x16" href="{{ url('/') }}/assets/admin_assets/images/favicon.png"> --}}

  <?php

    $base_img_path   = base_path().config('app.project.img_path.site_logo');
    $public_img_path = url('/').config('app.project.img_path.site_logo');

    if(isset($arr_global_site_setting['favicon']) && $arr_global_site_setting['favicon']!='' && file_exists($base_img_path.$arr_global_site_setting['favicon'])) 
    {
        $favicon_image_path = $public_img_path.$arr_global_site_setting['favicon'];
    } 
    else 
    {
        $favicon_image_path = url('/uploads/default/default.jpg');
    }

    ?>


    <link rel="shortcut icon" type="image/x-icon" href="{{$favicon_image_path}}"> 


  <title>{{config('app.project.name')}} - Admin</title>
  <!-- Bootstrap Core CSS -->
  <link href="{{ url('/') }}/assets/admin_assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- animation CSS -->
  <link href="{{ url('/') }}/assets/admin_assets/css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{ url('/') }}/assets/admin_assets/css/style.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="{{ url('/') }}/assets/admin_assets/css/default.css" id="theme"  rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <style type="text/css">
    .error{color:red;}
    .red{color:red;}
  }
</style>
<body>
  <!-- Preloader -->
  <div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
     
      <div class="new-login-box">

                <div class="white-box">
                  <div class="white-box">
                  <div class="logo-partner">
                  <img src="{{ url('/') }}/assets/admin_assets/images/logo.png">
                </div>
               @include('admin.layout._operation_status')
                    <h3 class="box-title m-b-0">Set Password</h3>
                    <small>Set your New password below</small>
                  <form class="form-horizontal new-lg-form" id="loginform" action="{{url('/')}}/admin/forgot_password/postReset" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                    <div class="form-group  m-t-40">
                      <div class="col-xs-12">
                        <label>New Password <i class="red">*</i></label>
                        <input type="password" data-rule-required="true" name="password" id="password" class="form-control" placeholder="Your New Password" minlength="8">
                      </div>
                    </div>
                    <div class="form-group  m-t-10">
                      <div class="col-xs-12">
                        <label>Confirm Password <i class="red">*</i></label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" data-rule-equalto = "#password"  data-rule-required="true" minlength="8">
                      </div>
                    </div>
                      
                                        
                      <input type="hidden" name="token" value="{{ $token ?? ''}}" />
                    <input type="hidden" name="email" value="{{ $password_reset['email'] ?? ''}}" />

                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Save Password</button>
                      </div>
                    </div>
                  </form>
                </div>
      </div>            
  
  
</section>
    <!-- jQuery -->
    <script src="{{ url('/') }}/assets/admin_assets/js/jquery.min.js"></script>

    <script src="{{ url('/') }}/assets/admin_assets/js/jquery.validate.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('/') }}/assets/admin_assets/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ url('/') }}/assets/admin_assets/js/sidebar-nav.min.js"></script>

    <!--slimscroll JavaScript -->
    <script src="{{ url('/') }}/assets/admin_assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{ url('/') }}/assets/admin_assets/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ url('/') }}/assets/admin_assets/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
  </body>

  <!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2017 10:36:35 GMT -->
  </html>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#loginform').validate();
      $('#recoverform').validate();
      
  });
       <?php if($errors->has('email')) : ?>
      $("#myModal").modal('show');
    <?php endif; ?>

  </script>