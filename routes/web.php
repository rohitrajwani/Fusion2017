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


Route::get('cc-complaint/', 'cc\PagesController@index');

Route::post('cc-complaint/create', 'cc\CreateController@insert');

Route::post('cc-complaint/updateAll', 'cc\UpdateAllController@updateAll');

//Route::post('/updateFaculty', 'UpdateFacultyController@updateFaculty');

//Route::post('/updateStaff', 'UpdateStaffController@updateStaff');

//Route::post('/updateStudent', 'UpdateStudentController@updateStudent');

Route::post('cc-complaint/sort', 'cc\SortController@sort');