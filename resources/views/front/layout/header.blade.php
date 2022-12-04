<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="@yield('metadesc')" />
    <title>@yield('title')</title>
    <!-- ======================================================================== -->
    <!-- Bootstrap CSS -->
    <link href="{{ url('/') }}/assets/front/css/bootstrap.min.css" rel="stylesheet">
    <!--font-awesome-css-start-here-->
    <link href="{{ url('/') }}/assets/front/css/fontawesome-v5.7.2-pro.min.css" rel="stylesheet">
    <!--Custom Css-->
    <link href="{{ url('/') }}/assets/front/css/somtam.css" rel="stylesheet">
    <!--Main JS-->
    <link href="{{ url('/') }}/assets/front/js/jquery-1.11.3.min.js" rel="stylesheet">
    {{-- <link href="{{ url('/') }}/assets/front/js/bootstrap.min.js" rel="stylesheet"> --}}
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/front/css/swiper.min.css">
    <script type="text/javascript" src="{{ url('/') }}/assets/front/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/front/js/bootstrap.min.js"></script>

    @if (\Request::is('/'))
        <link rel="canonical" href="https://www.soi66.com" />
    @elseif (\Request::is('en'))
        <link rel="canonical" href="https://www.soi66.com/en" />
    @endif
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FV060KWYFG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FV060KWYFG');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PK35FP4');</script>
<!-- End Google Tag Manager -->

</head>

<?php $settings = getSettings(); ?>

