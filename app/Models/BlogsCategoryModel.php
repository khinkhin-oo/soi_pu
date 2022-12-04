<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BlogsCategoryModel extends Model 
{
    protected $table = 'blogs_category';

    protected $fillable = [
    	                    'title',
                            'slug',
    	                    'status',
                        ];


    public function get_blogs()
    {
        return $this->hasMany('App\Models\BlogsModel', 'id', 'id');
    }

}
	