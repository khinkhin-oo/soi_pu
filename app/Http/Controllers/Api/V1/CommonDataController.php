<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\LanguagesModel;
use App\Models\PracticeModel;
use App\Common\Services\MailService;
use Validator;
use Hash;

class CommonDataController extends Controller
{
    public function __construct()
    {
        $this->LanguagesModel     = new LanguagesModel();
        $this->PracticeModel      = new PracticeModel();
        $this->MailService        = new MailService();

    }

    public function get_languages()
    {
        $arr_data = $arr_response = $arr_rules = $arr_resp_data = [];

        $obj_data       = $this->LanguagesModel->get();

        if($obj_data){
            $arr_data = $obj_data->toArray();

            $arr_response['data']     = $arr_data;

            return $this->build_response('SUCCESS','Languages displayed successfully.',$arr_response['data']);
        }else{

           return $this->build_response('ERROR','No languages Found.',[]);
        }
        return $this->build_response('ERROR','Oops! SOmething went wrong.',[]);
    }

    public function get_practice_area()
    {
        $arr_data = $arr_response = $arr_rules = $arr_resp_data = [];

        $obj_data       = $this->PracticeModel->where('status','1')->get();

        if($obj_data){
            $arr_data = $obj_data->toArray();

            $arr_response['data']     = $arr_data;

            return $this->build_response('SUCCESS','Practice Area displayed successfully.',$arr_response['data']);
        }else{

           return $this->build_response('ERROR','No Practice Area Found.',[]);
        }
        return $this->build_response('ERROR','Oops! Something went wrong.',[]);
    }

}