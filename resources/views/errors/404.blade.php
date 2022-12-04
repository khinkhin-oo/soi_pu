<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <title>{{config('app.project.name')}}</title>

    <?php
        $public_img_path = url('/').config('app.project.img_path.site_logo');

        $favicon_image_path = $public_img_path.''."63857dc85e534f36779cab8edc055984625ed779.ico";

    //dd($favicon_image_path);

    ?>

     <link rel="shortcut icon" type="image/x-icon" href="{{$favicon_image_path}}"> 

    <!-- ======================================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->    
    <link href="{{url('/')}}/assets/front_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--font-awesome-css-start-here-->
    <link href="{{url('/')}}/assets/front_assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!--Custom Css-->
    <link href="{{url('/')}}/assets/front_assets/css/foodspal.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">    
   
</head>

<?php 

    $segment = Request::Segment('1'); 

    if(isset($segment) && $segment=='admin')
    {
        $url = url('/admin/dashboard');
    }
    elseif(isset($segment) && $segment=='restaurant')
    {
        $url = url('/restaurant/dashboard');
    }
    else
    {
        $url = url('/');
    }

?>

<body>
    <div class="header-home" id="header"></div>
    <div class="home-middle-section middle-section">
        <div class="page-bck-img">
            <div class="content-section-main-block">
                <img src="{{url('/')}}/assets/front_assets/images/404-banner-img-chair1.png" alt="" />
                <img class="rotate-table" src="{{url('/')}}/assets/front_assets/images/404-banner-img-table.png" alt="" />
                <img src="{{url('/')}}/assets/front_assets/images/404-banner-img-chair2.png" alt="" />
                <h4>Oops! Page Not Found</h4>
                <h5>The page you were looking for could not be found.</h5>
                <a href="{{$url}}" class="become-phot">Go Home</a>
            </div>
        </div>
    </div>    
    <div id="footer"></div>    
</body>
</html>