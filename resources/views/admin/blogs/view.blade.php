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
                        <form class="form-horizontal" role="form">
                            <div class="form-body">                                
                                <div class="row">
                                  <?php 
                                    if(isset($arr_data['image']) && $arr_data['image']!='' && file_exists($blog_image_base_path.$arr_data['image'])) 
                                    {
                                        $blog_image_path = $blog_image_public_path.$arr_data['image'];
                                    } 
                                    else 
                                    {
                                        $blog_image_path = url('/uploads/default/default.jpg');
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="user-details-section-main">
                                            <label for="old_image" class="control-label user-details-section-head" style="float: none;margin-bottom: 10px;">Blog Image</label>
                                            <div class="user-details-section-content" style="margin: 0;">
                                                <div class="profile-img-view-section">
                                                    <img src="{{$blog_image_path}}" alt="Restaurants">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-4">
                                        <div class="user-details-section-main">
                                            <label class="control-label user-details-section-head">Blog title :</label>
                                            <div class="user-details-section-content">
                                                <p class="form-control-static"> <?php echo isset($arr_data['title']) ? ucfirst($arr_data['title']) :'' ?> </p>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="clearfix"></div>                            
                                </div> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="user-details-section-main">
                                            <label class="control-label user-details-section-head">Blog category :</label>
                                            <div class="user-details-section-content">
                                                <p class="form-control-static"><?php echo isset($arr_data['get_category_details']['title']) ? ucfirst($arr_data['get_category_details']['title']) :'N/A' ?>  </p>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>                            
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="user-details-section-main">
                                            <label class="control-label user-details-section-head">Blog Description :</label>
                                            <div class="user-details-section-content">
                                                <p class="form-control-static"> <?php echo isset($arr_data['description']) ? ucfirst($arr_data['description']) :'N/A' ?> </p>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>                                
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">                                        
                                        <div class="">
                                            <a href="{{ $module_url_path }}" class="fcbtn btn btn-danger btn-1g">Back</a>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@include('admin.layout._footer')
