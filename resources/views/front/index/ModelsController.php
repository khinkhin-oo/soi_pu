<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ModelsModel;
use App\Models\ImageModel;
use App\Models\UserModel;
use App\Models\ServicesModel;
use App\Models\CategoryModel;
use App\Models\CompaniesModel;
use App\Models\ServiceRelationModel;
use App\Models\LocationModel;
use App\Common\Services\MailService;
use App\Common\Traits\MultiActionTrait;

use Validator;
use Session;
use DataTables;
use Response;
use DB;
use Image;

class ModelsController extends Controller
{
    use MultiActionTrait;

    function __construct(MailService $mail_service)
    {
		$this->arr_view_data                = [];
		$this->admin_panel_slug             = config('app.project.admin_panel_slug');
		$this->admin_url_path               = url(config('app.project.admin_panel_slug'));
		$this->module_url_path              = $this->admin_url_path."/models";
		$this->blog_image_base_path         = base_path().config('app.project.img_path.blogs_image');
		$this->module_title                 = "Models";
		$this->module_view_folder           = "admin.models";
		$this->module_icon                  = "fa fa-user";
		$this->auth                         = auth()->guard('admin');
		$this->BaseModel					= new ModelsModel();
		$this->UserModel					= new UserModel();
		$this->ImageModel					= new ImageModel();
		$this->ServicesModel				= new ServicesModel();
		$this->CategoryModel				= new CategoryModel();
		$this->CompaniesModel				= new CompaniesModel();
		$this->ServiceRelationModel			= new ServiceRelationModel();
		$this->LocationModel				= new LocationModel();

		$this->MailService                  = $mail_service;

		$this->user_profile_image_base_img_path   = base_path().config('app.project.img_path.user_profile_image');
		$this->user_profile_image_public_img_path = url('/').config('app.project.img_path.user_profile_image');

		$this->thumb_286_319_base_img_path   = base_path().config('app.project.img_path.user_profile_image').'286-319/';
        $this->thumb_286_319_public_img_path = url('/').config('app.project.img_path.user_profile_image').'286-319/';

        $this->thumb_434_651_base_img_path   = base_path().config('app.project.img_path.user_profile_image').'434-651/';
        $this->thumb_434_651_public_img_path = url('/').config('app.project.img_path.user_profile_image').'434-651/';
    }

    public function index()
    {
    	if(session('subadmin_id')!=null)
		{
	    	$obj_user = $this->BaseModel->where('user_id','=',session('subadmin_id'))->get();
	    }
	    else
	    {
	    	$obj_user = $this->BaseModel->get();	
	    }

		$this->arr_view_data['page_title']          = "Manage ".$this->module_title;
        $this->arr_view_data['parent_module_icon']  = "fa fa-home";
        $this->arr_view_data['parent_module_title'] = "Dashboard";
        $this->arr_view_data['parent_module_url']   = url('/').'/admin/dashboard';
        $this->arr_view_data['module_icon']         = $this->module_icon;
        $this->arr_view_data['module_title']        = "Manage ".$this->module_title;
		$this->arr_view_data['module_url_path']     = $this->module_url_path;
		$this->arr_view_data['admin_url_path']      = $this->admin_url_path;
		$this->arr_view_data['admin_panel_slug']    = $this->admin_panel_slug;
		$this->arr_view_data['count'] 				= count($obj_user);
		
		return view($this->module_view_folder.'.index',$this->arr_view_data);
    }

