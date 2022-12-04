<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Auth;
//use Session;

class ModelsModel extends Model implements Authenticatable, CanResetPasswordContract
{
    use AuthenticableTrait, CanResetPassword, Notifiable;

	protected $table = "models";

    protected $fillable = [
                            'id',
                            'first_name',
                            'first_name_th',
                            'last_name',
                            // 'email',
                            'password',
                            'mobile_number',
                            'wechat',
                            'line',
                            'category',
                            'age',
                            'height',
                            'weight',
                            'address',
                            'price',
                            'company',
                            'location',
                            'size',
                            'from_time',
                            'to_time',
                            'country',
                            'city',
                            'state',
                            'user_id',
                            'sequence',
                            'meta_desc',
                            'locations',
                            'order_list',
                            'type_order',
                            'user_id',
                            'status',
                            'expiredate',
                            'bio',
                            'vaccine_status',
                            'vaccine_doc_path',
                            'vaccine_reason',
                            'gender',
    ];

    public function get_subadmin_user()
    {
        return $this->hasMany('App\Models\UserModel', 'id', 'user_id');
    }

    public function get_images()
    {
        return $this->hasMany('App\Models\ImageModel', 'user_id', 'id');
    }

    public function locationsfind()
    {
        return $this->belongsTo('App\Models\LocationModel','location');
    }

    public function get_category()
    {
        return $this->hasMany('App\Models\CategoryModel', 'id', 'category');
    }

    public function get_models_services()
    {
        return $this->hasMany('App\Models\ServiceRelationModel', 'model_id', 'id');
    }

    public function get_services()
    {
        return $this->hasMany('App\Models\ServicesModel', 'model_id', 'id');
    }

    public function get_companies()
    {
        return $this->hasMany('App\Models\CompaniesModel', 'id', 'company');
    }
}
