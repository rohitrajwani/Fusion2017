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

    Route::get('/vhbooking','PagesController@portalCheck');

    Route::get('/logout','dashboardController@logout');

    //Function to attach role
    Route::get('/attachRole/{role}','dashboardController@attachRole');





    Route::get('vhbooking/stakeholder','PagesController@stakeholder');    
	Route::get('vhbooking/caretaker','PagesController@caretaker');
	Route::get('vhbooking/incharge','PagesController@incharge');
	Route::get('/vhbooking/bookingHistory','PagesController@bookingHistory');
	Route::get('/vhbooking/rules','PagesController@rules');
	Route::get('/vhbooking/complaintStatus','PagesController@complaintStatus');
	Route::get('/vhbooking/requestForm','PagesController@requestForm');
	Route::get('/vhbooking/complaintForm','PagesController@complaintForm');
	Route::get('/vhbooking/respond_to_complaint','PagesController@respond');
	//Route::get('respond_to_complaint','PagesController@respond');
	Route::get('/vhbooking/bookingRequest','PagesController@bookingRequest');
	Route::get('/vhbooking/bookingDetails','PagesController@bookingDetails');
	Route::get('/vhbooking/roomDetailsCT','PagesController@roomDetailsCT');
	Route::get('/vhbooking/roomDetailsVH','PagesController@roomDetailsVH');
	Route::get('/vhbooking/approvedRooms','PagesController@approvedRooms');
	Route::get('/vhbooking/cancelRoom','PagesController@cancelRoom');	
	Route::get('/{id}/change','PagesController@change');
	//Route::get('/vhbooking/changeAvailabilityCT','PagesController@changeAvailabilityCT');
	

	Route::post('/addComplaint','PagesController@addComplaint');
	Route::post('/{complaint}/addFine','PagesController@addFine');
	Route::post('/addRequest','FormController@store');
	Route::post('/{id}/view','PagesController@viewVH');
	Route::post('/{id}/viewCT','PagesController@viewCT');
	Route::post('/{id}/viewStake','PagesController@viewStake');
	Route::post('/{id}/assignRoom','PagesController@assignRoom');
	Route::post('/{id}/approve','PagesController@approve');
	Route::post('/{id}/approveNot','PagesController@approveNot');
	Route::post('/{id}/assign','PagesController@assign');
	Route::post('/cancel','pagesController@cancel');
	Route::post('/vhbooking/checkAvailabilityCT','PagesController@availabilityCT');
	Route::post('/vhbooking/checkAvailabilityVH','PagesController@availabilityVH');
    

});