@if(isset($arr_user) && $arr_user!= null)
    <div class="black-div-section"></div>
    <div class="container-change-section">
        <div class="logo-section-main-block">
            <div class="logo-section">
                <a href="{{ url('/') }}/">
                    <img src="{{ url('/') }}/assets/front/images/logonew.png" alt="" class="main-logo" />
                    <img src="{{ url('/') }}/assets/front/images/responsive-logo.png" alt="" class="responsive-logo" />
                </a>
            </div>
            <div class="login-register-section after-login-menu-section">
                <div class="help-register-section">
                    <ul>
                        {{-- <li><a href="javascript:void(0);">{{ trans('header.help') }}</a></li> --}}
                        {{-- @if(\App::isLocale('th'))
                            <li class="language-section-main responsive-menu-hide header-user-name">
                                    <span><img src="{{url('/')}}/assets/front/images/thailand-flag-icon.png" alt="" /></span>
                                <ul class="user-dropdown-section">
                                    <li class="language-section-main responsive-menu-hide">
                                        <a href="{{ url('/').'/en' }}">
                                            <span><img src="{{url('/')}}/assets/front/images/flag-eng.jpg" alt="" /></span><span>EN</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @elseif(\App::isLocale('en'))
                            <li class="language-section-main responsive-menu-hide header-user-name">
                                <span><img src="{{url('/')}}/assets/front/images/flag-eng.jpg" alt="" /></span>
                                <ul class="user-dropdown-section">
                                    <li class="language-section-main responsive-menu-hide">
                                        <a href="{{ url('/').'/' }}">
                                            <span><img src="{{url('/')}}/assets/front/images/thailand-flag-icon.png" alt="" /></span><span>TH</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif --}}
                        <li class="language-section-main responsive-menu-hide">
                            <a href="{{ url('/').'/en' }}">
                                <span><img src="{{url('/')}}/assets/front/images/flag-eng.jpg" alt="" /></span><span>EN</span>
                            </a>
                        </li>
                        <li class="language-section-main responsive-menu-hide">
                            <a href="{{ url('/').'/' }}">
                                <span><img src="{{url('/')}}/assets/front/images/thailand-flag-icon.png" alt="" style="height:14px;" /></span>
                                <span>TH</span>
                            </a>
                        </li>
                        <li class="header-user-name">
                            <a href="javascript:void(0);"><?php echo isset($arr_user['user_name']) ? ucfirst($arr_user['user_name']) : 'N/A' ?></a>
                            <ul class="user-dropdown-section">
                                <li><a href="{{ url('/') }}/profile">{{ trans('index.profile') }}</a></li>
                                <li><a href="{{ url('/') }}/change_password">{{ trans('header.change password') }}</a></li>
                                <li><a href="{{asset('inbox')}}">{{ trans('index.inbox') }}</a></li>
                                 @if($arr_user['admin_status']==1)
                                <li><a href="{{ url('/') }}/subadmin/subadmin_login">{{ trans('header.Manage model') }}</a></li>
                                @endif
                                <li><a href="{{ url('/') }}/logout">{{ trans('header.logout') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="menu-section">
        <div class="container-change-section">
            <ul class="mySidenav-section" id="mySidenav">
                <a href="javascript:void(0)" class="closebtn">&times;</a>
                <li class="responsive-show-section">
                    <img src="{{ url('/') }}/assets/front/images/logonew.png" alt="" />
                </li>

                @if(\App::isLocale('th'))
                <li>
                    <a href="{{ url('/') }}/">{{ trans('header.home') }}</a>
                </li>
                @else
                <li>
                    <a href="{{ url('/en') }}/">{{ trans('header.home') }}</a>
                </li>
                @endif
                <li>
                    <a href="{{url('/user_register')}}">{{ trans('header.register') }}</a>
                </li>
                 @if(\App::isLocale('th'))
                <li>
                    <a href="{{asset('/faqs')}}">{{ trans('header.faqs') }}</a>
                </li>
                <li>
                    <a href="{{asset('/faqsbadges')}}">{{ trans('index.faqsbadges') }}</a>
                </li>
                @if($settings->hideblog==1)
                    <li class="hide-mobile-menu-blog">
                        <a href="{{asset('/blogs')}}">{{ trans('header.blogs') }}</a>
                    </li>
                @endif
                @else
                <li>
                    <a href="{{asset('/en/faqs')}}">{{ trans('header.faqs') }}</a>
                </li>
                <li>
                    <a href="{{asset('/en/faqsbadges')}}">{{ trans('index.faqsbadges') }}</a>
                </li>
                @if($settings->hideblog==1)
                <li class="hide-mobile-menu-blog">
                    <a href="{{asset('/en/blogs')}}">{{ trans('header.blogs') }}</a>
                </li>
                @endif
                @endif
                @if($settings->hideblog==1)
                <li>
                    <a href="{{asset('/forum')}}">{{ trans('header.forum') }}</a>
                </li>
                @endif
                <li>
                    <a href="{{asset('/contactus')}}">{{ trans('header.contactus') }}</a>
                </li>
            </ul>
            <span class="menu-icon" onclick="openNav()">&#9776;</span>
            <div class="clearfix"></div>
        </div>
    </div>
    @else
    <div class="black-div-section"></div>
    <div class="container-change-section">
        <div class="logo-section-main-block">
            <div class="logo-section">
                <div class="logo-section">
                <a href="{{ url('/') }}/">
                    <img src="{{ url('/') }}/assets/front/images/logonew.png" alt="" class="main-logo" />
                    <img src="{{ url('/') }}/assets/front/images/responsive-logo.png" alt="" class="responsive-logo" />
                </a>
            </div>
            </div>
            <div class="login-register-section">
                <div class="help-register-section">
                    <ul>
                        {{-- @if(\App::isLocale('th'))
                            <li class="language-section-main responsive-menu-hide header-user-name">
                                <span><img src="{{url('/')}}/assets/front/images/thailand-flag-icon.png" alt="" /></span>
                                <ul class="user-dropdown-section">
                                    <li class="language-section-main responsive-menu-hide">
                                        <a href="{{ url('/').'/en' }}">
                                            <span><img src="{{url('/')}}/assets/front/images/flag-eng.jpg" alt="" /></span><span>EN</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @elseif(\App::isLocale('en'))
                            <li class="language-section-main responsive-menu-hide header-user-name">
                                <span><img src="{{url('/')}}/assets/front/images/flag-eng.jpg" alt="" /></span>
                                <ul class="user-dropdown-section">
                                    <li class="language-section-main responsive-menu-hide">
                                        <a href="{{ url('/').'/' }}">
                                            <span><img src="{{url('/')}}/assets/front/images/thailand-flag-icon.png" alt="" /></span><span>TH</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif --}}
                        <li class="language-section-main responsive-menu-hide">
                            <a href="{{ url('/').'/en' }}">
                                <span><img src="{{url('/')}}/assets/front/images/flag-eng.jpg" alt="" /></span><span>EN</span>
                            </a>
                        </li>
                        <li class="language-section-main responsive-menu-hide">
                            <a href="{{ url('/').'/' }}">
                                <span><img src="{{url('/')}}/assets/front/images/thailand-flag-icon.png" alt="" style="height:14px;" /></span><span>TH</span>
                            </a>
                        </li>
                        <li class="hide-mobile-menu"><a href="javascript:void(0);">{{ trans('header.help') }}</a></li>
                        {{-- <li class="responsive-show-menu"><a href="javascript:void(0);">{{ trans('header.login') }}</a></li> --}}
                        <li class="hide-mobile-menu"><a href="{{url('/user_register')}}">{{ trans('header.register') }}</a></li>
                    </ul>
                </div>
                <div class="login-form-seciton login-form-seciton-desktop">
                    <a href="javascript:void(0)" class="closebtnlogin">&times;</a>
                    <div class="login-head-seciton">
                        {{ trans('header.login') }}
                    </div>
                    <div class="form-group">
                        <form action="{{url('/')}}/validate_login" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row" style="height: 35px;">
                                <div class="col-sm-5 col-md-5 col-lg-5">
                                    <div class="input-box-right">
                                        <input type="text" name="user_name" required placeholder="{{ trans('header.user name') }}">
                                        <span class="bar"></span>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-md-5 col-lg-5">
                                    <div class="input-box-right">
                                        <input type="password" name="password" required placeholder="{{ trans('header.password') }}">
                                        <span class="bar"></span>
                                    </div>
                                </div>
                                <div class="form-group login-form-btn-seciton">
                                    <button type="submit" class="login-form-btn">{{ trans('header.login') }}</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="check-box">
                                    <input id="filled-in-box" class="filled-in" name="remember_me" type="checkbox">
                                    <label for="filled-in-box">{{ trans('header.remember me') }}</label>
                                </div>
                                <div class="forgot">
                                    <a href="{{url('/')}}/forget_password">{{ trans('header.forgot password') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="responsive-login-container">
            <form action="{{url('/')}}/validate_login" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                    <div class="container">
                      {{-- <h3>Login</h3>
                      <hr /> --}}
                      <div class="row">
                        <div class="col-6">
                          <div class="input-box-right">
                                        <input type="text" name="user_name" required placeholder="{{ trans('header.user name') }}">
                                        <span class="bar"></span>
                                    </div>
                        </div>
                        <div class="col-6">
                          <div class="input-box-right">
                                        <input type="password" name="password" required placeholder="{{ trans('header.password') }}">
                                        <span class="bar"></span>
                                    </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-6">
                             <div class="check-box" style="position: relative;top: 4px;">
                                    <input id="filled-in-box2" class="filled-in2" name="remember_me" type="checkbox">
                                    <label for="filled-in-box2">{{ trans('header.remember me') }}</label>
                                </div>
                        </div>
                        <div class="col-6">
                             <div style="position: relative;top:6px;" class="forgot">
                                    <a href="{{url('/')}}/forget_password">{{ trans('header.forgot password') }}</a>
                                </div>
                        </div>
                        <div class="col-12 text-center" style="margin-bottom: 10px;">
                            <div class="form-group login-form-btn-seciton">
                               <button type="submit" class="login-form-btn">Login</button>
                            </div>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
    </div>
     <div class="menu-section">
        <div class="container-change-section">
            <ul class="mySidenav-section" id="mySidenav">
                <a href="javascript:void(0)" class="closebtn">&times;</a>
                <li class="responsive-show-section">
                    <img src="{{ url('/') }}/assets/front/images/logonew.png" alt="" />
                </li>
                @if(\App::isLocale('th'))
                <li>
                    <a href="{{ url('/') }}/">{{ trans('header.home') }}</a>
                </li>
                @else
                <li>
                    <a href="{{ url('/en') }}/">{{ trans('header.home') }}</a>
                </li>
                @endif
                <li>
                    <a href="{{url('/user_register')}}">{{ trans('header.register') }}</a>
                </li>
                @if(\App::isLocale('th'))
                <li>
                    <a href="{{asset('/faqs')}}">{{ trans('header.faqs') }}</a>
                </li>
                <li>
                    <a href="{{asset('/faqsbadges')}}">{{ trans('index.faqsbadges') }}</a>
                </li>
                @if($settings->hideblog==1)
                <li class="hide-mobile-menu-blog">
                    <a href="{{asset('/blogs')}}">{{ trans('header.blogs') }}</a>
                </li>
                @endif
                @else
                <li>
                    <a href="{{asset('/en/faqs')}}">{{ trans('header.faqs') }}</a>
                </li>
                <li>
                    <a href="{{asset('/en/faqsbadges')}}">{{ trans('index.faqsbadges') }}</a>
                </li>
                @if($settings->hideblog==1)
                <li class="hide-mobile-menu-blog">
                    <a href="{{asset('/en/blogs')}}">{{ trans('header.blogs') }}</a>
                </li>
                @endif
                @endif
                @if($settings->hideforum==1)
                <li>
                    <a href="{{asset('/forum')}}">{{ trans('header.forum') }}</a>
                </li>
                @endif
                <li>
                    <a href="{{asset('/contactus')}}">{{ trans('header.contactus') }}</a>
                </li>
            </ul>
            <span class="menu-icon" onclick="openNav()">&#9776;</span>
            <div class="clearfix"></div>
        </div>
    </div>
    @endif
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PK35FP4"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
