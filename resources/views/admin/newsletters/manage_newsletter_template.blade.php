@extends('admin.layout.master')    
@section('main_content')
<div class="container-fluid">
    @include('admin.layout.breadcrumb')
    <div class="row">
        <div class="col-sm-12">
            @include('admin.layout._operation_status')
            <div class="white-box">
                <div class="table-action-buttons-top">
                    <a href="javascript:void(0)" class="btn add-form-btn-section" title="Add New template">Add</a>
                    <a href="javascript:void(0)" class="btn">Refresh</a> 
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
                                    <th>Title</th>
                                    <th>Subject</th>
                                    <th>Created at</th>
                                    <th style="width: 50px !important">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                         
                            </tbody>
                        </table>
                    </form>
                </div>
                
                <div class="add-form-section-main section-add-form">
                    <form action="{{$module_url}}/store" id="frm_blogs_page" name="frm_blogs_page" class="cmxform" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-head-section">
                            Add Newsletter Template <span class="add-form-close-btn"><i class="ti-close"></i></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Title <i class="red">*</i></label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-marker-alt"></i></span>
                                <input type="text" id="title" name="title"  data-rule-required="true" class="form-control" maxlength="100" >
                                <span class="error">{{ $errors->first('title') }} </span>
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="control-label">Subject <i class="red">*</i></label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-file"></i></span>
                                <input type="text" id="subject"  name="subject"  data-rule-required="true"  class="form-control " maxlength="200">
                                <span class="error">{{ $errors->first('subject') }} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Content <i class="red">*</i></label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-receipt"></i></span>
                                <textarea  name="description" id="description" class="form-control" data-rule-required="true" rows="15" tabindex="1"></textarea>
                                <span class="error">{{ $errors->first('description') }} </span>
                            </div>
                        </div>                        
                        <div class="form-actions">
                            <button type="submit" id="proceed" class="fcbtn btn btn-danger btn-1g">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="left-menu-black-bg"></div>
                
                <div class="add-form-section-main edit-form-close-btn">
                    <form action="{{$module_url}}/store" id="frm_blogs_page" name="frm_blogs_page" class="cmxform" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-head-section">
                            Edit Newsletters Template  <span class="add-form-close-btn"><i class="ti-close"></i></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Title <i class="red">*</i></label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-marker-alt"></i></span>
                                <input type="text" id="title" name="title"  data-rule-required="true" class="form-control" value="{{ $arr_news_letter['title'] ?? 'NA' }}" maxlength="100">
                                <span class="error">{{ $errors->first('title') }} </span>
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="control-label">Subject <i class="red">*</i></label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-file"></i></span>
                                <input type="text" id="subject"  name="subject"  data-rule-required="true"  class="form-control " value="{{ $arr_news_letter['subject'] ?? 'NA' }}" maxlength="200">
                                <span class="error">{{ $errors->first('subject') }} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Content <i class="red">*</i></label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="ti-receipt"></i></span>
                                <textarea  name="description" id="description" class="form-control" data-rule-required="true" rows="15" tabindex="1">{{ $arr_news_letter['news_description'] ?? 'NA' }} </textarea>
                                <span class="error">{{ $errors->first('description') }} </span>
                            </div>
                        </div>                        
                        <div class="form-actions">
                            <button type="submit" id="proceed" class="fcbtn btn btn-danger btn-1g">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".add-form-btn-section").on("click", function(){
        $("body").addClass("add-form-open");
    });
    $(".add-form-close-btn").on("click", function(){
        $("body").removeClass("add-form-open");
        $("body").removeClass("edit-form-open");        
    });   
</script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
             ajax: {
        url: "{{ $module_url_path}}/load_template_data",
        data: function(d) {
            d['column_filter[title]']   = $("input[name='title']").val()
            d['column_filter[subject]'] = $("input[name='subject']").val();
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
        {data : 'title',"orderable":false,"searchable":true,name:'title'},
        {data : 'subject',"orderable":false,"searchable":true,name:'subject'},
        {data : 'created_at',"orderable":false,"searchable":true,name:'created_at'},
        {
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
<script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
@endsection