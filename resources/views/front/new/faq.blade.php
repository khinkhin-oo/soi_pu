@extends('front.new.layout')
@section('title',trans('index.faq'))
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
                       {{trans('index.faq')}}
                    </h2>

                    <div class="text-center">
                        <img class="seprator-img" src="{{asset('theme/images/seperator-mid.png')}}" />
                    </div>


                    <div class="mt-5 text-left">
                      	@foreach($faqs as $faq)
                      	 <div id="accordion{{$faq->id}}">
                          <div class="card mt-3">
                            <div class="card-header" id="headingOne{{$faq->id}}">
                              <h5 class="mb-0">
                                <button style="padding:0" class="btn" data-toggle="collapse" data-target="#collapseOne{{$faq->id}}" aria-expanded="true" aria-controls="collapseOne{{$faq->id}}">
                                  <i style="font-size:35px;font-weight: 900;color:#03BAFF;position: relative;bottom:-8px" class="fa fa-angle-down" aria-hidden="true"></i>
                                  {{$faq->question}}
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne{{$faq->id}}" class="collapse show" aria-labelledby="headingOne{{$faq->id}}" data-parent="#accordion{{$faq->id}}">
                              <div class="card-body" style="padding:30px;">
                              	@if(!empty($faq->image))
                                        <div style="text-align: center;">
                                            <img src="{{asset($faq->image)}}" style="max-height: 200px;" />
                                        </div>
                                @endif
                                {!! $faq->answer !!}
                              </div>
                            </div>
                          </div>
                         </div>
                        @endforeach


                    </div>
                    <br />
                    <br />
                    <br />
                    <br />
    </section>
</div>
</div>
@stop
