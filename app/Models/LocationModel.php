<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    protected $table  = "location";

    protected $fillable =  [
                            'id',
                            'location_name',
                            'location_name_th',
                            'user_id',
                            'status'
                            ];
    public function get_subadmin_user()
    {
        return $this->hasMany('App\Models\UserModel', 'id', 'user_id');
    }
}

