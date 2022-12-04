<!DOCTYPE html>
<html lang="en">
@section('title',$settings->title)
@section('metadesc',$settings->meta_description) 
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

                @if(!empty($settings->adminline) || !empty($settings->groupline) || !empty($settings->tophome) || !empty($settings->adminline_link) || !empty($settings->groupline_link))
                <div class="container-fluid" style="background: #fff;box-shadow: 0px 0px 40px 0px rgba(0,0,0,0.05);border-radius: 10px;overflow: hidden;padding:10px;">
                  {{-- <div class="card-body"> --}}

                                 {{-- <div class="login"><h1>{{$settings->h1_home}}</h1>  --}}
                        {{-- <div class="login-line"></div> --}}
                {{-- </div> --}}
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" style="text-align: center;">
                                @if(!empty($settings->adminline) || !empty($settings->adminline_link))
                                <span class="line-box">
                                    <a href="{{$settings->adminline_link}}">
                                        <img style="height: 24px;" src="{{asset('assets/line-icon.png')}}" /> 
                                        <span style="font-size: 16px;position: relative;top:5px">
                                            {{$settings->adminline}}
                                        </span>
                                    </a>
                                </span>
                                @endif
                                @if(!empty($settings->groupline) || !empty($settings->groupline_link))
                                <span style="padding: 0 .9em;">
                                    <a href="{{$settings->groupline_link}}">
                                        <img style="height: 24px;" src="{{asset('assets/line-icon.png')}}" />
                                        <span style="font-size: 16px;position: relative;top:5px">
                                            {{$settings->groupline}}
                                        </span> 
                                    </a>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                       @if(!empty($settings->tophome))
                           <p style="color: #506172;" class="excerpt font-medium mt-25 mb-25">
                                    {!! html_entity_decode($settings->tophome) !!}
                           </p>
                       @endif
                  </div>
                  @endif


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
                                 
                                        <img src="{{$thumb_286_319_public_img_path}}{{$models['get_images'][0]['profile_image']}}" alt="{{ $models['first_name'] }}" />
                                    @elseif(isset($models['get_images'][0]['profile_image']) && $models['get_images'][0]['profile_image']!='' && file_exists($base_img_path.$models['get_images'][0]['profile_image'])) 
                                    <img src="{{$base_img_public_path}}{{$models['get_images'][0]['profile_image']}}" alt="{{ $models['first_name'] }}" />
                                    @else
                                    <img src="{{ url('/') }}/assets/front/images/no-img-found.jpg" alt="" />
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
                                                {!! substr(strip_tags(html_entity_decode($models['price'])),0,14) !!} ...
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
            <div class="pagination pagination-section-main">
                <?php echo $obj_users->render(); ?>
            </div> 
            <div class="clearfix"></div> 

              @if(!empty($settings->bottomhome))
                <div class="container-fluid" style="background: #fff;box-shadow: 0px 0px 40px 0px rgba(0,0,0,0.05);border-radius: 10px;overflow: hidden;margin-top:20px">
                  <div class="card-body">
                        <p style="color: #506172;" class="excerpt font-medium mt-25 mb-25">
                                {!! html_entity_decode($settings->bottomhome) !!}
                            </p>
                  </div>
                </div>
              @endif   
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