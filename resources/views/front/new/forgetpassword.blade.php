@extends('front.new.layout')
@section('title',trans('forgot.Forgot password'))
@if(\App::isLocale('th'))
@section('metadesc',$settings->meta_forgot)
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

                <form class="form-horizontal new-lg-form" id="registerform" action="{{url('/')}}/forget_mail" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="contactus-box container text-center">

                    @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ trans('forgot.Please check your email for the new password.') }}
                            </div>
                        @endif

                        @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                         <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                         {{ trans('forgot.No matching records. Please enter a valid email.') }}
                        </div>
                        @endif
                        @if(Session::has('warning'))
                            <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ trans('forgot.Thank you for contacting. Our team will get back to you soon!') }}
                            </div>
                        @endif
                    <h2>
                        {{ trans('forgot.Forgot password') }}
                    </h2>

                     <div class="form-group text-left">
                        <label>{{ trans('forgot.registration email') }}</label>
                        <input name="email" type="email" value="{{old('email')}}" class="form-control">
                     </div>

                     <button class="btn btn-pr" style="width: auto;padding-left:50px;padding-right:50px;">
                        {{ trans('forgot.forget') }}
                    </button>


                </div>
              </form>
            </div>
            <div class="col-md-3 text-right"></div>
        </div>

                   <br />
                    <br />
                    <br />
                    <br />
                               <br />
                    <br />
                    <br />
                    <br />
    </section>
</div>
</div>
@stop
