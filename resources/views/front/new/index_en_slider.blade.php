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

  @if(Session::has('error'))
        <div class="alert alert-error alert-dismissible" style="background: #e6b2b9;">
                 <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                 {{ trans('index.errorcomment') }}
        </div>
  @endif

   @if(\App::isLocale('th'))
      @if(!empty($settings->tophome))
        <p>
            {!! html_entity_decode($settings->tophome) !!}
        </p>
      @endif

      <div class="row">
          <div class="col-6 text-right">
              @if(!empty($settings->adminline) || !empty($settings->adminline_link))
                <button class="btn btn-line" style="background:#00C300">
                  <a style="color:white;" class="font-size-line" href="{{$settings->adminline_link}}">
                    <img class="line-icon" src="{{asset('theme/images/line.png')}}" />
                    {{$settings->adminline}}
                  </a>
                </button>
              @endif
          </div>
          <div class="col-6 text-left">
            @if(!empty($settings->groupline) || !empty($settings->groupline_link))
              <button class="btn btn-line text-left">
                <a style="color:white;" class="font-size-line" href="{{$settings->groupline_link}}">
                  <img class="line-icon" src="{{asset('theme/images/line-icon.png')}}" />
                  {{$settings->groupline}}
                </a>
              </button>
            @endif
          </div>
      </div>

   @else
    @if(!empty($settings->tophome_en))
      <p>
          {!! html_entity_decode($settings->tophome_en) !!}
      </p>
    @endif


      <div class="row">
          <div class="col-6 text-right">
              @if(!empty($settings->adminline_en) || !empty($settings->adminline_link))
                <button class="btn btn-line" style="background:#00C300">
                  <a style="color:white;" class="font-size-line" href="{{$settings->adminline_link}}">
                    <img class="line-icon" src="{{asset('theme/images/line.png')}}" />
                    {{$settings->adminline_en}}
                  </a>
                </button>
              @endif
          </div>
          <div class="col-6 text-left">
            @if(!empty($settings->groupline_en) || !empty($settings->groupline_link))
              <button class="btn btn-line text-left">
                <a style="color:white;" class="font-size-line" href="{{$settings->groupline_link}}">
                  <img class="line-icon" src="{{asset('theme/images/line-icon.png')}}" />
                  {{$settings->groupline_en}}
                </a>
              </button>
            @endif
          </div>
      </div>

   @endif
</section>


<section class="advertise" style="padding-bottom:18px;">
   <div class="container">
        <div class="row">
          @foreach($arr_banner as $banner)
            <div class="col-md-4 col-4 mt-2 pl-1 pr-1">
              @if(!empty($banner['url']))
                        <a href="{{$banner['url']}}">
                    @else
                         <a href="{{asset('view_by_company/'.base64_encode($banner['company']))}}">
                    @endif
                @if(isset($banner['banner_image']) && $banner['banner_image']!='' && file_exists(str_replace(asset('/'),'',$banner_public_img_path.$banner['banner_image'])))
                  <img class="advertise-img" src="{{$banner_public_img_path}}{{$banner['banner_image']}}" />
                @else
                  <img class="advertise-img" src="{{asset('assets/front/images/add-2.jpg')}}" />
                @endif
              </a>
            </div>
         @endforeach
        </div>
   </div>
</section>

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
    <img class="seprator-img-index" src="{{asset('theme/images/seperator-mid.png')}}" />
</div>

<section class="section-models">
    <div class="row">
      @if(isset($arr_users))
          @foreach($arr_users as $models)
              <div class="col-md-4 col-lg-3 col-xl-3 col-sm-6 col-6 mt-3 p-lg-3 p-xl-3 p-md-1 p-1">
                  <div class="model-box text-center">


                      <a href="{{url('/list_details')}}/{{base64_encode($models['id'])}}">
                        @if(isset($models['get_images'][0]['profile_image']) && $models['get_images'][0]['profile_image']!='' && file_exists($thumb_286_319_base_img_path.$models['get_images'][0]['profile_image']))
                        <div class="img-box" style="background-image:url('{{$thumb_286_319_public_img_path}}{{$models['get_images'][0]['profile_image']}}')">
                        @elseif(isset($models['get_images'][0]['profile_image']) && $models['get_images'][0]['profile_image']!='' && file_exists($base_img_path.$models['get_images'][0]['profile_image']))
                          <div class="img-box" style="background-image:url('{{$base_img_public_path}}{{$models['get_images'][0]['profile_image']}}')">
                        @else
                          <div class="img-box" style="background-image:url({{asset('/assets/front/images/no-img-found.jpg')}})">
                        @endif
                            <div class="company-box">
                                @if(isset($models['get_category'][0]['category_name']))
                                              {{(($models['get_category'][0]['category_name']))}}
                                              @else
                                              {{'Not Set'}}
                                              @endif
                            </div>
                        </div>
                      </a>


                      <div class="row-of-model mt-3">
                          <img src="{{asset('theme/images/heart.png')}}">
                          <div class="text-of-row-model">
                              {{$models['first_name']}}
                          </div>
                      </div>
                      <div class="row-of-model mt-2">
                          <img src="{{asset('theme/images/location.png')}}">
                          <div class="text-of-row-model">
                              @if(!empty($models['locations']))
                                                        <?php $location = json_decode($models['locations']); $loc = getlocationById($location[0]); ?>
                                                        @if(!empty($loc))
                                                            {{$loc->location_name}}
                                                        @endif
                                                 @endif
                          </div>
                      </div>
                      <div class="text-center">
                          <img class="seprator-img-model" src="{{asset('theme/images/border.png')}}" />
                      </div>
                      <a href="{{url('/list_details')}}/{{base64_encode($models['id'])}}">
                        <div class="text-center container-button-model">
                            <div class="icon-btn">
                                <img src="{{asset('theme/images/donate.png')}}">
                            </div>
                            <button class="btn btn-pr btn-responsive" style="padding-left:24px;">
                                {!! substr(strip_tags(html_entity_decode($models['price'])),0,14) !!} ...
                            </button>
                        </div>
                      </a>
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
