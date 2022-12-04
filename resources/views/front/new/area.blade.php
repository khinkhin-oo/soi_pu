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
    สถานที่ทั้งหมด
    @else
    Area
    @endif

</section>

<section class="section-models">
    <div class="row">
        @if(isset($arr_users))
        @foreach($arr_users as $area)

            <div class="col-md-3 col-3 mt-3 pl-1 pr-1" style="
">
                <div class="text-center">
                    <div class="location-box">


                        <div class="company-box" style="width: 100%; height: 100%;border-radius: 10px !important; text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(45deg,rgb(253, 38, 122),rgb(255, 96, 54));
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
        @endif

    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 py-1 d-flex">
            <?php echo $obj_users->render('vendor.pagination'); ?>
        </div>
    </div>
</div>

</div>
@stop
