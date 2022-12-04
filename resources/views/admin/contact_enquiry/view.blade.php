@extends('admin.layout.master')    
@section('main_content')
            <div class="container-fluid">
                 @include('admin.layout.breadcrumb')
                <!-- /row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-body">                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="user-details-section-main">
                                                        <label class="control-label user-details-section-head">First Name :</label>
                                                        <div class="user-details-section-content">
                                                            <p class="form-control-static"> <?php echo isset($arr_contact_enquiry['first_name']) ? ucfirst($arr_contact_enquiry['first_name']) :'' ?> </p>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <div class="col-md-4">
                                                    <div class="user-details-section-main">
                                                        <label class="control-label user-details-section-head">Last Name :</label>
                                                        <div class="user-details-section-content">
                                                            <p class="form-control-static"><?php echo isset($arr_contact_enquiry['last_name']) ? ucfirst($arr_contact_enquiry['last_name']) :'N/A' ?>  </p>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="user-details-section-main">
                                                        <label class="control-label user-details-section-head">Mobile Number :</label>
                                                        <div class="user-details-section-content">
                                                            <p class="form-control-static"> <?php echo isset($arr_contact_enquiry['contact_no']) ? ucfirst($arr_contact_enquiry['contact_no']) :'N/A' ?>  </p>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <div class="col-md-4">
                                                    <div class="user-details-section-main">
                                                        <label class="control-label user-details-section-head">Email :</label>
                                                        <div class="user-details-section-content">
                                                            <p class="form-control-static"> <?php echo isset($arr_contact_enquiry['email']) ? ucfirst($arr_contact_enquiry['email']) :'N/A' ?> </p>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="user-details-section-main">
                                                        <label class="control-label user-details-section-head">Enquiry message :</label>
                                                        <div class="user-details-section-content">
                                                            <p class="form-control-static"> <?php echo isset($arr_contact_enquiry['message']) ? ucfirst($arr_contact_enquiry['message']) :'N/A' ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="user-details-section-main">
                                                        <label class="control-label user-details-section-head">Admin Reply :</label>
                                                        <div class="user-details-section-content">
                                                            <p class="form-control-static"> <?php echo isset($arr_contact_enquiry['admin_reply']) ? ucfirst($arr_contact_enquiry['admin_reply']) :'N/A' ?> </p>
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
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            @endsection
       
  
 