<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel;


class MessageModel extends Model 
{
	
    protected $table = "messages";

    protected $fillable = [
    	                   	'user_id',
                           	'receive_id',
                           	'message'
    ];

    public function user()
    {
    	return $this->belongsTo(UserModel::class,'user_id');
    }

    public function receive()
    {
        return $this->belongsTo(UserModel::class,'receive_id');
    }
}
	