<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminCitiesModel extends EloquentModel
{
    protected $table  = "tbl_cities";

    protected $fillable = ['name',
    					   'slug',
    					   'status'
						  ];

}


