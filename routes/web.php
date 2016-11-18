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

    });

	
	//MESS MANAGEMENT MODULE

Route::get('/mess_management','mess_management\messcontroller@index');
Route::get('/mess_management/Student', 'mess_management\messcontroller@student');
Route::get('/mess_management/Register', function () {
    return view('/mess_management/Register');
});
Route::get('/mess_management/Committee','mess_management\messcontroller@committee' );
Route::get('/mess_management/Faculty','mess_management\messcontroller@faculty');


Route::get('/mess_management/CLeave',function(){
	return view('/mess_management/CLeave');
});
Route::get('/mess_management/SLeave',function(){
	return view('/mess_management/SLeave');
});
Route::get('/mess_management/CContact',function(){
	return view('mess_management/CContact');
});
Route::get('/mess_management/SContact',function(){
	return view('/mess_management/SContact');
});
Route::get('/mess_management/AContact',function(){
	return view('/mess_management/AContact');
});
Route::get('/mess_management/Admin','mess_management\messcontroller@admin');
Route::get('/mess_management/Acommittee1',function(){
	return view('/mess_management/Acommittee1');
});
Route::get('/mess_management/Acommittee2',function(){
	return view('/mess_management/Acommittee2');
});
	Route::get('/mess_management/Login',function(){
	return view('/mess_management/Login');
	});
	Route::get('/mess_management/Abillform',function(){
	return view('/mess_management/Abillform');
	});
	Route::post('/mess_management/committee1','mess_management\messcontroller@committee1');
	Route::post('/mess_management/committee2','mess_management\messcontroller@committee2');
	Route::post('/mess_management/reset','mess_management\messcontroller@reset');
	
	Route::post('/mess_management/updatemenu','mess_management\messcontroller@updatemenu');
	Route::post('/mess_management/register','mess_management\messcontroller@register');
	Route::post('/mess_management/billform','mess_management\messcontroller@billform');
Route::post('/mess_management/login','mess_management\homecontroller@login');
Route::get('/mess_management/modal1','mess_management\messcontroller@menu1');
Route::get('/mess_management/modal2','mess_management\messcontroller@menu2');
Route::get('/mess_management/Sviewbill','mess_management\messcontroller@sviewbill');
Route::get('/mess_management/Cviewbill','mess_management\messcontroller@cviewbill');
Route::get('/mess_management/Leave','mess_management\messcontroller@leave');
Route::post('/mess_management/leaveform','mess_management\messcontroller@leaveform');
Route::get('/mess_management/Viewleave','mess_management\messcontroller@viewleave');
Route::get('/mess_management/SFeedback','mess_management\messcontroller@sfeedback');
Route::get('/mess_management/CFeedback','mess_management\messcontroller@cfeedback');
Route::get('/mess_management/Sviewfeedback','mess_management\messcontroller@sviewfeedback');
Route::get('/mess_management/Aviewfeedback','mess_management\messcontroller@aviewfeedback');
Route::get('/mess_management/Cviewfeedback','mess_management\messcontroller@cviewfeedback');
Route::post('/mess_management/sfeedbackform','mess_management\messcontroller@sfeedbackform');
Route::post('/mess_management/cfeedbackform','mess_management\messcontroller@cfeedbackform');
Route::post('/mess_management/corderform','mess_management\messcontroller@corderform');
Route::get('/mess_management/Cvieworder','mess_management\messcontroller@cvieworder');
Route::get('/mess_management/Svieworder','mess_management\messcontroller@svieworder');
Route::get('/mess_management/Avieworder','mess_management\messcontroller@avieworder');
Route::get('/mess_management/COrder','mess_management\messcontroller@giveorder');
Route::get('/mess_management/viewfeedback','mess_management\messcontroller@viewfeedback');

Route::post('/mess_management/orderform','mess_management\messcontroller@placeorder');




