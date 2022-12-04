@extends('front.new.layout')
@if(\App::isLocale('th'))
@if(isset($company))
    @section('title',$company->company_name)
@else
    @section('title','Company บริษัท')
@endif
@section('metadesc',$settings->meta_description)
@else
@section('metadesc',$settings->meta_description_en)
@section('title',$settings->title_en)
@endif
<meta property="og:image" content="{{$banner_public_img_path}}{{$company->banner['banner_image']}}">

<div style="margin-top: 60px">
<div class="bg-black">
@section('content')

<section class="top-home text-center">
    <div class="container section-top-home">
        @if(Session::has('error'))
        <div class="alert alert-error alert-dismissible" style="background: #e6b2b9;">
            <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
            {{ trans('index.errorcomment') }}
        </div>
        @endif

        @if(\App::isLocale('th'))
        @if(!empty($settings->tophome))

        {!! html_entity_decode($settings->tophome) !!}

        @endif

        <div class="row">
            <div class="col-6 text-right">
                @if(!empty($settings->adminline) || !empty($settings->adminline_link))
                <button class="btn btn-line" style="background:#00C300">
                    <a style="color:white;" class="font-size-line" href="{{$settings->adminline_link}}">
                        <img class="line-icon" src="{{asset('theme/images/line.png')}}"/>
                        {{$settings->adminline}}
                    </a>
                </button>
                @endif
            </div>
            <div class="col-6 text-left">
                @if(!empty($settings->groupline) || !empty($settings->groupline_link))
                <button class="btn btn-line text-left">
                    <a style="color:white;" class="font-size-line" href="{{$settings->groupline_link}}">
                        <img class="line-icon" src="{{asset('theme/images/line-icon.png')}}"/>
                        {{$settings->groupline}}
                    </a>
                </button>
                @endif
            </div>
        </div>

        @else
        @if(!empty($settings->tophome_en))

        {!! html_entity_decode($settings->tophome_en) !!}

        @endif


        <div class="row">
            <div class="col-6 text-right">
                @if(!empty($settings->adminline_en) || !empty($settings->adminline_link))
                <button class="btn btn-line" style="background:#00C300">
                    <a style="color:white;" class="font-size-line" href="{{$settings->adminline_link}}">
                        <img class="line-icon" src="{{asset('theme/images/line.png')}}"/>
                        {{$settings->adminline_en}}
                    </a>
                </button>
                @endif
            </div>
            <div class="col-6 text-left">
                @if(!empty($settings->groupline_en) || !empty($settings->groupline_link))
                <button class="btn btn-line text-left">
                    <a style="color:white;" class="font-size-line" href="{{$settings->groupline_link}}">
                        <img class="line-icon" src="{{asset('theme/images/line-icon.png')}}"/>
                        {{$settings->groupline_en}}
                    </a>
                </button>
                @endif
            </div>
        </div>

        @endif
    </div>
</section>

<!--<div class="text-center">-->
<!--    @if(!empty($company->company_name))-->
<!--    <h1> {{$company->company_name}} </h1>-->
<!--    @else-->
<!--    <h1> Company บริษัท </h1>-->
<!--    @endif-->
<!--    <img class="seprator-img-index" src="{{asset('theme/images/seperator-mid.png')}}" />-->
<!--</div>-->
<section class="advertise">
    <div class="container">
        <div class="row">
            @foreach($arr_banner as $banner)
            <div class="col-md-2 col-2 mt-2 pl-1 pr-1">
                @if(!empty($banner['url']))
                <a style="color: black" href="{{$banner['url']}}">
                    @else
                    <a style="color: black" href="{{asset('view_by_company/'.base64_encode($banner['company']))}}">
                        @endif
                        <div class="test">
                            <div class="test2">
                                @if(isset($banner['banner_image']) && $banner['banner_image']!='' &&
                                file_exists(str_replace(asset('/'),'',$banner_public_img_path.$banner['banner_image'])))
                                <img class="advertise-img" src="{{$banner_public_img_path}}{{$banner['banner_image']}}"/>
                                @else
                                <img class="advertise-img" src="{{asset('assets/front/images/add-2.jpg')}}"/>
                                @endif
                            </div>
                            <div class="test3">
                                {{$banner['banner_title']}}
                            </div>
                        </div>
                    </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
</div>
<div class="text-center">
    @if(!empty($company->company_name))
      <h1> {{$company->company_name}} </h1>
    @else
      <h1> Company บริษัท </h1>
    @endif
    <img class="seprator-img-index" src="{{asset('theme/images/seperator-mid.png')}}" />
</div>


<section class="section-models">
    <div class="row">
        @if(isset($arr_users))
        @foreach($arr_users as $models)
        <a style="color: inherit;
  text-decoration: inherit;" href="{{url('/list_details')}}/{{base64_encode($models['id'])}}">
            <div class="col-md-4 col-lg-3 col-xl-3 col-sm-6 col-6 mt-6" style="
        padding:5px;
">
                <div class="model-box text-center">
                    @if(isset($models['get_images'][0]['profile_image']) &&
                    $models['get_images'][0]['profile_image']!='' &&
                    file_exists($thumb_434_651_base_img_path.$models['get_images'][0]['profile_image']))
                    <div class="img-box"
                         style="background-image:url('{{$thumb_434_651_public_img_path}}{{$models['get_images'][0]['profile_image']}}')">
                        <?php if($models['vaccine_status'] == 'APPROVED') {?>
                            <div class="text-of-row-model" style="
                            /*margin-left: 10px; font-size:15px;font-weight: bolder;padding-top: 1px;padding-bottom: 0px;width: 100%;text-align: right;*/
    height: auto;
    position: absolute;
    bottom: 0px;
    text-align: left;
    right: 35px;
">
                                <img style="width: 80px;height: 40px;
                                /*transform: rotate(40deg);*/
" src="{{asset('theme/images/vaccination.png')}}">
                            </div>
                        <?php }?>

                        @elseif(isset($models['get_images'][0]['profile_image']) &&
                        $models['get_images'][0]['profile_image']!='' &&
                        file_exists($base_img_path.$models['get_images'][0]['profile_image']))
                        <div class="img-box"
                             style="background-image:url('{{$base_img_public_path}}{{$models['get_images'][0]['profile_image']}}')">
                            @else
                            <div class="img-box"
                                 style="background-image:url({{asset('/assets/front/images/no-img-found.jpg')}})">
                                @endif
                            </div>

                            <div style="
    margin-bottom: -9px;
    background: rgb(255, 255, 255);
    width: 97%;
    margin-left: auto;
    margin-right: auto;
    left: 0;
    right: 0;
    line-height: 25px;
    position: relative;
    bottom: 2px;
    height: 1px;
    border-radius: 8px 8px 0 0;
"></div>

                            <div class="company-box">
                                @if(\App::isLocale('th'))
                                @if(isset($models['get_category'][0]['category_name_th']))
                                {{(($models['get_category'][0]['category_name_th']))}}
                                @else
                                {{'Not Set'}}
                                @endif
                                @else
                                @if(isset($models['get_category'][0]['category_name']))
                                {{(($models['get_category'][0]['category_name']))}}
                                @else
                                {{'Not Set'}}
                                @endif
                                @endif
                            </div>

                            <!--                <div style="-->
                            <!--border-radius: 10px;-->
                            <!--    border: 2px solid transparent;-->
                            <!--    background: linear-gradient(rgb(255, 255, 255),rgb(255, 255, 255)) padding-box,-->
                            <!--    linear-gradient(135deg, rgb(255 191 122) 0%, rgb(227 131 56) 35%, rgb(191 58 40) 65%, rgb(183 41 37) 100%) border-box;-->
                            <!---->
                            <!--">-->
                            <div style="margin-top: 15px">
                                <div class="row-of-model">
                                    &nbsp;
                                    <!--                                &nbsp;{{ trans('list_details.name') }} :-->
                                    <!--                                <img style="width: 25px;height: 25px" src="{{asset('theme/images/heart.png')}}">-->
                                    <div class="text-of-row-model" style="color: #ee2727; font-family: 'Kanit-Bold', Arial !important;">
                                        @if(\App::isLocale('th'))
                                        {{$models['first_name_th']}}
                                        @else
                                        {{$models['first_name']}}
                                        @endif

                                    </div>
                                </div>
                                <div class="row-of-model">
                                    &nbsp;
                                    <!--                                &nbsp;{{ trans('list_details.location') }} :-->
                                    <!--                                <img style="width: 25px;height: 25px;" src="{{asset('theme/images/location.png')}}">-->
                                    <div class="text-of-row-model" style="color: #397dfd; font-family: 'Kanit-Bold', Arial !important;">
                                        @if(!empty($models['locations']))
                                        <?php $location = json_decode($models['locations']);
                                        $loc = getlocationById($location[0]); ?>
                                        @if(!empty($loc))
                                        @if(\App::isLocale('th'))
                                        {{$loc->location_name_th}}
                                        @else
                                        {{$loc->location_name}}
                                        @endif
                                        @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="row-of-model">
                                    <div class="text-of-row-model" style="color: #2bf3ec; font-family: 'Kanit-Bold', Arial !important;">
                                        &nbsp;&nbsp;{{ trans('list_details.age') }}
                                        {{$models['age']}}
                                    </div>
                                </div>
                                <div class="row-of-model">
                                    &nbsp;
                                    <!--                                &nbsp;{{ trans('list_details.gender') }} :-->
                                    <div class="text-of-row-model" style="width: 50% !important; color: #920092; font-family: 'Kanit-Bold', Arial !important;">
                                        @if($models['gender']!=null && !empty($models['gender']))
                                        @if(\App::isLocale('th'))
                                        <?php
                                        switch ($models['gender']) {
                                            case 'Male': $models['gender'] = 'ผู้ชาย';break;
                                            case 'Female': $models['gender'] = 'ผู้หญิง';break;
                                            case 'LadyBoy': $models['gender'] = 'สาวสอง';break;
                                        }
                                        ?>
                                        @endif
                                        {{$models['gender']}}
                                        @else
                                        -
                                        @endif
                                    </div>
                                    <div class="text-of-row-model" style="color: rgb(0,0,0) ;font-size:16px;font-weight: bolder;text-align: right;width: 40% !important; text-overflow: unset !important;">
                                        <?php
                                        echo "฿ " . number_format(strip_tags($models['price']));
                                        $price = explode('<br />',$models['price']) ?>
                                    </div>
                                </div>
                            </div>

                            <!--                </div>-->

                            <div class="text-center">
                                <img class="seprator-img-model" src="{{asset('theme/images/border.png')}}"/>
                            </div>
                            <a href="{{url('/list_details')}}/{{base64_encode($models['id'])}}">
                                <div class="text-center container-button-model">
                                    {{--
                                    <div class="icon-btn">
                                        <img src="{{asset('theme/images/donate.png')}}">
                                    </div>
                                    --}}
                                    <!--                                    <div class="row-of-model">-->
                                    <!--                                        <div class="text-of-row-model" style="color: rgb(0,0,0);font-size:16px;font-weight: bolder;padding-top: 0px;padding-bottom: 0px;width: 100%;text-align: right;">-->
                                    <!--                                            --><?php
                                    //                                            echo "฿ " . number_format(strip_tags($models['price']));
                                    //                                            $price = explode('<br />',$models['price']) ?>
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->

                                </div>
                            </a>
                        </div>
                    </div>
        </a>
        @endforeach
        @endif

    </div>
</section>
</div>

@stop
