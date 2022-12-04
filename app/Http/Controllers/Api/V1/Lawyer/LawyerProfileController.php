<?php

namespace App\Http\Controllers\Api\V1\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\UsersModel;
use App\Models\AboutLawyerModel;
use App\Models\LawyerCasesModel;
use App\Models\LawyerExperienceModel;
use App\Models\LawyerAwardsModel;
use App\Models\LawyerAcademicsModel;
use App\Models\LawyerLanguagesModel;
use App\Models\LawyerFirmModel;
use App\Models\LawyerSocialLinksModel;
use App\Models\UserRolesModel;


use Validator;


class LawyerProfileController extends Controller
{
    public function __construct()
    {
        $this->UsersModel        		 		   = new UsersModel();
        $this->AboutLawyerModel         		   = new AboutLawyerModel();
        $this->LawyerCasesModel         		   = new LawyerCasesModel();
        $this->LawyerExperienceModel         	   = new LawyerExperienceModel();
        $this->LawyerAwardsModel         	   	   = new LawyerAwardsModel();
        $this->LawyerAcademicsModel         	   = new LawyerAcademicsModel();
        $this->LawyerLanguagesModel         	   = new LawyerLanguagesModel();
        $this->LawyerFirmModel         	   		   = new LawyerFirmModel();
        $this->LawyerSocialLinksModel         	   = new LawyerSocialLinksModel();
        $this->UserRolesModel         	   		   = new UserRolesModel();
        $this->auth                           	   = auth()->guard('api');
		$this->user_profile_image_base_img_path    = base_path().config('app.project.img_path.user_profile_image');
		$this->user_profile_image_public_img_path  = url('/').config('app.project.img_path.user_profile_image');
    }

    public function add_lawyer(Request $request)
    {

    	$user       = $this->auth->user();

		$user_id    = $user->_id;

        $arr_data = $arr_response = $arr_rules = $arr_resp_data = $arr_case = $arr_about_lawyer = $arr_work_experience = $arr_lawyer_case = $arr_lawyer_firm = $arr_lawyer_awards = $arr_education = $arr_roles = [];

        // $arr_rules['first_name']            = "required|string|max:25";
        // $arr_rules['last_name']             = "required|string|max:25";
        $arr_rules['full_name']             = "required|string|max:25";
        $arr_rules['email']                 = "required|email|max:75";
        $arr_rules['mobile_number']         = "required|int";
        $arr_rules['gender']                = "required|string";
        $arr_rules['dob']                   = "required";
        $arr_rules['website']               = "required";
        $arr_rules['fb_url']                = "required";
        $arr_rules['twitter_url']           = "required";
        $arr_rules['linkedin_url']          = "required";
        $arr_rules['description']           = "required";
        $arr_rules['cost']                  = "required|int";

        $validator  = Validator::make($request->all(),$arr_rules);

        if($validator->fails()) 
        {
            $msg        = "Validation Error, Please fill up the all mandatory fields";
            if($validator->errors()) 
            {
                $arr_response_data['error'] = $validator->errors()->first();
            }
          
            $arr_response['data']     = $arr_response_data;

			return $this->build_response('ERROR',$msg,$arr_response['data']);

        }

        // $first_name         = $request->input('first_name');
        // $last_name          = $request->input('last_name');
        $full_name          = $request->input('full_name');
        $email              = $request->input('email');
        $mobile_number      = $request->input('mobile_number');
        $gender             = $request->input('gender');
        $dob                = $request->input('dob');
        $website            = $request->input('website');
        $fb_url             = $request->input('fb_url');
        $twitter_url        = $request->input('twitter_url');
        $linkedin_url       = $request->input('linkedin_url');
        $description        = $request->input('description');
        $cost               = $request->input('cost');

        $lawyer_case        = json_decode($request->input('lawyer_case'));
        $work_experience    = json_decode($request->input('work_experience'));
        $lawyer_awards      = json_decode($request->input('lawyer_awards'));
        $education          = json_decode($request->input('education'));
        $languages          = json_decode($request->input('languages'));
        $lawyer_firm        = json_decode($request->input('lawyer_firm'));

        // $arr_data['first_name']      = isset($first_name) ? $first_name : '';
        // $arr_data['last_name']       = isset($last_name) ? $last_name : '';
        $arr_data['full_name']       = isset($full_name) ? $full_name : '';
        $arr_data['email']           = isset($email) ? $email : '';
        $arr_data['mobile_number']   = isset($mobile_number) ? $mobile_number : '';
        $arr_data['password']        = isset($password) ? Hash::make($password) : '';
        $arr_data['gender']          = isset($gender) ? $gender : '';
        $arr_data['dob']             = isset($dob) ? $dob : '';

        if($request->hasFile('profile_image'))
        {
            $image          = $request->file('profile_image');
            $file_extension = $image->getClientOriginalExtension();
            $file_old_name  = $image->getClientOriginalName();

            if(in_array($file_extension,['jpg','jpeg','png']))
            {
                $file_name = sha1(uniqid().$file_old_name.uniqid()).'.'.$file_extension;
                $isUpload  = $image->move($this->user_profile_image_base_img_path,$file_name);
                
                if($isUpload)
                {
                    $file_name = $file_name;
                    $arr_data['profile_image']      = $file_name; 
                }
                else
                {
                    return $this->build_response('ERROR','Something went wrong.',[]);
                }
            }
            else
            {
                return $this->build_response('ERROR','File type not supported.',[]);
            }
        }

        $create_lawyer = $this->UsersModel->where('_id',$user_id)->update($arr_data);

        if($create_lawyer){

        	$array_roles = ['user','laywer'];
        	foreach ($array_roles as $key_roles => $value_roles) {
	        	$arr_roles['user_id']         = isset($user_id) ? $user_id : '';
	            $arr_roles['role']            = isset($value_roles) ? $value_roles : '';

	            $user_roles 		= $this->UserRolesModel->create($arr_roles);
        	}

        	$arr_about_lawyer['user_id']     	 = isset($user_id) ? $user_id : '';
            $arr_about_lawyer['description']     = isset($description) ? $description : '';
            $arr_about_lawyer['website']         = isset($website) ? $website : '';
            $arr_about_lawyer['cost']            = isset($cost) ? $cost : '';

            $lawyer_details 		= $this->AboutLawyerModel->create($arr_about_lawyer);
            
            $arr_lawyer_social_links['user_id']     		= isset($user_id) ? $user_id : '';
            $arr_lawyer_social_links['fb_url']          	= isset($fb_url) ? $fb_url : '';
            $arr_lawyer_social_links['linkedin_url']    	= isset($linkedin_url) ? $linkedin_url : '';
            $arr_lawyer_social_links['twitter_url']     	= isset($twitter_url) ? $twitter_url : '';
            
            $lawyer_social_links 	= $this->LawyerSocialLinksModel->create($arr_lawyer_social_links);

            if($lawyer_case!=''){
                foreach ($lawyer_case as $key_case => $value_case) {
                	$arr_lawyer_case['user_id']     		= isset($user_id) ? $user_id : '';
                    $arr_lawyer_case['title'] 				= isset($value_case->title) ? $value_case->title : '';
                    $arr_lawyer_case['description']     	= isset($value_case->description) ? $value_case->description : '';
                    $arr_lawyer_case['from_year']      		= isset($value_case->from_year) ? $value_case->from_year : ''; 
                    $arr_lawyer_case['to_year']      		= isset($value_case->to_year) ? $value_case->to_year : ''; 

                    $insert_lawyer_case   		= $this->LawyerCasesModel->create($arr_lawyer_case);
                }
            }

            if($work_experience!=''){
                foreach ($work_experience as $key_work_experience => $value_work_experience) {
                	$arr_work_experience['user_id']     	= isset($user_id) ? $user_id : '';
                    $arr_work_experience['title'] 			= isset($value_work_experience->title) ? $value_work_experience->title:'';
                    $arr_work_experience['experience_at']   = isset($value_work_experience->experience_at) ? $value_work_experience->experience_at:'';
                    $arr_work_experience['from_year']      	= isset($value_work_experience->from_year) ? $value_work_experience->from_year:''; 
                    $arr_work_experience['to_year']      	= isset($value_work_experience->to_year) ? $value_work_experience->to_year:''; 

                    $insert_work_experience  	= $this->LawyerExperienceModel->create($arr_work_experience);
                }
            }

            if($lawyer_awards!=''){
                foreach ($lawyer_awards as $key_lawyer_awards => $value_lawyer_awards) {
                	$arr_lawyer_awards['user_id']     		= isset($user_id) ? $user_id : '';
                    $arr_lawyer_awards['award_name'] 		= isset($value_lawyer_awards->award_name) ? $value_lawyer_awards->award_name :'' ;
                    $arr_lawyer_awards['year']   			= isset($value_lawyer_awards->year) ? $value_lawyer_awards->year :'' ;

                    $insert_lawyer_awards  		= $this->LawyerAwardsModel->create($arr_lawyer_awards);
                }
            }

            if($education!=''){
                foreach ($education as $key_education => $value_education) {
                	$arr_education['user_id']     			= isset($user_id) ? $user_id : '';
                    $arr_education['degree'] 				= isset($value_education->degree) ? $value_education->degree :'' ;
                    $arr_education['university']   			= isset($value_education->university) ? $value_education->university :'' ;
                    $arr_education['starting_year']   		= isset($value_education->starting_year) ? $value_education->starting_year :'' ;
                    $arr_education['passing_year']   		= isset($value_education->passing_year) ? $value_education->passing_year :'' ;

                    $insert_education  			= $this->LawyerAcademicsModel->create($arr_education);
                }
            }

            if($languages!=''){
                foreach ($languages as $key_languages => $value_languages) {
                	$arr_languages['user_id'] 				= isset($user_id) ? $user_id : '';
                    $arr_languages['language_id'] 			= isset($value_languages->language_id) ?$value_languages->language_id :'';
                    $arr_languages['proficiency']   		= isset($value_languages->proficiency) ?$value_languages->proficiency :'';

                    $insert_languages  			= $this->LawyerLanguagesModel->create($arr_languages);
                }
            }

            if($lawyer_firm!=''){
                foreach ($lawyer_firm as $key_lawyer_firm => $value_lawyer_firm) {

                	$arr_lawyer_firm['user_id'] 			= isset($user_id) ? $user_id : '';
                    $arr_lawyer_firm['firm_name'] 			= isset($value_lawyer_firm->firm_name) ? $value_lawyer_firm->firm_name :'';
                    $arr_lawyer_firm['firm_address']   		= isset($value_lawyer_firm->firm_address) ? $value_lawyer_firm->firm_address :'';
                    $arr_lawyer_firm['mobile_number']   	= isset($value_lawyer_firm->mobile_number) ? $value_lawyer_firm->mobile_number :'';
                    $arr_lawyer_firm['fax']   				= isset($value_lawyer_firm->fax) ? $value_lawyer_firm->fax :'';

                    $insert_lawyer_firm 		= $this->LawyerFirmModel->create($arr_lawyer_firm);
                }
            }

	        return $this->build_response('SUCCESS','Lawyer Added Successfully.',[]);

        }else{

            return $this->build_response('ERROR','Oops! SOmething went wrong.',[]);
        }
        return $this->build_response('ERROR','Oops! SOmething went wrong.',[]);
    }

