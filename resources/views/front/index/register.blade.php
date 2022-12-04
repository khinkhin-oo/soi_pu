<!DOCTYPE html>
<html lang="en">
@section('title','Register Soi66')
@section('metadesc',$settings->meta_register)
    <!--Header Section  Start--> 
    @include('front.layout.header')
    <!--Header Section End --> 
<body>
   
    <form class="form-horizontal new-lg-form" id="registerform" action="{{url('/')}}/store" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="middle-section-gray regiater-page-middle">
            <div class="container">
                <div class="login-page">
                    <div>
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ trans('register.Registration complete Please login.') }}
                            </div>
                        @endif  

                        @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                         <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                         {{ trans('register.An error occurred while registering.') }}
                        </div>
                        @endif
                        {{-- @if(Session::has('warning'))
                            <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ trans('register.password') }}
                            </div>
                        @endif --}}
                    </div>                     
                    <div class="login"><h1>{{ trans('header.register') }}</h1>
                        <div class="login-line"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-box-right">
                                <div class="input-name">{{ trans('register.first name') }}</div>
                                <input type="text" name="first_name" required placeholder="{{ trans('register.first name') }}" value="{{old('first_name')}}" >
                                <span class="bar" style="color: red;">{{ $errors->first('first_name') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-box-right">
                                <div class="input-name">{{ trans('register.surname') }}</div>
                                <input type="text" name="last_name" required placeholder="{{ trans('register.surname') }}" value="{{old('last_name')}}">
                                <span class="bar" style="color: red;">{{ $errors->first('last_name') }}</span>
                            </div>
                        </div>
                    </div>                                
                    <div class="input-box-right">
                        <div class="input-name">{{ trans('register.email') }}</div>
                        <input type="email" name="email" required placeholder="alexandraba@gmail.com" value="{{old('email')}}">
                        <span class="bar" style="color: red;">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="input-box-right">
                        <div class="input-name">{{ trans('register.username') }}</div>
                        <input type="text" name="username" required placeholder="{{ trans('register.username') }}" value="{{old('username')}}">
                        <span class="bar" style="color: red;">{{ $errors->first('username') }}</span>
                    </div>
                    <div class="input-box-right">
                        <div class="input-name password">{{ trans('register.password') }}</div>
                        <input type="password" name="password" required placeholder="{{ trans('register.password') }}" minlength="6" maxlength="10" value="{{old('password')}}">
                        <span class="bar" style="color: red;">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="input-box-right">
                        <div class="input-name password">{{ trans('register.confirm password') }}</div>
                        <input type="password" name="confirm_password" required placeholder="{{ trans('register.confirm password') }}" minlength="6" maxlength="10" value="{{old('confirm_password')}}">
                        <span class="bar" style="color: red;">{{ $errors->first('confirm_password') }}</span>
                    </div>
                    <div class="login-btn-box">
                        {{-- <div class="login-btn-box"><a class="login-btn" href="#">Register</a></div> --}}
                        <button type="submit" class="login-form-btn">{{ trans('header.register') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Footer Section  Start--> 
    @include('front.layout.footer')
    <!--Footer Section End -->   
    
    <script src="{{ url('/') }}/assets/front/js/infiniteslidev2.js"></script>    
    <script type="text/javascript">
        $(function() {
            $('.scroll1').infiniteslide({
                speed: 30,
            });
        });
    </script>
    
    <script>
        $(".advance-search-label-section").on("click", function(){
            $(".advance-search-section-main").toggleClass("searchactive");
        });
    </script>
    
    <script>
        $(".responsive-show-menu").on("click", function(){
            $("body").addClass("login-open");
        });
        $(".closebtnlogin").on("click", function(){
            $("body").removeClass("login-open");
        })
    </script>
    
    <script>
        $(".menu-icon").on("click", function(){
            $("body").addClass("menu-active");
        });
        $(".closebtn").on("click", function(){
            $("body").removeClass("menu-active");
        })
    </script>
    
    <script>
        var doc_width = $(document).width();
        if (doc_width < 768){
            $(".ads-banners-row").addClass("scroll1");
        }
    </script>
    
</body>

</html>