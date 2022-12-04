<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    protected $table  = "addresses";

    protected $fillable = ['slug',
    					   'user_id',
    					   'address_title',
    					   'address_type',
    					   'city',
    					   'area',
    					   'street_name',
    					   'building',
    					   'floor',
    					   'apartment',
    					   'phone_number',
    					   'directions',
    					   'default',
    					   'status',
						  ];

}
