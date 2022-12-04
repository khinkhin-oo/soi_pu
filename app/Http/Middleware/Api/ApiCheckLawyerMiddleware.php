<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\NotificationModel;
use App\Models\SiteSettingModel;
use App\Models\UserRolesModel;

class ApiCheckLawyerMiddleware
{
    function __construct()
    {  
        $this->NotificationModel    = new NotificationModel();
        $this->UserRolesModel       = new UserRolesModel();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = auth()->guard('api')->user();
        if(!$user){
            return $this->build_response('INVALID_TOKEN','Invalid token.',[],'json',401);
        }

        $obj_data = $this->UserRolesModel->where('user_id',$user->_id)->where('role','lawyer')->first();

        if(!$obj_data){
            return $this->build_response('ERROR','Invalid access.',[],'json',401);
        }
       
        return $next($request);
    }

    public function build_response(
        $status          = 'SUCCESS',
        $message         = "",
        $arr_data        = [],
        $response_format = 'json',
        $response_code = 200
    )
    {
        if($response_format == 'json')
        {
            $arr_response = [
                'status'  => $status,
                'message' => $message
            ];

            if(sizeof($arr_data)>0)
            {
                $arr_response['response_data'] = $arr_data;
            }
            return response()->json($arr_response,200,[],JSON_UNESCAPED_UNICODE)->header('Access-Control-Allow-Origin','*');
        }
        
    }

}