    public function load_data(Request $request)
	{
		$build_status_btn       = '';
		$arr_data               = [];
		if(session('subadmin_id')!=null)
		{
			$obj_request_data = $this->BaseModel->with('get_companies','get_subadmin_user')
											->where('user_id','=',session('subadmin_id','0'))
											->orderBy('created_at','desc')
											->get();
		}
		else
		{

			$obj_request_data = $this->BaseModel->with('get_companies','get_subadmin_user')
												->orderBy('created_at','desc')
												->get();
		}
		$json_result = DataTables::of($obj_request_data)->make(true);
		$build_result = $json_result->getData();
		if(isset($build_result->data) && sizeof($build_result->data)>0)
		{
			foreach ($build_result->data as $key => $data) 
			{
				$edit_link_url    = $this->module_url_path.'/edit/'.base64_encode($data->id);
				$view_link_url    = $this->module_url_path.'/view/'.base64_encode($data->id);
				$delete_link_url  = $this->module_url_path.'/delete/'.base64_encode($data->id);
				$block_link_url   = $this->module_url_path.'/block/'.base64_encode($data->id);
				$unblock_link_url = $this->module_url_path.'/unblock/'.base64_encode($data->id);

				$block_unblock_btn = $roles = '';
				$arr_roles = [];

				

				$roles = implode(' | ', $arr_roles);

				if($data->status != null && $data->status == '1')
                {
                    $build_status_btn  = '<span class="label label-success">Active</span>';
                    $block_unblock_btn = '<a class="btn btn-info btn-circle btn-lg" title="Active" onclick="return confirm_action(this,event,\'Do you really want to block this Model?\')" href="'.$block_link_url.'" data-original-title="Active" style="background-color:#57ce81;color:#fff;border-color:#57ce81"><i class="fa fa-check"></i></a>';
                }
                else
                {
                    $build_status_btn  = '<span class="label label-danger">Deactive</span>';
                    $block_unblock_btn = '<a class="btn btn-info btn-circle btn-lg" title="Inactive" onclick="return confirm_action(this,event,\'Do you really want to activate this Model?\')" href="'.$unblock_link_url.'" data-original-title="Inactive" style="background-color:#f73838;color:#fff;border-color:#f73838"><i class="fa fa-ban"></i></a>';
                }	

				$view_btns = '<a  title="" href="'.$view_link_url.'" data-original-title="View"><i class="fa fa-eye" title="View"></i>View</a>';

				$edit_btns = '<a  title="" href="'.$edit_link_url.'" data-original-title="Edit"><i class="fa fa-pencil-square-o" title="Edit"></i>Edit</a>';

				$delete_btns = '<a  title="" href="'.$delete_link_url.'" data-original-title="Delete" onclick="return confirm_action(this,event,\'Do you really want to delete this Model?\')"><i class="fa fa-trash" title="Delete"></i>Delete</a>';

				$action_button_html = '<ul class="action-list-main">';
                $action_button_html .= '<li class="dropdown">';
                $action_button_html .= '<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> <i class="ti-menu"></i><span><i class="fa fa-caret-down"></i></span></a>';
                $action_button_html .= '<ul class="action-drop-section dropdown-menu dropdown-menu-right">';
                $action_button_html .= '<li>'.$view_btns.'</li>';
                $action_button_html .= '<li>'.$edit_btns.'</li>';
                $action_button_html .= '<li>'.$delete_btns.'</li>';
                $action_button_html .= '</li>';
                $action_button_html .= '</ul>';

				$built_action_btns = $block_unblock_btn.' '.$view_btns.' '.$edit_btns.' '.$delete_btns;
				
				if($data->get_subadmin_user==null)
				{
					$added_by 			= "Admin";
				}
				else
				{
					$user_first_name	= isset($data->get_subadmin_user[0]->first_name)? $data->get_subadmin_user[0]->first_name:'-';
					$user_last_name		= isset($data->get_subadmin_user[0]->last_name)? $data->get_subadmin_user[0]->last_name:'-';
					$added_by 			= $user_first_name.' '.$user_last_name;
				}
				$id 	    			= isset($data->id)? base64_encode($data->id):'';
				$first_name 			= isset($data->first_name)? $data->first_name :'';
				$last_name  			= isset($data->last_name)? $data->last_name :'';
				$full_name  			= $first_name.' '.$last_name;
				$company     			= isset($data->get_companies[0]->company_name)? $data->get_companies[0]->company_name :'-';
				$email 	    			= isset($data->email)? $data->email :'';
				$contact    			= isset($data->mobile_number)? $data->mobile_number :'NA';

				$build_result->data[$key]->id         		    = $id;
				$build_result->data[$key]->full_name            = $full_name;
				$build_result->data[$key]->email                = $email;
				$build_result->data[$key]->mobile_number        = $contact;
				$build_result->data[$key]->built_action_btns    = $action_button_html;				
				$build_result->data[$key]->roles 				= $roles;
				$build_result->data[$key]->company 				= $company;
				$build_result->data[$key]->added_by 			= $added_by;
				$build_result->data[$key]->built_id             = base64_encode($data->id);
			}
			return response()->json($build_result);
		}
		else
		{
			return response()->json($build_result);
		}
	}

