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
                    {{-- <a href="javascript:void(0)" class="btn add-form-btn-section">Add</a> --}}
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
                                        <th>User Name</th>
                                        <th>Model Name</th>
                                        <th>Comment</th>
                                        <th>Comment Date</th>
                                        <th style="width: 50px !important">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                 ajax: {
            url: "{{ $module_url_path}}/load_data",
        },
        columns: [
                {
                    render : function(data, type, row, meta)
                    {
                        return '<div class="check-box sorting_disabled"><input type="checkbox" class="filled-in case" name="checked_record[]" d="mult_change_'+row.id+'" value="'+row.id+'" /><label for="mult_change_'+row.id+'></label></div>';

                    },"orderable": false, "searchable":false
                },
                // alert(data);
                {data : 'user_full_name',"orderable":true,"searchable":true,name:'user_full_name'},
                {data : 'model_full_name',"orderable":true,"searchable":true,name:'model_full_name'},
                {data : 'comment',"orderable":true,"searchable":true,name:'comment'},
                {data : 'created_at',"orderable":true,"searchable":true,name:'created_at'},
                {
                    render : function(data, type, row, meta) 
                    {
                        return row.build_status_btn;
                    },
                    "orderable": false, "searchable":false
                },
            ],
            });
        });      

    </script>
    <script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection