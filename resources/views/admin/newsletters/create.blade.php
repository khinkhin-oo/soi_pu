@extends('admin.layout.master')    
@section('main_content')
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
						<form action="{{$module_url}}/store" id="frm_blogs_page" name="frm_blogs_page" class="form-horizontal cmxform" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Title <i class="red">*</i></label>
								<div class="col-sm-6">
				                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ti-layout-media-left-alt"></i></span>
                                        <input type="text" id="title" name="title"  data-rule-required="true" class="form-control" maxlength="100" >
                                        <span class="error">{{ $errors->first('title') }} </span>
                                    </div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Subject <i class="red">*</i></label>
								<div class="col-sm-6">
				                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ti-layout-media-left-alt"></i></span>
                                        <input type="text" id="subject"  name="subject"  data-rule-required="true"  class="form-control " maxlength="200">
                                        <span class="error">{{ $errors->first('subject') }} </span>
                                    </div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"> Content <i class="red">*</i></label>
								<div class="col-sm-6">
									<textarea  name="description" id="description" class="form-control" data-rule-required="true" rows="15" tabindex="1"></textarea>
									<span class="error">{{ $errors->first('description') }} </span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-8 text-right">
									<a href="{{ $module_url ?? 'NA' }}/manage_newsletter" class="fcbtn btn btn-danger btn-1g">Back</a>
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
<script src="{{url('/')}}/assets/admin_assets/js/bootstrap-inputmask.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	$(document).ready(function()
	{
		$('#frm_blogs_page').validate({
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