	public function create()
    {
    	// $obj_services = $this->ServicesModel->where('status','=',"1")->orderBy('created_at','desc')->get();
    	// if(session('subadmin_id'))
    	// {
    	// 	$obj_services = $this->ServicesModel
    	// 						 ->where('status','=',"1")
    	// 						  ->where('user_id','=',session('subadmin_id'))
    	// 						  ->orderBy('created_at','desc')
    	// 						  ->get();
    	// }
    	// else
    	// {
    		$obj_services = $this->ServicesModel
    							 ->where('status','=',"1")
    							 ->orderBy('created_at','desc')
    							 ->get();
    	// }
    	if($obj_services)
    	{
    		$arr_services =$obj_services->toArray();
    	}

    	// $obj_category = $this->CategoryModel->where('status','=',"1")->get();
    	// if(session('subadmin_id'))
    	// {
    	// 	$obj_category = $this->CategoryModel
    	// 						 ->where('status','=',"1")
    	// 						  ->where('user_id','=',session('subadmin_id'))
    	// 						  ->orderBy('created_at','desc')
    	// 						  ->get();
    	// }
    	// else
    	// {
    		$obj_category = $this->CategoryModel
    							 ->where('status','=',"1")
    							 ->orderBy('created_at','desc')
    							 ->get();
    	// }
    	if($obj_category)
    	{
    		$arr_category =$obj_category->toArray();
    	}

    	// $obj_companies = $this->CompaniesModel->where('status','=',"1")->get();
    	// if(session('subadmin_id'))
    	// {
    	// 	$obj_companies = $this->CompaniesModel
    	// 						 ->where('status','=',"1")
    	// 						  ->where('user_id','=',session('subadmin_id'))
    	// 						  ->orderBy('created_at','desc')
    	// 						  ->get();
    	// }
    	// else
    	// {
    		$obj_companies = $this->CompaniesModel
    							 ->where('status','=',"1")
    							 ->orderBy('created_at','desc')
    							 ->get();
    	// }
    	if($obj_companies)
    	{
    		$arr_companies =$obj_companies->toArray();
    	}
    	// $obj_location = $this->LocationModel->where('status','=',"1")->get();
    	// if(session('subadmin_id'))
    	// {
    	// 	$obj_location = $this->LocationModel
    	// 						 ->where('status','=',"1")
    	// 						  ->where('user_id','=',session('subadmin_id'))
    	// 						  ->orderBy('created_at','desc')
    	// 						  ->get();
    	// }
    	// else
    	// {
    		$obj_location = $this->LocationModel
    							 ->where('status','=',"1")
    							 ->orderBy('created_at','desc')
    							 ->get();
    	// }
    	if($obj_location)
    	{
    		$arr_location =$obj_location->toArray();
    	}


		$this->arr_view_data['page_title']          = "Create ".$this->module_title;
        $this->arr_view_data['parent_module_icon']  = "fa fa-home";
        $this->arr_view_data['parent_module_title'] = "Dashboard";
        $this->arr_view_data['parent_module_url']   = url('/').'/admin/dashboard';
        $this->arr_view_data['module_icon']         = $this->module_icon;
        $this->arr_view_data['module_title']        = "Create ".$this->module_title;
		$this->arr_view_data['module_url_path']     = $this->module_url_path;
		$this->arr_view_data['admin_url_path']      = $this->admin_url_path;
		$this->arr_view_data['admin_panel_slug']    = $this->admin_panel_slug;
		$this->arr_view_data['arr_services']  		= $arr_services;
		$this->arr_view_data['arr_location']  		= $arr_location;
		$this->arr_view_data['arr_category']  		= $arr_category;
		$this->arr_view_data['arr_companies'] 		= $arr_companies;
		return view($this->module_view_folder.'.create',$this->arr_view_data);
    }

