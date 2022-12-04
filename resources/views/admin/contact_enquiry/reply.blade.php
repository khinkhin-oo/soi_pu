
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('admin.layout._header')
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.layout._sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                 @include('admin.layout.breadcrumb')
                <!-- /row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form class="form-horizontal" id="frm_contact_enquiry" name="frm_contact_enquiry" action="{{$module_url_path}}/send_reply/{{ $enc_id}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="form-body">
                                            <h3 class="box-title">View details</h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">First Name :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo isset($arr_data['first_name']) ? ucfirst($arr_data['first_name']) :'' ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Last Name :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"><?php echo isset($arr_data['last_name']) ? ucfirst($arr_data['last_name']) :'N/A' ?>  </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Mobile Number :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo isset($arr_data['contact_no']) ? ucfirst($arr_data['contact_no']) :'N/A' ?>  </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo isset($arr_data['email']) ? ucfirst($arr_data['email']) :'N/A' ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Enquiry message :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo isset($arr_data['message']) ? ucfirst($arr_data['message']) :'N/A' ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2" style="width:12.666667%"> Reply :</label>
                                                        <div class="col-md-9">
                                                            <textarea  name="description" id="description" class="form-control" data-rule-required="true" rows="15" tabindex="1"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                          
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="fcbtn btn btn-danger btn-1g">  Reply</button>
                                                              <a href="{{ $module_url_path }}" class="fcbtn btn btn-danger btn-1g">Back</a>
                                                        </div>
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
    <script src="{{url('/')}}/assets/admin_assets/js/bootstrap-inputmask.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#frm_contact_enquiry').validate({
            highlight: function(element) { },
            ignore: [] 
        });
            /*TINY Text */
                tinymce.init({
                selector: 'textarea',
                height:350,
                valid_elements: "*[*]",
                force_p_newlines : !1,
                forced_root_block : !1,

                plugins: ['code',
                'advlist autolink lists link charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime table contextmenu paste code'
                ],
                toolbar: 
                'code | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
                content_css: [

                ],
            }); 

            $('#btn_add_front_page').click(function(){
                tinyMCE.triggerSave();
            });
        });
            $('#frm_contact_enquiry').each(function () {
        if ($(this).data('validator'))
            $(this).data('validator').settings.ignore = ".note-editor *";
    });
    </script>
    @include('admin.layout._footer')
       
  
 