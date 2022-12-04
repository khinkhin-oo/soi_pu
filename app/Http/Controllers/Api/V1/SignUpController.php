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

class SignUpController extends Controller
{
    public function __construct()
    {
        $this->UsersModel         = new UsersModel();
        $this->MailService        = new MailService();

    }

    public function process_signup(Request $request)
    {
        $arr_data = $arr_response = $arr_rules = $arr_resp_data = [];

        // $arr_rules['first_name']            = "required|string|max:25";
        // $arr_rules['last_name']             = "required|string|max:25";
        $arr_rules['full_name']             = "required|string|max:25";
        $arr_rules['email']                 = "required|email|unique:users|max:75";
        $arr_rules['mobile_number']         = "required|int|unique:users";
        $arr_rules['password']              = "required|max:40";
        $arr_rules['confirm_password']      = "required|same:password";

        $validator  = Validator::make($request->all(),$arr_rules);

        if($validator->fails()) 
        {
            $msg        = "Validation Error, Please fill up the all mandatory fields";
            if($validator->errors()) 
            {
                $arr_response_data['error'] = $validator->errors()->first();
            }
            $arr_response['status']   = 'ERROR';
            $arr_response['msg']      = $msg;
            $arr_response['data']     = $arr_response_data;
            return $arr_response;
        }

        // $first_name     = $request->input('first_name');
        // $last_name      = $request->input('last_name');
        $full_name      = $request->input('full_name');
        $email          = $request->input('email');
        $password       = $request->input('password');
        $mobile_number  = $request->input('mobile_number');

        // $arr_data['first_name']      = isset($first_name) ? $first_name : '';
        // $arr_data['last_name']       = isset($last_name) ? $last_name : '';
        $arr_data['full_name']       = isset($full_name) ? $full_name : '';
        $arr_data['email']           = isset($email) ? $email : '';
        $arr_data['mobile_number']   = isset($mobile_number) ? $mobile_number : '';
        $arr_data['password']        = isset($password) ? Hash::make($password) : '';

        $status       = $this->UsersModel->create($arr_data);

        if($status){
            $arr_response['status']   = 'SUCCESS';
            $arr_response['msg']      = 'Registration Successful.';
            return $arr_response;
        }else{

            $arr_response['status']   = 'ERROR';
            $arr_response['msg']      = 'Something went wrong.';
            return $arr_response;
        }
        $arr_response['status']   = 'ERROR';
        $arr_response['msg']      = 'Oops! Something went wrong.';
        return $arr_response;
    }


    public function check_email_duplication(Request $request)
    {
        $arr_data = $arr_response = $arr_rules = $arr_resp_data = [];

        $arr_rules['email']                 = "required|email";

        $validator  = Validator::make($request->all(),$arr_rules);

        if($validator->fails()) 
        {
            $msg        = "Validation Error, Please fill up the all mandatory fields";
            if($validator->errors()) 
            {
                $arr_response_data['error'] = $validator->errors()->first();
            }
            $arr_response['status']   = 'ERROR';
            $arr_response['msg']      = $msg;
            $arr_response['data']     = $arr_response_data;
            return $arr_response;
        }

        $email          = $request->input('email');

        $status       = $this->UsersModel->where('email',$email)->first();

        if($status){
            $arr_response['status']   = 'ERROR';
            $arr_response['msg']      = 'Email already exists.';
            return $arr_response;
        }else{

            $arr_response['status']   = 'SUCCESS';
            $arr_response['msg']      = 'Email is validator.';
            return $arr_response;
        }
        $arr_response['status']   = 'ERROR';
        $arr_response['msg']      = 'Oops! Something went wrong.';
        return $arr_response;
    }

    public function check_contact_duplication(Request $request)
    {
        $arr_data = $arr_response = $arr_rules = $arr_resp_data = [];

        $arr_rules['mobile_number']                 = "required|int";

        $validator  = Validator::make($request->all(),$arr_rules);

        if($validator->fails()) 
        {
            $msg        = "Validation Error, Please fill up the all mandatory fields";
            if($validator->errors()) 
            {
                $arr_response_data['error'] = $validator->errors()->first();
            }
            $arr_response['status']   = 'ERROR';
            $arr_response['msg']      = $msg;
            $arr_response['data']     = $arr_response_data;
            return $arr_response;
        }

        $mobile_number  = $request->input('mobile_number');

        $status         = $this->UsersModel->where('mobile_number',$mobile_number)->first();

        if($status){
            $arr_response['status']   = 'ERROR';
            $arr_response['msg']      = 'Mobile Number already exists.';
            return $arr_response;
        }else{

            $arr_response['status']   = 'SUCCESS';
            $arr_response['msg']      = 'Mobile Number is valid.';
            return $arr_response;
        }
        $arr_response['status']   = 'ERROR';
        $arr_response['msg']      = 'Oops! Something went wrong.';
        return $arr_response;
    }

