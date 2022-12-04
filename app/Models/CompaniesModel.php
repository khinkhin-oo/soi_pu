<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompaniesModel extends Model
{
    protected $table  = "company";

    protected $fillable =  [
                            'company_name',
                            'user_id',
                            'status'
                            ];
    public function get_subadmin_user()
    {
        return $this->hasMany('App\Models\UserModel', 'id', 'user_id');
    }
}

