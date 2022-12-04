<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ThreadModel extends Model 
{
	
    protected $table = "threads";

    protected $fillable = [
    	                   'title',
                           'comment',
                           'user_id',
                           'discuss_id',
    ];

    public function user()
    {
    	return $this->belongsTo(UserModel::class,'user_id');
    }

    public function discuss()
    {
      return $this->belongsTo(DiscussModel::class,'discuss_id');
    }

}
	