    public function forgot_password(Request $request)
    {
        $arr_data = $arr_response = $arr_rules = $arr_resp_data = [];

        $arr_rules['email']                 = "required|email";

        $validator  = Validator::make($request->all(),$arr_rules);

        if($validator->fails()) 
        {
            $msg        = "Validation Error, Please fill up the all mandatory fields";
            if($validator->errors()) 
            {
                $arr_response_data['error'] = $validator->errors()->first();
            }
            $arr_response['status']   = 'ERROR';
            $arr_response['msg']      = $msg;
            $arr_response['data']     = $arr_response_data;
            return $arr_response;
        }

        $email          = $request->input('email');

        $status         = $this->UsersModel->where('email',$email)->first();

        if($status){

            $rand_token     = mt_rand(0,999999);

            /*$first_name = isset($status->first_name) ? $status->first_name: '';
            $last_name  = isset($status->last_name) ? $status->last_name: '';
            $user_name  = $first_name.' '.$last_name;*/
            $user_name  = isset($status->full_name) ? $status->full_name: '';

            $arr_email['to_email_id']       = $email;
            $arr_email['to_user_name']      = $user_name;
            $arr_email['verification_url']  = url('/');

            $email_status = $this->MailService->send_forget_password_email($arr_email);

            if($email_status){

                $status       = $this->UsersModel->where('email',$email)->update(['password_reset_token'=> $rand_token ]);

                $arr_response['status']   = 'SUCCESS';
                $arr_response['msg']      = 'Email has been sent.';
                $arr_response['data']     = $rand_token;
                return $arr_response;
            }else{
                $arr_response['status']   = 'ERROR';
                $arr_response['msg']      = 'Something went wrong while sending Email.';
                return $arr_response;
            }
        }else{

            $arr_response['status']   = 'SUCCESS';
            $arr_response['msg']      = 'Email does not exists.';
            return $arr_response;
        }

        $arr_response['status']   = 'ERROR';
        $arr_response['msg']      = 'Oops! Something went wrong.';
        return $arr_response;
    }

    public function set_password(Request $request)
    {
        $arr_data = $arr_response = $arr_rules = $arr_resp_data = [];

        $arr_rules['password_reset_token']  = "required";
        $arr_rules['password']              = "required";

        $validator  = Validator::make($request->all(),$arr_rules);

        if($validator->fails()) 
        {
            $msg        = "Validation Error, Please fill up the all mandatory fields";
            if($validator->errors()) 
            {
                $arr_response_data['error'] = $validator->errors()->first();
            }

            $arr_response['status']   = 'ERROR';
            $arr_response['msg']      = $msg;
            $arr_response['data']     = $arr_response_data;
            return $arr_response;
        }

        $password_reset_token          = $request->input('password_reset_token');
        $password                      = $request->input('password');

        $status         = $this->UsersModel->where('password_reset_token',(int) $password_reset_token)->first();

        if($status){

            $hash_password   = isset($password) ? Hash::make($password): '';

            $obj_data        = $this->UsersModel->where('password_reset_token',(int) $password_reset_token)->update([
                                                                                'password'=>$hash_password,
                                                                                'password_reset_token'=>''
                                                                            ]);
            if($obj_data){

                $arr_response['status']   = 'SUCCESS';
                $arr_response['msg']      = 'Password changed successfully.';
                return $arr_response;
                
            }else{
                $arr_response['status']   = 'ERROR';
                $arr_response['msg']      = 'Something went wrong.';
                return $arr_response;
            }

        }else{

            $arr_response['status']   = 'ERROR';
            $arr_response['msg']      = 'Invalid password token';
            return $arr_response;
        }

        $arr_response['status']   = 'ERROR';
        $arr_response['msg']      = 'Oops! Something went wrong.';
        return $arr_response;
    }


   
}