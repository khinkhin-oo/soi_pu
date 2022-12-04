<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRelationModel extends Model
{
    protected $table  = "model_services";

    protected $fillable =  [
                            'service_id',
                            'service_name',
                            'model_id'
                            ];
}

