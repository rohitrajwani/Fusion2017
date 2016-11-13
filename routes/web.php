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

    Route::get('/bus_management', 'Bus_management\bus_management@index');

   Route::get('bus_management/home','Bus_management\HomeController@home');
Route::get('bus_management/schedule','Bus_management\PagesController@schedule');
Route::post('bus_management/schedule/achadd', 'Bus_management\PagesController@feed_store');
Route::get('bus_management/admin','Bus_management\AdminController@admin');
Route::get('bus_management/booknow','Bus_management\BookController@booknow');
Route::get('bus_management/admin_form','Bus_management\AdminformController@admin_form');
Route::get('bus_management/employee_form','Bus_management\EmpformController@employee_form');

Route::post('/bus_management/payment',[
 	'uses'=>'Bus_management\PaymentController@payment',
 	'as'=>'payment'
 	]);

Route::get('/bus_management/reset',[
	'uses'=>'Bus_management\AdminController@reset', 
	'as'=>'reset'
	]);

Route::get('/bus_management/delete',[
	'uses'=>'Bus_management\AdminController@fdelete',
	'as'=>'delete'
	]);

Route::get('/bus_management/addsp',[
	'uses'=>'Bus_management\AdminController@addsp',
	'as'=>'addsp'
	]);

Route::get('/bus_management/delsp',[
	'uses'=>'Bus_management\AdminController@delsp',
	'as'=>'delsp'
	]);

Route::post('/bus_management/adding',[
	'uses'=>'Bus_management\AdminController@adddd',
	'as'=>'adding'
	]);

Route::post('/bus_management/delll',[
	'uses'=>'Bus_management\AdminController@delete',
	'as'=>'delll'
	]);

Route::post('/bus_management/post_not',[
	'uses'=>'Bus_management\AdminController@post_not',
	'as'=>'post_not'
	]);

    

});