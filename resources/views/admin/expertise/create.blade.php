@extends('admin.layout.master')    
@section('main_content')
    <div class="container-fluid">
       @include('admin.layout.breadcrumb')
       <div class="row">
            <div class="col-sm-12">
                <div class="white-box p-l-20 p-r-20">
                   @include('admin.layout._operation_status')
                    <div class="row">
                        <div class="col-md-12">
                             <form action="{{url($module_url_path)}}/store" id="frm_add_cities" name="frm_add_cities" method="post" enctype="multipart/form-data" onsubmit='addLoader()';>
                                   {{csrf_field()}}
                                <div class="form-body">
                                    <h3 class="box-title">Add Expertise</h3>
                                    <hr>
                                    <div class="col-md-8">
                                        <div class="form-group ">
                                            <label class="control-label">Expertise Name <i class="red" >*</i></label>
                                            <input type="text" name="category_name" class="form-control" placeholder="Enter Expertise Name" data-rule-required="true" > 
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-actions">
                                            <button type="submit" id="proceed" class="fcbtn btn btn-danger btn-1g"> Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#frm_add_cities').validate();
        });
        
    </script>
    
    <script type="text/javascript">   
       function addLoader() {
            $('#frm_add_cities').submit(function(event) {
                if($("#frm_add_cities").valid()==true)
                {
                    $("#proceed").html("<b><i class='fa fa-spinner fa-spin'></i></b> Processing...");
                    $("#proceed").attr('disabled', true);
                } 
                else
                {
                    event.preventDefault();
                }
            });
        }
    </script>
    @endsection