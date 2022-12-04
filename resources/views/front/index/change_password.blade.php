<!DOCTYPE html>
<html lang="en">


<body>
    <!--Header Section  Start--> 
    @include('front.layout.header')
    <!--Header Section End -->
    <form class="form-horizontal new-lg-form" id="forget_password" action="{{url('/')}}/update_password" method="POST">
        {{csrf_field()}}
        <div class="middle-section-gray regiater-page-middle" style="padding: 100px;">
            <div class="container">
                <div class="login-page">  
                <div>
                     @if(Session::has('success'))
                     <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ trans('change_password.Current password does not match') }}.
                    </div>
                    @endif  

                    @if(Session::has('warning_password'))
                     <div class="alert alert-warning alert-dismissible">
                      <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ trans('change_password.Thank you for contacting. Our team will get back to you soon!') }}
                    </div>
                    @endif

                    @if(Session::has('warning'))
                     <div class="alert alert-warning alert-dismissible">
                      <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ trans('change_password.You cannot set a previous password as a new password.') }}
                    </div>
                    @endif
                </div>                  
                    <div class="login">{{ trans('change_password.change') }} {{ trans('change_password.password') }}
                        <div class="login-line"></div>
                    </div>                               
                    <div class="input-box-right">
                        <div class="input-name">{{ trans('change_password.old') }} {{ trans('change_password.password') }}</div>
                        <input type="password" name="password" placeholder="{{ trans('change_password.password') }}" value="{{old('password')}}">
                        <span class="bar" style="color: red;">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="input-box-right">
                        <div class="input-name">{{ trans('change_password.new') }}{{ trans('change_password.password') }}</div>
                        <input type="password" name="new_password"placeholder="{{ trans('change_password.new') }} {{ trans('change_password.password') }}" value="{{old('new_password')}}">
                        <span class="bar" style="color: red;">{{ $errors->first('new_password') }}</span>
                    </div>
                    <div class="input-box-right">
                        <div class="input-name">{{ trans('change_password.confirm') }} {{ trans('change_password.password') }}</div>
                        <input type="password" name="confirm_password" placeholder="{{ trans('change_password.re-enter') }} {{ trans('change_password.new') }}{{ trans('change_password.password') }}" value="{{old('confirm_password')}}">
                        <span class="bar" style="color: red;">{{ $errors->first('confirm_password') }}</span>
                    </div>
                    <div class="login-btn-box">
                        <button type="submit" class="login-form-btn">{{ trans('change_password.change') }}</button>
                    </div>                    
                </div>
            </div>
        </div>
    </form>
</body>
</html>
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
    
