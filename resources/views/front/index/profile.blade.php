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
@if(\App::isLocale('th'))
    @section('title','ข้อมูลส่วนตัว '.$user->first_name.' '.$user->last_name)
@else
    @section('title','Profile '.$user->first_name.' '.$user->last_name)
@Endif    
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
            <div class="well well-sm">

                @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ trans('index.successinbox') }}
                            </div>
                        @endif  
 
                        @if(count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible">
                                 <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{ trans('validation.errorinbox') }}
                                </div>
                        @endif

                <div class="row" style="padding:20px;">
                    <div class="col-sm-6 col-md-4 text-center">

                        @if($user->admin_status==3)
                            <img src="{{asset('assets/badges/admin.png')}}" 
                            alt="" 
                            class="img-rounded" />     
                        @elseif($user->admin_status==2 || $user->admin_status==1)
                            <img src="{{asset('assets/badges/advertiser.png')}}" 
                            alt="" 
                            class="img-rounded" />     
                        @elseif($user->rank > 0 && $user->rank <= 100)
                            <img src="{{asset('assets/badges/newbie.png')}}" 
                            alt="" 
                            class="img-rounded" />            
                        @elseif($user->rank > 100 && $user->rank <= 500)
                            <img src="{{asset('assets/badges/junior.png')}}" 
                            alt="" 
                            class="img-rounded" />  
                        @elseif($user->rank > 500 && $user->rank <= 1000)
                            <img src="{{asset('assets/badges/silver.png')}}" 
                            alt="" 
                            class="img-rounded" />  
                        @elseif($user->rank > 1000 && $user->rank <= 2500)
                            <img src="{{asset('assets/badges/gold.png')}}" 
                            alt="" 
                            class="img-rounded" />  
                        @elseif($user->rank > 2500 && $user->rank <= 4000)
                            <img src="{{asset('assets/badges/platinum.png')}}" 
                            alt="" 
                            class="img-rounded" />  
                        @elseif($user->rank > 4000 && $user->rank <= 5000)
                             <img src="{{asset('assets/badges/diamond.png')}}" 
                              alt="" 
                              class="img-rounded" /> 
                        @elseif($user->rank > 5000)
                             <img src="{{asset('assets/badges/blackdiamond.png')}}" 
                              alt="" 
                              class="img-rounded" /> 
                        @else
                             <img src="{{asset('assets/badges/newbie.png')}}" 
                              alt="" 
                              class="img-rounded" /> 
                        @endif
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h2>{{ trans('index.about') }}</h2>
                        <hr />
                        <p>
                            {{ trans('index.username') }} : {{$user->user_name}} 
                        </p>
                        <p>
                            {{ trans('index.rank') }} : 
                            @if($user->admin_status==3)
                                                    Admin
                                                @elseif($user->admin_status==1 || $user->admin_status==2)
                                                    Advertiser
                                                @else
                                                    @if($user->rank > 0 && $user->rank <= 100)
                                                        Newbie
                                                    @elseif($user->rank > 100 && $user->rank <= 500)
                                                        Junior
                                                    @elseif($user->rank > 500 && $user->rank <= 1000)
                                                       Silver
                                                    @elseif($user->rank > 1000 && $user->rank <= 2500)
                                                       Gold
                                                    @elseif($user->rank > 2500 && $user->rank <= 4000)
                                                        Platinum
                                                    @elseif($user->rank > 4000 && $user->rank <= 5000)
                                                       Diamond
                                                    @elseif($user->rank > 5000)
                                                      Black diamond
                                                    @else
                                                        Newbie
                                                    @endif
                                                @endif
                        </p>   
                        <p>
                           {{ trans('index.commentcount') }} : {{$user->rank}}
                        </p>
                        <p>
                            <a href="{{asset('commenthistory/'.$user->id)}}">
                                {{ trans('index.commenthistory') }}
                            </a>
                        </p>
                        @if(!empty($user->location))
                            <p>
                                 {{ trans('index.country') }} : {{$user->location}}
                            </p>
                        @endif
                        <p>
                            {{ trans('index.joined') }} : {{date('Y-m-d H:i',strtotime('+7 hour',strtotime($user->created_at)))}}
                        </p>
                        

                        @if($ismessage) 
                            <button id="showmessage" class="btn btn-success" style="background-color: #28d82d;border:1px solid #28d82d;border-radius: 0;">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                {{ trans('index.sendmessage') }}
                            </button>
                            <!-- <a href="">
                                <button class="btn btn-success" style="background-color: #43A6DF;border:1px solid #43A6DF;border-radius: 0;">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    {{ trans('index.inbox') }}
                                </button>  
                            </a> -->
                            <script type="text/javascript">
                                $( "#showmessage" ).click(function() {
                                    $("#messagebox").slideDown( "slow" );
                                });
                            </script>


                            <div class="container" id="messagebox" style="padding-left:0;margin-left:0;padding-top:20px;display: none">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-body">                
                                                <form accept-charset="UTF-8" action="{{route('sendmessage',array('user'=>$user))}}" method="POST">
                                                    @csrf
                                                    <textarea class="form-control counted" name="message" placeholder="{{trans('index.placeholdermessage')}}" rows="5" style="margin-bottom:10px;"></textarea>
                                                    <button class="btn btn-success" style="background-color: #28d82d;border:1px solid #28d82d;border-radius: 0;">
                                                        <i class="fa fa-paper-plane"></i>
                                                        {{ trans('index.sendmessage') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
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