@extends('front.new.layout')
@section('title',trans('change_password.change') .' '. trans('change_password.password'))
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

<form class="form-horizontal new-lg-form" id="forget_password" action="{{url('/')}}/update_password" method="POST">
        {{csrf_field()}}
                <div class="contactus-box container text-center">

                    @if(Session::has('success'))
                     <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ trans('change_password.Current password does not match') }}.
                    </div>
                    @endif

                    @if(Session::has('warning_password'))
                     <div class="alert alert-warning alert-dismissible">
                      <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ trans('change_password.Thank you for contacting. Our team will get back to you soon!') }}
                    </div>
                    @endif

                    @if(Session::has('warning'))
                     <div class="alert alert-warning alert-dismissible">
                      <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ trans('change_password.You cannot set a previous password as a new password.') }}
                    </div>
                    @endif

                    <h2>
                        {{ trans('change_password.change') }} {{ trans('change_password.password') }}
                    </h2>

                     <div class="form-group text-left">
                        <label>{{ trans('change_password.password') }}</label>
                        <input type="password" name="password" class="form-control">
                     </div>

                     <div class="form-group text-left">
                        <label>{{ trans('change_password.new') }}{{ trans('change_password.password') }}</label>
                        <input type="password" name="new_password" class="form-control">
                     </div>

                     <div class="form-group text-left">
                        <label>{{ trans('change_password.confirm') }} {{ trans('change_password.password') }}</label>
                        <input type="password" name="confirm_password" value="{{old('email')}}" class="form-control">
                     </div>

                     <button class="btn btn-pr" style="width: auto;padding-left:50px;padding-right:50px;">
                        {{ trans('change_password.change') }}
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
