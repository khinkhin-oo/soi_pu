<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesModel extends Model
{
    protected $table  = "services";

    protected $fillable =  [
                            'service_name',
                            'service_name_th',
                            'user_id',
                            'status'
                            ];
    public function get_subadmin_user()
    {
        return $this->hasMany('App\Models\UserModel', 'id', 'user_id');
    }
}

