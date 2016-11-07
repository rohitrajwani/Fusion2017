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

   Route::get('home','Bus_management\HomeController@home');
Route::get('schedule','Bus_management\PagesController@schedule');
Route::post('schedule/achadd', 'Bus_management\PagesController@feed_store');
Route::get('admin','Bus_management\AdminController@admin');
Route::get('booknow','Bus_management\BookController@booknow');
Route::get('admin_form','Bus_management\AdminformController@admin_form');
Route::get('employee_form','Bus_management\EmpformController@employee_form');

Route::post('payment',[
 	'uses'=>'Bus_management\PaymentController@payment',
 	'as'=>'payment'
 	]);

Route::get('reset',[
	'uses'=>'Bus_management\AdminController@reset', 
	'as'=>'reset'
	]);

Route::get('delete',[
	'uses'=>'Bus_management\AdminController@fdelete',
	'as'=>'delete'
	]);

Route::get('addsp',[
	'uses'=>'Bus_management\AdminController@addsp',
	'as'=>'addsp'
	]);

Route::get('delsp',[
	'uses'=>'Bus_management\AdminController@delsp',
	'as'=>'delsp'
	]);

Route::post('/adding',[
	'uses'=>'Bus_management\AdminController@adddd',
	'as'=>'adding'
	]);

Route::post('/delll',[
	'uses'=>'Bus_management\AdminController@delete',
	'as'=>'delll'
	]);

Route::post('/post_not',[
	'uses'=>'Bus_management\AdminController@post_not',
	'as'=>'post_not'
	]);

    

});