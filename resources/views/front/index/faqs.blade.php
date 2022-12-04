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

<body>
    <!--Footer Section  Start--> 
    @include('front.layout.header')
    <!--Footer Section End -->   
   
        <div class="middle-section-gray ads-page-middle">
            <div class="container">
                <div class="ads-page">  

                     <div class="login">{{ trans('index.faq') }}
                        <div class="login-line"></div>
                    </div>
                      @foreach($faqs as $faq)
                        <div id="accordion{{$faq->id}}">
                          <div class="card" style="margin-top:10px;">
                            <div class="card-header" id="headingOne{{$faq->id}}">
                              <h5 class="mb-0">
                                <button style="color:black" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$faq->id}}" aria-expanded="true" aria-controls="collapseOne{{$faq->id}}">

                                    @if(!empty($faq->image))
                                        <div style="text-align: center;">
                                            <img src="{{asset($faq->image)}}" style="max-height: 200px;" />
                                        </div>
                                    @endif
                                  {{$faq->question}}
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne{{$faq->id}}" class="collapse show" aria-labelledby="headingOne{{$faq->id}}" data-parent="#accordion{{$faq->id}}">
                              <div class="card-body" style="text-align: center;">
                                {!! $faq->answer !!}
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach



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