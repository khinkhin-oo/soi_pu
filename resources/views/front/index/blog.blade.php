<!DOCTYPE html>
<html lang="en">
@section('title',$blog->title)
@section('metadesc',$blog->meta_description)
<!--Footer Section  Start--> 
@include('front.layout.header')
<!--Footer Section End -->  
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

.position-relative {
    position: relative!important;
}
.border-radius-5 {
    border-radius: 5px;
    overflow: hidden;
}
.img-hover-slide {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    -webkit-backface-visibility: hidden;
    min-height: 580px;
    overflow: hidden;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
}
.img-link {
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 1;
}
.align-center-vertical {
    margin-top: auto;
    margin-bottom: auto;
}
h1, h2, h3, h4, h5, h6 {
    color: #152035;
}
.thumb-overlay:hover::before {
    background-color: rgba(0,0,0,.2);
}
.thumb-overlay::before {
    position: absolute;
    content: "";
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -ms-border-radius: 5px;
    background: -webkit-gradient(linear,left top,left bottom,color-stop(50%,transparent),to(rgba(0,0,0,.8)));
    background: -webkit-linear-gradient(top,transparent 50%,rgba(0,0,0,.8) 100%);
    background: -o-linear-gradient(top,transparent 50%,rgba(0,0,0,.8) 100%);
    background: linear-gradient(to bottom,transparent 50%,rgba(0,0,0,.8) 100%);
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
}
.post-content a {
    color: #171616 !important;
}
.entry-meta.meta-0 span {
    padding: 4px 10px 4px 19px;
    font-size: 11px;
    letter-spacing: 0.8px;
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 30px;
    position: relative;
}
.entry-meta.meta-0 span::before {
    content: "";
    width: 6px;
    height: 6px;
    background: none;
    margin-right: 3px;
    border-radius: 5px;
    display: inline-block;
    position: absolute;
    top: 50%;
    left: 8px;
    margin-top: -3px;
    border: 1px solid #fff;
}
p{
        color: #506172;
}
.background2 {
    background: #007aff;
}
.color-white {
    color: #ffffff!important;
}
.post-content a:hover {
    color: #92127f !important;
}
.mb-15 {
    margin-bottom: 15px!important;
}
.entry-meta.meta-1 span {
    margin-right: 10px;
}
.color-grey {
    color: #889097;
}
.entry-meta {
    line-height: 1;
}
.font-small {
    font-size: 12px;
}
.entry-meta.meta-1 span i {
    margin-right: 3px;
}
.ml-5 {
    margin-left: 5px !important;
}
.transition-02s, .transition-02s:hover {
    -webkit-transition: all .2s ease-out 0s;
    -moz-transition: all .2s ease-out 0s;
    -ms-transition: all .2s ease-out 0s;
    -o-transition: all .2s ease-out 0s;
    transition: all .2s ease-out 0s;
}
.font-weight-ultra {
    font-weight: 900;
}
.font-small {
    font-size: 12px;
}
.font-large {
    font-size: 20px;
}
</style>

<body> 
   
        <div style="background-color: #fff;" class="middle-section-gray ads-page-middle">
            <div class="container">
                <div>               
                    <div class="login"><h1>{{$blog->title}}</h1>
                        <hr />
                    </div>                                                               
                </div>

                    <div>

                        <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15">
                                                    <span class="post-on"><i class="fas fa-calendar" data-icon="v"></i>{{$blog->created_at}}</span>
                        </div>

                        <div class="entry-meta meta-0 font-small mb-15"><a href="{{asset('blog/'.$blog->slug)}}"><span class="post-cat background2 color-white">{{$blog->get_category_details->title}}</span></a></div>
                       <div class="post-thumb position-relative thumb-overlay mr-20">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{asset('uploads/admin/blogs_image/'.$blog->image)}})">
                                                    <a class="img-link" href="{{asset('blog/'.$blog->slug)}}"></a>
                                                </div>
                       </div>

                       <div class="font-large" style="padding-top:20px;">
                           {!! html_entity_decode($blog->description) !!}
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