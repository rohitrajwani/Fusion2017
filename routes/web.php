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

    //Route for Health Centre
    Route::get('/health-centre', 'healthcentre\PageController@getIndex');
    Route::get('/health-centre/gallery','healthcentre\PageController@getGallery');
    Route::resource('health-centre/appointment','healthcentre\AppointmentController');
    Route::resource('health-centre/doctor','healthcentre\DoctorController');
    Route::resource('health-centre/doctorprofile','healthcentre\DoctorProfileController');
    Route::resource('health-centre/appointmentpatient','healthcentre\AppointmentDoctor');
    Route::resource('health-centre/prescribe','healthcentre\PrescribeController');
    Route::get('health-centre/upcoming-appointment',['uses'=> 'healthcentre\AppointmentController@next','as' => 'appointment.next']);
    Route::get('health-centre/upcoming-appointments',['uses'=> 'healthcentre\AppointmentDoctor@next','as' => 'appointmentdoctor.next']);
    Route::get('health-centre/previous-appointment',['uses'=> 'healthcentre\AppointmentDoctor@previous','as' => 'appointmentdoctor.previous']);

});
