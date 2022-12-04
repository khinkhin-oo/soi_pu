<!DOCTYPE html>  
<html lang="en">

<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2017 10:36:35 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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

</head>
<style type="text/css">
    .error{color:red;}
    .red{color:red;}
    label.error{right:0 !important;left:inherit;}
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
                <div class="logo-partner">
                    <img src="{{ url('/') }}/assets/front/images/logonew.png">
                </div>
                @include('admin.layout._operation_status')
                <h3 class="box-title m-b-0">Sign In to Admin</h3>

                <form class="form-horizontal new-lg-form" id="loginform" action="{{url($admin_panel_slug.'/validate_login')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="col-xs-12">
                        <div class="form-group  m-t-40">
                            <label>Email <i class="red">*</i></label>
                            <input class="form-control" type="text" name="email" id="email" data-rule-required="true" data-rule-email="true" required="" value="" placeholder="Enter your Email address">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label>Password <i class="red">*</i></label>
                            <input class="form-control" type="password" name="password" id="password" data-rule-required="true" required="" value="" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div >
                            <div class="checkbox checkbox-info pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox" value="on" name="remember_me" id="remember_me" @if(!empty($_COOKIE['remember_me_email'])) ? checked : '' @endif>
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" style="padding-top: 23px;" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot password?</a>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group text-center m-t-20">
                            <button class="btn btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light blue-btn-section" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" method="post" id="frm_forgot" action="{{url('/')}}/admin/forgot_password/post_email">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="email" id="reset_email" data-rule-required="true" required="" data-rule-email="true" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block  btn-rounded  waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                        <a href="{{url('/')}}/admin" id="back_to_login" class="text-dark pull-right"><i class="fa fa-reply"></i> Back to login</a>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#loginform').validate();
            $('#recoverform').validate();
        });
        <?php if($errors->has('email')) : ?>
            $("#myModal").modal('show');
        <?php endif; ?>

    </script>
</body>

<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2017 10:36:35 GMT -->
</html>