    public function store(Request $request)
	{
		// dd($request->all());
		$arr_rules      = $arr_data = array();
		$status         = false;

		$arr_rules['_token']				= "required";
		$arr_rules['first_name']      	   	= "required";
		$arr_rules['last_name']   	   		= "required";
		// $arr_rules['email']	 		  		= "required";
		$arr_rules['contact']       		= "required|unique:models,mobile_number";
		$arr_rules['price'] 	 		  	= "required";
		$arr_rules['company'] 	 		  	= "required";
		$arr_rules['category']  			= "required";
		$arr_rules['services']  			= "required";
		$arr_rules['from_time']  		  	= "required";
		$arr_rules['to_time'] 	 		  	= "required";
		$arr_rules['size'] 		      		= "required";
		$arr_rules['age'] 					= "required";
		$arr_rules['country'] 	 		  	= "required";
		$arr_rules['location']  			= "required";
		$arr_rules['address']  			    = "required";


		$validator = validator::make($request->all(),$arr_rules);

		if($validator->fails()) 
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$arr_data['first_name']    		=   $request->input('first_name', null);
		$arr_data['last_name']     		=	$request->input('last_name', null);		
		// $arr_data['email']    			=   $request->input('email', null);		
		$arr_data['mobile_number']		=	$request->input('contact', null);	
		$arr_data['wechat']				=	$request->input('wechat', null);	
		$arr_data['line']				=	$request->input('line', null);
		$arr_data['whatsapp']			=	$request->input('line', null);
		$arr_data['age']				=	$request->input('age', null);
		$arr_data['price']				=	$request->input('price', null);
		$arr_data['company']			=	$request->input('company', null);
		$arr_data['size']				=	$request->input('size', null);
		$arr_data['from_time']			=	$request->input('from_time', null);
		$arr_data['to_time']			=	$request->input('to_time', null);
		$arr_data['country']			=	$request->input('country', null);
		$arr_data['address']			=	$request->input('address', null);
		$arr_data['category']			=	$request->input('category', null);
		$arr_data['location']			=	$request->input('location', null);
		$arr_data['user_id']		    =	session('subadmin_id','0');
		$arr_data['sequence'] 			=	$this->rad_value();
 
    	// dd($arr_data);
		$images  	= $request->input('file', null);
		$services  	= $request->input('services', null);
		$status = $this->BaseModel->create($arr_data);
		if($status)
		{

			$arr_images = [];

            if(isset($images) && is_array($images) && sizeof($images)>0)
            {
                foreach($images as $profile_images)
                {
                    $encoded_image = base64_decode($profile_images);
                    $ext = explode('/',explode(';', $profile_images)[0])[1];
                    $filename      = sha1(uniqid().uniqid()) . '.' . $ext;
                    $output_file   = $this->user_profile_image_base_img_path.$filename;
                    $isUpload      = base64ToImage($profile_images, $output_file);
                    if($isUpload)
                    {
						$arr_image['profile_image'] = $filename;
						$arr_image['user_id'] 		= $status->id;
						$img = Image::make($output_file);
						$img->resize(286, 319);
						$img->save($this->user_profile_image_base_img_path.'286-319/'.$filename);

						$img1 = Image::make($output_file);
						$img1->resize(434, 651);
						$img1->save($this->user_profile_image_base_img_path.'434-651/'.$filename);

					}
					$image_status = $this->ImageModel->create($arr_image);
						
                }
            }
            if(isset($services) && is_array($services) && sizeof($services)>0)
            {
            	foreach($services as $service)
                {
                	$arr_service_model['service_id']  = $service;
                	$arr_service_model['model_id']		= $status->id;
                	$category_status = $this->ServiceRelationModel->create($arr_service_model);
	            }
            }



			Session::flash('success', str_singular($this->module_title).' created successfully.');
			return redirect($this->module_url_path);
		}
		Session::flash('error', 'Error while creating '.str_singular($this->module_title).'.');
		return redirect($this->module_url_path);
	}

