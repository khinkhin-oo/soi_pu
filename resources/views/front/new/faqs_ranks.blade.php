@extends('front.new.layout')
@section('title',trans('index.faqsbadges'))
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
                        {{ trans('index.faqsbadges') }}
                    </h2>

<!--                    <div class="text-center">-->
<!--                        <img class="seprator-img" src="{{asset('theme/images/seperator-mid.png')}}" />-->
<!--                    </div>-->


                <div class="mt-5 row">
                    {{--
                  @foreach($faqs as $faq)
                    <div class="col-md-6">
                      <div class="contactus-box container text-center" style="background:#F5F5F5;">
                          @if(!empty($faq->image))
                                <img style="height: 170px" src="{{asset($faq->image)}}">
                          @endif
                          <h3 class="mt-3">
                            {{$faq->question}}
                          <h3>

<!--                          <div class="text-center">-->
<!--                            <img style="height: 19px;" class="seprator-img" src="{{asset('theme/images/seperator-mid.png')}}" />-->
<!--                          </div>-->

                          <p class="mt-4" style="color:#009FDB;font-size:16px;">
                            {!! $faq->answer !!}
                          </p>

                      </div>
                    </div>
                  @endforeach

                --}}
                <div class="col-md-6">
                    <div class="contactus-box container text-center" style="background:#F5F5F5;">
                        <img style="height: 170px" src="{{asset('assets/badges/1.png')}}">
                        <h3 class="mt-3">
                            First rank
                        <h3>

                        <p class="mt-4" style="color:#009FDB;font-size:16px;">
                          0 แต้ม
                        </p>

                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="contactus-box container text-center" style="background:#F5F5F5;">
                        <img style="height: 170px" src="{{asset('assets/badges/2.png')}}">
                        <h3 class="mt-3">
                            2nd rank
                        <h3>

                        <p class="mt-4" style="color:#009FDB;font-size:16px;">
                          75 แต้ม
                        </p>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="contactus-box container text-center" style="background:#F5F5F5;">
                        <img style="height: 170px" src="{{asset('assets/badges/3.png')}}">
                        <h3 class="mt-3">
                            3rd rank
                        <h3>

                        <p class="mt-4" style="color:#009FDB;font-size:16px;">
                          150 แต้ม
                        </p>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="contactus-box container text-center" style="background:#F5F5F5;">
                        <img style="height: 170px" src="{{asset('assets/badges/4.png')}}">
                        <h3 class="mt-3">
                            4th rank
                        <h3>

                        <p class="mt-4" style="color:#009FDB;font-size:16px;">
                          225 แต้ม
                        </p>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="contactus-box container text-center" style="background:#F5F5F5;">
                        <img style="height: 170px" src="{{asset('assets/badges/5.png')}}">
                        <h3 class="mt-3">
                            5th rank
                        <h3>

                        <p class="mt-4" style="color:#009FDB;font-size:16px;">
                          300 แต้ม
                        </p>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="contactus-box container text-center" style="background:#F5F5F5;">
                        <img style="height: 170px" src="{{asset('assets/badges/6.png')}}">
                        <h3 class="mt-3">
                            6th rank
                        <h3>

                        <p class="mt-4" style="color:#009FDB;font-size:16px;">
                            375 แต้ม
                        </p>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="contactus-box container text-center" style="background:#F5F5F5;">
                        <img style="height: 170px" src="{{asset('assets/badges/7.png')}}">
                        <h3 class="mt-3">
                            7th rank
                        <h3>

                        <p class="mt-4" style="color:#009FDB;font-size:16px;">
                            450 แต้ม
                        </p>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="contactus-box container text-center" style="background:#F5F5F5;">
                        <img style="height: 170px" src="{{asset('assets/badges/8.png')}}">
                        <h3 class="mt-3">
                            8th rank
                        <h3>

                        <p class="mt-4" style="color:#009FDB;font-size:16px;">
                            525 แต้ม
                        </p>

                    </div>
                  </div>

                </div>

                <br/>
<br/>
        </div>
    </section>
</div>
</div>
@stop
