<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel;


class InboxModel extends Model 
{
	
    protected $table = "inboxes";

    protected $fillable = [
    	                   	'user_id',
                           	'revice_user_id',
                           	'message'
    ];

    public function user()
    {
    	return $this->belongsTo(UserModel::class,'user_id');
    }

    public function revice()
    {
    	return $this->belongsTo(UserModel::class,'revice_user_id');
    }
}
	