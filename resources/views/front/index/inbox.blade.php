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
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;display: block}

.recent_heading h4 {
  color: #43A6DF;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
  display: block
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #43A6DF none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #43A6DF none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
.username-responsive
{
    display: none;
}
.incoming_msg
{
        margin: 15px 0 15px;
}
@media (max-width:768px) and (min-width:0px) {
    .headind_srch{display: none}
    .inbox_people{width: 20%;}
    .mesgs{padding: 15px 10px 0 10px;width: 80%;}
    .chat_img{width: 100%;padding-bottom: 7px;}
    .chat_ib{display: none}
    .username-responsive{display: block;text-align: center;}
    .chat_list{padding: 9px 5px 10px;}
    .received_msg{padding:0;width: 83%;}
    .incoming_msg_img{width: 12%;}
}​
</style>
@if(\App::isLocale('th'))
    @section('title','การส่งข้อความ '.$user->user_name)
@else
    @section('title','Messaging '.$user->user_name)
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
<div class="container-fluid" style="padding-top:30px;">

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

    <h3 class=" text-center">
        {{trans('index.messaging')}}
    </h3>

<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>{{trans('index.recent')}}</h4>
            </div>
            <!-- <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div> -->
          </div>
          <div class="inbox_chat">

          @if(!empty($inboxselected))
            @foreach($inboxes as $inbox)
                @if(!empty($inbox->revice))

                @if($user->id==$inbox->user_id)
                	<a href="{{asset('inbox/'.$inbox->id)}}">
                        <div class="chat_list active_chat">
                          <div class="chat_people">
                            <div class="chat_img"> 
                                @if($inbox->revice->admin_status ==3)
                                   <img src="{{asset('assets/badges/admin.png')}}" 
                                    alt="" 
                                    class="img-rounded" />    
                                @elseif($inbox->revice->admin_status ==2 || $inbox->revice->admin_status==1)
                                    <img src="{{asset('assets/badges/advertiser.png')}}" 
                                    alt="" 
                                    class="img-rounded" />    
                                @elseif($inbox->revice->rank > 0 && $inbox->revice->rank <= 100)
                                    <img src="{{asset('assets/badges/newbie.png')}}" 
                                    alt="" 
                                    class="img-rounded" />            
                                @elseif($inbox->revice->rank > 100 && $inbox->revice->rank <= 500)
                                    <img src="{{asset('assets/badges/junior.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($inbox->revice->rank > 500 && $inbox->revice->rank <= 1000)
                                    <img src="{{asset('assets/badges/silver.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($inbox->revice->rank > 1000 && $inbox->revice->rank <= 2500)
                                    <img src="{{asset('assets/badges/gold.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($inbox->revice->rank > 2500 && $inbox->revice->rank <= 4000)
                                    <img src="{{asset('assets/badges/platinum.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($inbox->revice->rank > 4000 && $inbox->revice->rank <= 5000)
                                     <img src="{{asset('assets/badges/diamond.png')}}" 
                                      alt="" 
                                      class="img-rounded" /> 
                                @elseif($inbox->revice->rank > 5000)
                                     <img src="{{asset('assets/badges/blackdiamond.png')}}" 
                                      alt="" 
                                      class="img-rounded" /> 
                                @else
                                     <img src="{{asset('assets/badges/newbie.png')}}" 
                                      alt="" 
                                      class="img-rounded" /> 
                                @endif
                            </div>
                            <div class="username-responsive">
                                 {{$inbox->revice->user_name}}
                            </div>
                            <div class="chat_ib">
                              <h5> {{$inbox->revice->user_name}}
                                <span class="chat_date">
                                  {{date('M-d', strtotime($inbox->updated_at))}}
                                </span>
                              </h5>
                              <p>
                                  {{ substr($inbox->message,0,30) }} ...
                              </p>
                            </div>
                          </div>
                        </div>
                    </a>
                @else
                	<a href="{{asset('inbox/'.$inbox->id)}}">
                        <div class="chat_list active_chat">
                          <div class="chat_people">
                            <div class="chat_img"> 
                                @if($inbox->revice->admin_status ==3)
                                   <img src="{{asset('assets/badges/admin.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($inbox->revice->admin_status ==2 || $inbox->revice->admin_status ==1)
                                   <img src="{{asset('assets/badges/admin.png')}}" 
                                    alt="" 
                                    class="img-rounded" />        
                                @elseif($inbox->revice->rank > 0 && $inbox->revice->rank <= 100)
                                    <img src="{{asset('assets/badges/newbie.png')}}" 
                                    alt="" 
                                    class="img-rounded" />            
                                @elseif($inbox->revice->rank > 100 && $inbox->revice->rank <= 500)
                                    <img src="{{asset('assets/badges/junior.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($inbox->revice->rank > 500 && $inbox->revice->rank <= 1000)
                                    <img src="{{asset('assets/badges/silver.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($inbox->revice->rank > 1000 && $inbox->revice->rank <= 2500)
                                    <img src="{{asset('assets/badges/gold.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($inbox->revice->rank > 2500 && $inbox->revice->rank <= 4000)
                                    <img src="{{asset('assets/badges/platinum.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($inbox->revice->rank > 4000 && $inbox->revice->rank <= 5000)
                                     <img src="{{asset('assets/badges/diamond.png')}}" 
                                      alt="" 
                                      class="img-rounded" /> 
                                @elseif($inbox->revice->rank > 5000)
                                     <img src="{{asset('assets/badges/blackdiamond.png')}}" 
                                      alt="" 
                                      class="img-rounded" /> 
                                @else
                                     <img src="{{asset('assets/badges/newbie.png')}}" 
                                      alt="" 
                                      class="img-rounded" /> 
                                @endif
                            </div>
                            <div class="username-responsive">
                                 {{$inbox->user->user_name}}
                            </div>
                            <div class="chat_ib">
                              <h5> {{$inbox->user->user_name}} 
                               <span class="chat_date">
                                  {{date('M-d', strtotime($inbox->updated_at))}}
                                </span>
                              </h5>
                              <p>
                                  {{ substr($inbox->message,0,30) }} ...
                              </p>
                            </div>
                          </div>
                        </div>
                    </a>
                @endif
                    
                @endif    
            @endforeach    
            
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
            @foreach(getmessagesbyid(array($inboxselected->user_id,$inboxselected->revice_user_id)) as $item)

                @if($user->id==$item->user_id)
                     <div class="incoming_msg">
                      <div class="incoming_msg_img"> 

                             @if($inbox->user->admin_status ==3)
                                   <img src="{{asset('assets/badges/admin.png')}}" 
                                    alt="" 
                                    class="img-rounded" />    
                             @elseif($inbox->user->admin_status ==1 || $inbox->user->admin_status ==2)
                                    <img src="{{asset('assets/badges/advertiser.png')}}" 
                                    alt="" 
                                    class="img-rounded" />       
                             @elseif($item->user->rank > 0 && $item->user->rank <= 100)
                                    <img src="{{asset('assets/badges/newbie.png')}}" 
                                    alt="" 
                                    class="img-rounded" />            
                                @elseif($item->user->rank > 100 && $item->user->rank <= 500)
                                    <img src="{{asset('assets/badges/junior.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($item->user->rank > 500 && $item->user->rank <= 1000)
                                    <img src="{{asset('assets/badges/silver.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($item->user->rank > 1000 && $item->user->rank <= 2500)
                                    <img src="{{asset('assets/badges/gold.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($item->user->rank > 2500 && $item->user->rank <= 4000)
                                    <img src="{{asset('assets/badges/platinum.png')}}" 
                                    alt="" 
                                    class="img-rounded" />  
                                @elseif($item->user->rank > 4000 && $item->user->rank <= 5000)
                                     <img src="{{asset('assets/badges/diamond.png')}}" 
                                      alt="" 
                                      class="img-rounded" /> 
                                @elseif($item->user->rank > 5000)
                                     <img src="{{asset('assets/badges/blackdiamond.png')}}" 
                                      alt="" 
                                      class="img-rounded" /> 
                                @else
                                     <img src="{{asset('assets/badges/newbie.png')}}" 
                                      alt="" 
                                      class="img-rounded" /> 
                                @endif   
                      </div>
                      <div class="received_msg">
                      	<h2 style="margin: 0;font-size:16px">{{$item->user->user_name}}</h3>
                        <div class="received_withd_msg">
                          <p>
                              {{$item->message}}
                          </p>
                          <span class="time_date"> {{date('h:i:s A',strtotime('+7 hour',strtotime($item->created_at)))}}</span></div>
                      </div>
                    </div>
                @else
                    <div class="outgoing_msg">
                      <div class="sent_msg">
                      	<h2 style="margin: 0;font-size:16px">{{$item->user->user_name}}</h3>
                        <p>
                              {{$item->message}}
                          </p>
                       <span class="time_date"> {{date('h:i:s A',strtotime('+7 hour',strtotime($item->created_at)))}} </span> 
                   </div>
                    </div>
                @endif
            @endforeach  


          </div>

          <div class="type_msg">
            <div class="input_msg_write">
              <form method="post" action="{{route('sendmessage',array('user'=>$inboxselected->revice_user_id))}}">  
                @csrf
                  <input type="text" name="message" class="write_msg" placeholder="{{trans('index.placeholdermessage')}}" />
                  <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
              </form>
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