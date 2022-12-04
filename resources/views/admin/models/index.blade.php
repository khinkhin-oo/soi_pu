@extends('admin.layout.master')
@section('main_content')
<div class="container-fluid">
    @include('admin.layout.breadcrumb')
    <div class="row">
        <div class="col-sm-12">
            @include('admin.layout._operation_status')

            <div class="navbar navbar-inverse bg-indigo-400 navbar-component">
                <div class="navbar-collapse" id="navbar-demo">
                    <ul class="nav navbar-nav">
                        <li class="mega-menu mega-menu-wide">
                            <a href="javascript:void(0);">
                                <b>Models</b>
                                <span class="badge bg-indigo-800 badge-inline position-right"><b>{{$count}}</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="white-box">
                <div  class="table-action-buttons-top">
                    @if($count >= $limitcount  && session('subadmin_id')!=null)
                    @else
                    <a href="{{ url($module_url_path) }}/create" class="btn  add-form-btn-section" title="Add">Add</i></a>
                    @endif
                    <a href="{{ url($module_url_path) }}" class="btn  add-form-btn-section" title="Refresh">Refresh</i></a>
                    <a href="javascript:void(0)" class="btn" title="Deactivate Multiple" onclick="check_multi_action('frm_manage','deactivate')">Deactivate</a>
                    <a href="javascript:void(0)" class="btn" title="Activate Multiple" onclick="check_multi_action('frm_manage','activate')">Activate</a>
                    <a href="javascript:void(0)" class="btn" title="Delete Multiple" onclick="check_multi_action('frm_manage','delete')">Delete</a>
                </div>
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
                                    <th>Name EN</th>
                                    <th>Name TH</th>
                                    <th>Index of order</th>
                                    <th>Vaccination Status</th>
<!--                                    <th>Price</th>-->
                                    <th>Status</th>
                                    @if(session('subadmin_id')==NULL)
                                    <td>Added By</td>
                                    @endif
                                    <th>Company</th>
<!--                                    <th>Country</th>-->
                                    {{-- <th>Role(s)</th> --}}
                                    <th>Added On</th>
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
            "bStateSave": true,
            "bSearchable":true,
            //"pageLength": 2,
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
                {data : 'first_name',"orderable":false,"searchable":true,name:'first_name'},
                {data : 'first_name_th',"orderable":false,"searchable":true,name:'first_name_th'},
                {data : 'order_list',"orderable":false,"searchable":true,name:'order_list'},
                // {data : 'email',"orderable":false,"searchable":true,name:'email'},
                {data : 'vaccine_status',"orderable":false,"searchable":true,name:'vaccine_status'},
                // {data : 'price',"orderable":false,"searchable":true,name:'price'},
                {data : 'status',"orderable":false,"searchable":true,name:'status'},
                @if(session('subadmin_id')==NULL)
                    {data : 'added_by',"orderable":false,"searchable":true,name:'added_by'},
                @endif
                {data : 'company',"orderable":false,"searchable":true,name:'company'},
                // {data : 'country',"orderable":false,"searchable":true,name:'country'},
                {data : 'created_at',"orderable":false,"searchable":true,name:'created_at'},

                {
                    render : function(data, type, row, meta)
                    {
                        return row.built_action_btns;
                    },
                    "orderable": false, "searchable":false
                },

            ],
        });
    });

</script>
<!--Style Switcher -->
<script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection
