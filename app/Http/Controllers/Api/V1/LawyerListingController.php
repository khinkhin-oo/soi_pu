<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\UsersModel;
use App\Common\Services\MailService;
use Validator;
use Hash;
use Carbon;

class LawyerListingController extends Controller
{
    public function __construct()
    {
        $this->UsersModel         = new UsersModel();
        $this->MailService        = new MailService();
        $this->user_profile_image_base_img_path    = base_path().config('app.project.img_path.user_profile_image');
        $this->user_profile_image_public_img_path  = url('/').config('app.project.img_path.user_profile_image');

    }

    public function lawyer_listing(Request $request)
    {
        $arr_data = $arr_response = $arr_rules = $arr_resp_data = $arr_response_data =  [];

        $current_date = Carbon\Carbon::now()->format('Y-m-d');

        $search             = $request->input('search_key');
        $search_name        = $request->input('search_name');
        $search_language    = $request->input('search_language');

        $obj_data       = $this->UsersModel->whereHas('get_user_roles',function($q){
                                                $q->where('role','lawyer');
                                           })
                                           ->with(['get_details','get_experience','get_reviews'])
                                           ->with(['get_practice_area'=>function($q){
                                                $q->with('get_practice_area_name');
                                           }])
                                           ->with(['get_membership_details'=>function($q)use($current_date){
                                                $q->with(['get_package']);
                                                $q->where('expires_on','>=',$current_date);
                                           }]);

        if(isset($search) && $search!=''){
            $obj_data = $obj_data->with(['get_practice_area'=>function($q)use($search){
                                                $q->with(['get_practice_area_name'=>function($q1)use($search){
                                                    $q1->where('name', 'LIKE', "%".$search."%");
                                               }]);
                                           }])
                                 ->orwhere('full_name','LIKE',"%".$search."%");
        }

        if(isset($search_name) && $search_name!=''){
            $obj_data = $obj_data->where('full_name','LIKE',"%".$search_name."%");
        }

        if(isset($search_language) && $search_language!=''){
            $obj_data = $obj_data->where('full_name','LIKE',"%".$search_language."%");
        }

        $obj_data       = $obj_data->where('status','1')
                                   ->where('is_email_verified','1')
                                   ->paginate(3);

        if($obj_data){

            $arr_data = $obj_data->toArray();

            $arr_response_data['current_page']      = $arr_data['current_page'];
            $arr_response_data["first_page_url"]    = $arr_data['first_page_url'];
            $arr_response_data["from"]              = $arr_data['from'];
            $arr_response_data["last_page"]         = $arr_data['last_page'];
            $arr_response_data["last_page_url"]     = $arr_data['last_page_url'];
            $arr_response_data["next_page_url"]     = $arr_data['next_page_url'];
            $arr_response_data["path"]              = $arr_data['path'];
            $arr_response_data["per_page"]          = $arr_data['per_page'];
            $arr_response_data["prev_page_url"]     = $arr_data['prev_page_url'];
            $arr_response_data["to"]                = $arr_data['to'];
            $arr_response_data["total"]             = $arr_data['total'];

            foreach($arr_data['data'] as $key => $value){

                $arr_response_data['data'][$key]['_id']               = isset($value['_id']) ? $value['_id']:'';
                // $arr_response_data['data'][$key]['first_name']        = isset($value['first_name']) ? $value['first_name']:'';
                // $arr_response_data['data'][$key]['last_name']         = isset($value['last_name']) ? $value['last_name']:'';
                $arr_response_data['data'][$key]['full_name']         = isset($value['full_name']) ? $value['full_name']:'';
                $arr_response_data['data'][$key]['email']             = isset($value['email']) ? $value['email']:'';
                $arr_response_data['data'][$key]['mobile_number']     = isset($value['mobile_number']) ? $value['mobile_number']:'';
                $arr_response_data['data'][$key]['gender']            = isset($value['gender']) ? $value['gender']:'';
                $arr_response_data['data'][$key]['dob']               = isset($value['dob']) ? $value['dob']:'';
                $arr_response_data['data'][$key]['address']           = isset($value['address']) ? $value['address']:'';
                $arr_response_data['data'][$key]['website_url']       = isset($value['get_details']['website']) ? $value['get_details']['website']:'';
                $arr_response_data['data'][$key]['description']       = isset($value['get_details']['description']) ? $value['get_details']['description']:'';

                if(isset($value['profile_image']) && !empty($value['profile_image']) && file_exists($this->user_profile_image_base_img_path.$value['profile_image']))
                {
                    $arr_response_data['data'][$key]['profile_image']    =  $this->user_profile_image_public_img_path.$value['profile_image'];
                }
                else
                {
                    $arr_response_data['data'][$key]['profile_image']    = ""; 
                }

                if(isset($value['get_practice_area']) && sizeof($value['get_practice_area'])>0){
                    foreach($value['get_practice_area'] as $key_practice_area => $value_practice_area){
                        $arr_response_data['data'][$key]['practice_area'][$key_practice_area]['practice_area_id']   = isset($value_practice_area['practice_area_id']) ? $value_practice_area['practice_area_id']:'';
                        $arr_response_data['data'][$key]['practice_area'][$key_practice_area]['practice_area_name'] = isset($value_practice_area['get_practice_area_name']['name']) ? $value_practice_area['get_practice_area_name']['name'] : '';
                    }
                }else{
                    $arr_response_data['data'][$key]['practice_area'] = [];
                }

                if(isset($value['get_experience']) && sizeof($value['get_experience'])>0){
                    $sum = 0;
                    foreach($value['get_experience'] as $key_get_experience => $value_get_experience){
                        $date1  = date_create($value_get_experience['from_year']);
                        $date2  = date_create($value_get_experience['to_year']);
                        $diff   = date_diff($date1,$date2);
                        $diff_int   = (int) $diff->format("%R%a");
                        $sum = $diff_int + $sum;
                    }
                    
                    $years = ($sum / 365) ; // days / 365 days

                    $years = floor($years);
                    $arr_response_data['data'][$key]['experience']    = $years;
                }else{
                    $arr_response_data['data'][$key]['experience']    = 0;
                }

                if(isset($value['get_reviews']) && sizeof($value['get_reviews'])>0){
                    $rating_sum = 0;
                    foreach($value['get_reviews'] as $key_get_reviews => $value_get_reviews){
                        $arr_response_data['data'][$key]['all_reviews'][$key_get_reviews]['reviews'] = isset($value_get_reviews['review'])?$value_get_reviews['review']:'';
                        $arr_response_data['data'][$key]['all_reviews'][$key_get_reviews]['ratings'] = isset($value_get_reviews['ratings'])?$value_get_reviews['ratings']:'';
                        $ratings = $value_get_reviews['ratings'];
                        $rating_sum = $rating_sum + $ratings;
                    }
                    $avg_ratings = (float) $rating_sum/($key_get_reviews+1);

                    $arr_response_data['data'][$key]['average_ratings']    = round($avg_ratings,2); 
                }else{
                    $arr_response_data['data'][$key]['all_reviews']    = [];
                    $arr_response_data['data'][$key]['average_ratings']    = 0;
                }

                if(isset($value['get_membership_details']) && sizeof($value['get_membership_details'])>0){

                    $arr_response_data['data'][$key]['has_membership']    = "yes";
                    $arr_response_data['data'][$key]['package_name']      = isset($value['get_membership_details']['get_package'])?$value['get_membership_details']['get_package']:'';

                }else{
                    $arr_response_data['data'][$key]['has_membership']    = "no";
                    $arr_response_data['data'][$key]['package_name']      = '';
                }
            }

            $arr_response['data']     = $arr_response_data;

            return $this->build_response('SUCCESS','Lawyers listing displayed successfully.',$arr_response['data']);
        }else{

           return $this->build_response('ERROR','No Lawyers Found.',[]);
        }
        return $this->build_response('ERROR','Oops! SOmething went wrong.',[]);
    }

    public function get_lawyer_details(Request $request)
    {
        $arr_data       = $arr_response = [];
        $user_id        = $request->input('id');

        $current_date   = Carbon\Carbon::now()->format('Y-m-d');

        $obj_data = $this->UsersModel->with(['get_details','get_social_links','get_cases','get_experience','get_awards','get_academics','get_firm'])
                                     ->with(['get_practice_area'=>function($q){
                                        $q->with('get_practice_area_name');
                                     }])
                                     ->with(['get_reviews'=>function($q){
                                        $q->with('user');
                                     }])
                                     ->with(['get_languages'=>function($q){
                                        $q->with('get_language_name');
                                     }])
                                     ->with(['get_membership_details'=>function($q)use($current_date){
                                            $q->with(['get_package']);
                                            $q->where('expires_on','>=',$current_date);
                                       }])
                                     ->where('_id',$user_id)
                                     ->first();

        if($obj_data)
        {
            $arr_data = $obj_data->toArray();

            $arr_response_data['_id']               = isset($arr_data['_id']) ? $arr_data['_id']:'';
            // $arr_response_data['first_name']        = isset($arr_data['first_name']) ? $arr_data['first_name']:'';
            // $arr_response_data['last_name']         = isset($arr_data['last_name']) ? $arr_data['last_name']:'';
            $arr_response_data['full_name']         = isset($arr_data['full_name']) ? $arr_data['full_name']:'';
            $arr_response_data['email']             = isset($arr_data['email']) ? $arr_data['email']:'';
            $arr_response_data['mobile_number']     = isset($arr_data['mobile_number']) ? $arr_data['mobile_number']:'';
            $arr_response_data['gender']            = isset($arr_data['gender']) ? $arr_data['gender']:'';
            $arr_response_data['dob']               = isset($arr_data['dob']) ? $arr_data['dob']:'';

            if($arr_data['dob']){
        
                $from = new \DateTime($arr_data['dob']);
                $to   = new \DateTime('today');
                $from->diff($to)->y;

                $arr_response_data['age'] = date_diff(date_create($arr_data['dob']), date_create('today'))->y;
            }else{
                $arr_response_data['age'] = '';
            }

            $arr_response_data['address']           = isset($arr_data['address']) ? $arr_data['address']:'';
            $arr_response_data['website_url']       = isset($arr_data['get_details']['website']) ? $arr_data['get_details']['website']:'';
            $arr_response_data['description']       = isset($arr_data['get_details']['description']) ? $arr_data['get_details']['description']:'';
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
            }else{
                $arr_response_data['practice_area'] = '';
            }

            if(isset($arr_data['get_social_links'])){
                    $arr_response_data['social_links']['fb_url']        = isset($arr_data['get_social_links']['fb_url']) ? $arr_data['get_social_links']['fb_url']:'';
                    $arr_response_data['social_links']['linkedin_url']  = isset($arr_data['get_social_links']['linkedin_url']) ? $arr_data['get_social_links']['linkedin_url']:'';
                    $arr_response_data['social_links']['twitter_url']   = isset($arr_data['get_social_links']['twitter_url']) ? $arr_data['get_social_links']['twitter_url']:'';
            }else{
                $arr_response_data['social_links'] = '';
            }

            if(isset($arr_data['get_cases']) && sizeof($arr_data['get_cases'])>0){
                foreach($arr_data['get_cases'] as $key_get_cases => $value_get_cases){
                    $arr_response_data['lawyer_cases'][$key_get_cases]['case_title']    = isset($value_get_cases['title']) ? $value_get_cases['title']:'';
                    $arr_response_data['lawyer_cases'][$key_get_cases]['from_year']     = isset($value_get_cases['from_year']) ? $value_get_cases['from_year'] : '';
                    $arr_response_data['lawyer_cases'][$key_get_cases]['to_year']       = isset($value_get_cases['to_year']) ? $value_get_cases['to_year'] : '';
                    $arr_response_data['lawyer_cases'][$key_get_cases]['description']   = isset($value_get_cases['description']) ? $value_get_cases['description'] : '';
                }
            }else{
                $arr_response_data['lawyer_cases'] = '';
            }

            if(isset($arr_data['get_experience']) && sizeof($arr_data['get_experience'])>0){
                foreach($arr_data['get_experience'] as $key_get_experience => $value_get_experience){
                    $arr_response_data['lawyer_experience'][$key_get_experience]['title']       = isset($value_get_experience['title']) ? $value_get_experience['title']:'';
                    $arr_response_data['lawyer_experience'][$key_get_experience]['from_year']   = isset($value_get_experience['from_year']) ? $value_get_experience['from_year'] : '';
                    $arr_response_data['lawyer_experience'][$key_get_experience]['to_year']     = isset($value_get_experience['to_year']) ? $value_get_experience['to_year'] : '';
                    $arr_response_data['lawyer_experience'][$key_get_experience]['experience_at']  = isset($value_get_experience['experience_at']) ? $value_get_experience['experience_at'] : '';
                }
            }else{
                $arr_response_data['lawyer_experience'] = '';
            }

            if(isset($arr_data['get_awards']) && sizeof($arr_data['get_awards'])>0){
                foreach($arr_data['get_awards'] as $key_get_awards => $value_get_awards){
                    $arr_response_data['lawyer_awards'][$key_get_awards]['award_name']          = isset($value_get_awards['award_name']) ? $value_get_awards['award_name']:'';
                    $arr_response_data['lawyer_awards'][$key_get_awards]['year']                = isset($value_get_awards['year']) ? $value_get_awards['year'] : '';
                }
            }else{
                $arr_response_data['lawyer_awards']                = '';
            }

            if(isset($arr_data['get_academics']) && sizeof($arr_data['get_academics'])>0){
                foreach($arr_data['get_academics'] as $key_get_academics => $value_get_academics){
                    $arr_response_data['lawyer_academics'][$key_get_academics]['degree']                        = isset($value_get_academics['degree']) ? $value_get_academics['degree']:'';
                    $arr_response_data['lawyer_academics'][$key_get_academics]['university']                    = isset($value_get_academics['university']) ? $value_get_academics['university']:'';
                    $arr_response_data['lawyer_academics'][$key_get_academics]['starting_year']                 = isset($value_get_academics['starting_year']) ? $value_get_academics['starting_year'] : '';
                    $arr_response_data['lawyer_academics'][$key_get_academics]['passing_year']                  = isset($value_get_academics['passing_year']) ? $value_get_academics['passing_year'] : '';

                }
            }else{
                $arr_response_data['lawyer_academics'] = '';
            }

            if(isset($arr_data['get_languages']) && sizeof($arr_data['get_languages'])>0){
                foreach($arr_data['get_languages'] as $key_get_academics => $value_get_academics){
                    $arr_response_data['lawyer_languages'][$key_get_academics]['id']                            = isset($value_get_academics['_id']) ? $value_get_academics['_id']:'';
                    $arr_response_data['lawyer_languages'][$key_get_academics]['language_name']                 = isset($value_get_academics['get_language_name']['name']) ? $value_get_academics['get_language_name']['name']:'';
                    $arr_response_data['lawyer_languages'][$key_get_academics]['proficiency']                   = isset($value_get_academics['proficiency']) ? $value_get_academics['proficiency']:'';
                }
            }else{
                $arr_response_data['lawyer_languages']                   = '';
            }

            if(isset($arr_data['get_firm'])){
                $arr_response_data['lawyer_firm']['firm_name']      = isset($arr_data['get_firm']['firm_name']) ? $arr_data['get_firm']['firm_name']:'';
                $arr_response_data['lawyer_firm']['firm_address']   = isset($arr_data['get_firm']['firm_address']) ? $arr_data['get_firm']['firm_address']:'';
                $arr_response_data['lawyer_firm']['mobile_number']  = isset($arr_data['get_firm']['mobile_number']) ? $arr_data['get_firm']['mobile_number']:'';
                $arr_response_data['lawyer_firm']['fax']            = isset($arr_data['get_firm']['fax']) ? $arr_data['get_firm']['fax']:'';
            }else{
                $arr_response_data['lawyer_firm'] = '';
            }

            if(isset($arr_data['get_reviews']) && sizeof($arr_data['get_reviews'])>0){
                $rating_sum = 0;
                foreach($arr_data['get_reviews'] as $key_get_reviews => $value_get_reviews){
                    $arr_response_data['reviews'][$key_get_reviews]['review']                 = isset($value_get_reviews['review']) ? $value_get_reviews['review']:'';
                    $arr_response_data['reviews'][$key_get_reviews]['ratings']                = isset($value_get_reviews['ratings']) ? $value_get_reviews['ratings']:'';
                    /*$first_name = isset($value_get_reviews['user']['first_name']) ? $value_get_reviews['user']['first_name']:'';
                    $last_name  = isset($value_get_reviews['user']['last_name']) ? $value_get_reviews['user']['last_name']:'';
                    $full_name  = $first_name.' '.$last_name;*/
                    $full_name  = isset($value_get_reviews['user']['full_name']) ? $value_get_reviews['user']['full_name']:'';
                    $arr_response_data['reviews'][$key_get_reviews]['review_from']            = isset($full_name) ? $full_name:'';
                    if(isset($value_get_reviews['user']['profile_image']) && !empty($value_get_reviews['user']['profile_image']) && file_exists($this->user_profile_image_base_img_path.$value_get_reviews['user']['profile_image']))
                    {
                        $arr_response_data['reviews'][$key_get_reviews]['profile_image']    =  $this->user_profile_image_public_img_path.$value_get_reviews['user']['profile_image'];
                    }
                    else
                    {
                        $arr_response_data['reviews'][$key_get_reviews]['profile_image']    = ""; 
                    }
                    $ratings    = $value_get_reviews['ratings'];
                    $rating_sum = $rating_sum + $ratings;
                }
                $avg_ratings = (float) $rating_sum/($key_get_reviews+1);
                $arr_response_data['total_review_count']   = ($key_get_reviews+1);
                $arr_response_data['average_review']       = round($avg_ratings,2);
            }else{
                $arr_response_data['total_review_count']   = 0;
                $arr_response_data['reviews']              = '';
                $arr_response_data['average_review']       = 0;
            }

            if(isset($arr_data['get_membership_details']) && sizeof($arr_data['get_membership_details'])>0){

                $similar_lawyers = $this->get_similar_lawyers($arr_data['get_membership_details']['get_package']['_id'],$arr_data['_id']);

                $arr_response_data['has_membership']    = "yes";
                $arr_response_data['package_name']      = isset($arr_data['get_membership_details']['get_package'])?$arr_data['get_membership_details']['get_package']:'';
                $arr_response_data['similar_lawyers']   = $similar_lawyers;

            }else{
                $arr_response_data['has_membership']    = "no";
                $arr_response_data['package_name']      = '';
                $arr_response_data['similar_lawyers']   = [];
                
            }

            $arr_response_data['lawyer_cost']       = isset($arr_data['get_details']['cost']) ? $arr_data['get_details']['cost']:'';

            $arr_response['data']                   = $arr_response_data;

            return $this->build_response('SUCCESS','Lawyer details displayed successfully.',$arr_response['data']);
        }
        else
        {
            return $this->build_response('ERROR','Something went wrong..',[]);    
        }
    }

    public function get_similar_lawyers($package_id,$user_id)
    {
        $arr_data = $arr_resp = [];
        $current_date   = Carbon\Carbon::now()->format('Y-m-d');

        $obj_data       = $this->UsersModel->whereHas('get_user_roles',function($q){
                                                $q->where('role','lawyer');
                                           })
                                           ->with(['get_details','get_experience','get_reviews'])
                                           ->with(['get_practice_area'=>function($q){
                                                $q->with('get_practice_area_name');
                                           }])
                                           ->whereHas('get_membership_details',function($q)use($current_date,$package_id){
                                                $q->with(['get_package']);
                                                $q->where('package_id',$package_id);
                                                $q->where('expires_on','>=',$current_date);
                                           })
                                           ->where('status','1')
                                           ->where('is_email_verified','1')
                                           ->where('_id','!=',$user_id)
                                           ->get();

        if($obj_data){
            $arr_data = $obj_data->toArray();

            foreach($arr_data as $key => $value){
                $arr_resp[$key]['id']             = isset($value['_id']) ? $value['_id']:'';
                // $arr_resp[$key]['first_name']     = isset($value['first_name']) ? $value['first_name']:'';
                // $arr_resp[$key]['last_name']      = isset($value['last_name']) ? $value['last_name']:'';
                $arr_resp[$key]['full_name']      = isset($value['full_name']) ? $value['full_name']:'';
                $arr_resp[$key]['address']        = isset($value['address']) ? $value['address']:'';
                $arr_resp[$key]['email']          = isset($value['email']) ? $value['email']:'';
                $arr_resp[$key]['mobile_number']  = isset($value['mobile_number']) ? $value['mobile_number']:'';
                $arr_resp[$key]['description']    = isset($value['get_details']['description']) ? $value['get_details']['description']:'';

                if(isset($value['get_reviews']) && sizeof($value['get_reviews'])>0){
                    $rating_sum = 0;
                    foreach($value['get_reviews'] as $key_get_reviews => $value_get_reviews){
                        $arr_resp[$key]['all_reviews'][$key_get_reviews]['reviews'] = isset($value_get_reviews['review'])?$value_get_reviews['review']:'';
                        $arr_resp[$key]['all_reviews'][$key_get_reviews]['ratings'] = isset($value_get_reviews['ratings'])?$value_get_reviews['ratings']:'';
                        $ratings = $value_get_reviews['ratings'];
                        $rating_sum = $rating_sum + $ratings;
                    }
                    $avg_ratings = (float) $rating_sum/($key_get_reviews+1);

                    $arr_resp[$key]['average_ratings']    = round($avg_ratings,2); 
                }else{
                    $arr_resp[$key]['all_reviews']    = [];
                    $arr_resp[$key]['average_ratings']    = 0;
                }

                if(isset($value['profile_image']) && !empty($value['profile_image']) && file_exists($this->user_profile_image_base_img_path.$value['profile_image']))
                {
                    $arr_resp[$key]['profile_image']    =  $this->user_profile_image_public_img_path.$value['profile_image'];
                }
                else
                {
                    $arr_resp[$key]['profile_image']    = ""; 
                }

                if(isset($value['get_practice_area']) && sizeof($value['get_practice_area'])>0){
                    foreach($value['get_practice_area'] as $key_practice_area => $value_practice_area){
                        $arr_resp[$key]['practice_area'][$key_practice_area]['practice_area_id']   = isset($value_practice_area['practice_area_id']) ? $value_practice_area['practice_area_id']:'';
                        $arr_resp[$key]['practice_area'][$key_practice_area]['practice_area_name'] = isset($value_practice_area['get_practice_area_name']['name']) ? $value_practice_area['get_practice_area_name']['name'] : '';
                    }
                }else{
                    $arr_response_data['practice_area'] = '';
                }

            }
            return $arr_resp;
            
        }

    }

}