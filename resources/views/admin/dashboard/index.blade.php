@extends('admin.layout.master')    
@section('main_content')
<div class="container-fluid">
    @include('admin.layout.breadcrumb')

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="white-box">
                        <a href="{{url("/admin/models")}}">
                            <h3 class="box-title">Models</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-user text-info"></i></li>
                                <li class="text-right">
                                    <span class="counter">
                                    <h1 class="count1" >
                                        {{$total_models_count}}
                                    </h1>
                                    </span>
                                </li>
                            </ul>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="white-box">
                        <a href="{{url("/admin/users")}}">
                            <h3 class="box-title">Users</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-people text-info"></i></li>
                                <li class="text-right">
                                    <span class="counter">
                                        <h1 class="count1" >
                                            {{$total_users_count}}
                                        </h1>
                                    </span>
                                </li>
                            </ul>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="white-box">
                        <a href="{{url("/admin/company")}}">
                            <h3 class="box-title">Companies</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-people text-info"></i></li>
                                <li class="text-right">
                                    <span class="counter">
                                        <h1 class="count1" >
                                            {{$company_count}}
                                        </h1>
                                    </span>
                                </li>
                            </ul>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="columnchart_material" ></div> --}}

    <div class="row">
        <div class="col-md-12 col-lg-8 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Registrations</h3>

                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-info"></i>Users</h5> </li>
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Models</h5> </li>
                    
                </ul>
                <div id="ct-visits" style="height: 405px;"></div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="p-20">
                    <div class="row">
                        <div class="col-xs-8">
                            <h4 class="m-b-0">Point System</h4>
                            <h2 class="m-t-0 font-medium">{{count($point_system_array)}}</h2>
                        </div>
                        <div class="col-xs-4 p-20">
                            <select class="form-control">
                                <option>DEC</option>
                                <option>JAN</option>
                                <option>FEB</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer bg-extralight">
                    <ul class="earning-box">
                        <li>
                            <div class="er-row">
                                <div class="er-pic"><img src="{{url('/')}}/assets/admin_assets/images/genu.jpg" alt="varun" width="60" class="img-circle"></div>
                                <div class="er-text"><h3>Andrew Simon</h3><span class="text-muted">10-11-2016</span></div>
                                <div class="er-count ">$<span class="counter">46</span></div>
                            </div>
                        </li>
                        <li>
                            <div class="er-row">
                                <div class="er-pic"><img src="{{url('/')}}/assets/admin_assets/images/govinda.jpg" alt="varun" width="60" class="img-circle"></div>
                                <div class="er-text"><h3>Daniel Kristeen</h3><span class="text-muted">10-11-2016</span></div>
                                <div class="er-count ">$<span class="counter">55</span></div>
                            </div>
                        </li>
                        <li>
                            <div class="er-row">
                                <div class="er-pic"><img src="{{url('/')}}/assets/admin_assets/images/pawandeep.jpg" alt="varun" width="60" class="img-circle"></div>
                                <div class="er-text"><h3>Chris gyle</h3><span class="text-muted">10-11-2016</span></div>
                                <div class="er-count ">$<span class="counter">66</span></div>
                            </div>
                        </li>
                       
                        <li class="center">
                            <a class="btn btn-rounded btn-block p-10 waves-effect waves-light blue-btn-section">Withdrow money</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- chartist chart -->
<script src="{{url('/')}}/assets/admin_assets/js/chartist-js/dist/chartist.min.js"></script>
<script src="{{url('/')}}/assets/admin_assets/js/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="{{url('/')}}/assets/admin_assets/js/jquery-sparkline/jquery.sparkline.min.js"></script>

{{-- <script src="{{url('/')}}/assets/admin_assets/js/custom.min.js"></script> --}}
{{-- <script src="{{url('/')}}/assets/admin_assets/js/dashboard1.js"></script> --}}
<script src="{{url('/')}}/assets/admin_assets/js/jquery.toast.js"></script>

<!-- chartist CSS -->
<link href="{{url('/')}}/assets/admin_assets/js/chartist-js/dist/chartist.min.css" rel="stylesheet">
<link href="{{url('/')}}/assets/admin_assets/js/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js" integrity="sha256-wldfwyVJyA71oKe6Sba0fKZkaR6CMwtb0DnWcQs6N1Y=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('.jq-toast-single').hide();
    })
    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        //ct-visits
        new Chartist.Line('#ct-visits', {
            labels: ['2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015'],
            series: [ [5, 2, 7, 4, 5, 3, 10, 4, 2, 8, 9, 4],[2, 5, 2, 6, 2, 5, 2, 4, 2, 8, 9, 4] ]
        },
        {
            top: 0,
            low: 0,
            showPoint: true,
            fullWidth: true,
            plugins: [
                Chartist.plugins.tooltip()
            ],
            axisY: {
                labelInterpolationFnc: function (value) {
                    return (value / 1);
                }
            },
            showArea: true
        });
        // counter
        $(".counter").counterUp({
            delay: 100,
            time: 1200
        });
    });

</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Customers', 'Restaurants'],
          <?php foreach($arr_data as $key=>$value)
                {           ?>
          ['{{$value[0]}}',{{isset($value[2])?$value[2]:0}}, {{isset($value[1])?$value[1]:0}}]
      <?php if($key!=count($arr_data)) { ?>
          ,

          <?php } } ?>
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: 'Customers Registrations {{$total_users_count}}, Restaurants Registrations {{$total_users_count}} (new Restaurants registered in the last 7 days )',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<!-- /.container-fluid -->
@endsection