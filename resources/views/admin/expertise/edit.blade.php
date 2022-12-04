@extends('admin.layout.master')    
@section('main_content')
    <div class="container-fluid">
       @include('admin.layout.breadcrumb')
       <div class="row">
            <div class="col-sm-12">
                <div class="white-box p-l-20 p-r-20">
                   @include('admin.layout._operation_status')
                    <div class="row">
                        <div class="col-md-12">
                             <form action="{{url($module_url_path)}}/update/{{base64_encode($arr_data['_id'])}}" id="frm_admin" name="frm_admin" method="post" enctype="multipart/form-data">
                                   {{csrf_field()}}
                                <div class="form-body">
                                    <h3 class="box-title">Edit Expertise</h3>
                                    <hr>
                                    <div class="col-md-8">
                                        <div class="form-group ">
                                            <label class="control-label">Expertise Name <i class="red" >*</i></label>
                                            <input type="text" name="category_name" class="form-control" placeholder="Enter Expertise Name" data-rule-required="true" value="{{$arr_data['name']}}" > 
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-actions">
                                            <button type="submit" class="fcbtn btn btn-danger btn-1g"> Update</button>
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
