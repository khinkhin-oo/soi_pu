@extends('admin.layout.master')    
@section('main_content')
<style type="text/css">
    .imp{display: none !important}
</style>
            <div class="container-fluid">
               @include('admin.layout.breadcrumb')
              
               <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box p-l-20 p-r-20">
                           @include('admin.layout._operation_status')
                            <div class="row">
                                <div class="col-md-12">
                                     <form action="{{url('/')}}/admin/location/update/{{base64_encode($arr_data['id']) }}" id="frm_admin" name="frm_admin"  class="form-horizontal cmxform"   method="post" enctype="multipart/form-data">
                                           {{csrf_field()}}
                                        <div class="form-body">
                                            <h3 class="box-title">Location Detail</h3>
                                            <hr>
                                            
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-4 col-md-4 col-lg-3" >Location Name <i class="red" >*</i></label>
                                                        <div class="col-sm-8 col-md-8 col-lg-9">
                                                        <input type="text" id="location_name" name="location_name" class="form-control" placeholder="Enter Blog title" value="{{$arr_data['location_name'] ?? 'NA' }}" data-rule-required="true" maxlength="100"> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="row">
                                                 <div class="col-md-8">
                                                    <div class="form-group">
                                                         <label class="control-label col-sm-4 col-md-4 col-lg-3" ></label>
                                                        <div class="col-sm-8 col-md-8 col-lg-9">
                                                            <div class="form-actions">
                                                                <button type="submit" id="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                                                                <a href="{{ $module_url_path }}"  class="btn btn-default">Back</a>
                                                            </div>
                                                        </div>
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
            <!-- /.container-fluid -->
<script src="{{url('/')}}/assets/admin_assets/js/bootstrap-inputmask.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection
