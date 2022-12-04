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
                                <b>{{$module_title_sub}}</b>
                                <span class="badge bg-indigo-800 badge-inline position-right"><b>{{$count}}</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="white-box">
                <div  class="table-action-buttons-top">
                   
                    {{-- <a href="{{ url($module_url_path) }}/create" class="btn  add-form-btn-section" title="Add">Add</i></a>   --}}
                    <a href="{{ url($module_url_path)."/users" }}" class="btn  add-form-btn-section" title="Refresh">Refresh</i></a> 
                   {{--  <a href="javascript:void(0)" class="btn" title="Deactivate Multiple" onclick="check_multi_action('frm_manage','deactivate')">Deactivate</a>
                    <a href="javascript:void(0)" class="btn" title="Activate Multiple" onclick="check_multi_action('frm_manage','activate')">Activate</a>
                    <a href="javascript:void(0)" class="btn" title="Delete Multiple" onclick="check_multi_action('frm_manage','delete')">Delete</a> --}}
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
                                    <th>Full Name</th>
                                    <th>Email Address</th>
                                    <th>Role</th>
                                    <th>Username</th>
                                    <th>Added On</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                    @if(session('subadmin_id')==null)
                                        <th style="width: 200px !important">Limit advertisers' numbers</th>
                                        <th style="width: 200px !important">Expiredate advertisers</th>
                                    @endif
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
                {data : 'full_name',"orderable":false,"searchable":true,name:'full_name'},
                {data : 'email',"orderable":false,"searchable":true,name:'email'},
                {data : 'role',"orderable":false,"searchable":true,name:'role'},
                {data : 'user_name',"orderable":false,"searchable":true,name:'mobile_number'},
                {data : 'created_at',"orderable":false,"searchable":true,name:'created_at'},

                {
                    render : function(data, type, row, meta) 
                    {
                        return row.build_user_status_btn;
                    },
                    "orderable": false, "searchable":false

                } ,   
                {
                    render : function(data, type, row, meta) 
                    {
                        return row.build_status_btn;
                    },
                    "orderable": false, "searchable":false

                } ,    
                 @if(session('subadmin_id')==null)
                {
                    render : function(data, type, row, meta)
                    {
                        $string = '<select onchange="changelimit(this)" data="'+row.id+'">';
                        if(row.limitcount==1)
                        {
                            $string +='<option selected value="1">1</option>';
                        }
                        else
                        {
                            $string +='<option value="1">1</option>';
                        }

                        if(row.limitcount==2)
                        {
                            $string +='<option selected value="2">2</option>';
                        }
                        else
                        {
                            $string +='<option value="2">2</option>';
                        }

                        if(row.limitcount==3)
                        {
                            $string +='<option selected value="3">3</option>';
                        }
                        else
                        {
                            $string +='<option value="3">3</option>';
                        }

                        if(row.limitcount==4)
                        {
                            $string +='<option selected value="4">4</option>';
                        }
                        else
                        {
                            $string +='<option value="4">4</option>';
                        }

                        if(row.limitcount==5)
                        {
                            $string +='<option selected value="5">5</option>';
                        }
                        else
                        {
                            $string +='<option value="5">5</option>';
                        }
                        $string+='</select>';
                        return $string;

                    },"orderable": false, "searchable":false
                },   
                {
                    render : function(data, type, row, meta)
                    {
                        $string = '<form action="{{url($module_url_path)}}/updatedate" method="post"> {{ csrf_field() }}';
                        if(row.expiredate)
                        {
                            $string += "<input type='date' name='expiredate' value='"+row.expiredate+"' />";
                        }
                        else
                        {
                            $string += "<input type='date' name='expiredate' />";
                        }

                        $string += "<input type='hidden' name='userid' value='"+row.id+"' />";
                        $string +="<div style='text-align:center;padding-top:5px;'><button type='submit' class='btn label label-success label-mini'>Save</button> <a href='{{url($module_url_path)}}/cleardate/"+row.id+"'><button type='button' class='btn label label-danger label-mini'>Clear</button></a></div>";
                        $string+='</form>';
                        return $string;

                    },"orderable": false, "searchable":false
                },   
                @endif     
            ],
        });
    });
        
</script>
<!--Style Switcher -->
<script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
<script type="text/javascript">
    function changelimit(selectObject)
    {
        var selected = selectObject.value;  
        var id = selectObject.getAttribute("data");
        window.location.replace("{{asset('admin/users/changelimit/')}}"+"/"+selected+"/"+id);
    }
</script>
@endsection