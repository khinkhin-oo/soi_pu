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
                       {!! $page->title !!}
                    </h2>

                    <div class="text-center">
                        <img class="seprator-img" src="{{asset('theme/images/seperator-mid.png')}}" />
                    </div>


                    <div class="mt-5 text-left">
                      	{!! $page->description !!}
                    </div>
                    <br />
                    <br />
                    <br />
                    <br />
    </section>
</div>
</div>
@stop
