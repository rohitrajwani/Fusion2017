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

	//Project part Class attendance management system
	Route::get('/CAMS/', 'ClassAttendance\ClassAttendanceController@index');
	Route::get('/CAMS/faculty','ClassAttendance\HomePageController@facHome');
	Route::get('/CAMS/student','ClassAttendance\HomePageController@stuHome');
	Route::post('/CAMS/choose_date/{coursename}','ClassAttendance\ViewAttendanceController@student_status');	
	Route::get('/CAMS/faculty/{course}','ClassAttendance\FacultyCoursePageController@view_course');
	Route::get('/CAMS/student/course/{course_name}','ClassAttendance\StudentCoursePageController@student_course');
	Route::get('/CAMS/take-attendance/{coursename}','ClassAttendance\TakeAttendanceController@take_attendance');
	Route::post('/CAMS/store-attendance_offline/{coursename}','ClassAttendance\TakeAttendanceController@store_attendance_offline');
	Route::post('/CAMS/store-attendance_online/{coursename}','ClassAttendance\TakeAttendanceController@store_attendance_online');
	Route::post('/CAMS/send-notification/{coursename}','ClassAttendance\SendMessageController@send');
	Route::get('/CAMS/fill_leave-form/{coursename}','ClassAttendance\LeaveFormController@fill_leaveform');
	Route::post('/CAMS/leave_form/{coursename}','ClassAttendance\LeaveFormController@store_leaveform');
	Route::get('/CAMS/take-attendance/online/{coursename}','ClassAttendance\TakeAttendanceController@online_mode');
	Route::get('/CAMS/take-attendance/offline/{coursename}','ClassAttendance\TakeAttendanceController@offline_mode');

});


