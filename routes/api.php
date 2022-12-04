<?php


Route::group(array('prefix' => 'v1'), function ()
{
	include_once(base_path().'/routes/api/v1/routes.php');
});
