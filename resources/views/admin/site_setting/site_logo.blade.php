@extends('admin.layout.master')    
@section('main_content')
<div class="container-fluid">
@include('admin.layout.breadcrumb')

<div class="row">
<div class="col-sm-12">
    <div class="col-lg-12 col-sm-6 col-xs-12">
        @include('admin.layout._operation_status')
        <div class="white-box">
            
            <!-- Tab panes -->
            <div class="tab-content">
      

                <div role="tabpanel" class="tab-pane fade active in" id="site_settings">
                   <div class="col-md-12">
                     <form action="{{url('/')}}/admin/site_logo/update" id="frm_gener_setting" name="frm_gener_setting" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                        <div class="form-body">
                           
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="control-label">Logo</label>
                                 <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                    <input type="file" data-validation-allowing="jpg, jpeg, png" id="site_logo" name="site_logo" onchange="checkImageValidation(this);"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                 </div>
                                 <p>Supported File Types: gif, jpg, jpeg, png.</p>
                              </div>
                           </div>
                        </div>
                        <?php 

                            if(isset($arr_site_settings['logo']) && $arr_site_settings['logo']!='' && file_exists($base_img_path.$arr_site_settings['logo'])) 
                            {
                                $logo_image_path = $public_img_path.$arr_site_settings['logo'];
                            } 
                            else 
                            {
                                $logo_image_path = url('/uploads/default/default.jpg');
                            }

                            ?>
                          
                          <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="control-label">Current Logo</label>
                                 <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                      <img src="{{$logo_image_path}}" alt="Site Current Logo" style="height: 50; width: 250px;">
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="control-label">Favicon</label>
                                 <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                    <input type="file" id="favicon" name="favicon"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                 </div>
                                 <p>Supported File Types: ico.</p>
                              </div>
                           </div>
                        </div>

                        <?php 

                            if(isset($arr_site_settings['favicon']) && $arr_site_settings['favicon']!='' && file_exists($base_img_path.$arr_site_settings['favicon'])) 
                            {
                                $favicon_image_path = $public_img_path.$arr_site_settings['favicon'];
                            } 
                            else 
                            {
                                $favicon_image_path = url('/uploads/default/default.jpg');
                            }

                            ?>
                          
                        {{--    <div class="form-group">
                            <label for="old_image" class="control-label col-lg-2">Current Favicon</label>
                            <div class="col-lg-10">

                                <img src="{{$favicon_image_path}}" alt="Favicom Icon" style="height: 20px; width: 20px;">
                            </div>
                        </div><br/>                     --}}

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="control-label">Current Favicon</label>
                                 <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                      <img src="{{$favicon_image_path}}" alt="Favicom Icon" style="height: 15px; width: 15px;">
                                 </div>
                              </div>
                           </div>
                        </div>

                         </div> 


                        <div class="form-actions">
                            <button type="submit" class="fcbtn btn btn-danger btn-1g">  Update</button>
                        </div>
                    </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
               
            </div>
        </div>
    </div>
</div>
</div>


</div>
<!-- /.container-fluid -->

<script type="text/javascript">
  function checkImageValidation(ref)
  {
    const file = ref.files[0];
    const  fileType = file['type'];
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
    if (!validImageTypes.includes(fileType))
    {
       swal('please select valid file');
       $('#logo').val('');
       return false;
    }
  }

</script>

{{-- <script type="text/javascript">
  function checkImageValidation1(ref)
  {
    const file = ref.files[0];
    const  fileType = file['type'];
    alert(fileType);
    const validImageTypes = ['image/ico'];
    if (!validImageTypes.includes(fileType))
    {
       swal('please select valid file');
       $('#favicon').val('');
       return false;
    }
  }

</script> --}}

<script type="text/javascript">
$(document).ready(function(){
$('#frm_admin').validate();
});
</script>

@endsection