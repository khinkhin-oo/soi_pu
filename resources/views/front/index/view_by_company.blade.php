<!DOCTYPE html>
<html lang="en">
@if(isset($company))
    @section('title',$company->company_name)
@else
  @section('title','บริษัท')
@endif
@section('metadesc',$company->company_name)
@include('front.layout.header')
<body>
    <style type="text/css">


        .pagination{float: right;}
        @media (max-width: 767px)
        {
            .profiles-section-block {
                padding: 0px !important;
                margin-bottom: 0px !important;
                border: 1px solid #91117f !important;

            }

            .profile-name-seciton-block span{
                padding: 0px !important;
            }

            .star-left-section{
                display: none !important; 
            }

             .star-right-section{
                display: none !important; 
            }

          

        }

        @media only screen (max-width: 767px) {


            .profile-name-seciton-block span{
                padding: 0px  !important;
            }

            .proile-information-box-head{
                font-size: 8px !important;
            }

            .proile-information-box-text{
                margin: 0px !important;
                font-size: 9px !important;
            }

            .star-left-section{
                display: none !important; 
            }


        }

    </style>
    <div class="middle-section-gray">
        <div class="container-fluid">
                
            <div class="ads-banners-row ">
                <div class="col-md-8 offset-md-2">
                @foreach($arr_banner as $banner)
                {{-- {{dd($banner)}} --}}
                <div class="ads-banners-cols">
                    @if(!empty($banner['url']))
                        <a href="{{$banner['url']}}">
                    @else
                         <a href="{{asset('view_by_company/'.base64_encode($banner['company']))}}">
                    @endif        
                        @if(isset($banner['banner_image']) && $banner['banner_image']!='' && file_exists(str_replace(asset('/'),'',$banner_public_img_path.$banner['banner_image']))) 
                        <img src="{{$banner_public_img_path}}{{$banner['banner_image']}}" alt="" />
                        @else
                        <img src="{{ url('/') }}/assets/front/images/add-2.jpg" alt="" />
                        @endif
                    </a>
                </div>
                @endforeach
                </div>

                <div class="clearfix"></div>


                <div class="container-fluid">
                   <div class="login"><h1>
                       
                       @if(isset($company))
                                            {{$company->company_name}}
                                            @else
                                            {{'Not Set'}}
                                            @endif
                   </h1>
                        <div class="login-line"></div>
                </div>
                </div>
            </div>



            <div class="profiles-section-block-main">
                @if(isset($arr_users))
                    @foreach($arr_users as $models)
                        <a href="{{url('/list_details')}}/{{base64_encode($models['id'])}}" class="profiles-section-block">
                            <div class="profiles-section-block-inner">
                                <div class="profile-img-section">
                                    {{-- {{dd($models['get_images'][0]['profile_image'])}} --}}
                                    @if(isset($models['get_images'][0]['profile_image']) && $models['get_images'][0]['profile_image']!='' && file_exists($thumb_286_319_base_img_path.$models['get_images'][0]['profile_image'])) 
                                 
                                        <img style="object-fit: cover" src="{{$thumb_286_319_public_img_path}}{{$models['get_images'][0]['profile_image']}}" alt="{{ $models['first_name'] }}" />
                                    @elseif(isset($models['get_images'][0]['profile_image']) && $models['get_images'][0]['profile_image']!='' && file_exists($base_img_path.$models['get_images'][0]['profile_image'])) 
                                    <img style="object-fit: cover" src="{{$base_img_public_path}}{{$models['get_images'][0]['profile_image']}}" alt="{{ $models['first_name'] }}" />
                                    @else
                                    <img style="object-fit: cover" src="{{ url('/') }}/assets/front/images/no-img-found.jpg" alt="" />
                                    @endif
                                </div>

                                <div class="profile-name-seciton-block">
                                    <i class="fas fa-star star-left-section"></i>                             
                                        <span>
                                            @if(isset($models['get_category'][0]['category_name']))
                                            {{(($models['get_category'][0]['category_name']))}}
                                            @else
                                            {{'Not Set'}}
                                            @endif
                                        </span>
                                    <i class="fas fa-star star-right-section"></i>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="proile-information-seciton-main">
                                    <div class="profile-country-name">
                                        @if(!empty($models['locations']))
                                                        <?php $location = json_decode($models['locations']); $loc = getlocationById($location[0]); ?>
                                                        @if(!empty($loc))
                                                            {{$loc->location_name}}
                                                        @endif
                                                 @endif 
                                    </div>
                                    <div class="proile-information-seciton">
                                        <div class="proile-information-box">
                                            <div class="proile-information-box-head">
                                                {{ trans('index.model name') }}:
                                            </div>
                                            <div class="proile-information-box-text">
                                                {{$models['first_name']}} 
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="proile-information-box">
                                            <div class="proile-information-box-head">
                                                 {{ trans('index.location') }}:
                                            </div>
                                            <div class="proile-information-box-text">
                                                @if(!empty($models['locations']))
                                                        <?php $location = json_decode($models['locations']); $loc = getlocationById($location[0]); ?>
                                                        @if(!empty($loc))
                                                            {{$loc->location_name}}
                                                        @endif
                                                 @endif 
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="proile-information-box">
                                            <div class="proile-information-box-head">
                                                {{ trans('index.price') }}:
                                            </div>
                                            <div class="proile-information-box-text">
                                                {{$models['price']}}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif

                <div class="clearfix"></div>        
            </div>
            <div class="clearfix"></div> 

        </div> 

    </div>

    
    <!--Footer Section  Start--> 
    @include('front.layout.footer')
    <!--Footer Section End -->
 

    
    <script>
        $(".advance-search-label-section").on("click", function(){
            $(".advance-search-section-main").toggleClass("searchactive");
        });
    </script>
    
    <script>
        $(".responsive-show-menu").on("click", function(){
            $("body").addClass("login-open");
        });
        $(".closebtnlogin").on("click", function(){
            $("body").removeClass("login-open");
        })
    </script>
    
    <script>
        $(".menu-icon").on("click", function(){
            $("body").addClass("menu-active");
        });
        $(".closebtn").on("click", function(){
            $("body").removeClass("menu-active");
        })
    </script>
    
    <script>
        var doc_width = $(document).width();
        if (doc_width < 768){
            $(".ads-banners-row").addClass("scroll1");
        }
    </script>
    
</body>