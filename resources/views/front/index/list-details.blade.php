<!DOCTYPE html>
<html lang="en">
@section('title','แบบ '.$arr_model['first_name'])
@section('metadesc',$arr_model['meta_desc'])
<!--Header Section  Start-->
    @include('front.layout.header')
<!--Header Section End -->
<link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}" />
<body>

    <style type="text/css">
        div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}

.control {
  position: relative;
  display: inline-block;
  padding-left: 1.5rem;
  color: #555;
  cursor: pointer;
}
.control input {
  position: absolute;
  opacity: 0;
  z-index: -1; /* Put the input behind the label so it doesn't overlay text */
}
.control-indicator {
  position: absolute;
  top: .25rem;
  left: 0;
  display: block;
  width:  1rem;
  height: 1rem;
  line-height: 1rem;
  font-size: 65%;
  color: #eee;
  text-align: center;
  background-color: #eee;
  background-size: 50% 50%;
  background-position: center center;
  background-repeat: no-repeat;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

/* Hover state */
/* Uncomment if you need it, but be aware of the sticky iOS states.
.control:hover .control-indicator {
  color: #fff;
  background-color: #ccc;
}
*/

/* Focus */
.control input:focus ~ .control-indicator {
  box-shadow: 0 0 0 .075rem #fff, 0 0 0 .2rem #0074d9;
}

/* Checked state */
.control input:checked ~ .control-indicator {
  color: #fff;
  background-color: #0074d9;
}

/* Active */
.control input:active ~ .control-indicator {
  color: #fff;
  background-color: #84c6ff;
}

/* Checkbox modifiers */
.checkbox .control-indicator {
  border-radius: .25rem;
}
.checkbox input:checked ~ .control-indicator {
  background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNy4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgOCA4IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA4IDgiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHBhdGggZmlsbD0iI0ZGRkZGRiIgZD0iTTYuNCwxTDUuNywxLjdMMi45LDQuNUwyLjEsMy43TDEuNCwzTDAsNC40bDAuNywwLjdsMS41LDEuNWwwLjcsMC43bDAuNy0wLjdsMy41LTMuNWwwLjctMC43TDYuNCwxTDYuNCwxeiINCgkvPg0KPC9zdmc+DQo=);
}

/* Radio modifiers */
.radio .control-indicator {
  border-radius: 50%;
}
.radio input:checked ~ .control-indicator {
  background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNy4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgOCA4IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA4IDgiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHBhdGggZmlsbD0iI0ZGRkZGRiIgZD0iTTQsMUMyLjMsMSwxLDIuMywxLDRzMS4zLDMsMywzczMtMS4zLDMtM1M1LjcsMSw0LDF6Ii8+DQo8L3N2Zz4NCg==);
}

/* Alternately, use another character */
.control-x input:checked ~ .control-indicator {
  background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNy4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iOHB4IiBoZWlnaHQ9IjhweCIgdmlld0JveD0iMCAwIDggOCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgOCA4IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik0xLjQsMEwwLDEuNGwwLjcsMC43bDEuOCwxLjhMMC43LDUuN0wwLDYuNGwxLjQsMS40bDAuNy0wLjdsMS44LTEuOGwxLjgsMS44bDAuNywwLjdsMS40LTEuNEw3LjEsNS43DQoJTDUuMywzLjlsMS44LTEuOGwwLjctMC43TDYuNCwwTDUuNywwLjdMMy45LDIuNUwyLjEsMC43QzIuMSwwLjcsMS40LDAsMS40LDB6Ii8+DQo8L3N2Zz4NCg==);
}
.control-dash input:checked ~ .control-indicator {
  background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNy4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iOHB4IiBoZWlnaHQ9IjhweCIgdmlld0JveD0iMCAwIDggOCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgOCA4IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik0wLDN2Mmg4VjNIMHoiLz4NCjwvc3ZnPg0K)
}



/*
 * Select
 */

.select {
  position: relative;
  display: inline-block;
  color: #555;
}
.select select {
  display: inline-block;
  width: 100%;
  margin: 0;
  padding: .5rem 2.25rem .5rem 1rem;
  line-height: 1.5;
  color: #555;
  background-color: #eee;
  border: 0;
  border-radius: .25rem;
  cursor: pointer;
  outline: 0;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}
