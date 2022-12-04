<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannersModel extends Model
{
    protected $table  = "banner";

    protected $fillable = [ 
                            'id',
                            'banner_title',
                            'company',
                            'banner_image',
                            'user_id',
                            'status',
                            'url'
                        ];

    public function get_companies()
    {
        return $this->hasMany('App\Models\CompaniesModel', 'id', 'company');
    }

    public function get_subadmin_user()
    {
        return $this->hasMany('App\Models\UserModel', 'id', 'user_id');
    }
}