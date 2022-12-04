<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class LanguagesModel extends EloquentModel
{
    protected $table = 'languages';

    protected $fillable =  [
                            'name',
                            'iso_639-1'
                            ];

	/*public function get_city()
    {
       return $this->hasOne('App\Models\CitiesModel', 'id', 'city_id');
    }
*/
}