/* Undo the Firefox inner focus ring */
.select select:focus:-moz-focusring {
  color: transparent;
  text-shadow: 0 0 0 #000;
}
/* Dropdown arrow */
.select:after {
  position: absolute;
  top: 50%;
  right: 1.25rem;
  display: inline-block;
  content: "";
  width: 0;
  height: 0;
  margin-top: -.15rem;
  pointer-events: none;
  border-top: .35rem solid;
  border-right: .35rem solid transparent;
  border-bottom: .35rem solid transparent;
  border-left: .35rem solid transparent;
}

/* Hover state */
/* Uncomment if you need it, but be aware of the sticky iOS states.
.select select:hover {
  background-color: #ddd;
}
*/

/* Focus */
.select select:focus {
  box-shadow: 0 0 0 .075rem #fff, 0 0 0 .2rem #0074d9;
}

/* Active/open */
.select select:active {
  color: #fff;
  background-color: #0074d9;
}

/* Hide the arrow in IE10 and up */
.select select::-ms-expand {
  display: none;
}

/* Media query to target Firefox only */
@-moz-document url-prefix() {
  /* Firefox hack to hide the arrow */
  .select select {
    text-indent: 0.01px;
    text-overflow: '';
    padding-right: 1rem;
  }

  /* <option> elements inherit styles from <select>, so reset them. */
  .select option {
    background-color: #fff;
  }
}

/* IE9 hack to hide the arrow */
@media screen and (min-width:0\0) {
  .select select {
    z-index: 1;
    padding: .5rem 1.5rem .5rem 1rem;
  }
  .select:after {
    z-index: 5;
  }
  .select:before {
    position: absolute;
    top: 0;
    right: 1rem;
    bottom: 0;
    z-index: 2;
    content: "";
    display: block;
    width: 1.5rem;
    background-color: #eee;
  }
  .select select:hover,
  .select select:focus,
  .select select:active {
    color: #555;
    background-color: #eee;
  }
}



/*
 * File
 */

.file {
  position: relative;
  display: inline-block;
  cursor: pointer;
  height: 3.5rem;
}
.file input {
  min-width: 14rem;
  margin: 0;
  filter: alpha(opacity=0);
  opacity: 0;
}
.file-custom {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  z-index: 5;
  height: 3.5rem;
  padding: .5rem 1rem;
  line-height: 1.5;
  color: #555;
  background-color: #fff;
  border: .075rem solid #ddd;
  border-radius: .25rem;
  box-shadow: inset 0 .2rem .4rem rgba(0,0,0,.05);
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.file-custom:after {
  content: "{{ trans('list_details.choosepicture') }}";
}
.file-custom:before {
  position: absolute;
  top: -.075rem;
  right: -.075rem;
  bottom: -.075rem;
  z-index: 6;
  display: block;
  content: "{{ trans('list_details.browse') }}";
  height: 3.4rem;
  padding: .5rem 1rem;
  line-height: 1.5;
  color: #555;
  background-color: #eee;
  border: .075rem solid #ddd;
  border-radius: 0 .25rem .25rem 0;
}

/* Focus */
.file input:focus ~ .file-custom {
  box-shadow: 0 0 0 .075rem #fff, 0 0 0 .2rem #0074d9;
}



/*
 * Progress
 */

.progress {
  display: inline-block;
  height: 1rem;
}
.progress[value] {
  /* Reset the default appearance */
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  /* Remove Firefox and Opera border */
  border: 0;
  /* IE10 uses `color` to set the bar background-color */
  color: #0074d9;
}
.progress[value]::-webkit-progress-bar {
  background-color: #eee;
  border-radius: .2rem;
}
.progress[value]::-webkit-progress-value {
  background-color: #0074d9;
  border-top-left-radius: .2rem;
  border-bottom-left-radius: .2rem;
}
.progress[value="100"]::-webkit-progress-value {
  border-top-right-radius: .2rem;
  border-bottom-right-radius: .2rem;
}

/* Firefox styles must be entirely separate or it busts Webkit styles. */
@-moz-document url-prefix() {
  .progress[value] {
    background-color: #eee;
    border-radius: .2rem;
  }
  .progress[value]::-moz-progress-bar {
    background-color: #0074d9;
    border-top-left-radius: .2rem;
    border-bottom-left-radius: .2rem;
  }
  .progress[value="100"]::-moz-progress-bar {
    border-top-right-radius: .2rem;
    border-bottom-right-radius: .2rem;
  }
}

/* IE9 hacks to accompany custom markup. We don't need to scope this via media queries, but I feel better doing it anyway. */
@media screen and (min-width:0\0) {
  .progress {
    background-color: #eee;
    border-radius: .2rem;
  }
  .progress-bar {
    display: inline-block;
    height: 1rem;
    text-indent: -999rem; /* Simulate hiding of value as in native `<progress>` */
    background-color: #0074d9;
    border-top-left-radius: .2rem;
    border-bottom-left-radius: .2rem;
  }
  .progress[width="100%"] {
    border-top-right-radius: .2rem;
    border-bottom-right-radius: .2rem;
  }
}

*,
*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
/*
 * Control layouts
 */

.controls-stacked {
  margin: 1rem 0;
}
.controls-stacked .control,
.controls-stacked .progress {
  display: block;
}
.controls-stacked .control + .control,
.controls-stacked .progress + .progress {
  margin-top: .5rem;
}

.controls-inline {
  margin: 1rem 0;
}
.controls-inline .control {
  display: inline-block;
  height: 1rem;
}
.controls-inline .control + .control {
  margin-left: 1rem;
}
/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}

th {
  color:#D5DDE5;;
  background:#92127f;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:20px;
  font-weight: 100;
  padding:8px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}

th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}

tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  /*color:#666B85;*/
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}

tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}

tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}

tr:nth-child(odd) td {
  background:#EBEBEB;
}

tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}

tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}

td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
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

    .product-details-slider .swiper-container .swiper-slide img {
        width: 100%  !important;
        height:100px;
    }


        .indicateSoi66{
            color: #92127f;
        }

        .red
        {
         color: #ff0000;
         font-size: 20px !important;
         padding-left: 15px !important;
         width: 100% ;
         text-align: center;
        }


        @media (max-width: 767px)
        {


            .star-left-section{
                display: none !important;
            }

             .star-right-section{
                display: none !important;
            }



        }

        @media (max-width: 767px)
        {


            .star-left-section{
                display: none !important;
            }

             .star-right-section{
                display: none !important;
            }

          .profileslide .profilepic {
            background-repeat: no-repeat !important;
          }

          .swiper-container.gallery-top{
            height: 100vh !important;
          }

        }

        .imgbadge
        {
            width: 90px;
            height: 101px;
            display: inline-block;
            background-size: 100% 100% !important;
        }
        .username
        {
            display: inline-block;
            line-height: 20px;
            position: relative;
            bottom: 29px;
        }
        .boxcomment
        {
            background: white;
            padding-right: 0;
            padding: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            border-radius: 4px;
            position: relative;
            height:100%;
        }
        .replay
        {
            position: absolute;
            right: 9px;
            bottom: 6px;
        }
        .replaybadge
        {
            width: 31px;
            height: 38px;
            display: inline-block;
            background-size: 100% 100% !important;
        }

    </style>

    <div class="middle-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="product-details-slider">
                        <div class="swiper-container gallery-top" id="changeheight">
                            <div class="swiper-wrapper">
                            @foreach($arr_model['get_images'] as $image)
                                <div class="swiper-slide profileslide">
                                    @if(isset($image['profile_image']) && $image['profile_image']!='' && file_exists($thumb_434_651_base_img_path.$image['profile_image']))
                                    <div class="swiper-slide profilepic" style="background-image:url({{$thumb_434_651_public_img_path}}{{$image['profile_image']}});background-size: contain;background-repeat: space;"></div>
                                    @elseif(isset($image['profile_image']) && $image['profile_image']!='' && file_exists($base_img_path.$image['profile_image']))
                                    <div class="swiper-slide" style="background-image:url({{$base_img_public_path}}{{$image['profile_image']}});background-size: contain;background-repeat: space;"></div>
                                    @else
                                        <div class="swiper-slide" style="background-image:url('{{$base_img_public_path}}{{$image['profile_image']}}');background-size: contain;background-repeat: space;"></div>
                                    @endif
                                </div>
                            @endforeach
                            </div>
                            <div class="swiper-button-next swiper-button-white"><i class="fal fa-angle-right"></i></div>
                            <div class="swiper-button-prev swiper-button-white"><i class="fal fa-angle-left"></i></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">



                             @foreach($arr_model['get_images'] as $image)
                                <div class="swiper-slide">
                                    @if(isset($image['profile_image']) && $image['profile_image']!='' && file_exists($thumb_434_651_base_img_path.$image['profile_image']))
                                    <img  src="{{$thumb_434_651_public_img_path}}{{$image['profile_image']}}" alt="No Image" />
                                    @elseif(isset($image['profile_image']) && $image['profile_image']!='' && file_exists($base_img_path.$image['profile_image']))
                                    <img  src="{{$base_img_public_path}}{{$image['profile_image']}}" alt="No Image" />
                                    @else
                                        <img src="{{ url('/') }}/assets/front/images/no-img-found.jpg" alt="" />
                                    @endif
                                </div>
                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="product-details-information-section">
                        <div class="modal-name-information">
                            <div class="modal-name-seciton">
                                <h1>{{$arr_model['first_name']}} </h1>
                            </div>
                            <div>
                                @if($arr_model['get_companies']!=null)
                                    {{$arr_model['get_companies'][0]['company_name']}}
                                @endif
                            </div>
                            <div class="country-name-seciton">
                                <span>{{$arr_model['country']}} </span>
                            </div>
                        </div>
                        <div class="rate-section-main">
                            <div class="rate-section">
                                {!!  html_entity_decode($arr_model['price']) !!}

                            </div>
                            <div class="available-time-seciton">
                                <div class="available-head">
                                    {{ trans('list_details.age') }} :
                                </div>
                                <div class="available-time">
                                    {{$arr_model['age']}}
                                </div>
                            </div>
                            @if($arr_model['bio'])
                                <div class="available-time-seciton">
                                    <div class="available-head">
                                        {{ trans('list_details.bio') }} :
                                    </div>
                                    <div class="available-time">
                                                {{$arr_model['bio']}}
                                    </div>
                                </div>
                            @endif
                            <div class="available-time-seciton">
                                <div class="available-head">
                                    {{ trans('list_details.body size') }} :
                                </div>
                                <div class="available-time">
                                   @if($arr_model['size']){{$arr_model['size']}} @else {{'NA'}}@endif
                                </div>
                            </div>
                            <div class="available-time-seciton">
                                <div class="available-head">
                                   {{ trans('list_details.available') }} :
                                </div>
                                <div class="available-time">
                                    {{$arr_model['from_time']}} to {{$arr_model['to_time']}}
                                </div>
                            </div>
                        </div>
                        <div class="service-seciton-main">
                            <div class="contact-info-head">
                               {{ trans('list_details.service') }} :
                            </div>
                            <div class="service-seciton-contnet">
                                <ul>
                                    @foreach($arr_model['get_models_services'] as $model_services)
                                        @foreach($arr_services as $services)
                                            @if($model_services['service_id'] == $services['id'])
                                                <li>
                                                    {{$services['service_name']}}

                                                </li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="contact-info-section-main">
                            <div class="contact-info-head">
                                {{ trans('list_details.contact info') }}
                            </div>
                            <div class="contact-info-section">

                                <div class="available-time-seciton">
                                    <div class="available-head">
                                       <img style="height:21px" src="{{asset('assets/whatsapp.png')}}" />
                                       {{ trans('list_details.whatsapp') }} :
                                    </div>
                                    <div class="available-time">



                                            @if($arr_model['last_name'])
                                                     <a href="https://wa.me/{{str_replace('+','',$arr_model['last_name'])}}">{{$arr_model['last_name']}}</a>
                                                @else
                                                   <div>-</div>
                                                @endif


                                    </div>
                                </div>

                                <div class="available-time-seciton">
                                    <div class="available-head">
                                        <img style="height:20px" src="{{asset('assets/line.png')}}" />
                                        {{ trans('list_details.line') }} :
                                    </div>
                                    <div class="available-time">



                                                   @if($arr_model['line'])
                                                   <a href="http://line.me/ti/p/~{{$arr_model['line']}}">{{$arr_model['line']}}</a>

                                                @else
                                                   <div>-</div>
                                                @endif


                                    </div>
                                </div>

                                 <div class="available-time-seciton">
                                    <div class="available-head">
                                        <img style="height:20px" src="{{asset('assets/wechat-svg.png')}}" />
                                        {{ trans('list_details.wechat') }} :
                                    </div>
                                    <div class="available-time">


                                              @if($arr_model['wechat'])
                                                    <div>{{$arr_model['wechat']}}</div>
                                                @else
                                                   <div>-</div>
                                                @endif

                                    </div>
                                </div>


                                 <div class="available-time-seciton">
                                    <div style="padding-right:9px;" class="available-head">
                                        <img style="height:20px" src="{{asset('assets/location.png')}}" />
                                        {{ trans('list_details.location') }} :
                                    </div>
                                    @if(!empty($obj_model->locations))
                                    <div class="service-seciton-contnet">

                                        <ul>
                                                @foreach ($locarrays as $item)
                                                    <li> {{$item}} </li>
                                                @endforeach
                                        </ul>
                                    </div>
                                    @else
                                        <div class="available-time">
                                            <div>-</div>
                                        </div>
                                    @endif
                                </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                 <div class="row"><p class="red pt-4">{{ trans('list_details.indicate') }} </p></div>
            </div>


<div class="container latest-models-section-main leave-replay-main-section">
<div class="ads-banners-seciton-head">
                    {{ trans('list_details.previous comments') }}
                    {{-- $arr_point_system({{count($arr_comment)}}) --}}

                </div>
                <div class="comments-view-section-main">
                    @if(count($arr_comment)>0)
                        @foreach($obj_comment as $comment)
                            <div class="comments-view">
                                <div class="row">
                                    <div class="col-md-3 col-lg-2 text-center">
                                            <div class="comments-view-head">

                                                <?php $user = finduser($comment->model_user_id); $rank = $user->rank ?>
                                                @if(isset($arr_user) && $arr_user!= null)
                                                 @if($finduser==$user->id)
                                                    <a href="{{asset('profile')}}">
                                                 @else
                                                    <a href="{{asset('profile/'.$comment->model_user_id)}}">
                                                 @endif
                                                 @else
                                                 	<a href="{{asset('user_register')}}">
                                                @endif

                                                @if($user->admin_status==3)
                                                    <div class="imgbadge" style="background:url({{asset('assets/badges/admin.png')}});"></div>
                                                @elseif($user->admin_status==1 || $user->admin_status==2)
                                                	<div class="imgbadge" style="background:url({{asset('assets/badges/advertiser.png')}});"></div>
                                                @else
                                                    @if($rank > 0 && $rank <= 100)
                                                    <div class="imgbadge" style="background:url({{asset('assets/badges/newbie.png')}});"></div>
                                                    @elseif($rank > 100 && $rank <= 500)
                                                        <div class="imgbadge" style="background:url({{asset('assets/badges/junior.png')}})"></div>
                                                    @elseif($rank > 500 && $rank <= 1000)
                                                        <div class="imgbadge" style="background:url({{asset('assets/badges/silver.png')}});"></div>
                                                    @elseif($rank > 1000 && $rank <= 2500)
                                                        <div class="imgbadge" style="background:url({{asset('assets/badges/gold.png')}});"></div>
                                                    @elseif($rank > 2500 && $rank <= 4000)
                                                        <div class="imgbadge" style="background:url({{asset('assets/badges/platinum.png')}});"></div>
                                                    @elseif($rank > 4000 && $rank <= 5000)
                                                        <div class="imgbadge" style="background:url({{asset('assets/badges/diamond.png')}});"></div>
                                                    @elseif($rank > 5000)
                                                        <div class="imgbadge" style="background:url({{asset('assets/badges/blackdiamond.png')}});"></div>
                                                    @else
                                                        <div class="imgbadge" style="background:url({{asset('assets/badges/newbie.png')}});"></div>
                                                    @endif
                                                @endif
                                                <div>
                                                        {{$comment->get_users->first()->user_name}}
                                                </div>
                                                </a>

                                                    <div>
                                                    	@if($user->admin_status==1)
                                                    		Advertiser
                                                    	@elseif($user->admin_status==2)
                                                    		Moderator
                                                    	@elseif($user->admin_status==3)
                                                    		Admin
                                                    	@else
	                                                    	@if($rank > 0 && $rank <= 100)
	                                                            Newbie
	                                                        @elseif($rank > 100 && $rank <= 500)
	                                                           Junior
	                                                        @elseif($rank > 500 && $rank <= 1000)
	                                                            Silver
	                                                        @elseif($rank > 1000 && $rank <= 2500)
	                                                           Gold
	                                                        @elseif($rank > 2500 && $rank <= 4000)
	                                                          Platinum
	                                                        @elseif($rank > 4000 && $rank <= 5000)
	                                                            Diamond
	                                                        @elseif($rank > 5000)
	                                                            Blackdiamond
	                                                        @else
	                                                           Newbie
	                                                        @endif
                                                    	@endif
                                                    </div>
                                                    <div style="font-size:13px;">
                                                        Comments Count: {{getmycomments($comment->user_id)}}
                                                    </div>
                                                <div>
                                                    <i style="color:black" class="fas fa-clock"></i> <span style="color: black;font-size: 12px;">{{ date('Y-m-d H:i',strtotime('+7 hour',strtotime($comment->created_at)))}}</span>
                                                </div>
                                                @if(count($arr_point_system)>0)

                                                @endif
                                            </div>
                                    </div>
                                    <div class="col-md-9 col-lg-8">
                                         <div class="boxcomment">
                                            <p>{{$comment->comment}}</p>
                                            @if(!empty($comment->image))
                                            <div>
                                              <img src="{{asset($comment->image)}}">
                                            </div>
                                            @endif

                                             <div style="padding-left:30px;padding-top: 30px;">
                                                        <?php $i=1 ?>
                                                        @foreach(getreplaycomments($arr_model['id'],$comment->get_users->first()->id,$comment->id) as $replay)
                                                            <?php $replayuser = finduser($replay->user_id); $rank = finduser($replay->user_id)->rank; ?>
                                                            @if(!empty($replayuser))
                                                                @if($i > 1)
                                                                    <hr style="margin-top: 5px;margin-bottom: 16px;" />
                                                                @endif
                                                                <div class="row">
                                                                    <div class="col-md-3 col-lg-2 text-center">
                                                                        @if($replayuser->admin_status==3)
						                                                    <div class="imgbadge" style="background:url({{asset('assets/badges/admin.png')}});"></div>
						                                                @elseif($replayuser->admin_status==1 || $replayuser->admin_status==2)
						                                                	<div class="imgbadge" style="background:url({{asset('assets/badges/advertiser.png')}});"></div>
                                                                        @else
                                                                            @if($rank > 0 && $rank <= 100)
                                                                            <div class="replaybadge" style="background:url({{asset('assets/badges/newbie.png')}});"></div>
                                                                            @elseif($rank > 100 && $rank <= 500)
                                                                                <div class="replaybadge" style="background:url({{asset('assets/badges/junior.png')}})"></div>
                                                                            @elseif($rank > 500 && $rank <= 1000)
                                                                                <div class="replaybadge" style="background:url({{asset('assets/badges/silver.png')}});"></div>
                                                                            @elseif($rank > 1000 && $rank <= 2500)
                                                                                <div class="replaybadge" style="background:url({{asset('assets/badges/gold.png')}});"></div>
                                                                            @elseif($rank > 2500 && $rank <= 4000)
                                                                                <div class="replaybadge" style="background:url({{asset('assets/badges/platinum.png')}});"></div>
                                                                            @elseif($rank > 4000 && $rank <= 5000)
                                                                                <div class="replaybadge" style="background:url({{asset('assets/badges/diamond.png')}});"></div>
                                                                            @elseif($rank > 5000)
                                                                                <div class="replaybadge" style="background:url({{asset('assets/badges/blackdiamond.png')}});"></div>
                                                                            @else
                                                                                <div class="replaybadge" style="background:url({{asset('assets/badges/newbie.png')}});"></div>
                                                                            @endif
                                                                        @endif

                                                                        @if(!empty($replayuser))
                                                                            @if($finduser==$user->id)
                                                                                <a href="{{asset('profile')}}">
                                                                             @else
                                                                                <a href="{{asset('profile/'.$replayuser->id)}}">
                                                                             @endif
                                                                            <div style="color:black;">
                                                                             {{$replayuser->user_name}}
                                                                           </div>
                                                                           <div>
                                                                            <i style="color:black" class="fas fa-clock"></i> <span style="color: black;font-size: 12px;">
                                                                                {{ date('Y-m-d H:i',strtotime('+7 hour',strtotime($replay->created_at)))}}
                                                                             </span>
                                                                           </div>
                                                                        @endif
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-9 col-lg-8" style="text-align: left;padding-left: 0;padding-top: 36px;">
                                                                        <div style="color:black;">
                                                                            {{$replay->comment}}
                                                                        </div>
                                                                        @if(!empty($replay->image))
                                                                        <div>
                                                                          <img src="{{asset($replay->image)}}">
                                                                        </div>
                                                                        @endif
                                                                    </div>



                                                                    <hr style="margin-top: 0;" />
                                                                </div>

                                                                <?php $i++; ?>
                                                               @endif
                                                        @endforeach
                                                    </div>
                                            <div onclick="replay({{$comment->model_user_id}},{{$comment->id}})" class="replay" >
                                                reply <i style="color: #2aa8e4;" class="fa fa-reply"> </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <label> {{ trans('list_details.the comment section is empty') }}</label>
                    @endif
                </div>
                <div >
                    {{$obj_comment->links()}}
                </div>
@if(isset($arr_user) && $arr_user!= null)

                @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                         <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                         {{ trans('list_details.commenterror') }}
                        </div>
                @endif
                <div id="bottomofpage" class="ads-banners-seciton-head">
                    {{ trans('list_details.write a comment') }}
                </div>
                @if($arr_user)
                <form action="{{url('/comment')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div>
                        <input type="hidden" name="model_added_by_id" value="{{$arr_model['user_id']}}">
                        <textarea class="no-login-section" required name="comment" placeholder="{{ trans('list_details.comment') }}" style="height: 200px;width: 100%;"></textarea>
                        <input type="hidden" name="model_id" value="{{$arr_model['id']}}">
                        <input type="hidden" name="user_id" value="{{$arr_user['id']}}">
                        <label class="file">
                          <input type="file" id="file" name="image">
                          <span class="file-custom"></span>
                        </label>
                    </div>
                    <div class="form-group login-form-btn-seciton">
                        <button type="submit" class="login-form-btn">{{ trans('list_details.add') }}</button>
                    </div>
                    <input type="hidden" name="usercomment" id="usercomment">
                </form>
                @else
                <div class="no-login-section">
                    <span><a href="#">{{ trans('list_details.you must log in') }}</a> {{ trans('list_details.to') }} {{ trans('list_details.post') }} {{ trans('list_details.comment') }}.</span>
                </div>
                @endif
            </div>


            @else

                <div class="container">
                    <div class="no-login-section">
                    <span><a href="#">{{ trans('list_details.you must log in') }}</a> {{ trans('list_details.to') }} {{ trans('list_details.post') }} {{ trans('list_details.comment') }}.</span>
                </div>

                </div>

    @endif





            <div class="container latest-models-section-main">
                <div class="ads-banners-seciton-head">
                    {{ trans('list_details.latest') }} {{ trans('list_details.model') }}
                </div>
                <div class="swiper-container latest-models">
                    <div class="swiper-wrapper">
                        @foreach($arr_all_model as $models)
                        <div class="swiper-slide">
                            <a href="{{url('/list_details')}}/{{base64_encode($models['id'])}}" class="profiles-section-block">
                                <div class="profiles-section-block-inner">
                                    <div class="profile-img-section">
                                        @if(isset($models['get_images'][0]['profile_image']) && $models['get_images'][0]['profile_image']!='' && file_exists($base_img_path.$models['get_images'][0]['profile_image']))
                                        <img src="{{$base_img_public_path}}{{$models['get_images'][0]['profile_image']}}" alt="no" />
                                        @else
                                        <img src="{{ url('/') }}/assets/front/images/profile-img-1.jpg" alt="" />
                                        @endif
                                    </div>
                                    <div class="profile-name-seciton-block">
                                        <i class="fas fa-star star-left-section"></i> <span class="scroll1">
                                            <span>
                                                @if(isset($models['get_category'][0]['category_name']))
                                                {{(($models['get_category'][0]['category_name']))}}
                                                @else
                                                {{'Not Set'}}
                                                @endif
                                            </span>
                                        </span> <i class="fas fa-star star-right-section"></i>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="proile-information-seciton-main">
                                        <div class="profile-country-name">
                                            {{$models['country']}}
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

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"><i class="fal fa-angle-right"></i></div>
                    <div class="swiper-button-prev"><i class="fal fa-angle-left"></i></div>
                </div>
            </div>
        </div>
    </div>
    <!--Footer Section  Start-->
    @include('front.layout.footer')
    <!--Footer Section End -->

    <script src="{{ url('/') }}/assets/front/js/swiper.min.js"></script>

    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 0,
          slidesPerView: 4,
          freeMode: true,
          watchSlidesVisibility: true,
          watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            calculateHeight:true,
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs
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

    <script type="text/javascript">
        function replay(id,commentid)
        {
            $("#usercomment").val(id+","+commentid);
            $("html, body").animate({
                    scrollTop: $("#bottomofpage").offset().top
                }, 2000);
        }
    </script>

    <script type="text/javascript">

    </script>

</body>

</html>
