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

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/dashboard','dashboardController@dashboard');
    Route::get('/logout','dashboardController@logout');
    //Function to attach role
    Route::get('/attachRole/{role}','dashboardController@attachRole');
});

Route::get('/ELMS', 'leaveController@display');

//Routes for Staff
Route::get('/ELMS/homeStaff','leaveControllerStaff@homeStaff');
Route::get('/ELMS/leaveApplicationStaff','leaveControllerStaff@apply');
Route::post('/ELMS/leave1','leaveControllerStaff@insert');
Route::get('/ELMS/statusStaff', 'leaveControllerStaff@status');
Route::get('/ELMS/historyStaff', 'leaveControllerStaff@history');

//Routes for Staff acting as Leave Granting Officer
Route::get('/ELMS/homeStaffLGO', 'leaveControllerStaff1@homeStaff');
Route::get('/ELMS/leaveApplicationStaffLGO','leaveControllerStaff1@apply');
Route::post('/ELMS/leave1LGO','leaveControllerStaff1@insert');
Route::get('/ELMS/statusStaffLGO', 'leaveControllerStaff1@status');
Route::get('/ELMS/historyStaffLGO', 'leaveControllerStaff1@history');
Route::get('/ELMS/requestsStaffLGO', 'leaveControllerStaff1@req');
Route::post('/ELMS/grantingStaff/{app_id}', 'leaveControllerStaff1@grant');

//Routes for Faculty
Route::get('/ELMS/homeFaculty', 'leaveControllerFaculty@homeFaculty');
Route::get('/ELMS/leaveApplicationFaculty','leaveControllerFaculty@apply');
Route::post('/ELMS/leave','leaveControllerFaculty@insert');
Route::get('/ELMS/statusFaculty', 'leaveControllerFaculty@status');
Route::get('/ELMS/historyFaculty', 'leaveControllerFaculty@history');

//Routes for Faculty acting as Leave Granting Officers
Route::get('/ELMS/homeFacultyLGO', 'leaveControllerFaculty1@homeFaculty');
Route::get('/ELMS/leaveApplicationFacultyLGO', 'leaveControllerFaculty1@apply');
Route::post('/ELMS/leaveLGO', 'leaveControllerFaculty1@insert');
Route::get('/ELMS/statusFacultyLGO', 'leaveControllerFaculty1@status');
Route::get('/ELMS/historyFacultyLGO', 'leaveControllerFaculty1@history');
Route::get('/ELMS/requestsFacultyLGO', 'leaveControllerFaculty1@req');
Route::post('/ELMS/grantingFaculty/{app_id}', 'leaveControllerFaculty1@grant');

Route::get('/ELMS/leaveHistory/{app_id}','leaveController@history');