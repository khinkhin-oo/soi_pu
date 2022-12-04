@extends('front.new.layout')
@if(\App::isLocale('th'))
@section('title',$settings->title)
@section('metadesc',$settings->meta_description)
@else
@section('metadesc',$settings->meta_description_en)
@section('title',$settings->title_en)
@endif
<div style="margin-top: 60px">
@section('content')


<section class="top-home text-center">
    @if(\App::isLocale('th'))
    ผลการค้นหาด้วย 'พื้นที่' : {{$search_result['searchText_th']}}
    <br/>ทั้งหมด {{$search_result['total']}}
    @else
    Search result by 'Area' : {{$search_result['searchText']}}
    <br/>Total {{$search_result['total']}}
    @endif

</section>

<div class="container" style="min-height: calc(100vh - 300px)">
    <div class="section-list-card row">
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
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 py-1 d-flex">
            <?php echo $obj_users->render('vendor.pagination'); ?>
        </div>
    </div>
</div>
</div>
@stop
