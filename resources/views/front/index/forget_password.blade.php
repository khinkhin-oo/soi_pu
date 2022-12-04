<!DOCTYPE html>
<html lang="en">
@section('title','Forgot password')
@section('metadesc',$settings->meta_forgot)
<!--Footer Section  Start--> 
@include('front.layout.header')
<!--Footer Section End -->   
<body>
    <form class="form-horizontal new-lg-form" id="registerform" action="{{url('/')}}/forget_mail" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
        <div class="middle-section-gray regiater-page-middle" style="padding: 200px 0px;">
            <div class="container">
                <div class="login-page"> 
                    <div>
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ trans('forgot.Please check your email for the new password.') }}
                            </div>
                        @endif  

                        @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                         <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                         {{ trans('forgot.No matching records. Please enter a valid email.') }}
                        </div>
                        @endif
                        @if(Session::has('warning'))
                            <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ trans('forgot.Thank you for contacting. Our team will get back to you soon!') }}
                            </div>
                        @endif
                    </div>                   
                    <div class="login"><h1>{{ trans('forgot.Forgot password') }}</h1>
                        <div class="login-line"></div>
                    </div>                               
                    <div class="input-box-right">
                        <div class="input-name">{{ trans('forgot.registration email') }}</div>
                        <input type="email" name="email" required="" placeholder="alexandraba@gmail.com" value="{{old('email')}}">
                        <span class="bar" style="color: red;">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="login-btn-box">
                        <button type="submit" class="login-form-btn">{{ trans('forgot.forget') }}</button>
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