<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2017 10:36:14 GMT -->
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

    {{-- <link rel="icon" type="{{ url('/') }}/assets/admin_assets/images/png" sizes="16x16" href="{{ url('/') }}/assets/admin_assets/images/admin-logo.png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{$favicon_image_path}}">

    <title>{{config('app.project.name')}} - Admin</title>
    <!-- Bootstrap Core CSS -->
    <script src="{{ url('/') }}/assets/admin_assets/js/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" ></script>

    <script src="{{url('/')}}/assets/admin_assets/js/additional-methods.js"></script>

    <link href="{{ url('/') }}/assets/admin_assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ url('/') }}/assets/admin_assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <script src="{{ url('/') }}/assets/admin_assets/js/jquery.dataTables.min.js"></script>
    <!--    <link href="../../../../cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />-->
    <!-- Menu CSS -->
    <link href="{{ url('/') }}/assets/admin_assets/css/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ url('/') }}/assets/admin_assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url('/') }}/assets/admin_assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ url('/') }}/assets/admin_assets/css/default.css" id="theme" rel="stylesheet">

    <link href="{{ url('/') }}/assets/admin_assets/css/dropify.min.css" rel="stylesheet">

    <link href="{{ url('/') }}/assets/admin_assets/css/sweetalert.css" rel="stylesheet">

    <link href="{{ url('/') }}/assets/admin_assets/css/chosen.css" rel="stylesheet">

    <link href="{{url('/')}}/assets/admin_assets/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part" style="background: rgb(47, 50, 62) !important;">
                    <!-- Logo -->
                    @if($shared_admin_details['permissions']=='1')
                        <a class="logo" href="{{ url('/') }}">
                            <!-- Logo icon image, you can use font-icon also --><b>
                            <!--This is dark logo icon-->
                            <?php
                            $base_img_path   = base_path().config('app.project.img_path.site_logo');
                            $public_img_path = url('/').config('app.project.img_path.site_logo');

                            if(isset($arr_global_site_setting['logo']) && $arr_global_site_setting['logo']!='' && file_exists($base_img_path.$arr_global_site_setting['logo']))
                            {
                                $logo_image_path = $public_img_path.$arr_global_site_setting['logo'];
                            }
                            else
                            {
                                $logo_image_path = url('/uploads/default/default.jpg');
                            }
                            ?>
                            <img src="{{ $logo_image_path }}" alt="home" class="dark-logo" />
                            <img src="{{ $logo_image_path }}" alt="home" class="light-logo" />
                        </b>
                    @elseif($shared_admin_details['permissions']=='2')
                        <a class="logo" href="{{ url('/') }}/admin/models">
                            <!-- Logo icon image, you can use font-icon also --><b>
                            <!--This is dark logo icon-->
                            <?php
                            $base_img_path   = base_path().config('app.project.img_path.site_logo');
                            $public_img_path = url('/').config('app.project.img_path.site_logo');


                            if(isset($arr_global_site_setting['logo']) && $arr_global_site_setting['logo']!='' && file_exists($base_img_path.$arr_global_site_setting['logo']))
                            {
                                $logo_image_path = $public_img_path.$arr_global_site_setting['logo'];
                            }
                            else
                            {
                                $logo_image_path = url('/uploads/default/default.jpg');
                            }
                            ?>
                            <img src="{{ $logo_image_path }}" alt="home" class="dark-logo" />
                            <img src="{{ $logo_image_path }}" alt="home" class="light-logo" />
                        </b>
                    @elseif($shared_admin_details['permissions']=='0')
                    <a class="logo" href="{{ url('/') }}/admin/dashboard">
                        <!-- Logo icon image, you can use font-icon also --><b>
                            <!--This is dark logo icon-->
                            <?php
                            $base_img_path   = base_path().config('app.project.img_path.site_logo');
                            $public_img_path = url('/').config('app.project.img_path.site_logo');


                            if(isset($arr_global_site_setting['logo']) && $arr_global_site_setting['logo']!='' && file_exists($base_img_path.$arr_global_site_setting['logo']))
                            {
                                $logo_image_path = $public_img_path.$arr_global_site_setting['logo'];
                            }
                            else
                            {
                                $logo_image_path = url('/uploads/default/default.jpg');
                            }
                            ?>
                            <img src="{{ $logo_image_path }}" alt="home" class="dark-logo" />
                            <img src="{{ $logo_image_path }}" alt="home" class="light-logo" />
                        </b>
                    @endif
                    <!-- Logo text image you can use text also --><span class="hidden-xs">
                    <!--This is dark logo text-->
                    <img src="{{ url('/') }}/assets/admin_assets/images/admin-text.png" alt="home" class="dark-logo" />
                    <!--This is light logo text-->{{-- <img src="{{ url('/') }}/assets/admin_assets/images/admin-text.png" alt="home" class="light-logo" /> --}}
                </span> </a>
            </div>
            <!-- /Logo -->
            <!-- Search input and Toggle icon -->
            <ul class="nav navbar-top-links navbar-left">
                <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                {{-- <li class="dropdown">
                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="fa fa-bell"></i>
                        @if(isset($notifications) && $notifications!='' )
                            @if( $notification_count > 0 )
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            @endif
                        @endif
                    </a>
                    <ul class="dropdown-menu mailbox animated bounceInDown">
                        <li>
                            <div class="drop-title">Latest notifications</div>
                        </li>
                        <li>
                            <div class="message-center">
                                @if(isset($notifications) && $notifications!='' )
                                @if( $notification_count >0 )
                                @foreach( $notifications as $key => $value )

                                <a href="{{ url('/') }}/admin/notifications">
                                    <div class="user-img">
                                        @if(isset($value['get_user_details']['profile_image']) && !empty($value['get_user_details']['profile_image']) && File::exists($user_profile_image_base_path.$value['get_user_details']['profile_image']))
                                        <img src="{{ $user_profile_image_public_path.$value['get_user_details']['profile_image'] }}" alt="user" class="img-circle">
                                        @else
                                        <img src="{{ url('/') }}/uploads/default/no-img-user-profile.jpg" alt="user" class="img-circle">
                                        @endif
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>{{ $value['get_user_details']['first_name'] ?? 'N/A' }} {{ $value['get_user_details']['last_name'] ?? 'N/A' }}</h5>
                                        <span class="mail-desc">{{ $value['title'] }}</span>
                                        <span class="time">{{ get_formated_date($value['created_at']) ?? 'N/A' }}</span>
                                    </div>
                                </a>
                                @endforeach
                                @else
                                <p class="text-info" style="text-align: center;margin-top: 15px">No New Notifications</p>
                                @endif
                                @endif
                            </div>
                        </li>
                        <li>
                            <a class="text-center" href="{{ url('/') }}/admin/notifications">See all notifications <i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li> --}}

                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">

                        <?php if($shared_admin_details['profile_image'] && $shared_admin_details['profile_image'] != '' )?>
                            <img src="{{url('/')}}/uploads/admin/profile_image/{{isset($shared_admin_details['profile_image']) ? $shared_admin_details['profile_image'] : ' '}}" alt="user-img" width="36" height="36" class="img-circle">
                        {{-- @else
                            <img src="{{url('/uploads/default/no-img-user-profile.jpeg')}}" alt="user-img" width="36" class="img-circle">
                        @endif  --}}

                        <b><?php echo isset($shared_admin_details['first_name']) ? ucfirst($shared_admin_details['first_name']) : 'N/A' ?></b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">

                        @if($shared_admin_details['permissions']=='0')
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-text">
                                        <h4><?php echo isset($shared_admin_details['first_name']) ? ucfirst($shared_admin_details['first_name'].' '.$shared_admin_details['last_name']) : 'N/A' ?> </h4>
                                        <p class="text-muted"><?php echo isset($shared_admin_details['email']) ? ($shared_admin_details['email']) : 'N/A' ?></p><a href="{{ url('/') }}/admin/account_setting" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/') }}/admin/account_setting"><i class="ti-user"></i> Edit Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/') }}/admin/password/change"><i class="ti-settings"></i> Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/') }}/admin/logout"  onclick="return confirm_action(this,event,'Do you really want to Logout ?')" ><i class="fa fa-power-off"></i> Logout</a></li>

                        @elseif($shared_admin_details['permissions']=='1')
                            <li><a href="{{ url('/') }}/subadmin/logout"  onclick="return confirm_action(this,event,'Do you really want to Logout ?')" ><i class="fa fa-power-off"></i> Logout</a></li>
                        @elseif($shared_admin_details['permissions']=='2')
                            <li><a href="{{ url('/') }}/subadmin/logout"  onclick="return confirm_action(this,event,'Do you really want to Logout ?')" ><i class="fa fa-power-off"></i> Logout</a></li>
                            @endif
                        </ul>
                        <!-- /.dropdown-user -->
                </li>
                            <!-- /.dropdown -->
            </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
