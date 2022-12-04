@extends('admin.layout.master')    
@section('main_content')
<div class="container-fluid">
    @include('admin.layout.breadcrumb')
    <div class="row">
        <div class="col-sm-12">
            @include('admin.layout._operation_status')
            <div class="white-box">
                <div  class="table-action-buttons-top">
                    <a href="{{ $module_url_path}}" class="btn ">Refresh</a>
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
                                    <th>   
                                        <input type="checkbox" class="filled-in checkbox-circle" name="selectall" id="select_all" onchange="chk_all(this)" /><label for="selectall"></label>
                                    </th>
                                    <th>Title</th>
                                    <th>Notification Message</th>
                                    <th>Arrived On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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
            "ordering": false,
            "bStateSave": true,
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
            {data : 'title',"orderable":true,"searchable":true,name:'title'},
            {data : 'notification_message',"orderable":true,"searchable":true,name:'notification_message'},
            {data : 'arrived_on',"orderable":true,"searchable":true,name:'arrived_on'},
            {
                render : function(data, type, row, meta) 
                {
                    return row.built_action_button;
                },
                "orderable": false, "searchable":false
            }
        ],
        });

    });
</script>
<!--Style Switcher -->
<script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection
