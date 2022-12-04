@extends('front.new.layout')
@section('title', 'แบบ ' . $arr_model['first_name'])
@section('metadesc', $arr_model['meta_desc'])
@push('style')
    <?php $k = 1; ?>
    @foreach ($arr_model['get_images'] as $image)
        @if ($k == 1)
            @if (isset($image['profile_image']) &&
                $image['profile_image'] != '' &&
                file_exists($thumb_434_651_base_img_path . $image['profile_image']))
                <meta property="og:image" content="{{ $thumb_434_651_public_img_path }}{{ $image['profile_image'] }}">
            @elseif(isset($image['profile_image']) &&
                $image['profile_image'] != '' &&
                file_exists($base_img_path . $image['profile_image']))
                <meta property="og:image" content="{{ $base_img_public_path }}{{ $image['profile_image'] }}">
            @else
                <meta property="og:image" content="{{ $base_img_public_path }}{{ $image['profile_image'] }}">
            @endif
        @endif
        <?php $k++; ?>
    @endforeach

    <link rel="stylesheet" href="{{ asset('assets/front/css/swiper.min.css') }}">
    <style type="text/css">
        .profiles-section-block-main {
            margin: 40px 0px 0;
        }

        .ads-banners-seciton-head {
            font-size: 18px;
            font-family: 'poppinsmedium';
            color: #000000;
            padding-bottom: 3px;
        }

        .profiles-section-block {
            float: left;
            padding: 0 5px;
            margin-bottom: 30px;
            width: 20%;
        }

        .profiles-section-block-inner {
            box-shadow: 0 3px 4px rgba(0, 0, 0, 0.2);
            background: #ffffff;
        }

        .profile-img-section {
            height: 319px;
            width: 100%;
            overflow: hidden
        }

        .profile-img-section img {
            height: 100%;
            width: 100%;
        }

        @media (max-width: 767px) {

            .profile-img-section img {
                width: 100%;
            }

        }

        .swiper-container {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            /*background-size: cover;*/
            height: 100vh !important;
            background-position: center;
            background-repeat: no-repeat !important;
            padding-top: 10px;
        }

        .gallery-top {
            height: 100vh !important;
            width: 100%;
        }

        .gallery-thumbs {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .gallery-thumbs .swiper-slide {
            width: 25%;
            height: 100% !important;
            opacity: 0.4;
        }

        .gallery-thumbs .swiper-slide-thumb-active {
            opacity: 1;
        }

        .gallery-thumbs2 {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .gallery-thumbs2 .swiper-slide {
            width: 25%;
            height: 100% !important;
            opacity: 0.4;
        }

        .gallery-thumbs2 .swiper-slide-thumb-active {
            opacity: 1;
        }

        .product-details-slider .swiper-container .swiper-slide img {
            width: 100% !important;
            height: 140px;
        }

        .align-detail {
            display: inline-block;
            width: 18%;
        }

        pre.description {
            white-space: pre-wrap;
            /* Since CSS 2.1 */
            white-space: -moz-pre-wrap;
            /* Mozilla, since 1999 */
            white-space: -pre-wrap;
            /* Opera 4-6 */
            white-space: -o-pre-wrap;
            /* Opera 7 */
            word-wrap: break-word;
            /* Internet Explorer 5.5+ */
        }

        /*.pl-2 {*/
        /*padding-left: 10px !important;*/
        /*}*/


        .indicateSoi66 {
            color: #92127f;
        }

        .red {
            color: #ff0000;
            font-size: 20px !important;
            padding-left: 15px !important;
            width: 100%;
            text-align: center;
        }


        @media (max-width: 767px) {


            .star-left-section {
                display: none !important;
            }

            .star-right-section {
                display: none !important;
            }



        }

        @media (max-width: 767px) {


            .star-left-section {
                display: none !important;
            }

            .star-right-section {
                display: none !important;
            }

            .profileslide .profilepic {
                background-repeat: no-repeat !important;
            }

            .swiper-container.gallery-top {
                background-repeat: no-repeat !important;
            }

            .swiper-slide {
                height: 100% !important;
            }

            .gallery-top {
                height: 57vh !important;
            }

            .swiper-slide profilepic {
                background-size: cover !important;
            }

            .product-details-slider .swiper-container .swiper-slide img {
                width: 110% !important;
                margin-left: 18%;
                height: 130px !important;
            }

            .align-detail {
                display: inline-block;
                width: 35% !important;
                ;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .swiper-slide {
                height: 40vh !important;
            }

            .gallery-top {
                height: 40vh !important;
            }

            .align-detail {
                display: inline-block;
                width: 33% !important;
                ;
            }

            .product-details-slider .swiper-container .swiper-slide img {
                width: 110% !important;
                height: 130px;
            }
        }

        @media only screen and (min-width: 769px) and (max-width: 1024px) {
            .swiper-slide {
                height: 40vh !important;
            }

            .gallery-top {
                height: 40vh !important;
            }

            .align-detail {
                display: inline-block;
                width: 33% !important;
                ;
            }

            .product-details-slider .swiper-container .swiper-slide img {
                width: 110% !important;
                height: 130px;
            }
        }

        .imgbadge {
            width: 90px;
            height: 101px;
            display: inline-block;
            background-size: 100% 100% !important;
        }

        .username {
            display: inline-block;
            line-height: 20px;
            position: relative;
            bottom: 29px;
        }

        .boxcomment {
            background: white;
            padding-right: 0;
            padding: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            border-radius: 4px;
            position: relative;
            height: 100%;
        }

        .replay {
            position: absolute;
            right: 16px;
            bottom: 11px;
        }

        .replaybadge {
            width: 31px;
            height: 38px;
            display: inline-block;
            background-size: 100% 100% !important;
        }

        .swiper-button-next,
        .swiper-container-rtl .swiper-button-prev {
            background-image: none;
        }

        .swiper-button-prev,
        .swiper-container-rtl .swiper-button-next {
            background-image: none;
        }

        .latest-models .profiles-section-block {
            float: none;
            width: auto;
            padding: 0;
        }

        @media all and (max-width:767px) {

            .profiles-section-block {
                width: 50%;
                padding: 0 2px
            }

            .profiles-section-block-main {
                margin: 0px -2px 0
            }

            .profiles-section-block {
                margin-bottom: 4px;
            }
        }

        @media (max-width: 400px) {
            .profile-img-section {
                height: 340px;
            }
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('assets/front/js/swiper.min.js') }}"></script>
    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 0,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });

        var galleryThumbs2 = new Swiper('.gallery-thumbs2', {
            spaceBetween: 0,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });

        var galleryTop = new Swiper('.gallery-top', {
            calculateHeight: true,
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });

        var galleryTop2 = new Swiper('.gallery-top', {
            calculateHeight: true,
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs2
            }
        });

        var swiper = new Swiper('.latest-models', {
            spaceBetween: 10,
            slidesPerView: 4,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                991: {
                    slidesPerView: 3
                },
                767: {
                    slidesPerView: 2
                },
                385: {
                    slidesPerView: 1
                },
            }
        });
    </script>

    <script type="text/javascript">
        function replay(id, commentid) {
            $("#usercomment").val(id + "," + commentid);
            $("html, body").animate({
                scrollTop: $("#bottomofpage").offset().top
            }, 2000);
        }

        $(document).ready(function() {

            var e = document.getElementById("inputGroupFile01");
            $(e).change(function() {
                var myArray = e.value.split('\\');
                document.getElementById("upload-label").innerText = myArray[myArray.length - 1];

            });
        });



        function MyPopUpWin(platform) {

            var sharing_url = encodeURIComponent('{{ Request::url() }}');
            var url = '';
            if (platform == 'telegram') {
                url = "https://t.me/share/url?url=" + sharing_url + "&text=";
            } else if (platform == 'twitter') {
                url = "https://twitter.com/intent/tweet?url=" + sharing_url + "&text=";
            } else if (platform == 'vk') {
                url = "https://vk.com/share.php?url=" + sharing_url + "&title=&description=&image=&noparse=true";
            } else if (platform == 'line') {
                if (mobileAndTabletCheck()) {
                    url = "https://line.me/R/share?text=" + sharing_url;
                } else {
                    url = "https://social-plugins.line.me/lineit/share?url=" + sharing_url + "&from=line_scheme";
                }
            } else if (platform == 'whatsapp') {
                url = "https://api.whatsapp.com/send?text=" + sharing_url;
            }

            function mobileAndTabletCheck() {
                let check = false;
                (function(a) {
                    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i
                        .test(a) ||
                        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
                        .test(a.substr(0, 4))) check = true;
                })(navigator.userAgent || navigator.vendor || window.opera);
                return check;
            }


            var width = 700;
            var height = 400

            var leftPosition, topPosition;
            //Allow for borders.
            leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
            //Allow for title and status bars.
            topPosition = (window.screen.height / 2) - ((height / 2) + 50);
            //Open the window.
            window.open(url, "Window2",
                "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" +
                leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" +
                topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no");
        }
    </script>
