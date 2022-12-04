<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class CommentsModel extends Model 
{
	
    protected $table = "comment";

    protected $fillable = [
    	                   	'model_id',
                           	'user_id',
                           	'comment',
                            'status',
                            'model_user_id',
                            'image'
    ];

    public function get_users()
    {
        return $this->hasMany('App\Models\UserModel', 'id', 'user_id');
    }

    public function get_models()
    {
        return $this->hasMany('App\Models\ModelsModel', 'id', 'model_id');
    }
}
	