<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    protected $table  = "pages";

    protected $fillable = [
                            'id',
                            'title',
                            'description',
                            'image',
                            'user_id',
                        ];
}
