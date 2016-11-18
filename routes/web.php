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

	Route::get('/acadaff/', function(){
		return redirect('acadaff/index');
	});
	
	Route::get('acadaff/students','acadaff\cardsController@first');
	Route::post('acadaff/bonafide','acadaff\cardsController@bonafide');
	Route::post('acadaff/semirr','acadaff\cardsController@s');
	Route::post('acadaff/semirr2','acadaff\cardsController@s2');
	Route::get('acadaff/ug_student','acadaff\cardsController@ug');


	Route::post('acadaff/cec','acadaff\cardsController@cec');
	Route::post('acadaff/seminar_committee','acadaff\cardsController@seminar_committee');
	Route::post('acadaff/seminar_report','acadaff\cardsController@seminar_report');
	Route::post('acadaff/supervisor','acadaff\cardsController@supervisor');
	Route::post('acadaff/leave','acadaff\cardsController@leave');

	Route::get('acadaff/academic','acadaff\cardsController@academic');
	Route::get('acadaff/faculty','acadaff\cardsController@faculty');
	Route::get('acadaff/submission','acadaff\cardsController@submission');

	Route::get('acadaff/ug_student_show','acadaff\cardsController@submission2');
	Route::post('acadaff/branch_change','acadaff\cardsController@branch_change');
	Route::post('acadaff/seminarrequest','acadaff\cardsController@seminarnext');
	Route::post('acadaff/seminarrequest2','acadaff\cardsController@seminarnext2');

	Route::post('acadaff/cec','acadaff\cardsController@cec');
	Route::post('acadaff/cerequest','acadaff\cardsController@cenext');
	Route::post('acadaff/cerequest2','acadaff\cardsController@cenext2');

	Route::post('acadaff/bonafidenext','acadaff\cardsController@bonafidenext');
	Route::post('acadaff/leaverequest','acadaff\cardsController@leavenext');
	Route::post('acadaff/supervisorrequest','acadaff\cardsController@supervisornext');
	Route::post('acadaff/branch_next','acadaff\cardsController@branch_next');
	Route::get('acadaff/student_show','acadaff\cardsController@show');

	Route::get('acadaff/about',function(){
		return view('acadaff/pages.about');
	});

	Route::get('acadaff/admin','acadaff\cardsController@admin');

	Route::post('acadaff/supervisornext2','acadaff\cardsController@supervisornext2');

	Route::get('acadaff/index','acadaff\cardsController@index');
    

});