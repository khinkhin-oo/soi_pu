@extends('admin.layout.master')    
@section('main_content')
<div class="container-fluid">
    @include('admin.layout.breadcrumb')
    <div class="row">
        <div class="col-sm-12">
            @include('admin.layout._operation_status')
            <div class="white-box">
                <!--<br>-->
                <form class="form-horizontal adminex-form" method="post" id="frm_newsletter" name="frm_newsletter" action="{{ url($module_url_path) }}/send">
                    {{ csrf_field() }}
                    <input type="hidden" name="multi_action" value="" />
                    <div class="form-group select-newsletter-section-main">
                        <div class="col-lg-4">
                            <div class="send-newsletter-section">
                                <select class="form-control" data-rule-required="true" name="news_letter" id="news_letter">
                                    <option value=""> -- Select Newsletter Template -- </option>    
                                    @if(isset($arr_newsletters) && sizeof($arr_newsletters)>0)
                                        @foreach($arr_newsletters as $newsletter)
                                            <option value="{{base64_encode($newsletter['id'])}}">{{isset($newsletter['title'])?$newsletter['title']:'-'}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="error">{{ $errors->first('news_letter') }} </span>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Send</button>
                    </div>
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
                                        <th>Email</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                </tbody>
                            </table>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#frm_newsletter').validate();
    });
</script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
             ajax: {
        url: "{{ $module_url_path}}/load_data",
        data: function(d) {
            d['column_filter[title]']   = $("input[name='title']").val()
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
                return '<div class="check-box sorting_disabled"><input type="checkbox" class="filled-in case" name="checked_record[]" d="mult_change_'+row.email+'" value="'+row.email+'" /><label for="mult_change_'+row.email+'></label></div>';

            },"orderable": false, "searchable":false
        },
        {data : 'email',"orderable":false,"searchable":true,name:'email'},
        {data : 'created_at',"orderable":false,"searchable":false,name:'created_at'},
        
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