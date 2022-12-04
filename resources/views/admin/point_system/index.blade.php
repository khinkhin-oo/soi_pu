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
                                    <th>Type</th>
                                    <th>From Range</th>
                                    <th>To Range</th>
                                    <th style="width: 50px !important">Status</th>
                                    {{-- <th style="width: 50px !important">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                         
                            </tbody>
                        </table>
                    </form>
                </div>

                <div class="add-form-section-main section-add-form">
                    <form action="{{url($module_url_path)}}/store" id="frm_add" name="frm_add" method="post" enctype="multipart/form-data" onsubmit='addLoader()';>
                        {{csrf_field()}}
                        <div class="form-head-section">
                            Add <span class="add-form-close-btn"><i class="ti-close"></i></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">System Name <i class="red">*</i></label>
                            <span style="color: red;">{{$errors->first('name')}}</span>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-layout-media-left-alt"></i></span>
                                <input class="form-control required valid" value="{{old('name')}}"   name="name"  type="text" placeholder="Name" data-rule-required="true" maxlength="20">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">From Range<i class="red" >*</i></label>
                            <span style="color: red;">{{$errors->first('range_from')}}</span>
                            <select name="range_from" required="range_from" data-rule-required="true" id="range_from" class="form-control">
                                <option value="">Select From Range</option>
                                @for($i=1;$i<=1000;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">To Range<i class="red">*</i></label>
                            <span style="color: red;">{{$errors->first('range_to')}}</span>
                            <select name="range_to" required="range_to" data-rule-required="true" id="range_to" class="form-control">
                                <option value="">Select To Range</option>
                                @for($i=1;$i<=1000;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>  
                        </div>
                        <div class="form-actions">
                            <button type="submit" id="proceed" class="fcbtn btn btn-danger btn-1g">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="left-menu-black-bg"></div>
                <div class="add-form-section-main edit-form-close-btn">
                    <form action="{{url($module_url_path)}}/update" id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data" onsubmit='addLoader()';>
                    {{csrf_field()}}
                    <input type="hidden" name="point_id" id="point_id" value="">
                        <div class="form-head-section">
                            Edit <span class="add-form-close-btn"><i class="ti-close"></i></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">System Name <i class="red">*</i></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="ti-layout-media-left-alt"></i></span>
                                <input type="text" id="edit_name" readonly="" name="edit_name" class="form-control" placeholder="Enter Name" value="" data-rule-required="true" maxlength="100">                                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">From Range<i class="red">*</i></label>
                            <select name="edit_range_from" required="edit_range_from" data-rule-required="true" id="edit_range_from" class="form-control">
                                <option value="">Select From Range</option>
                                @for($i=1;$i<=1000;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">To Range<i class="red">*</i></label>
                            <select name="edit_range_to" required="edit_range_to" data-rule-required="true" id="edit_range_to" class="form-control">
                                <option value="">Select To Range</option>
                                @for($i=1;$i<=1000;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit" id="proceed_edit" class="fcbtn btn btn-danger btn-1g"> Submit</button>
                        </div>
                    </form>
                </div>
                
                
                <div class="left-menu-black-bg"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".add-form-btn-section").on("click",function() {
            $("body").addClass("add-form-open");
        }); 
    </script>
    <script>
        $('body').on('click','.edit_button',function(){ 
            $("body").addClass("edit-form-open");      
        });
        $(".add-form-close-btn,.add-page-back-btn").on("click",function() {
            $("body").removeClass("add-form-open");
            $("body").removeClass("edit-form-open");
            $("#edit_location").val("");
        });
    </script>
    
    <script>
        $(document).ready(function () {
            $('#frm_edit').validate();
            $('#frm_add').validate();
            $('#myTable').DataTable({
                 ajax: {
            url: "{{ $module_url_path}}/load_data",
            data: function(d) {
                d['column_filter[name]']      = $("input[name='name']").val()
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
                {data : 'name',"orderable":true,"searchable":true,name:'name'},
                {data : 'range_from',"orderable":true,"searchable":true,name:'range_from'},
                {data : 'range_to',"orderable":true,"searchable":true,name:'range_to'},                
                {
                    render : function(data, type, row, meta) 
                    {
                        return row.build_status_btn;
                    },
                    "orderable": false, "searchable":false
                }/*,
                {
                    render : function(data, type, row, meta) 
                    {
                        return row.build_action_btn;
                    },
                    "orderable": false, "searchable":false

                }*/
            ],
            });
        });

        $('body').on('click','.edit_button',function(){
            var data_id = $(this).attr('data-id');
            var enc_id  = btoa(data_id);
            // alert(enc_id);

            
            $.ajax({
                url : '{{ $module_url_path }}/edit/'+enc_id,

                type : "GET",
                dataType: 'JSON',
                success:function(resp){
                    if(resp.status=='success')
                    {
                        $('#edit_name').val(resp.data.name);
                        $('#point_id').val(btoa(resp.data.id));
                        $('#edit_range_from').val(resp.data.range_from);
                        $('#edit_range_to').val(resp.data.range_to);
                        $("body").addClass("edit-form-open");
                        return true;
                    }
                }
            })
        });

        function addLoader() {
            $('#frm_add,#frm_edit').submit(function(event) {
                if($("#frm_add").valid()==true)
                {
                    $("#proceed").html("<b><i class='fa fa-spinner fa-spin'></i></b> Processing...");
                    $("#proceed").attr('disabled', true);
                }
                else if($("#frm_edit").valid()==true)
                {
                    $("#proceed_edit").html("<b><i class='fa fa-spinner fa-spin'></i></b> Processing...");
                    $("#proceed_edit").attr('disabled', true);
                } 
                else
                {
                    event.preventDefault();
                }
            });
        }

      

    </script>
    <!--Style Switcher -->
    <script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection