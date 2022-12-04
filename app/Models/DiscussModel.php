<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class DiscussModel extends Model 
{
	
    protected $table = "discusses";

    protected $fillable = [
    	                   'title',
                           'type',
                           'description',
                           'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo(UserModel::class,'user_id');
    }

}
	