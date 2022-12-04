<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PracticeModel extends Model
{
    protected $table  = "practice_area";

    protected $fillable =  [
                            'name',
                            'status'
                            ];


	public function get_city() 
    {
       return $this->hasOne('App\Models\CitiesModel', 'id', 'city_id');
    }

}

