@extends('admin.layout.master')
@section('main_content')
<style>
    .modifiers-add-button .add-remove-btn {right: -30px;top: 3px;padding: 0px 7px;}
    #modifiers .remove-btn-block{position: absolute;top: 2px;right: -30px;padding: 0 7px;line-height: 30px;}
    .error-current
    {
        border: 1px solid #fd1716;
        background: #ff00003b;
    }
</style>

<link href="{{url('/')}}/assets/multi_image_assets/css/multiselect.css" rel="stylesheet"/>
<link href="{{url('/')}}/assets/multi_image_assets/css/jquery.multiselect.css" rel="stylesheet" />
<script src="{{ url('/')}}/assets/multi_image_assets/js/multiselect.min.js"></script>
<script src="{{ url('/')}}/assets/multi_image_assets/js/jquery.multiselect.js"></script>
<link href="{{url('/')}}/assets/multi_image_assets/css/bootstrap-theme.min.css" rel="stylesheet"/>
<script src="{{ url('/')}}/assets/multi_image_assets/js/jquery.min.js"></script>
<script src="{{ url('/')}}/assets/multi_image_assets/js/bootstrap1.min.js""></script>
<link href="{{url('/')}}/assets/multi_image_assets/css/bootstrap-multiselect.css" rel="stylesheet"/>
    <!-- <script src="script.js"></script> -->

<!-- Menu CSS -->
<div class="container-fluid">
    @include('admin.layout.breadcrumb')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box p-l-20 p-r-20">
                @include('admin.layout._operation_status')
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ $module_url_path.'/update/'.base64_encode($arr_data['id']) }}" id="frm_store_menu" name="frm_store_menu" method="post" enctype="multipart/form-data" onsubmit='addLoader()' ;>
                            {{csrf_field()}}
                            {{-- {{dd($arr_data['get_companies'][0]['id'])}} --}}
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-body">

                                <h3 class="box-title">Edit Area Model</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Area Name EN / ชื่อ <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-user"></i></span>
                                                <input type="text" id="area_name" required="" name="area_name" class="form-control" placeholder="Enter your Name" maxlength="40" value="<?php echo isset($arr_data['area_name'])? $arr_data['area_name']: '' ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Area Name TH / ชื่อ <i class="red">*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-user"></i></span>
                                                <input type="text" id="area_name_th" required="" name="area_name_th" class="form-control" placeholder="Enter your Name" maxlength="40" value="<?php echo isset($arr_data['area_name_th'])? $arr_data['area_name_th']: '' ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Location / ที่ตั้ง<i class="red" >*</i></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-location-pin"></i></span>
                                                <select name="location[]" multiple="" required="" data-rule-required="true" id="location" class="form-control">
                                                    <option value="">Select Location </option>
                                                    @if(isset($arr_location) && count($arr_location)>0)
                                                    @foreach($arr_location as $location)
                                                    <?php $check = false ?>
                                                    @if(!empty($arr_data['locations']))
                                                    @foreach (json_decode($arr_data['locations']) as $item)
                                                    @if($item == $location['id'])
                                                    <?php $check = true ?>
                                                    @endif
                                                    @endforeach
                                                    @endif

                                                    @if($check==true)
                                                    <option value="{{$location['id']}}" selected="selected">{{$location['location_name']}} / {{$location['location_name_th']}}</option>
                                                    @else
                                                    <option value="{{$location['id']}}">{{$location['location_name']}} / {{$location['location_name_th']}}</option>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span style="color: red;">{{$errors->first('category')}}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-actions">
                                                <button type="submit" id="proceed" class="fcbtn btn btn-danger btn-1g">Update</button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
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



<script src="{{url('/')}}/assets/js/loader.js"></script>


{{-- Form validation with submit loader --}}
<script type="text/javascript">
    $(document).ready(function(){
// $('#frm_store_menu').validate();
    });

    function addLoader() {
        $('#frm_store_menu').submit(function(event) {
            if($("#frm_store_menu").valid()==true)
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



<script type="text/javascript" src="{{url('/')}}/assets/clock/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/assets/clock/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/assets/clock/dist/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker()
        .find('input').change(function(){
        console.log(this.value);
    });
    var input = $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });

    $('.clockpicker-with-callbacks').clockpicker({
        donetext: 'Done',
        init: function() {
            console.log("colorpicker initiated");
        },
        beforeShow: function() {
            console.log("before show");
        },
        afterShow: function() {
            console.log("after show");
        },
        beforeHide: function() {
            console.log("before hide");
        },
        afterHide: function() {
            console.log("after hide");
        },
        beforeHourSelect: function() {
            console.log("before hour selected");
        },
        afterHourSelect: function() {
            console.log("after hour selected");
        },
        beforeDone: function() {
            console.log("before done");
        },
        afterDone: function() {
            console.log("after done");
        }
    })
        .find('input').change(function(){
        console.log(this.value);
    });

    // Manually toggle to the minutes view
    $('#check-minutes').click(function(e){
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show')
            .clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
</script>
<script type="text/javascript" src="{{url('/')}}/assets/clock/assets/js/highlight.min.js"></script>
<script type="text/javascript">
    hljs.configure({tabReplace: '    '});
    hljs.initHighlightingOnLoad();
</script>


<script src="{{ url('/')}}/assets/multi_image_assets/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#location').multiselect({ nonSelectedText: 'Select Location'});
    });
</script>
<script src="https://cdn.tiny.cloud/1/pkec4xjg8t0vigamnl7ueyppxoxpoh20lf5jh4zn3lvehbty/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    $(document).ready(function(){

        /*TINY Text */
        tinymce.init({
            selector: '#editor',
            height:350,
            valid_elements: "*[*]",
            force_p_newlines : !1,
            forced_root_block : !1,

            plugins: ['code',
                'advlist autolink lists link charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime table contextmenu paste code'
            ],
            toolbar:
                'code | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            content_css: [

            ]
        });
    });
</script>
@endsection
