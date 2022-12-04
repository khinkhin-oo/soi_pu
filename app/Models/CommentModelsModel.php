<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class CommentModelsModel extends Model 
{
	
    protected $table = "commentmodels";

    protected $fillable = [
    	                   	'model_id',
                           	'user_id',
                           	'comment',
                           	'comment_id',
                            'replay_user_id',
                            'image'
    ];
}
	