    public function edit($enc_id=FALSE)
	{
		$arr_data = $arr_model_services = [];
		$id = base64_decode($enc_id);

		if(is_numeric($id))
		{
			$obj_data = $this->BaseModel->where('id',$id)->with('get_images','get_category','get_models_services','get_companies')->first();
			if(isset($obj_data->id))
			{
				$arr_data = $obj_data->toArray();
				// dd($arr_data);
				foreach ($arr_data['get_models_services'] as $model_services)
				{
					$arr_model_services[]=$model_services;
				}
				$obj_services = $this->ServicesModel->where('status','=',"1")->get();
		    	if($obj_services)
		    	{
		    		$arr_services =$obj_services->toArray();
		    	}
		    	$obj_category = $this->CategoryModel->where('status','=',"1")->get();
		    	if($obj_category)
		    	{
		    		$arr_category =$obj_category->toArray();
		    	}

		    	$obj_companies = $this->CompaniesModel->where('status','=',"1")->get();
				if($obj_companies)
				{
					$arr_companies =$obj_companies->toArray();
				}

		    	$obj_location = $this->LocationModel->where('status','=',"1")->get();
		    	if($obj_location)
		    	{
		    		$arr_location =$obj_location->toArray();
		    	}
		    	// dd($arr_data);
				$this->arr_view_data['page_title']           = "Edit ".$this->module_title;
		        $this->arr_view_data['parent_module_icon']   = "icon-home2";
		        $this->arr_view_data['parent_module_title']  = "Dashboard";
		        $this->arr_view_data['parent_module_url']    = url('/').'/admin/dashboard';
		        $this->arr_view_data['module_icon']          = $this->module_icon;
		        $this->arr_view_data['module_title']         = "Manage ".$this->module_title;
		        $this->arr_view_data['module_url']           =  $this->module_url_path;
		        $this->arr_view_data['sub_module_title']     =  'Edit '.$this->module_title;
		        $this->arr_view_data['sub_module_icon']      =  'fa fa-pencil-square-o';
				$this->arr_view_data['id']                   = base64_encode($id);
				$this->arr_view_data['module_url_path']      = $this->module_url_path;
				$this->arr_view_data['admin_panel_slug']     = $this->admin_panel_slug;
				$this->arr_view_data['arr_data']      		 = $arr_data;
				$this->arr_view_data['enc_id']      		 = $enc_id;
				$this->arr_view_data['arr_services']      	 = $arr_services;
				$this->arr_view_data['arr_category']      	 = $arr_category;
				$this->arr_view_data['arr_location']  		 = $arr_location;
				$this->arr_view_data['arr_companies']  		 = $arr_companies;
				$this->arr_view_data['arr_model_services'] 	 = $arr_model_services;
				// dd($arr_model_services);
				$this->arr_view_data['base_img_path']    	 = $this->user_profile_image_base_img_path;
				$this->arr_view_data['public_img_path']		 = $this->user_profile_image_public_img_path;
				
				return view($this->module_view_folder.'.edit',$this->arr_view_data);
			}
		}
		Session::flash('Something went wrong');
		return redirect()->back();
	}

