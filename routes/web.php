<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

// Route::get('/{any}', function () {
//     return view('app');
// })->where('any','.*');

Route::get('cache_clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    //  Clears route cache
    Artisan::call('route:clear');
    Cache::flush();
    //	Artisan::call('optimize');
    exec('composer dump-autoload');
    Cache::flush();
    dd("Cache cleared!");
});

// include_once(base_path().'/routes/front.php');

$route_slug        = 'front';
$module_controller = 'Front\IndexController@';

Route::get('/', ['as' => $route_slug . 'index',           'uses' => $module_controller . 'index']);

Route::get('/list_details/{id}',['as' => $route_slug . 'list_details',     'uses' => $module_controller . 'list_details']);

Route::get('/page/{id}',['as' => $route_slug . 'page',           'uses' => $module_controller . 'page']);

Route::get('/contactus',['as' => $route_slug . 'contactus',           'uses' => $module_controller . 'contactus']);

Route::any('/view_by_company/{id}',['as' => $route_slug . 'company_index',   'uses' => $module_controller . 'view_by_company']);

Route::any('/validate_login',['as' => $route_slug . 'login',           'uses' => $module_controller . 'validate_login']);

Route::get('/logout',['as' => $route_slug . 'logout',          'uses' => $module_controller . 'logout']);

Route::get('/change_password',['as' => $route_slug . 'change_password', 'uses' => $module_controller . 'change_password']);

Route::post('/update_password',['as' => $route_slug . 'update_password',    'uses' => $module_controller . 'update_password']);

Route::get('/user_register',['as' => $route_slug . 'register',        'uses' => $module_controller . 'register']);

Route::get('/forget_password',['as' => $route_slug . 'forget_password',    'uses' => $module_controller . 'forget_password']);

Route::post('/forget_mail',['as' => $route_slug . 'forget_mail',       'uses' => $module_controller . 'forget_mail']);

Route::post('/store',['as' => $route_slug . 'store',           'uses' => $module_controller . 'store']);

Route::post('/storeadviser',['as' => $route_slug . 'storeadviser',           'uses' => $module_controller . 'storeadviser']);

Route::post('/comment',['as' => $route_slug . 'comment',         'uses' => $module_controller . 'comment']);

Route::get('/faqs', ['as' => $route_slug . 'faqs',     'uses' => $module_controller . 'faqs']);

Route::get('/area', ['as' => $route_slug . 'area',           'uses' => $module_controller . 'area']);

Route::get('/search/{type}/{area_id}',['as' => $route_slug . 'search',           'uses' => $module_controller . 'search']);

Route::get('/lang/{lang}',['as' => 'lang.switch',                     'uses' => $module_controller . 'index']);

// Route::get('/en/blogs',['as' => 'blogs',		'uses' => 'Front\IndexController@blogsen']);
// Route::get('/en',['as' => 'enhome',		'uses' => 'Front\IndexController@enhome']);
// Route::get('/en/faqs',['as' => 'enfaq',		'uses' => 'Front\IndexController@enfaq']);
// Route::get('/en/faqsbadges',['as' => 'faqsbadges',		'uses' => 'Front\IndexController@enfaqsbadges']);

Route::get('/autorefresh',['as' => 'autorefresh', 'uses' => 'Front\IndexController@autorefresh']);

Route::get('/commenthistory/{user}',['as' => 'commenthistory', 'uses' => 'Front\IndexController@commenthistory']);


// Old Web.php

$route_slug        = 'admin_';
$module_controller = "Admin\ModelsController@";
Route::get('/models/set_cron/sequence',    ['as' => $route_slug . 'cron_sequence',    'uses' => $module_controller . 'cron_sequence']);

Auth::routes();










//    Old Web.php
// Route::get('/advertise',['as' => 'advertise',		'uses' => 'Front\IndexController@advertise']);
// Route::get('/blogs',['as' => 'blogs',		'uses' => 'Front\IndexController@blogs']);
// Route::get('/blog/{slug}',['as' => 'blog',		'uses' => 'Front\IndexController@blog']);
// Route::post('/sendcontactus',['as' => 'sendcontactus',		'uses' => 'Front\IndexController@sendcontactus']);
// Route::get('/test',['as' => 'test',		'uses' => 'Front\IndexController@test']);
// Route::get('/test',['as' => 'test',		'uses' => 'Front\IndexController@test']);
// Route::get('/test_/{check}',['as' => 'test_',		'uses' => 'Front\IndexController@test_']);
// Route::get('/slide',['as' => 'slide',		'uses' => 'Front\IndexController@slide']);
// Route::get('/en/blogs',['as' => 'blogs',		'uses' => 'Front\IndexController@blogsen']);
// Route::get('/en',['as' => 'enhome',		'uses' => 'Front\IndexController@enhome']);
// Route::get('/en/faqs',['as' => 'enfaq',		'uses' => 'Front\IndexController@enfaq']);
// Route::get('/en/faqsbadges',['as' => 'faqsbadges',		'uses' => 'Front\IndexController@enfaqsbadges']);
// Route::get('faqsbadges',['as' => 'faqsbadges',		'uses' => 'Front\IndexController@faqsbadges']);
// Route::get('forum',['as' => 'forum',		'uses' => 'Front\IndexController@forum']);
// Route::get('thread/{discuss}',['as' => 'thread',		'uses' => 'Front\IndexController@thread']);
// Route::get('profile/{user}',['as' => 'profile',		'uses' => 'Front\IndexController@profile']);
// Route::post('badges',['as' => 'badges',		'uses' => 'Front\IndexController@badges']);
// Route::get('profile',['as' => 'myprofile',		'uses' => 'Front\IndexController@myprofile']);
// Route::get('inbox',['as' => 'inbox',		'uses' => 'Front\IndexController@inbox']);
// Route::get('inbox/{id}',['as' => 'selectedinbox',		'uses' => 'Front\IndexController@selectedinbox']);
// Route::post('sendmessage/{user}',['as' => 'sendmessage',		'uses' => 'Front\IndexController@sendmessage']);
// Route::post('savediscuss/{user}',['as' => 'savediscuss',		'uses' => 'Front\IndexController@savediscuss']);
// Route::post('savethread/{user}/{discuss}',['as' => 'savethread',		'uses' => 'Front\IndexController@savethread']);
