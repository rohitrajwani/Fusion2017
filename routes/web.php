<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

	Route::get('/', function () {
    	return view('welcome');
	});

	Route::post('/login','dashboardController@login_check');

	Route::post('/signup','dashboardController@signup');

	Route::group(['middleware' => ['auth']], function () {
    
	    Route::get('/dashboard','dashboardController@dashboard');

	    Route::get('/logout','dashboardController@logout');
	
	    //Function to attach role
	    Route::get('/attachRole/{role}','dashboardController@attachRole');

		//Routes for Time Table module
		Route::get('/time_table_management', 'time_table_management\PagesController@index');
		
		Route::get('/time_table_management/scheduleanextraclass', 'time_table_management\PagesController@scheduleanextraclass');

		Route::resource('/time_table_management/schedule','time_table_management\RequestsController');

		Route::get('/time_table_management/get_slots', 'time_table_management\AjaxController@get_slots');

		Route::get('/time_table_management/viewmyrequests', 'time_table_management\PagesController@viewmyrequests');
		Route::get('/time_table_management/viewallrequests', 'time_table_management\PagesController@viewallrequests');
		Route::get('/time_table_management/db_update','time_table_management\AjaxController@allot_room');
		Route::get('/time_table_management/db_maintain','time_table_management\AjaxController@maintain');


		Route::get('/time_table_management/creatett','time_table_management\PagesController@creatett');
		Route::get('/time_table_management/post_tt','time_table_management\PagesController@create_tt');

		Route::get('/time_table_management/view_tt', 'time_table_management\PagesController@view_tt');
		Route::get('/time_table_management/change_tt', 'time_table_management\AjaxController@change_tt');
		Route::get('/time_table_management/modify_tt', 'time_table_management\PagesController@modify_tt');
	});
