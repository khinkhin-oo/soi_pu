<?php

use Illuminate\Support\Facades\Route;

$front_user_path = config('app.project.front_panel_slug');

// Route::any('/', function () {
//     /*return view('errors.404');*/

//     // return redirect('/user');

//     $route_slug = 'user_';
//     $module_controller = "Restaurant\HomeController@";
// 	Route::get('/',['as' =>$route_slug.'index', 'uses' => $module_controller.'index']);

// });

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


$module_controller = "Front\LangController@";

Route::get('/lang/{lang}',['as' => 'lang.switch',                     'uses' => $module_controller . 'index']);

Route::get('/autorefresh',['as' => 'autorefresh', 'uses' => 'Front\IndexController@autorefresh']);
Route::get('/commenthistory/{user}',['as' => 'commenthistory', 'uses' => 'Front\IndexController@commenthistory']);
