<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    protected $table  = "area";

    protected $fillable =  [
        'id',
        'area_name',
        'area_name_th',
        'user_id',
        'status',
        'locations'
    ];

    public function get_subadmin_user()
    {
        return $this->hasMany('App\Models\UserModel', 'id', 'user_id');
    }
}

