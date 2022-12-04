<?php


	Route::group(array('prefix' => ''), function ()
	{
		$module_controller = 'Api\V1\SignUpController@';

		Route::post('/signup',							 	[	'uses' => $module_controller.'process_signup'	]);

		Route::post('/check_email_duplication',				[	'uses' => $module_controller.'check_email_duplication'	]);

		Route::post('/check_contact_duplication',			[	'uses' => $module_controller.'check_contact_duplication'	]);

		Route::post('/forgot_password',						[	'uses' => $module_controller.'forgot_password'	]);

		Route::post('/set_password',						[	'uses' => $module_controller.'set_password'	]);


		$module_controller = 'Api\V1\AuthController@';

		Route::post('/login',								[	'uses' => $module_controller.'login'	]);

		$module_controller = 'Api\V1\CommonDataController@';

		Route::get('/get_languages',						[	'uses' => $module_controller.'get_languages']);

		Route::get('/get_practice_area',					[	'uses' => $module_controller.'get_practice_area']);

		$module_controller = 'Api\V1\LawyerListingController@';

		Route::get('/lawyer_listing',						[	'uses' => $module_controller.'lawyer_listing']);

		Route::get('/get_lawyer_details',					[	'uses' => $module_controller.'get_lawyer_details']);

	});

	Route::group(['prefix' => 'user', 'middleware'=>'api_auth_check'], function ()
	{
		$module_controller = 'Api\V1\User\UserProfileController@';

		Route::post('/get_profile',				[	'uses' => $module_controller.'get_profile' ]);

		Route::post('/update_profile',			[	'uses' => $module_controller.'update_profile' ]);

		Route::post('/add_lawyer_profile',		[	'uses' => $module_controller.'add_lawyer_profile' ]);

		Route::post('/get_lawyer_profile',		[	'uses' => $module_controller.'get_lawyer_profile' ])->middleware('api_check_is_lawyer');

		Route::post('/update_lawyer_profile',	[	'uses' => $module_controller.'update_lawyer_profile' ])->middleware('api_check_is_lawyer');
		
	});


/*Route::group(['prefix' => 'user', 'middleware'=>'api_user_auth_check'], function ()
{
	$module_controller = 'Api\V1\User\UserProfileController@';

	Route::post('/get_profile',							[	'uses' => $module_controller.'get_profile'	]);

	Route::post('/update_profile',						[	'uses' => $module_controller.'update_profile'	]);
});

Route::group(['prefix' => 'lawyer', 'middleware'=>'api_lawyer_auth_check'], function ()
{
	$module_controller = 'Api\V1\Lawyer\LawyerProfileController@';

	Route::post('/get_profile',							[	'uses' => $module_controller.'get_profile'	]);

	Route::post('/add_lawyer',							[	'uses' => $module_controller.'add_lawyer'	]);

	Route::post('/edit_lawyer',							[	'uses' => $module_controller.'edit_lawyer'	]);
});*/