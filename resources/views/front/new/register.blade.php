@extends('front.new.layout')
@section('title',trans('header.register'))
@if(\App::isLocale('th'))
@section('metadesc',$settings->meta_description)
@else
@section('metadesc',$settings->meta_description_en)
@endif
<div style="margin-top: 60px">
@section('content')
<div class="container-register">
    <section class="container text-center pt-5">

        <div class="mt-5 row">
            <div class="col-md-3 text-right"></div>
            <div class="col-md-6 text-right">

<form id="registerform" action="{{url('/')}}/store" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
                <div class="contactus-box container text-center">

                    @if(count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible">
                                 <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{$errors->first()}}
                                </div>
                        @endif

                         @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ trans('register.Registration complete Please login.') }}
                            </div>
                        @endif
                    <h2>
                        {{ trans('header.register') }}
                    </h2>

                     <div class="form-group text-left">
                        <label>{{ trans('register.first name') }}</label>
                        <input name="first_name" value="{{old('first_name')}}" type="text" class="form-control">
                     </div>

                     <div class="form-group text-left">
                        <label>{{ trans('register.surname') }}</label>
                        <input name="last_name" value="{{old('last_name')}}" type="text" class="form-control">
                     </div>

                     <div class="form-group text-left">
                        <label>{{ trans('register.email') }}</label>
                        <input name="email" type="email" value="{{old('email')}}" class="form-control">
                     </div>

                     <div class="form-group text-left">
                        <label>{{ trans('register.username') }}</label>
                        <input name="username" value="{{old('username')}}" type="text" class="form-control">
                     </div>

                     <div class="form-group text-left">
                        <label>{{ trans('register.password') }}</label>
                        <input type="password" type="password" name="password" minlength="6" maxlength="10" placeholder="{{trans('header.passwordplaceholder')}}" class="form-control">
                     </div>

                     <div class="form-group text-left">
                        <label>{{ trans('register.password') }}</label>
                        <input  name="confirm_password" type="password" minlength="6" maxlength="10" value="{{old('confirm_password')}}" placeholder="{{trans('header.passwordplaceholder')}}" class="form-control">
                     </div>

                     <button class="btn btn-pr" style="width: auto;padding-left:50px;padding-right:50px;">
                        {{ trans('header.register') }}
                    </button>

                    <br />
                    <br />
                    <br />
                    <br />

                </div>
              </form>
            </div>
            <div class="col-md-3 text-right"></div>
        </div>

    </section>
</div>
</div>
@stop
