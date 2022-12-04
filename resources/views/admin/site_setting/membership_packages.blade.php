@extends('admin.layout.master')    
@section('main_content')
<div class="container-fluid">
  
   <div class="row">
        <div class="col-sm-12">
            @include('admin.layout.breadcrumb')
            @include('admin.layout._operation_status')
            <div class="white-box">
                <ul class="nav customtab nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#elite_membership" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Elite Profile </span></a></li>
                   
                    <li role="presentation" class=""><a href="#premium_membership" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Premium Profile</span></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade active in" id="elite_membership">                            
                        <div class="row">
                            <div class="col-lg-12 ">
                                <h3 class="box-title">Elite Membership</h3>
                                <ul class="list-icons">
                                    <li><i class="ti-angle-right"></i>Lead generation form</li>
                                    <li><i class="ti-angle-right"></i>Verified Lawyer sign</li>
                                    <li><i class="ti-angle-right"></i>Access of admin panel</li>
                                    <li><i class="ti-angle-right"></i>Website analytics </li>
                                </ul>
                                <br>
                            </div>
                        </div>                            
                        <div class="clearfix"></div>
                    </div>
                   
                    <div role="tabpanel" class="tab-pane fade " id="premium_membership">                            
                        <div class="row">
                            <div class="col-lg-12 ">
                                <h3 class="box-title">Premium Membership</h3>
                                <ul class="list-icons">
                                    <li><i class="ti-angle-right"></i>Lead generation form</li>
                                    <li><i class="ti-angle-right"></i>Verified Lawyer sign</li>
                                    <li><i class="ti-angle-right"></i>Access of admin panel</li>
                                    <li><i class="ti-angle-right"></i>Website analytics </li>
                                    <li><i class="ti-angle-right"></i>Profile promotion </li>
                                    <li><i class="ti-angle-right"></i>Lawyer can upload only one Video file.</li>
                                    <li><i class="ti-angle-right"></i>Detail analysis </li>
                                </ul>
                                <br>
                            </div>
                        </div>                            
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection