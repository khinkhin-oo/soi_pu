<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsLetterTemplateModel extends Model
{
    protected $table = "newsletter_template";
   	
   	protected $fillable = [
   							'title',
   							'subject',
   							'news_description',
   							'status'
   						  ]; 
}
