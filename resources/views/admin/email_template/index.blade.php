@extends('admin.layout.master')    
@section('main_content')
<div class="container-fluid">
    @include('admin.layout.breadcrumb')
    <div class="row">
        <div class="col-sm-12">
            @include('admin.layout._operation_status')
            <div class="white-box">
                <div class="table-action-buttons-top">
                    <a href="{{ url($module_url_path) }}" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="fa fa-refresh" title="refresh"></i></a> 
                    {{-- <a href="javascript:void(0)" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" title="Deactivate Multiple" onclick="check_multi_action('frm_manage','deactivate')"><i class="fa fa-lock"></i></a>
                    <a href="javascript:void(0)" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" title="Activate Multiple" onclick="check_multi_action('frm_manage','activate')"><i class="fa fa-unlock"></i></a> --}}
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
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>From</th>
                                    <th>From Email</th>
                                    <th>Added On</th>
                                    <th>Actions</th>
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
                data: function(d) {
                    d['column_filter[q_template_name]']  = $("input[name='q_template_name']").val()
                    d['column_filter[status]']           = $( "#status option:selected" ).val()
                },"order": [[2, 'asc']]
            },
            columns: [
                {
                    render : function(data, type, row, meta)
                    {
                        return '<div class="check-box sorting_disabled"><input type="checkbox" class="filled-in case" name="checked_record[]" d="mult_change_'+row.id+'" value="'+row.id+'" /><label for="mult_change_'+row.id+'></label></div>';

                    },"orderable": false, "searchable":false
                },
                {data : 'template_name',"orderable":false,"searchable":true,name:'template_name'},
                {data : 'template_subject',"orderable":false,"searchable":false,name:'template_subject'},
                {data : 'template_from',"orderable":false,"searchable":true,name:'template_from'},
                {data : 'template_from_mail',"orderable":false,"searchable":true,name:'template_from_mail'},
                {data : 'created_at',"orderable":false,"searchable":true,name:'created_at'},

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