<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ReviewsModel extends Model 
{
    protected $table = 'reviews';

    protected $fillable = [
        	                    'from_id',
                                'to_id',
                                'review',
                                'ratings',
                            ];

    public function user()
    {
   	    return $this->hasOne('App\Models\UsersModel','id','from_id');
    }

    public function lawyer()
    {
        return $this->hasOne('App\Models\UsersModel','id','to_id');
    }

}