	public function update(Request $request, $enc_id='')
	{	
		//dd($request->all());
		$id 			=base64_decode($enc_id);
		$arr_rules      = $arr_data  = array();
		$status         = false;
		$i=0;

		$arr_rules['_token']				= "required";
		$arr_rules['first_name']      	   	= "required";
		$arr_rules['last_name']   	   		= "required";
		$arr_rules['mobile_number']       	= "required";
		$arr_rules['price']		 		  	= "required";
		$arr_rules['company'] 	 		  	= "required";
		$arr_rules['category']      	   	= "required";
		$arr_rules['services']      	   	= "required";
		$arr_rules['age']  		     	   	= "required";
		$arr_rules['from_time']    	   		= "required";
		$arr_rules['to_time']      	   		= "required";
		$arr_rules['size']      	   		= "required";
		$arr_rules['country']      	   		= "required";
		$arr_rules['location']  			= "required";
		$arr_rules['address']  			    = "required";

		$validator = validator::make($request->all(),$arr_rules);

		if($validator->fails()) 
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$arr_data['first_name']    		=   $request->input('first_name', null);
		$arr_data['last_name']     		=	$request->input('last_name', null);	
		$arr_data['mobile_number']		=	$request->input('mobile_number', null);	
		$arr_data['wechat']				=	$request->input('wechat', null);	
		$arr_data['line']				=	$request->input('line', null);
		$arr_data['price']				=	$request->input('price', null);
		$arr_data['country']			=	$request->input('country', null);
		$arr_data['company']			=	$request->input('company', null);
		$arr_data['category']			=	$request->input('category', null);
		$arr_data['age']				=	$request->input('age', null);
		$arr_data['from_time']			=	$request->input('from_time', null);
		$arr_data['to_time']			=	$request->input('to_time', null);
		$arr_data['size']				=	$request->input('size', null);
		$arr_data['address']			=	$request->input('address', null);
		$arr_data['location']			=	$request->input('location', null);
		// dd($arr_data);

		$images  	= $request->input('file', null);
		$services  	= $request->input('services', null);

		if(isset($images) && is_array($images) && sizeof($images)>0)
        {
        	$i=0;
            foreach($images as $profile_images)
            {
            	if($profile_images)
            	{
	                $encoded_image = base64_decode($profile_images);
	                $ext = explode('/',explode(';', $profile_images)[0])[1];
	                $filename      = sha1(uniqid().uniqid()) . '.' . $ext;
	                $output_file   = $this->user_profile_image_base_img_path.$filename;
	                $isUpload      = base64ToImage($profile_images, $output_file);
	                if($isUpload)
	                {
						$arr_image['profile_image'] = $filename;
						$arr_image['user_id'] 		= $id;
						$img = Image::make($output_file);
						$img->resize(286, 319);
						$img->save($this->user_profile_image_base_img_path.'286-319/'.$filename);

						$img1 = Image::make($output_file);
						$img1->resize(434, 651);
						$img1->save($this->user_profile_image_base_img_path.'434-651/'.$filename);
					}
					$image_status = $this->ImageModel->create($arr_image);
					$arr[$i] ='not empty';
				}
				else
				{
					$arr[$i] ='empty';
				}
				$i=$i+1;
					
            }
		}
		$delete = $this->ServiceRelationModel->where('model_id','=',$id)->delete();
		if(isset($services) && is_array($services) && sizeof($services)>0)
        {
        	foreach($services as $service)
            {
            	$arr_service_model['service_id'] = $service;
            	$arr_service_model['model_id']		= $id;
            	$ServiceRelation = $this->ServiceRelationModel->create($arr_service_model);
            }
        }



		$status = $this->BaseModel->where('id', $id)->update($arr_data);
		if($status)
		{
			Session::flash('success', str_singular($this->module_title).' updated successfully.');
			return redirect($this->module_url_path);
		}
		Session::flash('error', 'Error while updating '.str_singular($this->module_title).'.');
		return redirect($this->module_url_path);
	}
	public function delete($enc_id)
	{
		$id = base64_decode($enc_id);
	//	dd($id);
		$delete = $this->BaseModel->where('id',$id)->delete();
		if ($delete)
		{
			$obj_image = $this->ImageModel->where('user_id',$id)->get();
			if($obj_image)
			{
				$arr_image = $obj_image->toArray();
			}
			foreach($arr_image as $images)
	        {	
	        	if($images['profile_image']!='' && file_exists($this->user_profile_image_base_img_path.$images['profile_image'])) 
	        	{
	        		unlink($this->user_profile_image_base_img_path.$images['profile_image']);
	        		$delete = $this->ImageModel->where('id',$images['id'])->delete();
	        	}
	        	if($images['profile_image']!='' && file_exists($this->thumb_286_319_base_img_path.$images['profile_image'])) 
	        	{
	        		unlink($this->thumb_286_319_base_img_path.$images['profile_image']);
	        	}
	        	if($images['profile_image']!='' && file_exists($this->thumb_434_651_base_img_path.$images['profile_image'])) 
	        	{
	        		unlink($this->thumb_434_651_base_img_path.$images['profile_image']);
	        	}

	        }
			Session::flash('success', str_singular($this->module_title).' Deleted successfully !');
		}
		else
		{
			Session::flash('error',' Error While Deleting '. str_singular($this->module_title));
		}
		return redirect($this->module_url_path);
	}

