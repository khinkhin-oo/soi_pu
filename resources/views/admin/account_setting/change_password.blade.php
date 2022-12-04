@extends('admin.layout.master')    
@section('main_content')
<style type="text/css">
</style>
    <div class="container-fluid">
       @include('admin.layout.breadcrumb')
       <div class="row">
            <div class="col-sm-12">
                <div class="white-box p-l-20 p-r-20">
                   @include('admin.layout._operation_status')
                    <div class="row">
                        <div class="col-md-12">
                             <form action="{{url('/')}}/admin/password/update" id="frm_admin" name="frm_admin" method="post" enctype="multipart/form-data">
                                   {{csrf_field()}}
                                <div class="form-body">                                    
                                    <small class="note">Please note that all fields that have an asterisk (*) are required.</small>

                                    <div class="col-md-8 m-b-25 m-l-0 m-r-0">
                                        <label class="control-label">Old Password <i class="red" >*</i></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="mdi mdi-key-minus"></i></span>
                                            <input type="password" id="current_password" name="current_password" minlength="6" class="form-control" placeholder="Enter your old password" data-rule-required="true" > 
                                        </div>
                                    </div>

                                    <div class="col-md-8 m-b-25 m-l-0 m-r-0">
                                        <label class="control-label">New Password <i class="red" >*</i></label>
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="mdi mdi-key-plus"></i></span>
                                            <input type="password" id="new_password"  name="new_password" class="form-control" placeholder="Enter New password" validatepassword="true" data-rule-required="true" minlength="8" maxlength="40"> 
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-8 m-b-25 m-l-0 m-r-0">
                                        <label class="control-label">Confirm Password <i class="red" >*</i></label>
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="mdi mdi-key-change"></i></span>
                                            <input type="password" id="confirm_password" name="confirm_password"  class="form-control" placeholder="Confirm Password" data-rule-equalto = "#new_password" data-rule-required="true" validatepassword="true" autocomplete="off" > 
                                        </div>
                                    </div>
                                 
                                    <div class="col-md-8 m-b-25 m-l-0 m-r-0">
                                        <div class="form-actions">
                                            <button type="submit" class="fcbtn btn btn-danger btn-1g">  Update</button>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#frm_admin').validate();
        });
        jQuery.validator.addMethod("validatepassword", function (value) { 
                return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/i.test(value); 
        }, 'Your input must contain at least one letter , number and special character');
    </script>
    <script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
    @endsection