@endpush
<?php
$badges = $badges_en;
if (\App::isLocale('th')) {
    $badges = $badges_th;
    $m1 = '<strong>คุณต้องการให้ <br  /><u> แต้ม 1 วัน 1 แต้ม</u></strong>';
    $m2 = 'ตกลง';
    $m3 = 'ยกเลิก';
    $m4 = 'บันทึกสำเร็จ';
    $m5 = 'วันนี้คุณได้ให้ผู้ใช้คนอื่นแล้ว';
    $m6 = 'ยกเลิกหารใช้แต้ม';
    $m7 = 'แต้มที่ได้';
    $m8 = 'ให้แต้ม 1 วัน 1 แต้ม';
    $m9 = 'จำนวนความคิดเห็น';
} else {
    $m1 = '<strong>You want <br /><u> 1 day 1 point</u></strong>';
    $m2 = 'OK';
    $m3 = 'Cancel';
    $m4 = 'Save successfully';
    $m5 = 'You have given it to another user today.';
    $m6 = 'Cancel division, Use points';
    $m7 = 'Points';
    $m8 = 'Give 1 point 1 day 1 point';
    $m9 = 'Comment Count';
}
?>

@section('content')
    <div class="container-contactus" style="margin-top: 60px">
        <section class="container pt-5">

            <div class="model-single-box">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-details-slider">
                            <div class="swiper-container gallery-top" id="changeheight">
                                <div class="swiper-wrapper">
                                    @foreach ($arr_model['get_images'] as $image)
                                        <div class="swiper-slide profileslide">
                                            @if (isset($image['profile_image']) &&
                                                $image['profile_image'] != '' &&
                                                file_exists($thumb_434_651_base_img_path . $image['profile_image']))
                                                <div class="swiper-slide profilepic"
                                                    style="border-radius: 10px;background-color: #f5f5f5;background-image:url({{ $thumb_434_651_public_img_path }}{{ $image['profile_image'] }});background-size: contain;background-repeat: space;">
                                                    @if ($arr_model['vaccine_status'] == 'APPROVED')
                                                        <div class="text-of-row-model"
                                                            style="height: auto;position: absolute;bottom: 0px;text-align: left;right: 55px;/*    *//*   margin-top: -10px;*//*   margin-right: 55px;*//*float: right;*/">
                                                            <img style="width: 100px !important;height: 55px !important;/*transform: rotate(40deg);*/"
                                                                src="{{ asset('theme/images/vaccination.png') }}">
                                                        </div>
                                                    @endif
                                                </div>
                                            @elseif(isset($image['profile_image']) &&
                                                $image['profile_image'] != '' &&
                                                file_exists($base_img_path . $image['profile_image']))
                                                <div class="swiper-slide"
                                                    style="    border-radius: 30px;background-color: #f5f5f5;background-image:url({{ $base_img_public_path }}{{ $image['profile_image'] }});background-size: contain;background-repeat: space;">
                                                    @if ($arr_model['vaccine_status'] == 'APPROVED')
                                                        <div class="text-of-row-model"
                                                            style="height: auto;position: absolute;bottom: 0px;text-align: left;right: 55px; /*    */ /*   margin-top: -10px;*/ /*   margin-right: 55px;*/ /*float: right;*/">
                                                            <img style="width: 100px !important;height: 55px !important; /*transform: rotate(40deg);*/"
                                                                src="{{ asset('theme/images/vaccination.png') }}">
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="swiper-slide"
                                                    style="    border-radius: 30px;background-color: #f5f5f5;background-image:url('{{ $base_img_public_path }}{{ $image['profile_image'] }}');background-size: contain;background-repeat: space;">
                                                    @if ($arr_model['vaccine_status'] == 'APPROVED')
                                                        <div class="text-of-row-model"
                                                            style="height: auto;position: absolute;bottom: 0px;text-align: left;right: 55px;/*    *//*   margin-top: -10px;*//*   margin-right: 55px;*//*float: right;*/">
                                                            <img style="width: 100px !important;height: 55px !important;/*transform: rotate(40deg);*/"
                                                                src="{{ asset('theme/images/vaccination.png') }}">
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next icon-slider"><i class="fa fa-angle-right"></i></div>
                                <div class="swiper-button-prev icon-slider"><i class="fa fa-angle-left"></i></div>
                            </div>

                            <div class="swiper-container gallery-thumbs2 pt-3 d-xl-none d-sm-block d-lg-none d-block">
                                <div class="swiper-wrapper">
                                    @foreach ($arr_model['get_images'] as $image)
                                        <div class="swiper-slide ml-2 mr-2">
                                            @if (isset($image['profile_image']) &&
                                                $image['profile_image'] != '' &&
                                                file_exists($thumb_434_651_base_img_path . $image['profile_image']))
                                                <img style="border-radius: 10px;"
                                                    src="{{ $thumb_434_651_public_img_path }}{{ $image['profile_image'] }}"
                                                    alt="No Image" />
                                            @elseif(isset($image['profile_image']) &&
                                                $image['profile_image'] != '' &&
                                                file_exists($base_img_path . $image['profile_image']))
                                                <img style="border-radius: 10px;"
                                                    src="{{ $base_img_public_path }}{{ $image['profile_image'] }}"
                                                    alt="No Image" />
                                            @else
                                                <img style="border-radius: 10px;"
                                                    src="{{ url('/') }}/assets/front/images/no-img-found.jpg"
                                                    alt="" />
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <!--                        <div class="d-xl-none d-sm-block d-lg-none d-block text-center pt-2">-->
                            <!--                          <img class="seprator-img-index" src="{{ asset('theme/images/seperator-mid.png') }}" />-->
                            <!--                        </div>-->

                        </div>
                    </div>
                    <div class="col-md-6 text-left pl-5 pb-5">
                        <div class="pt-4">
                            <!--                       <h1>-->
                            <!--                           @if (\App::isLocale('th'))-->
                            <!--                           {{ $arr_model['first_name_th'] }}-->
                            <!--                           @else-->
                            <!--                           {{ $arr_model['first_name'] }}-->
                            <!--
                                                            @endif-->
                            <!--                           </h1>-->
                            @if ($arr_model['get_companies'] != null)
                                @if ($arr_model['get_companies'][0]['company_name'] != 'MODELS')
                                    <p style="color:#009FDB; margin-bottom: -10px !important;">
                                        {{ $arr_model['get_companies'][0]['company_name'] }}
                                    </p>
                                @endif
                            @endif
                            <!--                         <p style="margin-bottom: -5px;">-->
                            <!--                             @if (\App::isLocale('th'))-->
                            <!--                            {{ $arr_model['first_name_th'] }}-->
                            <!--                            @else-->
                            <!--                            {{ $arr_model['first_name'] }}-->
                            <!-- @endif-->
                            <!--                         </p>-->

                            <div class="pt-3" style=";margin-left: -9px;margin-bottom: -10px;display: table;width: 100%; /*Optional*/table-layout: fixed; /*Optional*/border-spacing: 10px; /*Optional*/">
                                <!--                             <span class="text-model-contact align-detail" style="width: 50% !important;"> @if (\App::isLocale('th'))-->
                                <!--                                 {{ $arr_model['first_name_th'] }}-->
                                <!--                                 @else-->
                                <!--                                 {{ $arr_model['first_name'] }}-->
                                <!-- @endif-->
                                <!--                                  </span>-->

                                <div style="display: table-cell;">
                                    <img src="{{ asset('theme/images/location2.png') }}">
                                    @if (\App::isLocale('th'))

                                        @if (!empty($obj_model->locations))
                                            @foreach ($locarrays_th as $item)
                                                <div class="text-model-contact badge badge-secondary" style="top: 0px;">
                                                    {{ $item }}
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="text-model-contact badge badge-secondary" style="top: 0px;">-</div>
                                        @endif
                                    @else
                                        @if (!empty($obj_model->locations))
                                            @foreach ($locarrays as $item)
                                                <div class="text-model-contact badge badge-secondary" style="top: 0px;">
                                                    {{ $item }}
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="text-model-contact badge badge-secondary" style="top: 0px;">-</div>
                                        @endif
                                    @endif
                                </div>

                                @if ($arr_model['line'])
                                    <div style="display: table-cell;">
                                        <div
                                            style="font-size: 13px;background-color: rgb(86, 186, 46); padding: 5px;border-radius: 10px;display: inline-block;">
                                            <img src="{{ asset('theme/images/addfriend-line.png') }}"
                                                style="margin-top: -3px; width: 25px;height: 25px;">
                                            <a style="color: white;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;"
                                                href="http://line.me/ti/p/~{{ $arr_model['line'] }}">{{ $arr_model['line'] }}</a>
                                        </div>
                                    </div>
                                @endif


                            </div>

                            <!--                       <p style="color:#009FDB">-->
                            <!--                        {{ $arr_model['country'] }}-->
                            <!--                       </p>-->

                            <div class="pt-3 pb-3" style="margin-bottom: -20px;">
                                @if (\App::isLocale('th'))
                                    <?php echo '฿ ' . number_format(strip_tags($arr_model['price'])) . '/น้ำ'; ?>
                                @else
                                    <?php echo '฿ ' . number_format(strip_tags($arr_model['price'])) . '/job'; ?>
                                @endif
                            </div>

                            <!--                         <div class="pt-3">-->
                            <!--                             <div class="row text-left  mt-2" style="margin-bottom: -10px;">-->
                            <!--                                 <div class="col-md-12 col-12 body-txt">-->
                            <!--                                     <span style="text-shadow: 1px 0px #000000;" class="align-detail">{{ trans('list_details.name') }} : </span>-->
                            <!--                                     <span class="pl-2">-->
                            <!--                                         @if (\App::isLocale('th'))-->
                            <!--                                      {{ $arr_model['first_name_th'] }}-->
                            <!--                                      @else-->
                            <!--                                      {{ $arr_model['first_name'] }}-->
                                                                   <!-- @endif-->
                            <!--                                     </span>-->
                            <!--                                 </div>-->
                            <!--                             </div>-->
                            <!--                         </div>-->

                            <div class="pt-2">

                                <div class="row text-left  mt-2" style="margin-bottom: -10px;">
                                    <div class="col-md-12 col-12 body-txt">
                                        <span style="text-shadow: 1px 0px #000000;"
                                            class="align-detail">{{ trans('list_details.name') }} : </span>
                                        <span class="pl-2">
                                            @if (\App::isLocale('th'))
                                                {{ $arr_model['first_name_th'] }}
                                            @else
                                                {{ $arr_model['first_name'] }}
                                            @endif
                                        </span>
                                    </div>
                                    {{--  <div style="padding:0" class="col-md-9 col-9 text-left"> </div> --}}
                                </div>

                                <div class="row text-left  mt-2" style="margin-bottom: -10px;">
                                    <div class="col-md-12 col-12 body-txt">
                                        <span style="text-shadow: 1px 0px #000000;"
                                            class="align-detail">{{ trans('list_details.age') }} : </span>
                                        <span class="pl-2"> {{ $arr_model['age'] }} </span>
                                    </div>
                                    {{--  <div style="padding:0" class="col-md-9 col-9 text-left"></div> --}}
                                </div>

                                @if (isset($arr_model['height']) && $arr_model['height'] !== '')
                                    <div class="row text-left mt-2" style="margin-bottom: -10px;">
                                        <div class="col-md-12 col-12 body-txt">
                                            <span style="text-shadow: 1px 0px #000000;"
                                                class="align-detail">{{ trans('list_details.height') }} : </span>
                                            <span class="pl-2"> {{ $arr_model['height'] }} </span>
                                        </div>
                                        {{--  <div style="padding:0" class="col-md-9 col-9 text-left"></div> --}}
                                    </div>
                                @endif

                                @if (isset($arr_model['weight']) && $arr_model['weight'] !== '')
                                    <div class="row text-left mt-2" style="margin-bottom: -10px;">
                                        <div class="col-md-12 col-12 body-txt">
                                            <span style="text-shadow: 1px 0px #000000;"
                                                class="align-detail">{{ trans('list_details.weight') }} : </span>
                                            <span class="pl-2"> {{ $arr_model['weight'] }} </span>
                                        </div>
                                        {{--  <div style="padding:0" class="col-md-9 col-9 text-left"> </div> --}}
                                    </div>
                                @endif

                                <div class="row text-left mt-2" style="margin-bottom: -10px;">
                                    <div class="col-md-12 col-12 body-txt">
                                        <span style="text-shadow: 1px 0px #000000;"
                                            class="align-detail">{{ trans('list_details.body size') }} : </span>
                                        <span class="pl-2">
                                            @if ($arr_model['size'])
                                                {{ $arr_model['size'] }}
                                            @else
                                                {{ 'NA' }}
                                            @endif
                                        </span>
                                    </div>
                                    {{--  <div style="padding:0" class="col-md-9 col-9 text-left"></div> --}}
                                </div>

                                <div class="row text-left mt-2" style="margin-bottom: -10px;">
                                    <div class="col-md-12 col-12 body-txt">
                                        <span style="text-shadow: 1px 0px #000000;"
                                            class="align-detail">{{ trans('list_details.available') }} : </span>
                                        <span class="pl-2">{{ $arr_model['from_time'] }} -
                                            {{ $arr_model['to_time'] }}</span>
                                    </div>
                                    {{--  <div style="padding:0" class="col-md-9 col-9 text-left"></div> --}}
                                </div>
                            </div>

                            <div class="pt-3 pb-3" style="margin-bottom: -20px;">

                                <div class="align-detail" style="display:inline-block;  vertical-align: top;">
                                    <span style="text-shadow: 1px 0px #000000;">
                                        {{ trans('list_details.service') }} :
                                    </span>
                                </div>
                                <div style="display:inline-block;width: 60%;  vertical-align: top;margin-top: -5px;">
                                    @foreach ($arr_model['get_models_services'] as $model_services)
                                        @foreach ($arr_services as $services)
                                            @if ($model_services['service_id'] == $services['id'])
                                                <span class="badge badge-secondary badge-simple mt-2">
                                                    @if (\App::isLocale('th'))
                                                        {{ $services['service_name_th'] }}
                                                    @else
                                                        {{ $services['service_name'] }}
                                                    @endif
                                                </span>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>


                            </div>

                            <div class="pt-3" style="margin-bottom: -10px;padding-top: 0px !important;">
                                @if ($arr_model['last_name'])
                                    <div style="margin-bottom: -10px;">
                                        <span class="text-model-contact align-detail"><img
                                                src="{{ asset('theme/images/whatsapp.png') }}">&nbsp;{{ trans('list_details.whatsapp') }}
                                            : </span>
                                        <span class="text-model-contact">
                                            <a
                                                href="https://wa.me/{{ str_replace('+', '', $arr_model['last_name']) }}">{{ $arr_model['last_name'] }}</a>
                                        </span>
                                        <!--                            <span class="text-model-contact">{{ trans('list_details.whatsapp') }} :-->
                                        <!--                              @if ($arr_model['last_name']) -->
                                        <!--                                                     <a href="https://wa.me/{{ str_replace('+', '', $arr_model['last_name']) }}">{{ $arr_model['last_name'] }}</a>-->
                                    <!--                                                @else-->
                                        <!--                                                   --->
                                        <!-- @endif-->
                                        <!--                            </span>-->
                                    </div>
                                @endif
                                <!--                           @if ($arr_model['line']) -->
                                <!--                          <div class="pt-3" style="margin-bottom: -10px;">-->
                                <!--                              <span class="text-model-contact align-detail"><img src="{{ asset('theme/images/line.png') }}">&nbsp;{{ trans('list_details.line') }} : </span>-->
                                <!--                              <span class="text-model-contact">-->
                                <!--                                  <a href="http://line.me/ti/p/~{{ $arr_model['line'] }}">{{ $arr_model['line'] }}</a>-->
                                <!--                              </span>-->
                                <!--                          </div>-->
                                <!-- @endif-->
                                @if ($arr_model['wechat'])
                                    <div class="pt-3" style="margin-bottom: -10px;">
                                        <span class="text-model-contact align-detail"><img
                                                src="{{ asset('theme/images/wechat-svg.png') }}">&nbsp;{{ trans('list_details.wechat') }}
                                            : </span>
                                        <span class="text-model-contact">
                                            {{ $arr_model['wechat'] }}
                                        </span>
                                        <!--                            <span class="text-model-contact">{{ trans('list_details.wechat') }} :-->
                                        <!--                              @if ($arr_model['wechat'])-->
                                        <!--                                                    <div>{{ $arr_model['wechat'] }}</div>-->
                                    <!--                                                @else-->
                                        <!--                                                   --->
                                        <!-- @endif-->
                                        <!--                            </span>-->
                                    </div>
                                @endif
                            </div>

                            <div class="pt-3">
                                <div class="row text-left  mt-2" style="margin-bottom: -10px;">
                                    <div class="col-md-12 col-12 body-txt">
                                        <span style="text-shadow: 1px 0px #b735ff;"
                                            class="align-detail">{{ trans('list_details.shareNow') }} : </span>
                                        <span class="pl-2">
                                            <img onclick="MyPopUpWin('telegram')"
                                                src="{{ asset('theme/images/telegram.png') }}"
                                                style=" margin-top: -3px; width: 30px;height: 30px">
                                            <img onclick="MyPopUpWin('twitter')"
                                                src="{{ asset('theme/images/twitter.png') }}"
                                                style=" margin-top: -3px; width: 30px;height: 30px">
                                            <img onclick="MyPopUpWin('vk')" src="{{ asset('theme/images/vk.png') }}"
                                                style=" margin-top: -3px; width: 30px;height: 30px">
                                            <img onclick="MyPopUpWin('line')" src="{{ asset('theme/images/line.png') }}"
                                                style=" margin-top: -3px; width: 30px;height: 30px">
                                            <img onclick="MyPopUpWin('whatsapp')"
                                                src="{{ asset('theme/images/whatsapp.png') }}"
                                                style=" margin-top: -3px; width: 30px;height: 30px">
                                        </span>
                                    </div>
                                    {{--  <div style="padding:0" class="col-md-9 col-9 text-left">

                                 </div> --}}
                                </div>
                            </div>

                            @if ($arr_model['bio'])
                                <div class="pt-3">
                                    <div class="row text-left mt-2">
                                        <div class="col-md-12 col-12 body-txt">
                                            <span style="text-shadow: 1px 0px #000000;">{{ trans('list_details.bio') }} :
                                            </span>
                                            <div class="pl-2" style="margin-top: 10px"> {!! html_entity_decode($arr_model['bio']) !!} </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <Comment-Vue></Comment-Vue>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="product-details-slider">
                        <div class="swiper-container gallery-thumbs d-xl-block d-sm-none d-lg-block d-none">
                            <div class="swiper-wrapper">
                                @foreach ($arr_model['get_images'] as $image)
                                    <div class="swiper-slide ml-2 mr-2">
                                        @if (isset($image['profile_image']) &&
                                            $image['profile_image'] != '' &&
                                            file_exists($thumb_434_651_base_img_path . $image['profile_image']))
                                            <img style="border-radius: 10px;"
                                                src="{{ $thumb_434_651_public_img_path }}{{ $image['profile_image'] }}"
                                                alt="No Image" />
                                        @elseif(isset($image['profile_image']) &&
                                            $image['profile_image'] != '' &&
                                            file_exists($base_img_path . $image['profile_image']))
                                            <img style="border-radius: 10px;"
                                                src="{{ $base_img_public_path }}{{ $image['profile_image'] }}"
                                                alt="No Image" />
                                        @else
                                            <img style="border-radius: 10px;"
                                                src="{{ url('/') }}/assets/front/images/no-img-found.jpg"
                                                alt="" />
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <p style="padding-top:10px">
                        {{ trans('index.textsinglemodel') }}
                    </p>

                    <!--                       <div class="d-xl-none d-sm-block d-lg-none d-block text-center pt-2">-->
                    <!--                          <img class="seprator-img-index" src="{{ asset('theme/images/seperator-mid.png') }}" />-->
                    <!--                      </div>-->
                </div>

                <div class="col-md-12 col-12 pt-3 pt-md-3">
                    <div class="text-left">

                        @if (count($obj_comment) > 0)
                            <h5 class="pl-5"> {{ trans('list_details.previous comments') }} : </h5>
                            @foreach ($obj_comment as $comment)
                                <?php
                                //print_r($comment);
                                ?>
                                <div class="container-comments mt-4">
                                    <div class="row">
                                        <div class="col-xl-2 col-md-4 col-12 text-center">

                                            <?php $user = finduser($comment->model_user_id);
                                            $rank = $user->rank; ?>
                                            @if (isset($arr_user) && $arr_user != null)
                                                @if ($finduser == $user->id)
                                                    <a href="{{ asset('profile') }}">
                                                    @else
                                                        <a href="{{ asset('profile/' . $comment->model_user_id) }}">
                                                @endif
                                            @else
                                                <a href="{{ asset('user_register') }}">
                                            @endif

                                            @if ($user->admin_status == 3)
                                                <img style="height: 115px" src="{{ asset('assets/badges/admin.png') }}">
                                            @elseif($user->admin_status == 1 || $user->admin_status == 2)
                                                <img style="height: 115px"
                                                    src="{{ asset('assets/badges/advertiser.png') }}">
                                            @else
                                                {{--
                                    @if ($rank > 0 && $rank <= 75)
                                                    <img style="height: 115px" src="{{asset($badges[0]['image'])}}">
                                                    @elseif($rank > 75 && $rank <= 150)
                                                        <img style="height: 115px" src="{{asset($badges[1]['image'])}}">
                                                    @elseif($rank > 150 && $rank <= 225)
                                                        <img style="height: 115px" src="{{asset($badges[2]['image'])}}">
                                                    @elseif($rank > 225 && $rank <= 300)
                                                        <img style="height: 115px" src="{{asset($badges[3]['image'])}}">
                                                    @elseif($rank > 300 && $rank <= 375)
                                                        <img style="height: 115px" src="{{asset($badges[4]['image'])}}">
                                                    @elseif($rank > 375 && $rank <= 450)
                                                        <img style="height: 115px" src="{{asset($badges[5]['image'])}}">
                                                    @elseif($rank > 450 && $rank <= 525)
                                                        <img style="height: 115px" src="{{asset($badges[6]['image'])}}">
                                                    @elseif($rank > 525)
                                                        <img style="height: 115px" src="{{asset($badges[7]['image'])}}">
                                                    @else
                                                        <img style="height: 115px" src="{{asset($badges[0]['image'])}}">
                                                    @endif
                                                  --}}
                                            @endif
                                            <img style="height: 150px" class="badges"
                                                src="{{ asset('assets/badges/' . $user->badges_system_id . '.png') }}"alt=""
                                                class="img-rounded" />

                                            <div class=" pt-2" style="color:#03BAFF">
                                                @if ($user->admin_status == 1)
                                                    Advertiser
                                                @elseif($user->admin_status == 2)
                                                    Moderator
                                                @elseif($user->admin_status == 3)
                                                    Admin
                                                @else
                                                    {{--
                                                        @if ($rank > 0 && $rank <= 75)
                                      {{$badges[0]['question']}}
                                                          @elseif($rank > 75 && $rank <= 150)
                                      {{$badges[1]['question']}}
                                                          @elseif($rank > 150 && $rank <= 225)
                                      {{$badges[2]['question']}}
                                                          @elseif($rank > 225 && $rank <= 300)
                                      {{$badges[3]['question']}}
                                                          @elseif($rank > 300 && $rank <= 375)
                                      {{$badges[4]['question']}}
                                                          @elseif($rank > 375 && $rank <= 450)
                                      {{$badges[5]['question']}}
                                                          @elseif($rank > 450 && $rank <= 525)
                                      {{$badges[6]['question']}}
                                                          @elseif($rank > 525)
                                      {{$badges[7]['question']}}
                                                          @else
                                      {{$badges[0]['question']}}
                                                          @endif
                                                          --}}
                                                @endif
                                                <?php
                                                // print_r($badges);
                                                //print_r($user->badges_point);
                                                if ($user->badges_point >= 0 && $user->badges_point < 75) {
                                                    print 'First Rank';
                                                } elseif ($user->badges_point >= 75 && $user->badges_point < 150) {
                                                    print '2nd Rank';
                                                } elseif ($user->badges_point >= 150 && $user->badges_point < 225) {
                                                    print '3rd Rank';
                                                } elseif ($user->badges_point >= 225 && $user->badges_point < 300) {
                                                    print '4th Rank';
                                                } elseif ($user->badges_point >= 300 && $user->badges_point < 375) {
                                                    print '5th Rank';
                                                } elseif ($user->badges_point >= 375 && $user->badges_point < 450) {
                                                    print '6th Rank';
                                                } elseif ($user->badges_point >= 450 && $user->badges_point < 525) {
                                                    print '7th Rank';
                                                } elseif ($user->badges_point >= 525 && $user->badges_point < 9999999) {
                                                    print '8th Rank';
                                                } else {
                                                    print '9th Rank';
                                                }
                                                ?>
                                            </div>

                                            <div class="pt-2" style="color:#707070">
                                                {{ $comment->get_users->first()->user_name }}
                                            </div>
                                            </a>
                                            <div class="pt-2" style="color:black">
                                                <?php print $m9; ?> : {{ getmycomments($comment->user_id) }}
                                                <!--                                      Rank : {{ $rank }}-->
                                            </div>
                                            <div class="pt-1" style="color:black">

                                                <?php print $m7; ?> : <b class="point">{{ $user->badges_point }}</b>
                                            </div>
                                            <div class="pt-1">
                                                <?php
                                                $star = $user->badges_point / 50;

                                                if (intval($star) > 1) {
                                                    for ($i = 0; $i < intval($star); $i++) {
                                                        // print($i);
                                                        //print("<i class='fa fa-star fa-2x' style='color: #f33535'></i>");
                                                        print '<i class="bi bi-square-fill fs-2x" style="color: #0EFF00"></i> ';
                                                    }
                                                }
                                                $star = $user->badges_point % 50;
                                                if ($star >= 25 && $star < 50) {
                                                    print "<i class='bi bi-square-half fs-2x' style='color: #053B01'></i>";
                                                }

                                                ?>
                                            </div>
                                            <div class="pt-2">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                <span style="color:#03BAFF">
                                                    {{ date('Y-m-d H:i', strtotime('+7 hour', strtotime($comment->created_at))) }}
                                                </span>
                                            </div>
                                            <?php
                                  //print_r($arr_user);
                                  if(isset($arr_user) && $arr_user!= null){
                                  ?>
                                            <div class="pt-2">
                                                <input type="button" class="btn btn-info"
                                                    onclick="b('{{ $comment->user_id }}')"
                                                    style="width: auto;padding-left:50px;padding-right:50px;"
                                                    value=" <?php print $m8; ?>">
                                            </div>
                                            <?php
                                    }
                                  ?>
                                        </div>

                                        <div class="col-xl-10 col-md-8 col-12 text-left">
                                            <p class="pt-4">
                                                {{ $comment->comment }}
                                            </p>
                                            @if (!empty($comment->image))
                                                <img class="mt-2" src="{{ asset($comment->image) }}"
                                                    style="max-height:200px;border-radius:15px;">
                                            @endif


                                            <?php $i = 1; ?>
                                            @foreach (getreplaycomments($arr_model['id'], $comment->get_users->first()->id, $comment->id) as $replay)
                                                <?php $replayuser = finduser($replay->user_id);
                                                $rank = finduser($replay->user_id)->rank; ?>
                                                @if (!empty($replayuser))
                                                    @if ($i > 1)
                                                        <hr />
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-md-2 col-12 text-center">
                                                            @if ($replayuser->admin_status == 3)
                                                                <img style="height: 115px"
                                                                    src="{{ asset('assets/badges/admin.png') }}">
                                                            @elseif($replayuser->admin_status == 1 || $replayuser->admin_status == 2)
                                                                <img style="height: 115px"
                                                                    src="{{ asset('assets/badges/advertiser.png') }}">
                                                            @else
                                                                @if ($rank > 0 && $rank <= 75)
                                                                    <img style="height: 115px"
                                                                        src="{{ asset($badges[0]['image']) }}">
                                                                @elseif($rank > 75 && $rank <= 150)
                                                                    <img style="height: 115px"
                                                                        src="{{ asset($badges[1]['image']) }}">
                                                                @elseif($rank > 150 && $rank <= 225)
                                                                    <img style="height: 115px"
                                                                        src="{{ asset($badges[2]['image']) }}">
                                                                @elseif($rank > 225 && $rank <= 300)
                                                                    <img style="height: 115px"
                                                                        src="{{ asset($badges[3]['image']) }}">
                                                                @elseif($rank > 300 && $rank <= 375)
                                                                    <img style="height: 115px"
                                                                        src="{{ asset($badges[4]['image']) }}">
                                                                @elseif($rank > 375 && $rank <= 450)
                                                                    <img style="height: 115px"
                                                                        src="{{ asset($badges[5]['image']) }}">
                                                                @elseif($rank > 450 && $rank <= 525)
                                                                    <img style="height: 115px"
                                                                        src="{{ asset($badges[6]['image']) }}">
                                                                @elseif($rank > 525)
                                                                    <img style="height: 115px"
                                                                        src="{{ asset($badges[7]['image']) }}">
                                                                @else
                                                                    <img style="height: 115px"
                                                                        src="{{ asset($badges[0]['image']) }}">
                                                                @endif
                                                            @endif
                                                            <div class=" pt-1" style="color:#03BAFF">
                                                                @if ($replayuser->admin_status == 1)
                                                                    Advertiser
                                                                @elseif($replayuser->admin_status == 2)
                                                                    Moderator
                                                                @elseif($replayuser->admin_status == 3)
                                                                    Admin
                                                                @else
                                                                    @if ($rank > 0 && $rank <= 75)
                                                                        {{ $badges[0]['question'] }}
                                                                    @elseif($rank > 75 && $rank <= 150)
                                                                        {{ $badges[1]['question'] }}
                                                                    @elseif($rank > 150 && $rank <= 225)
                                                                        {{ $badges[2]['question'] }}
                                                                    @elseif($rank > 225 && $rank <= 300)
                                                                        {{ $badges[3]['question'] }}
                                                                    @elseif($rank > 300 && $rank <= 375)
                                                                        {{ $badges[4]['question'] }}
                                                                    @elseif($rank > 375 && $rank <= 450)
                                                                        {{ $badges[5]['question'] }}
                                                                    @elseif($rank > 450 && $rank <= 525)
                                                                        {{ $badges[6]['question'] }}
                                                                    @elseif($rank > 525)
                                                                        {{ $badges[7]['question'] }}
                                                                    @else
                                                                        {{ $badges[0]['question'] }}
                                                                    @endif
                                                                @endif
                                                            </div>

                                                            @if ($finduser == $user->id)
                                                                <a href="{{ asset('profile') }}">
                                                                @else
                                                                    <a href="{{ asset('profile/' . $replayuser->id) }}">
                                                            @endif
                                                            <div class="pt-1" style="color:#707070">
                                                                {{ $replayuser->user_name }}
                                                            </div>
                                                            </a>
                                                            <div class="pt-1">
                                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                <span
                                                                    style="color:#03BAFF">{{ date('Y-m-d H:i', strtotime('+7 hour', strtotime($replay->created_at))) }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col-12 text-left">
                                                            <p class="pt-4" style="margin-left: 15px">
                                                                {{ $replay->comment }}
                                                            </p>
                                                            @if (!empty($replay->image))
                                                                <img class="mt-2" src="{{ asset($replay->image) }}"
                                                                    style="max-height:200px;border-radius:15px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <?php $i++; ?>
                                                @endif
                                            @endforeach


                                        </div>
                                    </div>

                                    <div onclick="replay({{ $comment->model_user_id }},{{ $comment->id }})"
                                        class="replay" style="color:#2699FB">
                                        <i style="color: #2699FB;" class="fa fa-reply"> </i> Reply
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!--                              <div class="row">-->
                            <!--                                <div class="col-md-12 col-12 text-left">-->
                            <!--                                  <p class="pt-4">-->
                            <!--                                    {{ trans('list_details.the comment section is empty') }}-->
                            <!--                                  </p>-->
                            <!--                                </div>-->
                            <!--                              </div>-->
                        @endif



                        <!--                          <br />-->
                        <!--                          <br />-->
                        <!--                          <br />-->


                        <!--                          <div class="container">-->
                        <!--                              <div class="row">-->
                        <!--                                  <div class="col-lg-6 offset-lg-3 py-1 d-flex">-->
                        <!--                                       {{ $obj_comment->links() }}-->
                        <!--                                  </div>-->
                        <!--                              </div>-->
                        <!--                          </div>-->
                        @if (isset($arr_user) && $arr_user != null)

                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close close-btn1" data-dismiss="alert"
                                        aria-label="close">&times;</a>
                                    {{ trans('list_details.commenterror') }}
                                </div>
                            @endif
                            <div id="bottomofpage" class="ads-banners-seciton-head">
                                {{ trans('list_details.write a comment') }}
                            </div>
                            <form action="{{ url('/comment') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="model_added_by_id" value="{{ $arr_model['user_id'] }}">
                                <div class="form-group text-left">
                                    <label>{{ trans('list_details.comment') }}</label>
                                    <textarea name="comment" style="padding: 3.5rem 0.75rem;" class="form-control">{{ old('comment') }}</textarea>
                                    <input type="hidden" name="model_id" value="{{ $arr_model['id'] }}">
                                    <input type="hidden" name="user_id" value="{{ $arr_user['id'] }}">
                                </div>

                                <div class="col-7 col-md-6 p-0 p-md-0">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label id="upload-label"
                                                style="border: 1px solid rgb(238, 90, 60);color: #707070b5;border-radius: 20px;width: 100%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; "
                                                class="custom-file-label" for="inputGroupFile01">Upload Picture</label>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="usercomment" id="usercomment">

                                <button class="btn btn-pr mt-3" style="width: auto;padding-left:50px;padding-right:50px;">
                                    {{ trans('list_details.add') }}
                                </button>
                            </form>
                        @else
                            <div class="row">
                                <div class="col-md-12 col-12"
                                    style="padding-top: 0px !important;text-align: center!important;">
                                    <p class="pt-4" style="padding-top: 0px !important;">
                                        <a href="javascript:void(0)" data-toggle="modal"
                                            data-target=".bd-example-modal-lg">{{ trans('list_details.you must log in') }}</a>
                                        {{ trans('list_details.toPostComment') }}.
                                    </p>
                                    <img class="mt-2" src="" style="height:80px;border-radius:15px;">
                                </div>
                            </div>
                        @endif


                    </div>



                    <div class="mt-5" style="margin-top:0px !important;">
                        <div class="ads-banners-seciton-head">
                            {{ trans('list_details.latestModel') }}
                        </div>
                        <!--   <div class="text-center pt-2 pb-5">-->
                        <!--     <img class="seprator-img-index" src="{{ asset('theme/images/seperator-mid.png') }}" />-->
                        <!--   </div>-->
                        <div class="swiper-container latest-models">
                            <div class="swiper-wrapper">
                                @foreach ($arr_all_model as $models)
                                    <div class="swiper-slide">
                                        <a href="{{ url('/list_details') }}/{{ base64_encode($models['id']) }}"
                                            class="profiles-section-block">
                                            <div class="profiles-section-block-inner">
                                                <div class="profile-img-section">
                                                    @if (isset($models['get_images'][0]['profile_image']) &&
                                                        $models['get_images'][0]['profile_image'] != '' &&
                                                        file_exists($base_img_path . $models['get_images'][0]['profile_image']))
                                                        <img src="{{ $base_img_public_path }}{{ $models['get_images'][0]['profile_image'] }}"
                                                            alt="no" />
                                                    @else
                                                        <img src="{{ url('/') }}/assets/front/images/profile-img-1.jpg"
                                                            alt="" />
                                                    @endif
                                                </div>
                                                {{--  <div class="profile-name-seciton-block">
                                                  <i class="fas fa-star star-left-section"></i> <span class="scroll1">
                                                      <span>
                                                          @if (isset($models['get_category'][0]['category_name']))
                                                          {{(($models['get_category'][0]['category_name']))}}
                                                          @else
                                                          {{'Not Set'}}
                                                          @endif
                                                      </span>
                                                  </span> <i class="fas fa-star star-right-section"></i>
                                                  <div class="clearfix"></div>
                                              </div> --}}
                                                {{-- <div class="proile-information-seciton-main">
                                                   <!-  <div class="profile-country-name">-->
                                                   <!-      {{$models['country']}}-->
                                                   <!-  </div>-->
                                                  <div class="proile-information-seciton">
                                                      <div class="proile-information-box">
                                                          <div class="proile-information-box-head">
                                                              {{ trans('index.model name') }}:
                                                          </div>
                                                          <div class="proile-information-box-text">
                                                              @if (\App::isLocale('th'))
                                                              {{$arr_model['first_name_th']}}
                                                              @else
                                                              {{$arr_model['first_name']}}
                                                              @endif
                                                          </div>
                                                          <div class="clearfix"></div>
                                                      </div>
                                                      <!--  <div class="proile-information-box">-->
                                                      <!--      <div class="proile-information-box-head">-->
                                                      <!--          {{ trans('index.country') }}:-->
                                                      <!--      </div>-->
                                                      <!--      <div class="proile-information-box-text">-->
                                                      <!--          {{$models['country']}}-->
                                                      <!--      </div>-->
                                                      <!--      <div class="clearfix"></div>-->
                                                      <!--  </div>-->
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
                                              </div> --}}
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next icon-slider"><i class="fa fa-angle-right"></i></div>
                            <div class="swiper-button-prev icon-slider"><i class="fa fa-angle-left"></i></div>
                        </div>
                    </div>

                </div>

            </div>


        </section>
        <!---->
        <br />
        <!--    <br />-->
        <!--    <br />-->

    </div>


    <script>
        function b(user_id) {
            Swal.fire({
                title: '<?php print $m1; ?>',
                icon: 'info',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> <?php print $m2; ?>!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText: '<i class="fa fa-thumbs-down"></i> <?php print $m3; ?>',
                cancelButtonAriaLabel: 'Thumbs down'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    let formData = new FormData();
                    formData.append('id', user_id);
                    $.ajax({
                            type: 'POST',
                            url: '{{ url('/badges') }}',
                            data: formData,
                            async: false,
                            cache: false,
                            contentType: false,
                            enctype: 'multipart/form-data',
                            processData: false,
                        })
                        .done(function(data) {
                            console.log(data);
                            if (data.success) {
                                //console.log(data.badges_point);
                                $(".point").html(data.badges_point);
                                var img = "{{ asset('assets/badges') }}/" + data.badges_system_id + ".png";
                                console.log(img);
                                $(".badges").attr("src", img);
                                Swal.fire('<?php print $m4; ?>', '', 'success')
                            } else {
                                Swal.fire('<?php print $m5; ?>', '', 'warning')
                            }
                        }).fail(function(res) {

                        });

                } else if (result.isDenied) {
                    Swal.fire('<?php print $m6; ?>', '', 'info')
                }
            })
        }
    </script>
@stop
