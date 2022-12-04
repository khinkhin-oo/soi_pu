<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSettingModel extends Model
{
    protected $table = 'site_settings';

    protected $fillable = 
    [
        'title',
        'meta_keyword',
        'meta_description',
        'send_order_email',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'logo',
        'favicon',
        'address',
        'tel',
        'description',
        'tophome',
        'bottomhome',
        'title_ads',
        'meta_forgot',
        'meta_register',
        'h1_home',
        'title_en',
        'h1_home_en',
        'bottomhome_en',
        'tophome_en',
        'meta_description_en',
        'hideforum',
        'hideblog',
        'groupline_link',
        'adminline_link',
        'groupline',
        'adminline',
        'groupline_en',
        'adminline_en',
        'slide1image',
        'slide2image',
        'slide3image',
        'slide4image',
        'slide5image',
        'slide6image',
        'slide7image',
        'slide8image',
        'slide9image',
        'slide10image',
        'slide1link',
        'slide2link',
        'slide3link',
        'slide4link',
        'slide5link',
        'slide6link',
        'slide7link',
        'slide8link',
        'slide9link',
        'slide10link',
        'hideslider'
    ];

    public $timestamps = false; 
}
