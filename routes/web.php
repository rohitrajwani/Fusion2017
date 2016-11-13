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

    Route::get('/vhbooking','vhbooking\VH_PagesController@portalCheck');

    Route::get('/logout','dashboardController@logout');

    //Function to attach role
    Route::get('/attachRole/{role}','dashboardController@attachRole');





    Route::get('vhbooking/stakeholder','vhbooking\VH_PagesController@stakeholder');    
	Route::get('vhbooking/caretaker','vhbooking\VH_PagesController@caretaker');
	Route::get('vhbooking/incharge','vhbooking\VH_PagesController@incharge');
	Route::get('/vhbooking/bookingHistory','vhbooking\VH_PagesController@bookingHistory');
	Route::get('/vhbooking/rules','vhbooking\VH_PagesController@rules');
	Route::get('/vhbooking/complaintStatus','vhbooking\VH_PagesController@complaintStatus');
	Route::get('/vhbooking/requestForm','vhbooking\VH_PagesController@requestForm');
	Route::get('/vhbooking/complaintForm','vhbooking\VH_PagesController@complaintForm');
	Route::get('/vhbooking/respond_to_complaint','vhbooking\VH_PagesController@respond');
	//Route::get('respond_to_complaint','VH_PagesController@respond');
	Route::get('/vhbooking/bookingRequest','vhbooking\VH_PagesController@bookingRequest');
	Route::get('/vhbooking/bookingDetails','vhbooking\VH_PagesController@bookingDetails');
	Route::get('/vhbooking/roomDetailsCT','vhbooking\VH_PagesController@roomDetailsCT');
	Route::get('/vhbooking/roomDetailsVH','vhbooking\VH_PagesController@roomDetailsVH');
	Route::get('/vhbooking/approvedRooms','vhbooking\VH_PagesController@approvedRooms');
	Route::get('/vhbooking/cancelRoom','vhbooking\VH_PagesController@cancelRoom');	
	Route::get('/{id}/change','vhbooking\VH_PagesController@change');
	//Route::get('/vhbooking/changeAvailabilityCT','VH_PagesController@changeAvailabilityCT');
	

	Route::post('/addComplaint','vhbooking\VH_PagesController@addComplaint');
	Route::post('/{complaint}/addFine','vhbooking\VH_PagesController@addFine');
	Route::post('/addRequest','vhbooking\VH_FormController@store');
	Route::post('/{id}/view','vhbooking\VH_PagesController@viewVH');
	Route::post('/{id}/viewCT','vhbooking\VH_PagesController@viewCT');
	Route::post('/{id}/viewStake','vhbooking\VH_PagesController@viewStake');
	Route::post('/{id}/assignRoom','vhbooking\VH_PagesController@assignRoom');
	Route::post('/{id}/approve','vhbooking\VH_PagesController@approve');
	Route::post('/{id}/approveNot','vhbooking\VH_PagesController@approveNot');
	Route::post('/{id}/assign','vhbooking\VH_PagesController@assign');
	Route::post('/cancel','vhbooking\VH_PagesController@cancel');
	Route::post('/vhbooking/checkAvailabilityCT','vhbooking\VH_PagesController@availabilityCT');
	Route::post('/vhbooking/checkAvailabilityVH','vhbooking\VH_PagesController@availabilityVH');
    

});