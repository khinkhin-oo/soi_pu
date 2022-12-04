<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRolesModel extends Model
{

	protected $table = 'user_roles';

    protected $fillable =  [
                            'user_id',
                            'role',
                            ];


	public function get_user_details()
    {
       return $this->hasOne('App\Models\UsersModel', 'id', 'user_id');
    }

}

