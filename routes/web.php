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

// Route::get('/', function () {
//     return view('welcome');
// });
//
// Route::post('/login','dashboardController@login_check');
//
// Route::post('/signup','dashboardController@signup');
//
// Route::group(['middleware' => ['auth']], function () {
//
//     Route::get('/dashboard','dashboardController@dashboard');
//
//     Route::get('/logout','dashboardController@logout');
//
//     //Function to attach role
//     Route::get('/attachRole/{role}','dashboardController@attachRole');

//		});

/*Start    Event Organizing Routes*/

Route::get('/event_organizing/acad','event_organizing_Controllers\EventController@acad');

Route::get('/event_organizing/club','event_organizing_Controllers\EventController@club');

Route::get('/event_organizing/clubmember','event_organizing_Controllers\EventController@club_members');

Route::post('/event_organizing/acad/eventcreated','event_organizing_Controllers\EventCreateController@store');

Route::post('/event_organizing/acad/eventcanceled/{id}','event_organizing_Controllers\EventCreateController@destroy');

Route::post('/event_organizing/clubeventcreated','event_organizing_Controllers\ClubEventCreateController@store');

Route::post('/event_organizing/clubeventresults/{id}','event_organizing_Controllers\ClubEventCreateController@update');

Route::post('/event_organizing/clubeventcanceled/{id}','event_organizing_Controllers\ClubEventCreateController@destroy');

Route::post('/event_organizing/getrooms','event_organizing_Controllers\AjaxCallsController@index');

Route::post('/event_organizing/club/event_review/{id}','event_organizing_Controllers\EventController@review');

/*End    Event Organizing Routes*/

