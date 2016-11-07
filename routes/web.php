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

/*  routes from laravel 5.2*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('acadaff/students','cardsController@first');
Route::post('acadaff/bonafide','cardsController@bonafide');
Route::post('acadaff/semirr','cardsController@s');
Route::post('acadaff/semirr2','cardsController@s2');
Route::get('acadaff/ug_student','cardsController@ug');


Route::post('acadaff/cec','cardsController@cec');
Route::post('acadaff/seminar_committee','cardsController@seminar_committee');
Route::post('acadaff/seminar_report','cardsController@seminar_report');
Route::post('acadaff/supervisor','cardsController@supervisor');
Route::post('acadaff/leave','cardsController@leave');

Route::get('acadaff/academic','cardsController@academic');
Route::get('acadaff/faculty','cardsController@faculty');
Route::get('acadaff/submission','cardsController@submission');

Route::get('acadaff/ug_student_show','cardsController@submission2');
Route::post('acadaff/branch_change','cardsController@branch_change');
Route::post('acadaff/seminarrequest','cardsController@seminarnext');
Route::post('acadaff/seminarrequest2','cardsController@seminarnext2');

Route::post('acadaff/cec','cardsController@cec');
Route::post('acadaff/cerequest','cardsController@cenext');
Route::post('acadaff/cerequest2','cardsController@cenext2');

Route::post('acadaff/bonafidenext','cardsController@bonafidenext');
Route::post('acadaff/leaverequest','cardsController@leavenext');
Route::post('acadaff/supervisorrequest','cardsController@supervisornext');
Route::post('acadaff/branch_next','cardsController@branch_next');
Route::get('acadaff/student_show','cardsController@show');

//Route::get('/', 'PagesController@home');
Route::get('acadaff/about','PagesController@about');

Route::get('login',function(){
    return view('portal.login');
});

Route::put('portal/login', 'Auth\AuthController@createUser');

Route::get('auth/google', 'Auth\AuthController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('acadaff/admin','cardsController@admin');

Route::post('acadaff/supervisornext2','cardsController@supervisornext2');

Route::get('acadaff/index','cardsController@index');
