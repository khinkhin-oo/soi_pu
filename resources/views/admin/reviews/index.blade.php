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
                    <a href="{{ url($module_url_path) }}" class="btn ">Refresh</a>
                    <a href="javascript:void(0)" class="btn " title="Deactivate Multiple" onclick="check_multi_action('frm_manage','deactivate')">Deactivate</a>
                    <a href="javascript:void(0)" class="btn " title="Activate Multiple" onclick="check_multi_action('frm_manage','activate')">Activate</a>
                    {{-- <a href="javascript:void(0)" class="btn " title="Delete Multiple" onclick="check_multi_action('frm_manage','delete')">Delete</a> --}}
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
                                    <th>From User</th>
                                    <th>To Lawyer</th>
                                    {{-- <th>Review</th> --}}
                                    <th>Rating</th>
                                    <th>Status</th>
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
    $(document).ready(function ()
    {
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
	            {data : 'from_user',"orderable":true,"searchable":true,name:'from_user'},
	            {data : 'to_lawyer',"orderable":true,"searchable":true,name:'to_lawyer'},
	            // {data : 'review',"orderable":true,"searchable":true,name:'review'},
	            {data : 'ratings',"orderable":true,"searchable":true,name:'ratings'},
	            {
	                render : function(data, type, row, meta) 
	                {
	                    return row.build_status_btn;
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