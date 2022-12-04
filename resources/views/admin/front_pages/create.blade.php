@extends('admin.layout.master')    
@section('main_content')
<style type="text/css">
    .red{color:red;}
</style>
<!--body wrapper start-->
<div class="container-fluid">
	<div class="wrapper">
		<div class="row">
			<div class="col-md-12">
				@include('admin.layout.breadcrumb')  
				<section class="panel">
					<header class="panel-heading">
						{{$sub_module_title ?? ''}}
					</header>
					<div class="panel-body">
						@include('admin.layout._operation_status') 
						<form action="{{$module_url_path}}/store" id="frm_front_page" name="frm_front_page" class="form-horizontal cmxform" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Page Title<i class="red">*</i></label>
								<div class="col-sm-6">
				                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ti-marker-alt"></i></span>
                                        <input type="text" id="page_title" name="page_title"  data-rule-required="true" class="form-control" >
                                        <span class="error">{{ $errors->first('page_title') }}</span>
                                    </div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Meta Title<i class="red">*</i></label>
								<div class="col-sm-6">
								    <div class="input-group">
                                        <span class="input-group-addon"><i class="ti-marker-alt"></i></span>
                                        <input type="text" id="meta_title"  name="meta_title"  data-rule-required="true"  class="form-control ">
                                        <span class="error">{{ $errors->first('meta_title') }}</span>
                                    </div>
								</div>
							</div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Meta Keyword<i class="red">*</i></label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ti-key"></i></span>
                                        <input type="text" id="meta_keyword"  name="meta_keyword"  data-rule-required="true"  class="form-control ">
                                        <span class="error">{{ $errors->first('meta_keyword') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Meta Description<i class="red">*</i></label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ti-receipt"></i></span>
                                        <input type="text" id="meta_description" name="meta_description" data-rule-required="true" class="form-control">
                                        <span class="error">{{ $errors->first('meta_description') }}</span>
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Template Body<i class="red">*</i></label>
								<div class="col-sm-6">
									<textarea name="description" id="description" class="form-control" data-rule-required="true" rows="15" tabindex="1"></textarea>
									<span class="error">{{ $errors->first('description') }}</span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-8 text-right">
									<a href="{{ $module_url_path ?? 'NA' }}" class="fcbtn btn btn-primary btn-outline btn-1e">Back</a>
									<button class="fcbtn btn btn-danger btn-1g" type="submit"  id="btn_add_front_page">Create</button>
								</div>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<!--body wrapper end-->

<script src="{{url('/')}}/assets/admin_assets/js/bootstrap-inputmask.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	$(document).ready(function()
	{
		$('#frm_front_page').validate({
			highlight: function(element) { },
			ignore: [] 
		});


		/*TINY Text */
		tinymce.init({
			selector: 'textarea',
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

			],
		}); 

		$('#btn_add_front_page').click(function(){
			tinyMCE.triggerSave();
		});
	});
</script>
@endsection


