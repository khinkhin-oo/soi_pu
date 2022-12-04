<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table  = "cities";

    protected $fillable = ['name',
    					   'slug',
    					   'status'
						  ];

	public function get_categories() 
    {
       return $this->hasMany('App\Models\CategoryModel', 'city_id', 'id');
    }

}

