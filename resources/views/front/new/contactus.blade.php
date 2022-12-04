@extends('front.new.layout')
@section('content')
@section('title',trans('contactus.title3'))
@if(\App::isLocale('th'))
@section('metadesc',$settings->meta_description)
@else
@section('metadesc',$settings->meta_description_en)
@endif
<div style="margin-top: 60px">
<div class="container-contactus">
    <section class="container text-center pt-5">
        {{-- <p>
        	<h5>
        		{{ trans('contactus.title1') }}
        	</h5>
        	<div>
                            @if(!empty($settings->address))
                            <strong>{{ trans('contactus.address') }}:</strong> {{$settings->address}} <br>
                            @endif
                            @if(!empty($settings->tel))
                            <strong>{{ trans('contactus.phone') }}:</strong> {{$settings->tel}}
                            @endif
        	</div>
        </p>  --}}


        @if(!empty($settings->send_order_email))
            <p>{{ trans('contactus.title2') }} : {{ trans('contactus.desc2') }} {{$settings->send_order_email}}.</p>
        @else
            <p>
               {{ trans('contactus.title2') }} : {{ trans('contactus.notavaible') }}
            </p>
        @endif
        <p>
            {{ trans('contactus.title3') }} :  {{$settings->description}}
        </p>
        <div class="text-center">
            <img class="seprator-img" src="{{asset('theme/images/seperator-mid.png')}}" />
        </div>

        <div class="mt-5 row">
            <div class="col-md-7">
                <div class="container-image-contactus">
                    <img class="img-contactus" src="{{asset('theme/images/contactus.png')}}">
                </div>
            </div>
            <div class="col-md-5 text-right">
                <div class="contactus-box container text-center">

                	 @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ trans('contactus.success') }}
                            </div>
                        @endif

                        @if(count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible">
                                 <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{$errors->first()}}
                                </div>
                        @endif
                    <h2>
                        {{ trans('contactus.title3') }}
                    </h2>

                    <br />

                    <form class="form-contact comment_form" method="post" action="{{route('sendcontactus')}}">
                                    {{csrf_field()}}
	                     <div class="form-group text-left">
	                        <label>{{ trans('index.fullname') }}</label>
	                        <input name="name" value="{{old('name')}}" type="text" class="form-control">
	                     </div>

	                     <div class="form-group text-left">
	                        <label>{{ trans('register.email') }}</label>
	                        <input type="email" name="email" value="{{old('email')}}" class="form-control">
	                     </div>

	                     <div class="form-group text-left">
	                        <label>{{ trans('index.phonenumber') }}</label>
	                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
	                     </div>

	                     <div class="form-group text-left">
	                        <label>{{trans('index.contactmessage')}}</label>
	                        <textarea name="comment" style="padding: 3.5rem 0.75rem;" class="form-control">{{old('comment')}}</textarea>
	                     </div>

	                     <button class="btn btn-pr" style="width: auto;padding-left:50px;padding-right:50px;">
	                        {{ trans('contactus.btn') }}
	                    </button>
                	</form>

                </div>
            </div>
        </div>
    </section>

</div>
</div>
@stop
