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

Route::get('/training_and_placement_cell', 'Training_and_Placement_Cell\PagesController@index');


Route::get('/training_and_placement_cell/student', 'Training_and_Placement_Cell\PagesController@home');

Route::get('/training_and_placement_cell/tpo/page', 'Training_and_Placement_Cell\TPOPagesController@tpo');

// Route::get('student', 'StudentResumeController@index');

// Route::get('{student_id}/student', 'StudentResumeController@show');
Route::get('/training_and_placement_cell/htmltopdfview/student/{student_id}',array('as'=>'htmltopdfview','uses'=>'Training_and_Placement_Cell\ProductController@htmltopdfview'));

Route::get('/training_and_placement_cell/student/profile/company/{company_id}', 'Training_and_Placement_Cell\CompanyProfileController@index');

Route::post('/training_and_placement_cell/profile/company/', ['as' => 'company_store', 'uses' => 'Training_and_Placement_Cell\CompanyProfileController@store']);

Route::get('/training_and_placement_cell/form/studentForm/student', ['as' => 'studentForm', 'uses' => 'Training_and_Placement_Cell\StudentFormController@create']);

Route::post('/training_and_placement_cell/form/studentForm', ['as' => 'studentForm_store', 'uses' => 'Training_and_Placement_Cell\StudentFormController@store']);

// Route::get('/training_and_placement_cell/tpo/profile/student1/{student_id}', 'Training_and_Placement_Cell\StudentProfileController@show');

Route::get('/training_and_placement_cell/profile/student/student', 'Training_and_Placement_Cell\StudentProfileController@show');

Route::get('/training_and_placement_cell/tpo/profile/student/{student_id}', 'Training_and_Placement_Cell\StudentProfileController@showTpo');

Route::get('/training_and_placement_cell/tpo/studentList1', 'Training_and_Placement_Cell\StudentListController@show');

Route::post('/training_and_placement_cell/studentList', ['as' => 'studentList_store', 'uses' => 'Training_and_Placement_Cell\StudentListController@store']);

Route::post('/training_and_placement_cell/companyStudent', ['as' => 'companyStudent_store', 'uses' => 'Training_and_Placement_Cell\CompanyStudentController@store']);

Route::get('/training_and_placement_cell/tpo/companyStudent/{company_id}', 'Training_and_Placement_Cell\CompanyStudentController@index');

Route::get('/training_and_placement_cell/student/companyList', 'Training_and_Placement_Cell\CompanyListController@show');

Route::get('/training_and_placement_cell/tpo/form/companyForm', ['as' => 'companyForm', 'uses' => 'Training_and_Placement_Cell\CompanyFormController@create']);

Route::post('/training_and_placement_cell/tpo/form/companyForm', ['as' => 'companyForm_store', 'uses' => 'Training_and_Placement_Cell\CompanyFormController@store']);


Route::get('/training_and_placement_cell/tpo/form/companyForm/{company_id}', ['as' => 'companyForm1', 'uses' => 'Training_and_Placement_Cell\CompanyFormController@create1']);

Route::post('/training_and_placement_cell/tpo/form/companyForm/company_id', ['as' => 'companyForm_store1', 'uses' => 'Training_and_Placement_Cell\CompanyFormController@store1']);


Route::get('/training_and_placement_cell/tpo/selectedStudent', 'Training_and_Placement_Cell\SelectedStudentController@showTpo');

Route::get('/training_and_placement_cell/student/selectedStudent', 'Training_and_Placement_Cell\SelectedStudentController@show');

Route::get('/training_and_placement_cell/tpo/profile/company1/{company_id}', 'Training_and_Placement_Cell\CompanyProfileTPOController@index');

Route::get('/training_and_placement_cell/tpo/companyList1', 'Training_and_Placement_Cell\CompanyListController@showTpo');
