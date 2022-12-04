<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model 
{
    protected $table = 'user_image';

    protected $fillable = [
                            'profile_image',
                            'user_id',
                        ];

	
}
	