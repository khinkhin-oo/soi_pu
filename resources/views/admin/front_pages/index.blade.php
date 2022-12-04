@extends('admin.layout.master')    
@section('main_content')
<div class="container-fluid">
    @include('admin.layout.breadcrumb')
    <div class="row">
        <div class="col-sm-12">
            @include('admin.layout._operation_status')
            <div class="white-box">
                <div  class="table-action-buttons-top">
                    <a href="{{ url($module_url_path) }}/create" title="create" class="btn add-form-btn-section" >Add</a>
                    <a href="{{ url($module_url_path) }}" title="refresh" class="btn ">Refresh</a> 
                    <a href="javascript:void(0)" class="btn " title="Deactivate Multiple" onclick="check_multi_action('frm_manage','deactivate')">Deactivate</a>
                    <a href="javascript:void(0)" class="btn " title="Activate Multiple" onclick="check_multi_action('frm_manage','activate')">Activate</a>                    
                </div>
                <!--<br>-->
                <div class="table-responsive">
                    <form name="frm_manage" id="frm_manage" method="POST" class="form-horizontal" action="{{url($module_url_path)}}/multi_action">
                        {{ csrf_field() }}
                        <input type="hidden" name="multi_action" value="" />
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 20px !important" >   
                                        <input type="checkbox" class="filled-in checkbox-circle" name="selectall" id="select_all" onchange="chk_all(this)" /><label for="selectall"></label>
                                    </th>
                                    <th>Page Title</th>
                                    <th>Meta Title</th>
                                    <th>Added On</th>
                                    <th>Status
                                        <!-- <select class="search-block-new-table column_filter form-control" id="status" name="status">
                                            <option value="">Select</option>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select> -->
                                    </th>
                                    <th style="width: 50px !important">Action</th>
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
             ajax: {
        url: "{{ $module_url_path}}/load_data",
        data: function(d) {
            d['column_filter[full_name]']   = $("input[name='full_name']").val()
            d['column_filter[email]']       = $("input[name='email']").val()
            d['column_filter[status]']      = $( "#status option:selected" ).val()
        },"order": [[2, 'asc']]
    },
    columns: [
        /*{
            render : function(data, type, row, meta) 
            {
                return collapse

            },"orderable": false, "searchable":false
        },*/
        {
            render : function(data, type, row, meta)
            {
                return '<div class="check-box sorting_disabled"><input type="checkbox" class="filled-in case" name="checked_record[]" d="mult_change_'+row.id+'" value="'+row.id+'" /><label for="mult_change_'+row.id+'></label></div>';

            },"orderable": false, "searchable":false
        },
        {data : 'page_title',"orderable":false,"searchable":true,name:'page_title'},
        {data : 'meta_title',"orderable":false,"searchable":true,name:'meta_title'},
        {data : 'created_at',"orderable":false,"searchable":true,name:'created_at'},
        {
            data: "build_status_btn",
            orderable: !1,
            searchable: !0,
            name: "build_status_btn"
        }, {
            data: "build_action_btn",
            orderable: !1,
            searchable: !0,
            name: "build_action_btn"
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
</script>
<!--Style Switcher -->
<script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
      @endsection