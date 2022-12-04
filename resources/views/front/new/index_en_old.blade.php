@extends('front.new.layout')
@if(\App::isLocale('th'))
@section('title',$settings->title)
@section('metadesc',$settings->meta_description)
@else
@section('metadesc',$settings->meta_description_en)
@section('title',$settings->title_en)
@endif
<meta property="og:image" content="{{asset('theme/images/logo-thumbnail.jpg')}}">
<div style="margin-top: 60px">
<div class="bg-black banner_sec">
@section('content')



    @if(sizeof($arr_area) > 0)
    {{-- <section class="locations">

        <div class="container">
            <div class="row">

                @foreach($arr_area as $area)
                    <div class="col-md-3 col-3 mt-3 pl-1 pr-1" style="">
                        <div class="text-center">
                            <div class="location-box">
                                <div class="company-box" style="width: 100%; height: 100%;border-radius: 10px !important; text-align: center;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: linear-gradient(45deg,rgb(253, 38, 122), rgb(255, 96, 54));
                        ">
                                        <a style="color: white;" href="{{url('/search/area')}}/{{base64_encode($area['id'])}}">
                                            @if(\App::isLocale('th'))
                                            {{$area['area_name_th']}}
                                            @else
                                            {{$area['area_name']}}
                                            @endif
                                        </a>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
                </div>
                <div style="text-align: right; margin-top: 15px">
                    <a href="{{url('/area')}}" style="color: white;"> @if(\App::isLocale('th'))
                        ดูเพิ่มเติม
                        @else
                        See more
                        @endif</a>
                </div>
            </div>
    </section> --}}
    <div class="locations">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-12 mt-3 pl-1 pr-1">
                    <div class="text-center text-light">
                        <div class="banner_text_box">
                            <h2 class="mb-3">Lorem Ipsum is simply</h2>
                            <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="banner_search_box">
                            <input type="search" name="bn_search" id="bn_search" class="" placeholder="Lorem Ipsum" />
                            <div class="bn_search_icon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-12 mt-1 banner_tag_box">

                    <a href="#" class="banner_tags">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        New
                    </a>

                    <a href="#" class="banner_tags">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        Lorem
                    </a>

                    <a href="#" class="banner_tags">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        Lorem
                    </a>

                    <a href="#" class="banner_tags">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        Lorem Ipsum
                    </a>

                </div>

            </div>
        </div>
    </div>
    @endif

{{-- <section class="top-home text-center">
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
</section> --}}


{{-- <section class="advertise">
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
</section> --}}

<section class="advertise mt-2">
    <div class="container">
        <div class="row">
            @foreach($arr_banner as $banner)
            <div class="col-md-2 col-2 mt-2 pl-1 pr-1">
            @if(!empty($banner['url']))
                <a style="color: black" href="{{$banner['url']}}">
                    @else
                    <a style="color: black" href="{{asset('view_by_company/'.base64_encode($banner['company']))}}">
                        @endif
                        <div class="advertise_box">
                            <div class="adv_img_box">
                            @if(isset($banner['banner_image']) && $banner['banner_image']!='' &&
                            file_exists(str_replace(asset('/'),'',$banner_public_img_path.$banner['banner_image'])))
                            <img class="adv_img" src="{{$banner_public_img_path}}{{$banner['banner_image']}}"/>
                            @else
                            <img class="adv_img" src="{{asset('assets/front/images/add-2.jpg')}}"/>
                            @endif
                            </div>
                            <div class="adv_text">
                                <p>{{$banner['banner_title']}}</p>
                            </div>
                        </div>
                    </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

</div>

@if($settings->hideslider==1)
<section class="slider-image">
    <div class="container" style="padding:4px;margin-bottom:10px;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @if(!empty($settings->slide1image))
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                @endif
                @if(!empty($settings->slide2image))
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                @endif
                @if(!empty($settings->slide3image))
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                @endif
                @if(!empty($settings->slide4image))
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                @endif
                @if(!empty($settings->slide5image))
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                @endif
                @if(!empty($settings->slide6image))
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                @endif
                @if(!empty($settings->slide7image))
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                @endif
                @if(!empty($settings->slide8image))
                <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                @endif
                @if(!empty($settings->slide9image))
                <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                @endif
            </ol>
            <div class="carousel-inner">
                @if(!empty($settings->slide1image))
                <div class="carousel-item active">
                    <a href="{{$settings->slide1link}}">
                        <img class="d-block w-100" src="{{asset($settings->slide1image)}}">
                    </a>
                </div>
                @endif
                @if(!empty($settings->slide2image))
                <div class="carousel-item">
                    <a href="{{$settings->slide2link}}">
                        <img class="d-block w-100" src="{{asset($settings->slide2image)}}">
                    </a>
                </div>
                @endif

                @if(!empty($settings->slide3image))
                <div class="carousel-item">
                    <a href="{{$settings->slide3link}}">
                        <img class="d-block w-100" src="{{asset($settings->slide3image)}}">
                    </a>
                </div>
                @endif

                @if(!empty($settings->slide4image))
                <div class="carousel-item">
                    <a href="{{$settings->slide4link}}">
                        <img class="d-block w-100" src="{{asset($settings->slide4image)}}">
                    </a>
                </div>
                @endif

                @if(!empty($settings->slide5image))
                <div class="carousel-item">
                    <a href="{{$settings->slide5link}}">
                        <img class="d-block w-100" src="{{asset($settings->slide5image)}}">
                    </a>
                </div>
                @endif

                @if(!empty($settings->slide6image))
                <div class="carousel-item">
                    <a href="{{$settings->slide6link}}">
                        <img class="d-block w-100" src="{{asset($settings->slide6image)}}">
                    </a>
                </div>
                @endif

                @if(!empty($settings->slide7image))
                <div class="carousel-item">
                    <a href="{{$settings->slide7link}}">
                        <img class="d-block w-100" src="{{asset($settings->slide7image)}}">
                    </a>
                </div>
                @endif

                @if(!empty($settings->slide8image))
                <div class="carousel-item">
                    <a href="{{$settings->slide8link}}">
                        <img class="d-block w-100" src="{{asset($settings->slide8image)}}">
                    </a>
                </div>
                @endif

                @if(!empty($settings->slide9image))
                <div class="carousel-item">
                    <a href="{{$settings->slide9link}}">
                        <img class="d-block w-100" src="{{asset($settings->slide9image)}}">
                    </a>
                </div>
                @endif

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
@endif

<div class="text-center">
<!--    <img class="seprator-img-index" src="{{asset('theme/images/seperator-mid.png')}}"/>-->
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


<script>
 setInterval(async function(){
    @php($route=route('autorefresh'))
    let data =await fetch("{{ $route }}")
    console.log(data.json())
   }, 10000);
</script>

<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 py-1 d-flex">
            <?php echo $obj_users->render('vendor.pagination'); ?>
        </div>
    </div>
</div>
@stop
