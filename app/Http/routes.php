[<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//main controller
Route::get('/', 'MainController@index');
Route::get('/shelters', 'MainController@shelters');




Route::group(['prefix' => 'admin'], function () {
    // route /admin

	Route::group(['prefix' => 'shelters' ], function () {
		//route /admin/sheltere

        Route::get('/', 	  'AdminShelterController@index');
		Route::get('/create', 'AdminShelterController@create');
		Route::post('/', 	  'AdminShelterController@store');

		Route::get('/{id}', 	 'AdminShelterController@show');
		Route::get('/{id}/edit', 'AdminShelterController@edit');
		Route::post('/{id}', 	 'AdminShelterController@update');		
		Route::get('/{id}/destroy', 'AdminShelterController@destroy');

	});
});

//Admin routes  ( crud for admin screens)
//todo ( figure out how to make this cleaner )
// Route::group(['namespace' => 'Admin', 'prefix' => 'Admin'], function()
// {
//     // Controllers Within The "App\Http\Controllers\Admin" Namespace
//     Route::group(['namespace' => 'Shelters', 'prefix' => 'Shelters'], function()
//     {
//         // Controllers Within The "App\Http\Controllers\Admin\Shelter" Namespace

//     });

// });



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
