<!DOCTYPE html>
<html lang="en">

<style type="text/css">
    .ads-page {
    width: 100% !important;
    border: 1px solid #91127e !important;
    border-radius: 5px !important;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    padding: 50px;
    background: #ffffff;
    position: relative;
}

.ads-page-middle {
    background: #fff ;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    background-size: cover;
    padding: 100px 0;
}

.input-box-right{
    text-align: center !important; 
}


</style>
@section('title',$settings->title_ads)
@section('metadesc',$settings->meta_keyword) 
<!--Footer Section  Start--> 
@include('front.layout.header')
<!--Footer Section End -->   
<body>

   
        <div class="middle-section-gray ads-page-middle">
            <div class="container">
                <div class="ads-page">                   
                    <div class="login"><h1>{{ trans('advertise.heading') }} </h1>
                        <div class="login-line"></div>
                    </div>                               
                    <div class="input-box-right">
                        <div class="input-name">{{ trans('advertise.contact') }} </div>
                        <a href="mailto:soi66@protonmail.com">soi66@protonmail.com</a>
                    </div>
                                
                </div>
            </div>
        </div>
   
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