	public function delete_image(Request $request)
	{
		$base_img_path   	 = $this->user_profile_image_base_img_path;
		$arr_data = [];
		$image_id = $request->input('id');
		$obj_data = $this->ImageModel->where('id',$image_id)->first();
		if($obj_data)
		{
			$arr_image_data=$obj_data->toArray();
			// dd($arr_image_data);
			if(isset($arr_image_data['profile_image']) && file_exists($base_img_path.$arr_image_data['profile_image']))
	        {
	        	@unlink($base_img_path.$arr_image_data['profile_image']);
	        }

	        if($arr_image_data['profile_image']!='' && file_exists($this->thumb_286_319_base_img_path.$arr_image_data['profile_image'])) 
        	{
        		unlink($this->thumb_286_319_base_img_path.$arr_image_data['profile_image']);
        	}
        	if($arr_image_data['profile_image']!='' && file_exists($this->thumb_434_651_base_img_path.$arr_image_data['profile_image'])) 
        	{
        		unlink($this->thumb_434_651_base_img_path.$arr_image_data['profile_image']);
        	}
		}
		$delete = $this->ImageModel->where('id',$image_id)->delete();
	}
	
	public function view($enc_id)
    {
    	$arr_data = [];
    	$id = base64_decode($enc_id);
    	$obj_data = $this->BaseModel->where('id',$id)->with('get_images','get_category','get_models_services','get_companies')->first();
    	if($obj_data)
    	{
    		$arr_data = $obj_data->toArray();
       	}
       	$obj_services = $this->ServicesModel->where('status','=',"1")->orderBy('created_at','desc')->get();
    	if($obj_services)
    	{
    		$arr_services =$obj_services->toArray();
    	}
       	// dd($arr_data['get_models_services'][2],$arr_services[5]);
        $this->arr_view_data['parent_module_title'] = "Dashboard";
        $this->arr_view_data['parent_module_url']   = url('/').'/admin/dashboard';
        $this->arr_view_data['module_icon']         = $this->module_icon;
        $this->arr_view_data['module_title']        = "Manage ".$this->module_title;
        $this->arr_view_data['sub_module_title']    =  'View'.$this->module_title;
		$this->arr_view_data['sub_module_icon']     =  'fa fa-pencil-square-o';
		$this->arr_view_data['module_url_path']     = $this->module_url_path;
		$this->arr_view_data['admin_url_path']      = $this->admin_url_path;
		$this->arr_view_data['admin_panel_slug']    = $this->admin_panel_slug;
		$this->arr_view_data['base_img_path']    	= $this->user_profile_image_base_img_path;
		$this->arr_view_data['public_img_path']		= $this->user_profile_image_public_img_path;
		$this->arr_view_data['arr_data']   		 	= $arr_data;
		$this->arr_view_data['arr_services']	 	= $arr_services;

		return view($this->module_view_folder.'.view',$this->arr_view_data);
    }

    public function cron_sequence()
	{
		$arr_data =	$arr_value	 =	[];
		$obj_data = $this->BaseModel->get();
		if ($obj_data)
		{
			$arr_data 	= $obj_data->toArray();
			foreach ($arr_data as $model) 
			{
				$sequence=$this->rad_value();
				$arr_value['sequence'] = $sequence;
				$status = $this->BaseModel->where('id', $model['id'])->update($arr_value);
			}
			// return redirect(url('/'));
			echo "Cron data Updated";
		}
	}

	public function rad_value()
	{
		$sequence_rand  = rand(0,999999999);	
		$obj_data = $this->BaseModel->where('sequence','=',$sequence_rand)->first();
		if(!$obj_data)
		{
			return $sequence_rand;
		}
		else
		{
			return $this->rad_value();
		}
	}
}
