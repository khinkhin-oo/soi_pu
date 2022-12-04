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
                                    <th>Title</th>
                                    <th>Slug</th>
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
                    <form action="{{url('/')}}/admin/blog_category/store" id="frm_add" name="frm_add" method="post" enctype="multipart/form-data" onsubmit='addLoader()';>
                        {{csrf_field()}}
                        <div class="form-head-section">
                            Add Blog Category <span class="add-form-close-btn"><i class="ti-close"></i></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Blog Category title <i class="red">*</i></label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-layout-media-left-alt"></i></span>
                                <input type="text" id="category" name="category" class="form-control" placeholder="Enter Category title" data-rule-required="true" maxlength="100">                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Blog Category slug  <i class="red">*</i></label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-layout-media-left-alt"></i></span>
                                <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Category slug" data-rule-required="true" readonly="true">
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

                         <div class="form-group">
                            <label class="control-label">Blog Category slug<i class="red">*</i></label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-layout-media-left-alt"></i></span>
                                <input type="text" id="edit_slug" name="edit_slug" class="form-control" placeholder="Enter Meta title" data-rule-required="true" readonly="true" value="">                                 
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
    <script>
    $(".add-form-btn-section").on("click", function(){
        $("body").addClass("add-form-open");
    });
    $(".add-form-close-btn").on("click", function(){
        $("body").removeClass("add-form-open");
        $("body").removeClass("edit-form-open");
        $("#category").val("");
        $("#slug").val("");
        $("#edit_category").val("");
        $("#edit_slug").val("");
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
                {data : 'slug',"orderable":true,"searchable":true,name:'slug'},
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
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [
                        {
                            "visible": false
                            , "targets": 2
                        }
                    ]
                    , "order": [[2, 'asc']]
                    , "displayLength": 25
                    , "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping

                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    }
                    else {
                        table.order([2, 'asc']).draw();
                    }
                });
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
                        $('#edit_slug').val(resp.data.slug);
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

        $('#category').on('change',function(){
            var category = $('#category').val();
            $.ajax({
                url : '{{ $module_url_path }}/check_category',
                data: { category: category },
                type : "GET",
                dataType: 'JSON',
                success:function(resp){
                    if(resp.status=='true'){
                        $('#slug').val(resp.data);
                        $('#category-error').html('');
                        document.getElementById("submit").disabled = false;
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

        $('#edit_category').on('change',function(){
            var category = $('#edit_category').val();
            $.ajax({
                url : '{{ $module_url_path }}/check_category',
                data: { category: category },
                type : "GET",
                dataType: 'JSON',
                success:function(resp){
                    if(resp.status=='true'){
                        $('#edit_slug').val(resp.data);
                        $('#category-error').html('');
                        document.getElementById("submit").disabled = false;
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
    </script>
    <!--Style Switcher -->
    <script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection