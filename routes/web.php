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

	Route::get('/hostelComplaints','hostel_complaints/ComplaintsController@display');

	Route::post('/hostelComplaints','hostel_complaints/ComplaintsController@store');

	Route::post('/hostelComplaints/{complaint}','hostel_complaints/ComplaintsController@update');	  

	Route::post('/Complaints','hostel_complaints/ComplaintsController@show');

});

