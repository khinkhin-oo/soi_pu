@include('admin.layout._header')
@include('admin.layout._sidebar')
<div id="page-wrapper">
<div class="container-fluid">
    @include('admin.layout.breadcrumb')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <!--<div class="view-details-section-ueser">-->
                        <form class="form-horizontal" role="form">
                            <div class="form-body">{{-- {{dd($arr_data)}} --}}
                                <div class="user-details-section-main">
                                    <label for="old_image" class="control-label user-details-section-head" style="float: none;margin-bottom: 10px;">Current Profile Image(s)</label>
                                    @if($arr_data['get_images'])
                                        @foreach($arr_data['get_images'] as $images)
                                        <?php
                                        if(isset($images['profile_image']) && $images['profile_image']!='' && file_exists($base_img_path.$images['profile_image']))
                                        {
                                            $profile_image_path = $public_img_path.$images['profile_image'];
                                        }
                                        else
                                        {
                                            // $profile_image_path = url('/uploads/default/default.jpg');
                                            $profile_image_path = $public_img_path.$images['profile_image'];
                                        }
                                        ?>
                                        <div class="user-details-section-content" style="margin: 0;">
                                                <div class="profile-img-view-section">
                                                    <img src="{{$profile_image_path}}" alt="No Image">
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <!--{{$profile_image_path = url('/uploads/default/default.jpg')}}-->
                                        <div class="user-details-section-content" style="margin: 0;">
                                            <div class="profile-img-view-section">
                                                <img src="{{$profile_image_path}}" alt="No Image">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th style="width: 15%;">Name EN</th>
                                                <td style="width: 25%;">{{isset($arr_data['first_name']) ? ucfirst($arr_data['first_name']) :'NA'}}
                                                </td>
                                                <th style="width: 15%;">Name TH</th>
                                                <td style="width: 25%;">{{isset($arr_data['first_name_th']) ? ucfirst($arr_data['first_name_th']) :'NA'}} </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;">Mobile Number</th>
                                                <td style="width: 25%;">{{isset($arr_data['mobile_number']) ? ucfirst($arr_data['mobile_number']) :'NA'}}
                                                </td>
                                                <th style="width: 15%;">Age</th>
                                                <td style="width: 25%;">{{isset($arr_data['age']) ? ucfirst($arr_data['age']) :'NA'}} </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;">Height (CM)</th>
                                                <td style="width: 25%;">{{isset($arr_data['height']) ? ucfirst($arr_data['height']):'NA'}}
                                                </td>
                                                <th style="width: 15%;">Weight (KG)</th>
                                                <td style="width: 25%;">{{isset($arr_data['weight']) ? ucfirst($arr_data['weight']):'NA'}} </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;">We Chat</th>
                                                <td style="width: 25%;">@if($arr_data['wechat']=='yes'){{'Yes'}} @else {{'No'}}                        @endif
                                                </td>
                                                <th style="width: 15%;">Line</th>
                                                <td style="width: 25%;">{{isset($arr_data['line']) ? ucfirst($arr_data['line']) :'NA'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;">Price</th>
                                                <td style="width: 25%;">{{isset($arr_data['price']) ? ucfirst($arr_data['price']) :'NA'}} </td>
                                                <th style="width: 15%;">Mobile Number</th>
                                                <td style="width: 25%;">{{isset($arr_data['mobile_number']) ? ucfirst($arr_data['mobile_number']) :'NA'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;">Availability(From)</th>
                                                <td style="width: 25%;">{{isset($arr_data['from_time']) ? ucfirst($arr_data['from_time']) :'NA'}} </td>
                                                <th style="width: 15%;">Availability(To)</th>
                                                <td style="width: 25%;">{{isset($arr_data['to_time']) ? ucfirst($arr_data['to_time']) :'NA'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;">Body Size</th>
                                                <td style="width: 25%;">{{isset($arr_data['size']) ? ucfirst($arr_data['size']) :'NA'}} </td>
                                                <th style="width: 15%;">Company</th>
                                                <td style="width: 25%;">{{isset($arr_data['company']) ? ucfirst($arr_data['get_companies'][0]['company_name']) :'NA'}} </td>
                                            </tr>
<!--                                            <tr>-->
<!--                                                <th style="width: 15%;">-->
<!--                                                    Country-->
<!--                                                </th>-->
<!--                                                <td style="width: 25%;">-->
<!--                                                    {{isset($arr_data['country']) ? ucfirst($arr_data['country']) :'NA'}}-->
<!--                                                </td>-->
<!--                                                <th style="width: 15%;">-->
<!--                                                    Address-->
<!--                                                </th>-->
<!--                                                <td style="width: 25%;">-->
<!--                                                    {{isset($arr_data['address']) ? ucfirst($arr_data['address']) :'NA'}}-->
<!--                                                </td>-->
<!--                                            </tr>-->
                                            <tr>
                                                <th style="width: 15%;">Category</th>
                                                <td style="width: 25%;">{{isset($arr_data['get_category'][0]['category_name']) ? ucfirst($arr_data['get_category'][0]['category_name']) . ' '. $arr_data['get_category'][0]['category_name_th'] :'NA'}} </td>
                                                <th style="width: 15%;">Services</th>
                                                <td style="width: 25%;">
                                                    @foreach($arr_data['get_models_services'] as $model_services)
                                                        @foreach($arr_services as $services)
                                                            @if($model_services['service_id'] == $services['id'])
                                                                <li>
                                                                    {{$services['service_name']}} {{$services['service_name_th']}}

                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;">
                                                    Meta Desc
                                                </th>
                                                <td style="width: 25%;">
                                                    {{isset($arr_data['meta_desc']) ? ucfirst($arr_data['meta_desc']) :'NA'}}
                                                </td>
                                                <th style="width: 15%;">
                                                    Bio
                                                </th>
                                                <td style="width: 25%;">
                                                    {{isset($arr_data['bio']) ? ucfirst($arr_data['bio']) :'NA'}}
                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <a href="{{ $module_url_path }}"  class="fcbtn btn btn-primary btn-outline btn-1e">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@include('admin.layout._footer')


