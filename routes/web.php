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



/*Start    Event Organizing Routes*/

Route::get('/event_organizing/acad','event_organizing_Controllers\EventController@acad');

Route::post('/event_organizing/acad/eventcreated','event_organizing_Controllers\EventCreateController@store');

Route::post('/event_organizing/acad/eventcanceled/{id}','event_organizing_Controllers\EventCreateController@destroy');

Route::get('/event_organizing/clubs','event_organizing_Controllers\EventController@clubpages');

Route::get('/event_organizing/clubadmin/{clubname}','event_organizing_Controllers\EventController@club');

Route::post('/event_organizing/{clubname}/clubeventcreated','event_organizing_Controllers\ClubEventCreateController@store');

Route::post('/event_organizing/{clubname}/clubeventresults/{id}','event_organizing_Controllers\ClubEventCreateController@update');

Route::post('/event_organizing/{clubname}/clubeventcanceled/{id}','event_organizing_Controllers\ClubEventCreateController@destroy');

Route::get('/event_organizing/clubmember/{clubname}','event_organizing_Controllers\EventController@clubmembers');

Route::post('/event_organizing/getrooms','event_organizing_Controllers\AjaxCallsController@index');

Route::post('/event_organizing/{clubname}/event_review/{id}','event_organizing_Controllers\EventController@review');

/*End    Event Organizing Routes*/
		});



