@extends('admin.layout.master')    
@section('main_content')
    <div class="container-fluid">
         @include('admin.layout.breadcrumb')
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                    @include('admin.layout._operation_status')
                <div class="white-box">
                <div class="table-action-buttons-top">
                    <a href="javascript:void(0)" class="btn add-form-btn-section">Add</a>
                    <a href="{{ url($module_url_path) }}" class="btn ">Refresh</a>
                    <a href="javascript:void(0)" class="btn " title="Deactivate Multiple" onclick="check_multi_action('frm_manage','deactivate')">Deactivate</a>
                    <a href="javascript:void(0)" class="btn " title="Activate Multiple" onclick="check_multi_action('frm_manage','activate')">Activate</a>
                    <a href="javascript:void(0)" class="btn " title="Delete Multiple" onclick="check_multi_action('frm_manage','delete')">Delete</a>
                </div>
                <!--<br>-->
                <div class="table-responsive">
                    <form name="frm_manage" id="frm_manage" method="POST" class="form-horizontal" action="{{url($module_url_path)}}/multi_action">
                            {{ csrf_field() }}
                        <input type="hidden" name="multi_action" value="" />
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 20px !important">   
                                        <input type="checkbox" class="filled-in checkbox-circle" name="selectall" id="select_all" onchange="chk_all(this)" /><label for="selectall"></label>
                                    </th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th style="width: 50px !important">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                         
                            </tbody>
                        </table>
                    </form>
                </div>

                <div class="add-form-section-main section-add-form">
                    <form action="{{url('/')}}/admin/location/store" id="frm_add" name="frm_add" method="post" enctype="multipart/form-data" onsubmit='addLoader()';>
                        {{csrf_field()}}
                        <div class="form-head-section">
                            Location Detail <span class="add-form-close-btn"><i class="ti-close"></i></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Location Name <i class="red">*</i></label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-layout-media-left-alt"></i></span>
                                <input type="text" id="location_name" name="location_name" class="form-control" placeholder="Enter Location" data-rule-required="true" maxlength="100">                                
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" id="proceed" class="fcbtn btn btn-danger btn-1g">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="left-menu-black-bg"></div>
                <div class="add-form-section-main edit-form-close-btn">
                    <form action="{{url($module_url_path)}}/update" id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data" onsubmit='addLoader()';>
                    {{csrf_field()}}
                    <input type="hidden" name="enc_id" id="enc_id" value="">
                        <div class="form-head-section">
                            Edit Blog Category <span class="add-form-close-btn"><i class="ti-close"></i></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Blog Category title<i class="red">*</i></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="ti-layout-media-left-alt"></i></span>
                                <input type="text" id="edit_category" name="edit_category" class="form-control" placeholder="Enter Blog title" value="" data-rule-required="true" maxlength="100">                                 
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" id="proceed_edit" class="fcbtn btn btn-danger btn-1g"> Submit</button>
                        </div>
                    </form>
                </div>
                
                
                <div class="left-menu-black-bg"></div>
                </div>
            </div>
        </div>
    </div>
<!--
    <script>
    $(".add-form-btn-section").on("click", function(){
        $("body").addClass("add-form-open");
    });
    $(".add-form-close-btn").on("click", function(){
        $("body").removeClass("add-form-open");
        $("body").removeClass("edit-form-open");
        $("#category").val("");
        $("#edit_category").val("");
    });   
    </script>
-->
    
    <script>
        $(".add-form-btn-section").on("click",function() {
            $("body").addClass("add-form-open");
        });
        $(".add-form-close-btn,.add-page-back-btn").on("click",function() {
            $("body").removeClass("add-form-open");
            $("body").removeClass("edit-form-open");
              $("#role").val("");
            $("#description").val("");
            $("#edit_role").val("");
            $("#edit_description").val("");
        }); 
    </script>
    <script>
        $('body').on('click','.edit_button',function(){        
            $("body").addClass("edit-form-open");        
        });
    </script>
    
    <script>
        $(document).ready(function () {
            $('#frm_edit').validate();
            $('#frm_add').validate();
            $('#myTable').DataTable({
                 ajax: {
            url: "{{ $module_url_path}}/load_data",
            data: function(d) {
                d['column_filter[title]']      = $("input[name='title']").val()
                d['column_filter[email]']      = $("input[name='email']").val()
                d['column_filter[status]']     = $( "#status option:selected" ).val()
            },"order": [[2, 'asc']]
        },
        columns: [
                {
                    render : function(data, type, row, meta)
                    {
                        return '<div class="check-box sorting_disabled"><input type="checkbox" class="filled-in case" name="checked_record[]" d="mult_change_'+row.id+'" value="'+row.id+'" /><label for="mult_change_'+row.id+'></label></div>';

                    },"orderable": false, "searchable":false
                },
                {data : 'title',"orderable":true,"searchable":true,name:'title'},
                {
                    render : function(data, type, row, meta) 
                    {
                        return row.build_status_btn;
                    },
                    "orderable": false, "searchable":false
                },
                {
                    render : function(data, type, row, meta) 
                    {
                        return row.build_action_btn;
                    },
                    "orderable": false, "searchable":false

                }
            ],
            });
        });
        
        $('#example23').DataTable({
            dom: 'Bfrtip'
            , buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });

        $('body').on('click','.edit_button',function(){
            var data_id = $(this).attr('data-id');
            var enc_id  = btoa(data_id);
            
            $.ajax({
                url : '{{ $module_url_path }}/edit/'+enc_id,
                type : "GET",
                dataType: 'JSON',
                success:function(resp){
                    if(resp.status=='true'){
                        $('#edit_category').val(resp.data.title);
                        $('#enc_id').val(btoa(resp.data._id));
                        $("body").addClass("edit-form-open");
                        return true;
                    }else if(resp.status=='false'){
                        $('#category-error').html('Category with this name already exists');
                        document.getElementById("submit").disabled = true;

                        return false;
                    }else{
                        $('#category-error').html('');
                        document.getElementById("submit").disabled = false;
                        return true;
                    }
                }
            })
        });

        function addLoader() {
            $('#frm_add,#frm_edit').submit(function(event) {
                if($("#frm_add").valid()==true)
                {
                    $("#proceed").html("<b><i class='fa fa-spinner fa-spin'></i></b> Processing...");
                    $("#proceed").attr('disabled', true);
                }
                else if($("#frm_edit").valid()==true)
                {
                    $("#proceed_edit").html("<b><i class='fa fa-spinner fa-spin'></i></b> Processing...");
                    $("#proceed_edit").attr('disabled', true);
                } 
                else
                {
                    event.preventDefault();
                }
            });
        }

      

    </script>
    <!--Style Switcher -->
    <script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection