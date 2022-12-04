<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\UsersModel;
use Validator;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->UsersModel         = new UsersModel();
    }

    public function login(Request $request)
    {
        $arr_data = $arr_response = $arr_rules = $arr_resp_data = [];

        $arr_rules['email']         = "required|email|max:75";
        $arr_rules['password']      = "required|max:40";
        //$arr_rules['login_as']      = "required";

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
        $password       = $request->input('password');
        $login_as       = $request->input('login_as');

        $arr_data['email']      = $email;
        $arr_data['password']   = $password;

        if(Auth::attempt($arr_data)){

            $user = auth()->user();

            //$token    = $user->createToken('token',[$login_as])->accessToken;
            $token    = $user->createToken('token')->accessToken;
            $obj_user = $this->UsersModel->where('email',$arr_data['email'])->first();

            $arr_resp_data['token']          =  $token;
            // $arr_resp_data['first_name']     = isset($obj_user->first_name)?ucfirst($obj_user->first_name):'';
            // $arr_resp_data['last_name']      = isset($obj_user->last_name)?ucfirst($obj_user->last_name):'';
            $arr_resp_data['full_name']      = isset($obj_user->full_name)?ucfirst($obj_user->full_name):'';
            $arr_resp_data['email']          = isset($obj_user->email)?($obj_user->email):'';
            $arr_resp_data['mobile_number']  = isset($obj_user->mobile_number)?($obj_user->mobile_number):'';
            
            $arr_response['data']     = $arr_resp_data;

            return $this->build_response('SUCCESS','Login Successful.',$arr_response['data']);

        }else{
            return $this->build_response('ERROR','Unauthorized Access.',$arr_response);
        }

        return $this->build_response('ERROR','Oops! Something went wrong.',$arr_response);
    }
}
