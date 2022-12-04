<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqsModel extends Model
{
    protected $table  = "faqs";

    protected $fillable = [ 
                            'id',
                            'question',
                            'answer',
                            'user_id',
                            'lang',
                            'type',
                            'image'
                        ];

    public function get_subadmin_user()
    {
        return $this->hasMany('App\Models\UserModel', 'id', 'user_id');
    }
}