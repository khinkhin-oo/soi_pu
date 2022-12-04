<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table  = "category";

    protected $fillable =  [
                            'category_name',
                            'category_name_th',
                            'user_id',
                            'status'
                            ];


	public function get_subadmin_user()
    {
        return $this->hasMany('App\Models\UserModel', 'id', 'user_id');
    }
}

