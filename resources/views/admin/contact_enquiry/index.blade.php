@extends('admin.layout.master')    
@section('main_content')
            <div class="container-fluid">
                 @include('admin.layout.breadcrumb')
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        @include('admin.layout._operation_status')
                        <div class="white-box">
                            <div  class="table-action-buttons-top">
                                <a href="{{ url($module_url_path) }}" class="btn add-form-btn-section">Refresh</a>
                                <a href="javascript:void(0)" class="btn " title="Delete Multiple" onclick="check_multi_action('frm_manage','delete')">Delete</a>
                            </div>
                            <!--<br>-->
                            <form name="frm_manage" id="frm_manage" method="POST" class="form-horizontal" action="{{url($module_url_path)}}/multi_action">
                                {{ csrf_field() }}
                                <input type="hidden" name="multi_action" value="" />
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important">   
                                                    <input type="checkbox" class="filled-in checkbox-circle" name="selectall" id="select_all" onchange="chk_all(this)" />
                                                    <label for="selectall"></label>
                                                </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Created At</th>
                                                <th>Responded?</th>
                                                <th style="width: 50px !important">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
        
  
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                 ajax: {
            url: "{{ $module_url_path}}/load_data",
            data: function(d) {
                d['column_filter[title]']   = $("input[name='title']").val()
                d['column_filter[email]']       = $("input[name='email']").val()
                d['column_filter[status]']      = $( "#status option:selected" ).val()
            },"order": [[2, 'asc']]
        },
        columns: [
            {
                render : function(data, type, row, meta)
                {
                    return '<div class="check-box sorting_disabled"><input type="checkbox" class="filled-in case" name="checked_record[]" d="mult_change_'+row.id+'" value="'+row.id+'" /><label for="mult_change_'+row.id+'></label></div>';

                },"orderable": false, "searchable":false
            },
            {data : 'name',"orderable":true,"searchable":true,name:'name'},
            {data : 'email',"orderable":true,"searchable":true,name:'email'},
            {data : 'created_at',"orderable":true,"searchable":true,name:'created_at'},
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
    </script>
    <!--Style Switcher -->
    <script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
          @endsection