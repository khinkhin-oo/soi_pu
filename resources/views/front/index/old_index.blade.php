<body>
    <style type="text/css">
        .pagination{float: right;}
    </style>

    @include('front.layout.header')
    <div class="middle-section-gray">
        <div class="container-change-section">
            <div class="ads-banners-seciton-head">
                {{ trans('index.banners hub') }}
            </div>        
            <div class="ads-banners-row">
                @foreach($arr_banner as $banner)
                {{-- {{dd($banner)}} --}}
                <div class="ads-banners-cols">
                    <a href="{{url('/view_by_company')}}/{{base64_encode($banner['company'])}}">
                        @if(isset($banner['banner_image']) && $banner['banner_image']!='' && file_exists($banner_thumbnails_base_img_path.$banner['banner_image'])) 
                        <img src="{{$banner_thumbnails_public_img_path}}{{$banner['banner_image']}}" alt="" />
                        @else
                        <img src="{{ url('/') }}/assets/front/images/profile-img-1.jpg" alt="" />
                        @endif
                    </a>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
            <div class="profiles-section-block-main">
                @if(isset($arr_users))
                    @foreach($arr_users as $models)
                        <a href="{{url('/list_details')}}/{{base64_encode($models['id'])}}" class="profiles-section-block">
                            <div class="profiles-section-block-inner">
                                <div class="profile-img-section">
                                    {{-- {{dd($models['get_images'][0]['profile_image'])}} --}}
                                    @if(isset($models['get_images'][0]['profile_image']) && $models['get_images'][0]['profile_image']!='' && file_exists($base_img_path.$models['get_images'][0]['profile_image'])) 
                                    <img src="{{$base_img_public_path}}{{$models['get_images'][0]['profile_image']}}" alt="" />
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
                                        @if($models['get_companies']!=null)
                                            {{$models['get_companies'][0]['company_name']}}
                                        @else
                                        {{$models['country']}}
                                        @endif
                                    </div>
                                    <div class="proile-information-seciton">
                                        <div class="proile-information-box">
                                            <div class="proile-information-box-head">
                                                {{ trans('index.model name') }}:
                                            </div>
                                            <div class="proile-information-box-text">
                                                {{$models['first_name']}} {{$models['last_name']}}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="proile-information-box">
                                            <div class="proile-information-box-head">
                                                {{ trans('index.country') }}:
                                            </div>
                                            <div class="proile-information-box-text">
                                                {{$models['country']}}
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
                                        <div class="proile-information-box">
                                            <div class="proile-information-box-head">
                                                {{ trans('index.location') }}:
                                            </div>
                                            <div class="proile-information-box-text">
                                                {{$models['address']}}
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
            <div class="pagination">
                <?php echo $obj_users->render(); ?>
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