    public function get_profile(Request $request)
	{
		$arr_data   = $arr_response = [];
		$user       = $this->auth->user();

		$user_id    = $user->_id;

		$obj_data = $this->UsersModel->with(['get_details','get_social_links','get_cases','get_experience','get_awards','get_academics','get_firm'])
									 ->with(['get_practice_area'=>function($q){
										$q->with('get_practice_area_name');
									 }])
									 ->with(['get_languages'=>function($q){
										$q->with('get_language_name');
									 }])
									 ->where('_id',$user_id)
									 ->first();

		if($obj_data)
		{
			$arr_data = $obj_data->toArray();
			// dd($arr_data);
			$arr_response_data['_id']        		= isset($arr_data['_id']) ? $arr_data['_id']:'';
			// $arr_response_data['first_name']        = isset($arr_data['first_name']) ? $arr_data['first_name']:'';
			// $arr_response_data['last_name']         = isset($arr_data['last_name']) ? $arr_data['last_name']:'';
            $arr_response_data['full_name']         = isset($arr_data['full_name']) ? $arr_data['full_name']:'';
			$arr_response_data['email']             = isset($arr_data['email']) ? $arr_data['email']:'';
			$arr_response_data['mobile_number']     = isset($arr_data['mobile_number']) ? $arr_data['mobile_number']:'';
			$arr_response_data['gender']     		= isset($arr_data['gender']) ? $arr_data['gender']:'';
			$arr_response_data['dob']     			= isset($arr_data['dob']) ? $arr_data['dob']:'';
			$arr_response_data['address']           = isset($arr_data['address']) ? $arr_data['address']:'';
			$arr_response_data['website_url']		= isset($arr_data['get_details']['website']) ? $arr_data['get_details']['website']:'';
			$arr_response_data['description']		= isset($arr_data['get_details']['description']) ? $arr_data['get_details']['description']:'';
			if(isset($arr_data['profile_image']) && !empty($arr_data['profile_image']) && file_exists($this->user_profile_image_base_img_path.$arr_data['profile_image']))
			{
				$arr_response_data['profile_image']    =  $this->user_profile_image_public_img_path.$arr_data['profile_image'];
			}
			else
			{
				$arr_response_data['profile_image']    = ""; 
			}

			if(isset($arr_data['get_practice_area']) && sizeof($arr_data['get_practice_area'])>0){
				foreach($arr_data['get_practice_area'] as $key_practice_area => $value_practice_area){
	                $arr_response_data['practice_area'][$key_practice_area]['practice_area_id']   = isset($value_practice_area['practice_area_id']) ? $value_practice_area['practice_area_id']:'';
	                $arr_response_data['practice_area'][$key_practice_area]['practice_area_name'] = isset($value_practice_area['get_practice_area_name']['name']) ? $value_practice_area['get_practice_area_name']['name'] : '';
	            }
			}

			if(isset($arr_data['get_social_links'])){
	                $arr_response_data['social_links']['fb_url']   		= isset($arr_data['get_social_links']['fb_url']) ? $arr_data['get_social_links']['fb_url']:'';
	                $arr_response_data['social_links']['linkedin_url']  = isset($arr_data['get_social_links']['linkedin_url']) ? $arr_data['get_social_links']['linkedin_url']:'';
	                $arr_response_data['social_links']['twitter_url']   = isset($arr_data['get_social_links']['twitter_url']) ? $arr_data['get_social_links']['twitter_url']:'';
			}

			if(isset($arr_data['get_cases']) && sizeof($arr_data['get_cases'])>0){
				foreach($arr_data['get_cases'] as $key_get_cases => $value_get_cases){
	                $arr_response_data['lawyer_cases'][$key_get_cases]['case_title']  	= isset($value_get_cases['title']) ? $value_get_cases['title']:'';
	                $arr_response_data['lawyer_cases'][$key_get_cases]['from_year'] 	= isset($value_get_cases['from_year']) ? $value_get_cases['from_year'] : '';
	                $arr_response_data['lawyer_cases'][$key_get_cases]['to_year'] 		= isset($value_get_cases['to_year']) ? $value_get_cases['to_year'] : '';
	                $arr_response_data['lawyer_cases'][$key_get_cases]['description']	= isset($value_get_cases['description']) ? $value_get_cases['description'] : '';
	            }
			}

			if(isset($arr_data['get_experience']) && sizeof($arr_data['get_experience'])>0){
				foreach($arr_data['get_experience'] as $key_get_experience => $value_get_experience){
	                $arr_response_data['lawyer_experience'][$key_get_experience]['title']  		= isset($value_get_experience['title']) ? $value_get_experience['title']:'';
	                $arr_response_data['lawyer_experience'][$key_get_experience]['from_year'] 	= isset($value_get_experience['from_year']) ? $value_get_experience['from_year'] : '';
	                $arr_response_data['lawyer_experience'][$key_get_experience]['to_year'] 	= isset($value_get_experience['to_year']) ? $value_get_experience['to_year'] : '';
	                 $arr_response_data['lawyer_experience'][$key_get_experience]['experience_at'] 	= isset($value_get_experience['experience_at']) ? $value_get_experience['experience_at'] : '';
	            }
			}

			if(isset($arr_data['get_awards']) && sizeof($arr_data['get_awards'])>0){
				foreach($arr_data['get_awards'] as $key_get_awards => $value_get_awards){
	                $arr_response_data['lawyer_awards'][$key_get_awards]['award_name']  		= isset($value_get_awards['award_name']) ? $value_get_awards['award_name']:'';
	                $arr_response_data['lawyer_awards'][$key_get_awards]['year'] 				= isset($value_get_awards['year']) ? $value_get_awards['year'] : '';
	            }
			}

			if(isset($arr_data['get_academics']) && sizeof($arr_data['get_academics'])>0){
				foreach($arr_data['get_academics'] as $key_get_academics => $value_get_academics){
					$arr_response_data['lawyer_academics'][$key_get_academics]['degree']  						= isset($value_get_academics['degree']) ? $value_get_academics['degree']:'';
	                $arr_response_data['lawyer_academics'][$key_get_academics]['university'] 					= isset($value_get_academics['university']) ? $value_get_academics['university']:'';
	                $arr_response_data['lawyer_academics'][$key_get_academics]['starting_year'] 				= isset($value_get_academics['starting_year']) ? $value_get_academics['starting_year'] : '';
	                $arr_response_data['lawyer_academics'][$key_get_academics]['passing_year'] 					= isset($value_get_academics['passing_year']) ? $value_get_academics['passing_year'] : '';

	            }
			}

			if(isset($arr_data['get_languages']) && sizeof($arr_data['get_languages'])>0){
				foreach($arr_data['get_languages'] as $key_get_academics => $value_get_academics){
					$arr_response_data['lawyer_languages'][$key_get_academics]['id']  							= isset($value_get_academics['_id']) ? $value_get_academics['_id']:'';
	                $arr_response_data['lawyer_languages'][$key_get_academics]['language_name'] 				= isset($value_get_academics['get_language_name']['name']) ? $value_get_academics['get_language_name']['name']:'';
	                $arr_response_data['lawyer_languages'][$key_get_academics]['proficiency']  					= isset($value_get_academics['proficiency']) ? $value_get_academics['proficiency']:'';
	            }
			}

			if(isset($arr_data['get_firm'])){
				$arr_response_data['lawyer_firm']['firm_name']		= isset($arr_data['get_firm']['firm_name']) ? $arr_data['get_firm']['firm_name']:'';
                $arr_response_data['lawyer_firm']['firm_address']   = isset($arr_data['get_firm']['firm_address']) ? $arr_data['get_firm']['firm_address']:'';
                $arr_response_data['lawyer_firm']['mobile_number']  = isset($arr_data['get_firm']['mobile_number']) ? $arr_data['get_firm']['mobile_number']:'';
                $arr_response_data['lawyer_firm']['fax']  			= isset($arr_data['get_firm']['fax']) ? $arr_data['get_firm']['fax']:'';
			}

			$arr_response_data['lawyer_cost']		= isset($arr_data['get_details']['cost']) ? $arr_data['get_details']['cost']:'';

			$arr_response['data']     = $arr_response_data;

            return $this->build_response('SUCCESS','Lawyer details displayed successfully.',$arr_response['data']);
		}
		else
		{
			return $this->build_response('ERROR','Something went wrong..',[]);    
		}
	}

	public function edit_lawyer(Request $request)
	{
    	$user       = $this->auth->user();

		$user_id    = $user->_id;

        $arr_data = $arr_response = $arr_rules = $arr_resp_data = $arr_case = $arr_about_lawyer = $arr_work_experience = $arr_lawyer_case = $arr_lawyer_firm = $arr_lawyer_awards = $arr_education = [];

        // $arr_rules['first_name']            = "required|string|max:25";
        // $arr_rules['last_name']             = "required|string|max:25";
        $arr_rules['full_name']             = "required|string|max:75";
        $arr_rules['email']                 = "required|email|max:75";
        $arr_rules['mobile_number']         = "required|int";
        $arr_rules['gender']                = "required|string";
        $arr_rules['dob']                   = "required";
        $arr_rules['website']               = "required";
        $arr_rules['fb_url']                = "required";
        $arr_rules['twitter_url']           = "required";
        $arr_rules['linkedin_url']          = "required";
        $arr_rules['description']           = "required";
        $arr_rules['cost']                  = "required|int";

        $validator  = Validator::make($request->all(),$arr_rules);

        if($validator->fails()) 
        {
            $msg        = "Validation Error, Please fill up the all mandatory fields";
            if($validator->errors()) 
            {
                $arr_response_data['error'] = $validator->errors()->first();
            }
          
            $arr_response['data']     = $arr_response_data;

            return $this->build_response('ERROR',$msg,$arr_response['data']);
        }

        // $first_name         = $request->input('first_name');
        // $last_name          = $request->input('last_name');
        $full_name          = $request->input('full_name');
        $email              = $request->input('email');
        $mobile_number      = $request->input('mobile_number');
        $gender             = $request->input('gender');
        $dob                = $request->input('dob');
        $website            = $request->input('website');
        $fb_url             = $request->input('fb_url');
        $twitter_url        = $request->input('twitter_url');
        $linkedin_url       = $request->input('linkedin_url');
        $description        = $request->input('description');
        $cost               = $request->input('cost');

        $lawyer_case        = json_decode($request->input('lawyer_case'));
        $work_experience    = json_decode($request->input('work_experience'));
        $lawyer_awards      = json_decode($request->input('lawyer_awards'));
        $education          = json_decode($request->input('education'));
        $languages          = json_decode($request->input('languages'));
        $lawyer_firm        = json_decode($request->input('lawyer_firm'));

        // $arr_data['first_name']      = isset($first_name) ? $first_name : '';
        // $arr_data['last_name']       = isset($last_name) ? $last_name : '';
        $arr_data['full_name']       = isset($full_name) ? $full_name : '';
        $arr_data['email']           = isset($email) ? $email : '';
        $arr_data['mobile_number']   = isset($mobile_number) ? $mobile_number : '';
        $arr_data['password']        = isset($password) ? Hash::make($password) : '';
        $arr_data['gender']          = isset($gender) ? $gender : '';
        $arr_data['dob']             = isset($dob) ? $dob : '';

        if($request->hasFile('profile_image'))
        {
            $image          = $request->file('profile_image');
            $file_extension = $image->getClientOriginalExtension();
            $file_old_name  = $image->getClientOriginalName();

            if(in_array($file_extension,['jpg','jpeg','png']))
            {
                $file_name = sha1(uniqid().$file_old_name.uniqid()).'.'.$file_extension;
                $isUpload  = $image->move($this->user_profile_image_base_img_path,$file_name);
                
                if($isUpload)
                {
                    $file_name = $file_name;
                    $arr_data['profile_image']      = $file_name; 
                }
                else
                {
                    return $this->build_response('ERROR','Something went wrong.',[]);
                }
            }
            else
            {
                return $this->build_response('ERROR','File type not supported.',[]);
            }
        }

        $create_lawyer = $this->UsersModel->where('_id',$user_id)->update($arr_data);

        if($create_lawyer){

        	$arr_about_lawyer['user_id']     	 = isset($user_id) ? $user_id : '';
            $arr_about_lawyer['description']     = isset($description) ? $description : '';
            $arr_about_lawyer['website']         = isset($website) ? $website : '';
            $arr_about_lawyer['cost']            = isset($cost) ? $cost : '';

            $lawyer_details 		= $this->AboutLawyerModel->where('user_id',$user_id)->update($arr_about_lawyer);
            
            $arr_lawyer_social_links['fb_url']          	= isset($fb_url) ? $fb_url : '';
            $arr_lawyer_social_links['linkedin_url']    	= isset($linkedin_url) ? $linkedin_url : '';
            $arr_lawyer_social_links['twitter_url']     	= isset($twitter_url) ? $twitter_url : '';
            
            $lawyer_social_links 	= $this->LawyerSocialLinksModel->where('user_id',$user_id)->update($arr_lawyer_social_links);

            if($lawyer_case!=''){

            	$delete_lawyer_case   		= $this->LawyerCasesModel->where('user_id',$user_id)->delete();

                foreach ($lawyer_case as $key_case => $value_case) {
                	$arr_lawyer_case['user_id']     		= isset($user_id) ? $user_id : '';
                    $arr_lawyer_case['title'] 				= isset($value_case->title) ? $value_case->title : '';
                    $arr_lawyer_case['description']     	= isset($value_case->description) ? $value_case->description : '';
                    $arr_lawyer_case['from_year']      		= isset($value_case->from_year) ? $value_case->from_year : '';
                    $arr_lawyer_case['to_year']      		= isset($value_case->to_year) ? $value_case->to_year : '';

                    $insert_lawyer_case   		= $this->LawyerCasesModel->create($arr_lawyer_case);
                }
            }

            if($work_experience!=''){

            	$delete_work_experience   		= $this->LawyerExperienceModel->where('user_id',$user_id)->delete();

                foreach ($work_experience as $key_work_experience => $value_work_experience) {
                	$arr_work_experience['user_id']     	= isset($user_id) ? $user_id : '';
                    $arr_work_experience['title'] 			= isset($value_work_experience->title) ? $value_work_experience->title:'';
                    $arr_work_experience['experience_at']   = isset($value_work_experience->experience_at) ? $value_work_experience->experience_at:'';
                    $arr_work_experience['from_year']      	= isset($value_work_experience->from_year) ? $value_work_experience->from_year:'';
                    $arr_work_experience['to_year']      	= isset($value_work_experience->to_year) ? $value_work_experience->to_year:'';

                    $insert_work_experience  	= $this->LawyerExperienceModel->create($arr_work_experience);
                }
            }

            if($lawyer_awards!=''){

            	$delete_lawyer_awards   		= $this->LawyerAwardsModel->where('user_id',$user_id)->delete();

                foreach ($lawyer_awards as $key_lawyer_awards => $value_lawyer_awards) {
                	$arr_lawyer_awards['user_id']     		= isset($user_id) ? $user_id : '';
                    $arr_lawyer_awards['award_name'] 		= isset($value_lawyer_awards->award_name) ? $value_lawyer_awards->award_name :'' ;
                    $arr_lawyer_awards['year']   			= isset($value_lawyer_awards->year) ? $value_lawyer_awards->year :'' ;

                    $insert_lawyer_awards  		= $this->LawyerAwardsModel->create($arr_lawyer_awards);
                }
            }

            if($education!=''){

            	$delete_lawyer_education  		= $this->LawyerAcademicsModel->where('user_id',$user_id)->delete();

                foreach ($education as $key_education => $value_education) {
                	$arr_education['user_id']     			= isset($user_id) ? $user_id : '';
                    $arr_education['degree'] 				= isset($value_education->degree) ? $value_education->degree :'' ;
                    $arr_education['university']   			= isset($value_education->university) ? $value_education->university :'' ;
                    $arr_education['starting_year']   		= isset($value_education->starting_year) ? $value_education->starting_year :'' ;
                    $arr_education['passing_year']   		= isset($value_education->passing_year) ? $value_education->passing_year :'' ;

                    $insert_lawyer_education  	= $this->LawyerAcademicsModel->create($arr_education);
                }
            }

            if($languages!=''){

            	$delete_languages  				= $this->LawyerLanguagesModel->where('user_id',$user_id)->delete();

                foreach ($languages as $key_languages => $value_languages) {
                	$arr_languages['user_id'] 				= isset($user_id) ? $user_id : '';
                    $arr_languages['language_id'] 			= isset($value_languages->language_id) ?$value_languages->language_id :'';
                    $arr_languages['proficiency']   		= isset($value_languages->proficiency) ?$value_languages->proficiency :'';

                    $insert_languages  			= $this->LawyerLanguagesModel->create($arr_languages);
                }
            }

            if($lawyer_firm!=''){

            	$delete_lawyer_firm  			= $this->LawyerFirmModel->where('user_id',$user_id)->delete();

                foreach ($lawyer_firm as $key_lawyer_firm => $value_lawyer_firm) {

                	$arr_lawyer_firm['user_id'] 			= isset($user_id) ? $user_id : '';
                    $arr_lawyer_firm['firm_name'] 			= isset($value_lawyer_firm->firm_name) ? $value_lawyer_firm->firm_name :'';
                    $arr_lawyer_firm['firm_address']   		= isset($value_lawyer_firm->firm_address) ? $value_lawyer_firm->firm_address :'';
                    $arr_lawyer_firm['mobile_number']   	= isset($value_lawyer_firm->mobile_number) ? $value_lawyer_firm->mobile_number :'';
                    $arr_lawyer_firm['fax']   				= isset($value_lawyer_firm->fax) ? $value_lawyer_firm->fax :'';

                    $insert_lawyer_firm  		= $this->LawyerFirmModel->create($arr_lawyer_firm);
                }
            }

	        return $this->build_response('SUCCESS','Lawyer Updated Successfully.',[]);

        }else{

            return $this->build_response('ERROR','Oops! SOmething went wrong.',[]);
        }
        return $this->build_response('ERROR','Oops! SOmething went wrong.',[]);
	}

}
