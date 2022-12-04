<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class BlogsModel extends Model 
{
	
    protected $table = "blogs";

    protected $fillable = [
    	                     'title',
                           'slug',
                           'category_id',
                           'short_description',
    	                     'description',
    	                     'image',
                           'meta_keyword',
                           'meta_title',
                           'meta_description',
                           'author_type',
                           'author_id',
    	                     'status',
                           'is_active',
                           'lang'
    ];

    public function get_user_details()
    {
        return $this->hasOne('App\Models\UserModel', 'id', 'author_id');
    }

    public function get_admin_details()
    {
        return $this->hasOne('App\Models\WebAdmin', 'id', 'author_id');
    }

    public function get_category_details()
    {
        return $this->belongsTo('App\Models\BlogsCategoryModel', 'category_id', 'id');
        //return $this->HasOne('App\Models\BlogsCategoryModel', '_id', 'category_id');
    }

}
	