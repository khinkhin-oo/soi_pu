<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointSystemModel extends Model
{
    protected $table  = "point_system";

    protected $fillable =  [
                            'name',
                            'range_from',
                            'range_to'
                            ];
}

