<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BlogsCommentModel extends Model 
{
    protected $table = 'blog_comments';

    protected $fillable = [
    	                    'blog_id',
                            'user_id',
                            'user_role',
    	                    'comments',
                            'status'
                        ];



    public function get_user_details()
    {
        return $this->hasOne('App\Models\UsersModel', '_id', 'user_id');
    }

}
	