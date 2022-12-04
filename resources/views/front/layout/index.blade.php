<!DOCTYPE html>
@if (\App::isLocale('th'))
    <html lang="th">
@else
    <html lang="en">
@endif

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="@yield('metadesc')" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <?php
    if (strpos(Request::url(), 'list_details')=== false || strpos(Request::url(), 'view_by_company')=== false)
    {
    ?>
    <meta property="og:image" content="{{ asset('theme/images/logo-thumbnail.jpg') }}">
    <?php
    }
    ?>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/ver2style.css') }}">
    @if (\Request::is('/'))
        <link rel="canonical" href="https://www.soi66.com" />
    @elseif (\Request::is('en'))
        <link rel="canonical" href="https://www.soi66.com/en" />
    @endif
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FV060KWYFG"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-FV060KWYFG');
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PK35FP4');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PK35FP4" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    @stack('style')
</head>

<body>
    <?php $settings = getSettings(); ?>

    <nav class="navbar navbar-expand-lg navbar-light"
        style="
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 999999999;
">
        @if (\App::isLocale('th'))
            <a class="navbar-brand d-lg-none" href="{{ asset('/') }}">
            @else
                <a class="navbar-brand d-lg-none" href="{{ asset('/en') }}">
        @endif
        {{-- <img class="logo-center" src="{{asset('theme/images/logo.png')}}"/> --}}
        <h3>BIGBOYBRO</h3>
        </a>

        @if (isset($arr_user) && $arr_user != null)
            <div class="login">
                <div class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"
                    style="color:white;-webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;">
                    @if (\App::isLocale('th'))
                        TH
                    @else
                        EN
                    @endif
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ asset('/en') }}">
                        <img src="{{ asset('theme/images/flag-eng.jpg') }}"> EN
                    </a>
                    <a class="dropdown-item" href="{{ asset('/') }}">
                        <img src="{{ asset('theme/images/thailand-flag-icon.png') }}"> TH
                    </a>
                </div>
            </div>
        @else
            <div class="dropdown">
                <div class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"
                    style="color:white;-webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;">
                    @if (\App::isLocale('th'))
                        TH
                    @else
                        EN
                    @endif
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ asset('/en') }}">
                        <img src="{{ asset('theme/images/flag-eng.jpg') }}"> EN
                    </a>
                    <a class="dropdown-item" href="{{ asset('/') }}">
                        <img src="{{ asset('theme/images/thailand-flag-icon.png') }}"> TH
                    </a>
                </div>
            </div>
        @endif

        @if (isset($arr_user) && $arr_user != null)
            <div class="dropdown">
                <div class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"
                    style="color:white;-webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;">
                    <?php echo isset($arr_user['user_name']) ? substr(ucfirst($arr_user['user_name']), 0, 5) : trans('index.profile'); ?>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ asset('profile') }}">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        {{ trans('index.profile') }}
                    </a>
                    <a class="dropdown-item" href="{{ asset('change_password') }}">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        {{ trans('header.change password') }}
                    </a>
                    <a class="dropdown-item" href="{{ asset('inbox') }}">
                        <i class="fa fa-inbox" aria-hidden="true"></i>
                        {{ trans('index.inbox') }}
                    </a>
                    @if ($arr_user['admin_status'] == 1)
                        <a class="dropdown-item" href="{{ asset('subadmin/subadmin_login') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ trans('header.Manage model') }}
                        </a>
                    @elseif($arr_user['admin_status'] == 4)
                        <a class="dropdown-item" href="{{ asset('headofadmin/headofadmin_login') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ trans('header.Manage model') }}
                        </a>
                    @endif
                    <a class="dropdown-item" href="{{ asset('logout') }}">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        {{ trans('header.logout') }}
                    </a>
                </div>
            </div>
        @endif

        <div class="mx-auto d-none d-sm-none d-md-none d-lg-block d-xl-block">
            @if (\App::isLocale('th'))
                <a href="{{ asset('/') }}" class="navbar-brand">
                @else
                    <a href="{{ asset('/en') }}" class="navbar-brand">
            @endif
            {{-- <img class="logo-center" src="{{asset('theme/images/logo.png')}}"/> --}}
            <h3>BIGBOYBRO</h3>
            </a>
        </div>

        <button id="button-toggler"class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-4">
                <li class="nav-item">
                    <a href="#" class="nav-link text-black">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Review</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Rank</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Sex Chat</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">FAQ</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Advance Search</a>
                </li>
                <li class="nav-item">
                    <a id="login" class="nav-link" href="javascript:void(0)" data-toggle="modal"
                        data-target=".bd-example-modal-lg">
                        <i class="fa fa-level-down" aria-hidden="true"></i>
                        {{ trans('header.login') }}
                    </a>
                </li>
            </ul>

        </div>
    </nav>

    @yield('content');

    <footer class="footer-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <div class="col-md-12 text-center d-xl-block d-sm-block d-lg-block d-none">
                            @if (\App::isLocale('th'))
                                <a href="{{ asset('/') }}">
                                @else
                                    <a href="{{ asset('/en') }}">
                            @endif
                            <img class="img-logo-footer" src="{{ asset('theme/images/logo.png') }}" />
                            <p class="mt-3" style="color:white;">
                                {{ trans('footer.desc') }}
                            </p>
                            </a>
                        </div>
                        <div id="gotop" class="go-top">
                            <i class="fa fa-arrow-up" style="color:white;" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12 d-lg-none d-sm-none d-xl-none text-center">
                            @if (\App::isLocale('th'))
                                <a href="{{ asset('/') }}">
                                @else
                                    <a href="{{ asset('/en') }}">
                            @endif
                            <img class="img-logo-footer" src="{{ asset('theme/images/logo.png') }}" />
                            </a>
                            <p class="mt-3" style="color:white;">
                                {{ trans('footer.desc') }}
                            </p>
                        </div>
                        <div class="d-lg-block d-sm-block d-xl-block d-none">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    @if (\App::isLocale('th'))
                                        <a class="nav-link" href="{{ asset('/') }}">
                                        @else
                                            <a class="nav-link" href="{{ asset('en') }}">
                                    @endif
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    {{ trans('header.home') }}
                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    <a class="nav-link" href="{{ asset('user_register') }}">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        {{ trans('header.register') }}
                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    @if (\App::isLocale('th'))
                                        <a class="nav-link" href="{{ asset('faqsbadges') }}">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            {{ trans('index.faqsbadges') }}
                                        </a>
                                    @else
                                        <a class="nav-link" href="{{ asset('/en/faqsbadges') }}">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            {{ trans('index.faqsbadges') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-2 text-center">
                                    @if (isset($arr_user) && $arr_user != null)
                                        <a class="nav-link" href="{{ asset('profile') }}">
                                            <i class="fa fa-level-down" aria-hidden="true"></i>
                                            {{ trans('index.profile') }}
                                        </a>
                                    @else
                                        <a id="login" class="nav-link" href="javascript:void(0)"
                                            data-toggle="modal" data-target=".bd-example-modal-lg">
                                            <i class="fa fa-level-down" aria-hidden="true"></i>
                                            {{ trans('header.login') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-2 text-center">
                                    <a class="nav-link" href="{{ asset('/contactus') }}">
                                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                                        {{ trans('header.contactus') }}
                                    </a>
                                </div>
                                <div class="col-md-2 text-center">
                                    @if (\App::isLocale('th'))
                                        <a class="nav-link" href="{{ asset('/faqs') }}">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            {{ trans('header.faqs') }}
                                        </a>
                                    @else
                                        <a class="nav-link" href="{{ asset('/en/faqs') }}">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            {{ trans('header.faqs') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 d-lg-none d-sm-none d-xl-none">
                                @if (\App::isLocale('th'))
                                    <a class="nav-link" href="{{ asset('/') }}">
                                    @else
                                        <a class="nav-link" href="{{ asset('en') }}">
                                @endif
                                <i class="fa fa-home" aria-hidden="true"></i>
                                {{ trans('header.home') }}
                                </a>
                            </div>

                            <div class="col-6 d-lg-none d-sm-none d-xl-none">
                                <a class="nav-link" href="{{ asset('user_register') }}">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    {{ trans('header.register') }}
                                </a>
                            </div>

                            <div class="col-6 d-lg-none d-sm-none d-xl-none">
                                @if (isset($arr_user) && $arr_user != null)
                                    <a class="nav-link" href="{{ asset('profile') }}">
                                        <i class="fa fa-level-down" aria-hidden="true"></i>
                                        {{ trans('index.profile') }}
                                    </a>
                                @else
                                    <a id="login" class="nav-link" href="javascript:void(0)" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">
                                        <i class="fa fa-level-down" aria-hidden="true"></i>
                                        {{ trans('header.login') }}
                                    </a>
                                @endif
                            </div>

                            <div class="col-6 d-lg-none d-sm-none d-xl-none">
                                @if (\App::isLocale('th'))
                                    <a class="nav-link" href="{{ asset('faqsbadges') }}">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        {{ trans('index.faqsbadges') }}
                                    </a>
                                @else
                                    <a class="nav-link" href="{{ asset('/en/faqsbadges') }}">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        {{ trans('index.faqsbadges') }}
                                    </a>
                                @endif
                            </div>

                            <div class="col-6 d-lg-none d-sm-none d-xl-none">
                                <a class="nav-link" href="{{ asset('/contactus') }}">
                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                    {{ trans('header.contactus') }}
                                </a>
                            </div>

                            <div class="col-6 d-lg-none d-sm-none d-xl-none">
                                @if (\App::isLocale('th'))
                                    <a class="nav-link" href="{{ asset('/faqs') }}">
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        {{ trans('header.faqs') }}
                                    </a>
                                @else
                                    <a class="nav-link" href="{{ asset('/en/faqs') }}">
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        {{ trans('header.faqs') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if (\App::isLocale('th'))
                            @if (!empty($settings->adminline) && !empty($settings->adminline_link))
                                <div class="col-12 d-lg-none d-sm-none d-xl-none text-center mt-4"
                                    style="color:white">
                                    <img style="height: 20px;" src="{{ asset('theme/images/line.png') }}" /> <span
                                        style="font-size:15px;position: relative;top:3px;">
                                        <a href="{{ $settings->adminline_link }}">
                                            {{ $settings->adminline }}
                                        </a>
                                    </span>
                                </div>
                            @endif
                        @else
                            @if (!empty($settings->adminline_en) && !empty($settings->adminline_link))
                                <div class="col-12 d-lg-none d-sm-none d-xl-none text-center mt-4"
                                    style="color:white">
                                    <img style="height: 20px;" src="{{ asset('theme/images/line.png') }}" /> <span
                                        style="font-size:15px;position: relative;top:3px;">
                                        <a href="{{ $settings->adminline_link }}">
                                            {{ $settings->adminline_en }}
                                        </a>
                                    </span>
                                </div>
                            @endif
                        @endif

                        <div class="col-12 d-lg-none d-sm-none d-xl-none text-center mt-4" style="color:white">
                            @if (!empty($settings->send_order_email))
                                <i class="fa fa-envelope" aria-hidden="true"></i> {{ $settings->send_order_email }}
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <footer class="footer-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3>BIGBOYBRO</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
        </div>
    </footer>


    <div class="copyright">
        <div class="container-fluid">
            {{ trans('footer.all rights reserved.') }} &#169; soi66.com

            <span>Lorem Ipsum is simply</span>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="{{ asset('theme/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    @stack('scripts')

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="top: 80px !important;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ trans('header.login') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container text-center">
                        <form action="{{ url('/') }}/validate_login" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group text-left">
                                <label>{{ trans('header.user name') }}</label>
                                <input name="user_name" required type="text" class="form-control">
                            </div>

                            <div class="form-group text-left">
                                <label>{{ trans('header.password') }}</label>
                                <input type="password" name="password" required
                                    placeholder="{{ trans('header.passwordplaceholder') }}" class="form-control">
                            </div>

                            <div class="form-check text-left">
                                <input type="checkbox" class="form-check-input" name="remember_me">
                                <label class="form-check-label">{{ trans('header.remember me') }}</label>
                            </div>

                            <button class="btn btn-pr" style="width: auto;padding-left:50px;padding-right:50px;">
                                {{ trans('header.login') }}
                            </button>
                        </form>

                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#login").click(function() {
            document.getElementById('button-toggler').className = "navbar-toggler collapsed"
            document.getElementById('button-toggler').setAttribute("aria-expanded", "false");
            document.getElementById('navbarTogglerDemo02').className = "navbar-collapse collapse"
        });
        $("#gotop").click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
        });
    </script>
</body>

</html>
