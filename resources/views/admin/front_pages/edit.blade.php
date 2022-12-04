@extends('admin.layout.master')    
@section('main_content')
<style type="text/css">
	.red{color:red;}
</style>
<div class="container-fluid">
	<div class="wrapper">
		<div class="row">
			<div class="col-md-12">
					@include('admin.layout.breadcrumb')
				<div class="panel ">
<!--
					<div class="panel-heading page-name">
						<h5 class="panel-title">{{$sub_module_title ?? ''}}</h5>
					</div>
-->
					<div class="panel-body">
						@include('admin.layout._operation_status')
						<form class="form-horizontal cmxform" id="frm_edit_email_template" name="frm_edit_email_template" action="{{$module_url_path}}/update/{{ base64_encode($arr_data['_id']) }}" method="post">
							{{csrf_field()}}
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label class="control-label col-sm-4 col-md-4 col-lg-3" for="page_title">Page Title<i class="red">*</i></label>
										<div class="col-sm-8 col-md-8 col-lg-9">
								            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-marker-alt"></i></span>
                                                <input type="text" name="page_title" value="{{$arr_data['page_title'] ?? ''}}" id="page_title" class="form-control" placeholder="Template Name" data-rule-required="true"  data-rule-maxlength="60" >
                                                <span class="error">{{ $errors->first('page_title') }} </span>
                                            </div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label class="control-label col-sm-4 col-md-4 col-lg-3" for="meta_title"> Meta Title<i class="red">*</i></label>
										<div class="col-sm-8 col-md-8 col-lg-9">
								            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-marker-alt"></i></span>
                                                <input type="text" name="meta_title" value="{{$arr_data['meta_title'] ?? ''}}" id="meta_title" class="form-control" placeholder="Template From" data-rule-required="true"  data-rule-maxlength="60" >
                                                <span class="error">{{ $errors->first('meta_title') }} </span>
                                            </div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label class="control-label col-sm-4 col-md-4 col-lg-3" for="meta_keyword">Meta Keyword<i class="red">*</i></label>
										<div class="col-sm-8 col-md-8 col-lg-9">
								            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-key"></i></span>
                                                <input type="text" name="meta_keyword" value="{{$arr_data['meta_keyword'] ?? ''}}" id="meta_keyword" class="form-control" placeholder="Template From Email" data-rule-required="true"  >
                                                <span class="error">{{ $errors->first('meta_keyword') }} </span>
                                            </div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label class="control-label col-sm-4 col-md-4 col-lg-3" for="meta_description">Meta Description<i class="red">*</i></label>
										<div class="col-sm-8 col-md-8 col-lg-9">
								            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-receipt"></i></span>
                                                <input type="text" name="meta_description" value="{{$arr_data['meta_description'] ?? ''}}" id="meta_description" class="form-control" placeholder="Template Subject" data-rule-required="true"  data-rule-maxlength="60" >
                                                <span class="error">{{ $errors->first('meta_description') }} </span>
                                            </div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label class="control-label col-sm-4 col-md-4 col-lg-3" for="description">Template Body<i class="red">*</i></label>
										<div class="col-sm-8 col-md-8 col-lg-9">
											<textarea  name="description" id="description" class="form-control" data-rule-required="true" rows="8">
											    {{$arr_data['page_description'] ?? ''}}
                                            </textarea>											
										</div>
									</div>
								</div>
							</div>	
							<div class="row">
	                             <div class="col-md-8">
	                                <div class="form-group">
	                                     <label class="control-label col-sm-4 col-md-4 col-lg-3" ></label>
	                                    <div class="col-sm-8 col-md-8 col-lg-9">
	                                        <div class="form-actions">
	                                            <button type="submit" id="btn_update_email_template" class="fcbtn btn btn-danger btn-1g"> Update</button>
	                                            <a href="{{ $module_url_path }}"  class="fcbtn btn btn-primary btn-outline btn-1e">Back</a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
							<!-- <div class="form-group text-right">
								<div class="col-lg-8">
									<button type="submit" id="btn_update_email_template" class="btn btn-success" title="update"> <i class="fa fa-check"></i> Update</button>
								</div>
							</div> -->
							
						</form>
						<form id="preview_form"  method="POST" action="{{$module_url_path}}/preview" target="_blank">
							{{csrf_field()}}
							<input type="hidden" name="preview_html" id="preview_html" required="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>tinymce.init({ selector:'#template_html' });</script>

<script>

	$(document).ready(function(){
		$('#frm_edit_email_template').validate({
			highlight: function(element) { },
			ignore: [],
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

		$('#preview').click(function(){

			tinyMCE.triggerSave();

			$('#preview_html').val($('#template_html').val());

			$('#preview_form').submit();

		});

		var preview_rules = new Object();

		preview_rules['preview_html'] = { required: true };

		$('#preview_form').validate({
			ignore: [],
			rules : preview_rules,
			errorPlacement: function(error, element) 
			{
				$(".err_email_content").html("");

				var name = $(element).attr("name");
				if(name == 'template_html')
				{
					error.appendTo($(this).find(".err_email_content"));
				}
			}

		});

		$('#btn_update_email_template').click(function(){
			tinyMCE.triggerSave();
		});
	});
</script>
@endsection