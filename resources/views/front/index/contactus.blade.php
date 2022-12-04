<!DOCTYPE html>
<html lang="en">
    <!--Header Section  Start--> 
    @include('front.layout.header')
    <!--Header Section End --> 

<body>
        <div class="middle-section-gray">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="">
                          <div class="">
                            <h3 class="mb-30">{{ trans('contactus.title1') }}</h3>
                            <p>
                            @if(!empty($settings->address))   
                            <strong>{{ trans('contactus.address') }}:</strong> {{$settings->address}} <br>
                            @endif
                            @if(!empty($settings->tel))   
                            <strong>{{ trans('contactus.phone') }}:</strong> {{$settings->tel}}    
                            @endif                       
                            </p>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                          <div class="">
                             <h3 class="mb-30">{{ trans('contactus.title2') }}</h3>
                             @if(!empty($settings->send_order_email))
                                <p>{{ trans('contactus.desc2') }} {{$settings->send_order_email}}.</p>
                             @else
                                <p>
                                    {{ trans('contactus.notavaible') }}
                                </p>   
                             @endif
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                          <div class="">
                            <h3 class="mb-30">{{ trans('contactus.title3') }}</h3>
                            {{$settings->description}}
                          </div>
                        </div>
                    </div>
                </div>

                <div class="bt-1 border-color-1 mt-30 mb-30"></div>


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

                <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <h1 class="mb-30">{{ trans('contactus.title3') }}</h1>
                            <form class="form-contact comment_form" method="post" action="{{route('sendcontactus')}}">
                                    {{csrf_field()}}
                                <div class="row">                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="name" value="{{old('name')}}" id="name" type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="email" value="{{old('email')}}" id="email" type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="phone" value="{{old('phone')}}" id="phone" type="text" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Message">{{old('comment')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="login-btn-box">
                                        <button type="submit" class="login-form-btn">{{ trans('contactus.btn') }}</button>
                                    </div> 
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-12"><img src="{{asset('assets/contactus.png')}}" alt="contactus"></div>
                    </div>

            </div>
        </div>
    <!--Footer Section  Start--> 
    @include('front.layout.footer')
    <!--Footer Section End -->   
    
</body>

</html>