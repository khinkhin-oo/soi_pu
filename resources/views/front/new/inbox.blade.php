@extends('front.new.layout')
@if(\App::isLocale('th'))
    @section('title','การส่งข้อความ '.$user->user_name)
@else
    @section('title','Messaging '.$user->user_name)
@Endif
@if(\App::isLocale('th'))
@section('metadesc',$settings->meta_description)
@else
@section('metadesc',$settings->meta_description_en)
@endif
<div style="margin-top: 60px">
@section('content')
<div class="container-contactus">
    <section class="container text-center pt-5">

        <div class="mt-5 row">
            <div class="col-md-1 text-right"></div>
            <div class="col-md-10 text-right">
                <div class="contactus-box container text-center" style="background:#F5F5F5;">

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
                   <h2>
                        {{trans('index.messaging')}}
                    </h2>

                    <div class="text-center">
                        <img class="seprator-img-index" src="{{asset('theme/images/seperator-mid.png')}}" />
                    </div>

                 <div class="row" style="padding-top:30px;">
                  <div class="col-md-6 col-4 text-center pl-0 pr-0 pr-md-2 pl-md-2" style="height: 650px;overflow: scroll;">

                    <div class="d-none d-sm-none d-md-block d-lg-block d-xl-block">
                      <h3>
                        {{trans('index.recent')}}
                      </h3>
                      <hr />
                    </div>

                    @if(!empty($inboxselected))
                    @foreach($inboxes as $inbox)
                        @if(!empty($inbox->revice))

                        @if($user->id==$inbox->user_id)

                        <a style="text-decoration: none;" class="d-block d-sm-block d-md-none d-lg-none d-xl-none" href="{{asset('inbox/'.$inbox->id)}}">
                          <div class="mt-3">
                                <div class="row" style="padding-top:20px;">
                                  <div class="col-12 text-center">
                                    @if($inbox->revice->admin_status ==3)
                                       <img style="height: 50px" src="{{asset('assets/badges/admin.png')}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->admin_status ==2 || $inbox->revice->admin_status==1)
                                        <img style="height: 50px" src="{{asset('assets/badges/advertiser.png')}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 0 && $inbox->revice->rank <= 75)
                                        <img style="height: 50px" src="{{asset($badges[0]['image'])}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 75 && $inbox->revice->rank <= 150)
                                        <img style="height: 50px" src="{{asset($badges[1]['image'])}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 150 && $inbox->revice->rank <= 225)
                                        <img style="height: 50px" src="{{asset($badges[2]['image'])}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 225 && $inbox->revice->rank <= 300)
                                        <img style="height: 50px" src="{{asset($badges[3]['image'])}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 300 && $inbox->revice->rank <= 375)
                                        <img style="height: 50px" src="{{asset($badges[4]['image'])}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 375 && $inbox->revice->rank <= 450)
                                         <img style="height: 50px" src="{{asset($badges[5]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                    @elseif($inbox->revice->rank > 450 && $inbox->revice->rank <= 525)
                                         <img style="height: 50px" src="{{asset($badges[6]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                    @elseif($inbox->revice->rank > 525)
                                         <img style="height: 50px" src="{{asset($badges[7]['image'])}}"
                                           alt=""
                                           class="img-rounded" />
                                    @else
                                         <img style="height: 50px" src="{{asset($badges[0]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                    @endif
                                    <p style="color:#707070">
                                      {{$inbox->revice->user_name}}
                                    </p>
                                  </div>
                                </div>
                              </div>

                              <hr class=" ml-2" />
                          </a>
                          <a style="text-decoration: none;" class="d-none d-sm-none d-md-block d-lg-block d-xl-block" href="{{asset('inbox/'.$inbox->id)}}">
                              <div class="recent-box mt-3">
                                <div class="row" style="padding-top:20px;">
                                  <div class="col-md-3 text-center">
                                    @if($inbox->revice->admin_status ==3)
                                       <img style="height: 80px" src="{{asset('assets/badges/admin.png')}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->admin_status ==2 || $inbox->revice->admin_status==1)
                                        <img style="height: 80px" src="{{asset('assets/badges/advertiser.png')}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 0 && $inbox->revice->rank <= 75)
                                        <img style="height: 80px" src="{{asset($badges[0]['image'])}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 75 && $inbox->revice->rank <= 150)
                                        <img style="height: 80px" src="{{asset($badges[1]['image'])}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 150 && $inbox->revice->rank <= 225)
                                        <img style="height: 80px" src="{{asset($badges[2]['image'])}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 225 && $inbox->revice->rank <= 300)
                                        <img style="height: 80px" src="{{asset($badges[3]['image'])}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 300 && $inbox->revice->rank <= 375)
                                        <img style="height: 80px" src="{{asset($badges[4]['image'])}}"
                                        alt=""
                                        class="img-rounded" />
                                    @elseif($inbox->revice->rank > 375 && $inbox->revice->rank <= 450)
                                         <img style="height: 80px" src="{{asset($badges[5]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                    @elseif($inbox->revice->rank > 450 && $inbox->revice->rank <= 525)
                                         <img style="height: 80px" src="{{asset($badges[6]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                    @elseif($inbox->revice->rank > 525)
                                         <img style="height: 80px" src="{{asset($badges[7]['image'])}}"
                                           alt=""
                                           class="img-rounded" />
                                      @else
                                         <img style="height: 80px" src="{{asset($badges[0]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                    @endif
                                    <p style="color:#707070">
                                      {{$inbox->revice->user_name}}
                                    </p>
                                  </div>
                                  <div class="col-md-5 text-left pr-0 pl-0">
                                      <p style="padding-top:20px;font-size:15px;color:#848484">
                                        {{ substr($inbox->message,0,30) }} ...
                                      </p>
                                  </div>
                                  <div class="col-md-4">
                                    <div style="color:#03BAFF;font-size:12px;padding-top: 80px;">
                                      {{date('Y-m-d H:i',strtotime('+7 hour',strtotime($inbox->updated_at)))}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </a>
                         @else
                            <a class="d-none d-sm-none d-md-block d-lg-block d-xl-block" href="{{asset('inbox/'.$inbox->id)}}">
                                <div class="recent-box mt-3">
                                  <div class="row" style="padding-top:20px;">
                                    <div class="col-md-3 text-center">
                                      @if($inbox->revice->admin_status ==3)
                                       <img style="height: 80px" src="{{asset('assets/badges/admin.png')}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->admin_status ==2 || $inbox->revice->admin_status==1)
                                          <img style="height: 80px" src="{{asset('assets/badges/advertiser.png')}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 0 && $inbox->revice->rank <= 75)
                                          <img style="height: 80px" src="{{asset($badges[0]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 75 && $inbox->revice->rank <= 150)
                                          <img style="height: 80px" src="{{asset($badges[1]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 150 && $inbox->revice->rank <= 225)
                                          <img style="height: 80px" src="{{asset($badges[2]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 225 && $inbox->revice->rank <= 300)
                                          <img style="height: 80px" src="{{asset($badges[3]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 300 && $inbox->revice->rank <= 375)
                                          <img style="height: 80px" src="{{asset($badges[4]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 375 && $inbox->revice->rank <= 450)
                                           <img style="height: 80px" src="{{asset($badges[5]['image'])}}"
                                            alt=""
                                            class="img-rounded" />
                                      @elseif($inbox->revice->rank > 450 && $inbox->revice->rank <= 525)
                                           <img style="height: 80px" src="{{asset($badges[6]['image'])}}"
                                             alt=""
                                             class="img-rounded" />
                                      @elseif($inbox->revice->rank > 525)
                                           <img style="height: 80px" src="{{asset($badges[7]['image'])}}"
                                            alt=""
                                            class="img-rounded" />
                                      @else
                                           <img style="height: 80px" src="{{asset($badges[0]['image'])}}"
                                            alt=""
                                            class="img-rounded" />
                                      @endif
                                      <p style="color:#707070">
                                        {{$inbox->user->user_name}}
                                      </p>
                                    </div>
                                    <div class="col-md-5 text-left pr-0 pl-0">
                                        <p style="padding-top:20px;font-size:15px;color:#848484">
                                         {{ substr($inbox->message,0,30) }} ...
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                      <div style="color:#03BAFF;font-size:12px;padding-top: 80px;">
                                        {{date('Y-m-d H:i',strtotime('+7 hour',strtotime($inbox->updated_at)))}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </a>

                              <a class="d-block d-sm-block d-md-none d-lg-none d-xl-none" href="{{asset('inbox/'.$inbox->id)}}">
                                <div class="mt-3">
                                  <div class="row" style="padding-top:20px;">
                                    <div class="col-12 text-center">
                                      @if($inbox->revice->admin_status ==3)
                                       <img style="height: 50px" src="{{asset('assets/badges/admin.png')}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->admin_status ==2 || $inbox->revice->admin_status==1)
                                          <img style="height: 50px" src="{{asset('assets/badges/advertiser.png')}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 0 && $inbox->revice->rank <= 75)
                                          <img style="height: 50px" src="{{asset($badges[0]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 75 && $inbox->revice->rank <= 150)
                                          <img style="height: 50px" src="{{asset($badges[1]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 150 && $inbox->revice->rank <= 225)
                                          <img style="height: 50px" src="{{asset($badges[2]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 225 && $inbox->revice->rank <= 300)
                                          <img style="height: 50px" src="{{asset($badges[3]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 300 && $inbox->revice->rank <= 375)
                                          <img style="height: 50px" src="{{asset($badges[4]['image'])}}"
                                          alt=""
                                          class="img-rounded" />
                                      @elseif($inbox->revice->rank > 375 && $inbox->revice->rank <= 450)
                                           <img style="height: 50px" src="{{asset($badges[5]['image'])}}"
                                            alt=""
                                            class="img-rounded" />
                                      @elseif($inbox->revice->rank > 450 && $inbox->revice->rank <= 525)
                                           <img style="height: 50px" src="{{asset($badges[6]['image'])}}"
                                             alt=""
                                             class="img-rounded" />
                                      @elseif($inbox->revice->rank > 525)
                                           <img style="height: 50px" src="{{asset($badges[7]['image'])}}"
                                            alt=""
                                            class="img-rounded" />
                                      @else
                                           <img style="height: 50px" src="{{asset($badges[0]['image'])}}"
                                            alt=""
                                            class="img-rounded" />
                                      @endif
                                      <p style="color:#707070">
                                        {{$inbox->user->user_name}}
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </a>
                          @endif
                      @endif
                  @endforeach






                    <br />
                    <br />

                  </div>
                  <div class="col-md-6 col-8 pl-0 pr-0 pr-md-2 pl-md-2">
                      <div style="height: 600px;overflow: scroll;padding:15px;">


                         @foreach(getmessagesbyid(array($inboxselected->user_id,$inboxselected->revice_user_id)) as $item)

                          @if($user->id==$item->user_id)

                          <div class="text-left text-message-width" style="margin-left:auto">
                            <label style="color:#03BAFF">{{$item->user->user_name}} :</label>
                            <div class="message-box1 text-left">
                                <p>
                                  {{$item->message}}
                                </p>
                            </div>
                            <div class="right-date-message">
                              {{date('h:i:s A',strtotime('+7 hour',strtotime($item->created_at)))}}
                            </div>
                          </div>
                          @else

                          <div class="text-left text-message-width" style="margin-right:auto">
                            <label style="color:#EE10D7">{{$item->user->user_name}} :</label>
                            <div class="message-box2 text-left">
                                <p>
                                  {{$item->message}}
                                </p>
                            </div>
                            <div class="right-date-message">
                              {{date('h:i:s A',strtotime('+7 hour',strtotime($item->created_at)))}}
                            </div>
                          </div>
                          @endif
                          @endforeach
                      </div>

                      <form method="post" action="{{route('sendmessage',array('user'=>$inboxselected->revice_user_id))}}">
                        @csrf
                          <div class="input-group mb-3">
                            <input style="border-radius: 22px 0 0 22px;border: 1px solid #fd02e366;color: #707070b5;" type="text" class="form-control" placeholder="{{trans('index.placeholdermessage')}}" name="message" value="{{old('message')}}" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <button style="padding-left: 20px;padding-right: 20px;" class="btn btn-pr" type="submit">
                                <i style="font-size:35px;font-weight: 900;" class="fa fa-angle-right" aria-hidden="true"></i>
                              </button>
                            </div>
                          </div>
                        </form>

                      @endif


                  </div>
                </div>

                </div>
            </div>
            <div class="col-md-1 text-right"></div>
        </div>

    </section>
    <br />
    <br />
    <br />
    <br />
</div>
</div>
@stop
