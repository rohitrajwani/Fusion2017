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

Route::get('/rt', function () {
    return back()->with('alert','Signup Successful, login to continue!!');
});



Route::post('/login','dashboardController@login_check');

Route::post('/signup','dashboardController@signup');

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard','dashboardController@dashboard');

    Route::get('/logout','dashboardController@logout');

    //Function to attach role
    Route::get('/attachRole/{role}','dashboardController@attachRole');

    

});
//Project part Class attendance management system
Route::get('/CAMS/faculty','HomePageController@facHome');
Route::get('/CAMS/student','HomePageController@stuHome');
Route::post('/CAMS/choose_date/{coursename}','ViewAttendanceController@student_status');	
Route::get('/CAMS/faculty/{course}','FacultyCoursePageController@view_course');
Route::get('/CAMS/student/course/{course_name}','StudentCoursePageController@student_course');
Route::get('/CAMS/take-attendance/{coursename}','TakeAttendanceController@take_attendance');
Route::post('/CAMS/store-attendance_offline/{coursename}','TakeAttendanceController@store_attendance_offline');
Route::post('/CAMS/store-attendance_online/{coursename}','TakeAttendanceController@store_attendance_online');
Route::post('/CAMS/send-notification/{coursename}','SendMessageController@send');
Route::get('/CAMS/fill_leave-form/{coursename}','LeaveFormController@fill_leaveform');
Route::post('/CAMS/leave_form/{coursename}','LeaveFormController@store_leaveform');
Route::get('/CAMS/take-attendance/online/{coursename}','TakeAttendanceController@online_mode');
Route::get('/CAMS/take-attendance/offline/{coursename}','TakeAttendanceController@offline_mode');




