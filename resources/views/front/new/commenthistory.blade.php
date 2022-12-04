@extends('front.new.layout')
@section('title',trans('index.commenthistorymodel'))
@if(\App::isLocale('th'))
@section('metadesc',$settings->meta_description)
@else
@section('metadesc',$settings->meta_description_en)
@endif
<div style="margin-top: 60px">
@section('content')
<div class="container-contactus">
    <section class="container text-center pt-5">

                    <h2>
                       {{ trans('index.commenthistorymodel') }}
                    </h2>

                    <div class="text-center">
                        <img class="seprator-img" src="{{asset('theme/images/seperator-mid.png')}}" />
                    </div>

                    @if(count($historiescomments) == 0 && count($threads) == 0)
                    <br />
                      <br />
                      <div class="row">
                        <div class="col-md-4 col-12 mt-4"></div>
                         <div class="col-md-4 col-12 mt-4">
                            <div class="contactus-box container text-left" style="background:#F5F5F5;direction: ltr;padding:40px; ">
                                <p>
                                  {{ trans('index.notexist') }}
                                </p>
                            </div>
                          </div>
                          <div class="col-md-4 col-12 mt-4"></div>
                      </div>
                    @endif


                <div class="mt-5 row">
                  @foreach($historiescomments as $comment)
                    <div class="col-md-4">
                      <div class="contactus-box container text-left" style="background:#F5F5F5;direction: ltr;padding:40px; ">
                          <p>
                            {{$comment->comment}}
                          </p>
                          <div class="mt-3">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span style="color:#03BAFF">
                              {{date('Y-m-d H:i',strtotime('+7 hour',strtotime($comment->created_at)))}}
                            </span>
                          </div>
                          <div class="mt-3">
                            <?php $model_id = base64_encode($comment->model_id); ?>
                            <a href="{{asset('/list_details/'.$model_id)}}" >
                             <button class="btn btn-pr" style="width: auto;padding-left:50px;padding-right:50px;">
                              {{ trans('index.showmodel') }}
                             </button>
                            </a>
                          </div>
                      </div>
                    </div>
                  @endforeach


                  <div class="col-md-12 col-12">
                      <div class="container">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 py-5 d-flex">
                                {{$historiescomments->links('vendor.pagination')}}
                            </div>
                        </div>
                    </div>
                  </div>

                  @if(count($threads) > 0)

                  @foreach($threads as $thread)

                    <div class="col-md-4">
                      <div class="contactus-box container text-left" style="background:#F5F5F5;direction: ltr;padding:40px; ">
                          <p>
                            {{$thread->comment}}
                          </p>
                          <div class="mt-3">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span style="color:#03BAFF">
                              {{date('Y-m-d H:i',strtotime('+7 hour',strtotime($thread->created_at)))}}
                            </span>
                          </div>
                          <div class="mt-3">
                            <a href="{{asset('/thread/'.$thread->discuss_id)}}" >
                             <button class="btn btn-pr" style="width: auto;padding-left:50px;padding-right:50px;">
                              {{ trans('index.showmodel') }}
                             </button>
                            </a>
                          </div>
                      </div>
                    </div>

                  @endforeach


                    <div class="container">
                      <div class="row">
                          <div class="col-lg-6 offset-lg-3 py-5 d-flex">
                              {{$threads->links('vendor.pagination')}}
                          </div>
                      </div>
                  </div>


                  @endif


                </div>
        </div>

    </section>
</div>
</div>
@stop
