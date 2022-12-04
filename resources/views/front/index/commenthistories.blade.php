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
@section('metadesc',$settings->meta_keyword) 
<!--Footer Section  Start--> 
@include('front.layout.header')
<!--Footer Section End -->   

<style type="text/css">
    body {
      background: #e2e1e0;
    }
    .topic
    {
       background-color: #43A6DF;
       width: 100%;
       height: 50px;
       line-height: 50px;
       color:white;
       padding-left:30px;
    }
    .card-new 
    {
      background: #fff;
      border-radius: 2px;
      display: inline-block;
      height: auto;
      padding: 1rem;
      position: relative;
      width: 100%;
      box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }
</style>
<link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}" />
<body> 
<div class="container" style="padding-top:30px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="well well-sm" style="height:100%;margin:10px;">
                

                @if(count($historiescomments) == 0 && count($threads) == 0)
                    <h2>
                        {{ trans('index.notexist') }}
                    </h2>
                @endif
                @if(count($historiescomments) > 0)
                <h2>{{ trans('index.commenthistorymodel') }}</h2>
                <hr />
                <div class="row">
                @foreach($historiescomments as $comment)
                    <div class="col-md-4" style="margin-top:10px;">
                        <div class="card">
                          <div class="card-body">
                            <p class="card-text">
                                {{ trans('index.comment') }} : {{$comment->comment}}
                            </p>
                            <p class="card-text">
                                    {{date('Y-m-d H:i',strtotime('+7 hour',strtotime($comment->created_at)))}}
                                </p>
                            <?php $model_id = base64_encode($comment->model_id); ?>
                            <a href="{{asset('/list_details/'.$model_id)}}" class="btn btn-primary">
                            {{ trans('index.showmodel') }}
                            </a>
                          </div>
                        </div>
                    </div>
                @endforeach  
                </div>
                <br />
                <br />
                <div class="row text-center">
                    <div class="col-md-12">
                          <div class="text-center">
                            {{$historiescomments->links()}}
                        </div>  
                    </div>
                </div>
                @endif


                @if(count($threads) > 0)
                    <h2>{{ trans('index.commenthistorymodel') }}</h2>
                    <hr />
                    <div class="row">
                    @foreach($threads as $thread)
                        <div class="col-md-4" style="margin-top:10px;">
                            <div class="card">
                              <div class="card-body">
                                <p class="card-text">
                                    {{ trans('index.comment') }} : {{$thread->comment}}
                                </p>
                                <p class="card-text">
                                    {{date('Y-m-d H:i',strtotime('+7 hour',strtotime($thread->created_at)))}}
                                </p>
                                <a href="{{asset('/thread/'.$thread->discuss_id)}}" class="btn btn-primary">
                                    {{ trans('index.showmodel') }}
                                </a>
                              </div>
                            </div>
                        </div>
                    @endforeach  
                    </div>
                    <br />
                    <br />
                    <div class="row text-center">
                        <div class="col-md-12">
                              <div class="text-center">
                                {{$threads->links()}}
                            </div>  
                        </div>
                    </div>
                @endif
               
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