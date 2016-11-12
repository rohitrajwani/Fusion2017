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

    Route::get('/vhbooking','VH_PagesController@portalCheck');

    Route::get('/logout','dashboardController@logout');

    //Function to attach role
    Route::get('/attachRole/{role}','dashboardController@attachRole');





    Route::get('vhbooking/stakeholder','VH_PagesController@stakeholder');    
	Route::get('vhbooking/caretaker','VH_PagesController@caretaker');
	Route::get('vhbooking/incharge','VH_PagesController@incharge');
	Route::get('/vhbooking/bookingHistory','VH_PagesController@bookingHistory');
	Route::get('/vhbooking/rules','VH_PagesController@rules');
	Route::get('/vhbooking/complaintStatus','VH_PagesController@complaintStatus');
	Route::get('/vhbooking/requestForm','VH_PagesController@requestForm');
	Route::get('/vhbooking/complaintForm','VH_PagesController@complaintForm');
	Route::get('/vhbooking/respond_to_complaint','VH_PagesController@respond');
	//Route::get('respond_to_complaint','VH_PagesController@respond');
	Route::get('/vhbooking/bookingRequest','VH_PagesController@bookingRequest');
	Route::get('/vhbooking/bookingDetails','VH_PagesController@bookingDetails');
	Route::get('/vhbooking/roomDetailsCT','VH_PagesController@roomDetailsCT');
	Route::get('/vhbooking/roomDetailsVH','VH_PagesController@roomDetailsVH');
	Route::get('/vhbooking/approvedRooms','VH_PagesController@approvedRooms');
	Route::get('/vhbooking/cancelRoom','VH_PagesController@cancelRoom');	
	Route::get('/{id}/change','VH_PagesController@change');
	//Route::get('/vhbooking/changeAvailabilityCT','VH_PagesController@changeAvailabilityCT');
	

	Route::post('/addComplaint','VH_PagesController@addComplaint');
	Route::post('/{complaint}/addFine','VH_PagesController@addFine');
	Route::post('/addRequest','VH_FormController@store');
	Route::post('/{id}/view','VH_PagesController@viewVH');
	Route::post('/{id}/viewCT','VH_PagesController@viewCT');
	Route::post('/{id}/viewStake','VH_PagesController@viewStake');
	Route::post('/{id}/assignRoom','VH_PagesController@assignRoom');
	Route::post('/{id}/approve','VH_PagesController@approve');
	Route::post('/{id}/approveNot','VH_PagesController@approveNot');
	Route::post('/{id}/assign','VH_PagesController@assign');
	Route::post('/cancel','VH_PagesController@cancel');
	Route::post('/vhbooking/checkAvailabilityCT','VH_PagesController@availabilityCT');
	Route::post('/vhbooking/checkAvailabilityVH','VH_PagesController@availabilityVH');
    

});