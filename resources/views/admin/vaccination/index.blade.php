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
                    <a href="{{ url($module_url_path) }}" class="btn  add-form-btn-section" title="Refresh">All</i></a>
                    <a href="{{ url($module_url_path) }}?status=PENDING" class="btn  add-form-btn-section" title="PENDING">Pending</i></a>
                    <a href="{{ url($module_url_path) }}?status=APPROVED" class="btn  add-form-btn-section" title="APPROVED">Approved</i></a>
                    <a href="{{ url($module_url_path) }}?status=REJECTED" class="btn  add-form-btn-section" title="REJECTED">Rejected</i></a>
                </div>
                <div class="table-responsive">
                    <form name="frm_manage" id="frm_manage" method="POST" class="form-horizontal" action="{{url($module_url_path)}}/multi_action">
                        {{ csrf_field() }}
                        <input type="hidden" name="multi_action" value="" />
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name EN</th>
                                    <th>Name TH</th>
                                    <th>Vaccination Certificate</th>
                                    <th>Status</th>
                                    <th>Action</th>
<!--                                    <th>Reject</th>-->
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
    function approve_vaccine(url,action,id) {
        $.ajax({
            type: 'GET',
            url: url+'/'+action+'/'+id, // url: url
            dataType: 'json',
            success: function(response) {
                location.reload()
            }
        });
    }

    function reject_vaccine(url,action,id) {
        var reason = document.getElementById('reject_reason_' + id).value;
        $.ajax({
            type: 'GET',
            url: url+'/'+action+'/'+id+'/'+reason,
            dataType: 'json',
            success: function(response) {
                location.reload()
            }
        });
    }

    $(document).ready(function () {
        $('#myTable').DataTable({
            "bStateSave": true,
            "bSearchable":true,
            //"pageLength": 2,
            ajax: {
                url: "{{ $module_url_path}}/load_data/?status={{ request()->query('status') }}",
            },
            columns: [
                {data : 'first_name',"orderable":false,"searchable":true,name:'first_name'},
                {data : 'first_name_th',"orderable":false,"searchable":true,name:'first_name_th'},
                {
                    render : function(data, type, row, meta)
                    {
                        if(row.vaccine_image !== null && row.vaccine_image != '') {
                            return '<div><img class="mt-2" src="' + row.vaccine_image + '" style="height:200px;width:200px;"></div>';
                        } else {
                            return '<div></div>';
                        }

                    },"orderable": false, "searchable":false
                },
                {data : 'vaccine_status',"orderable":false,"searchable":true,name:'vaccine_status'},
                {data : 'action',"orderable":false,"searchable":true,name:'action'},
                // {data : 'approve',"orderable":false,"searchable":true,name:'approve'},
                // {data : 'reject',"orderable":false,"searchable":true,name:'reject'}
            ],
        });
    });

</script>
<!--Style Switcher -->
<script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection
