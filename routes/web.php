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

//PBI

Route::get('/PBI/welcome_student','PBI\ApplyController@index');
Route::get('/PBI/feedback','PBI\ApplyController@index7');
Route::get('/PBI/studentguidelines','PBI\ApplyController@studentguidelines');
Route::get('/PBI/facultyguidelines','PBI\ApplyController@facultyguidelines');
Route::get('/PBI/chairmanguidelines','PBI\ApplyController@chairmanguidelines');
Route::get('/PBI/reports','PBI\ApplyController@index5');
Route::get('/PBI/Home','PBI\ApplyController@index');
Route::get('/PBI/uploadtopic1','PBI\ApplyController@topicupload');
Route::get('/PBI/grades','PBI\gradesController@grades');
Route::get('/PBI/marks','PBI\marksController@marks');
Route::get('/PBI/apply','PBI\ApplyController@apply');
Route::get('/PBI/change','PBI\ApplyController@change');
Route::get('/PBI/feedback','PBI\ApplyController@index7');
Route::get('/PBI/feedbackchairman','PBI\ApplyController@feedbackchairman');
Route::get('/PBI/feedbackfaculty','PBI\ApplyController@feedbackfaculty');
Route::get('/PBI/view_requests','PBI\ApplyController@view_requests');




Route::post('/PBI/apply_pbi','PBI\ApplyController@apply_pbi');
Route::post('/PBI/changepbi','PBI\ApplyController@changepbi');
Route::post('/PBI/feedbackform','PBI\ApplyController@feedbackform');



Route::post('/PBI/uploadreport','PBI\ApplyController@upload_report');
Route::post('/PBI/uploadgrades','PBI\ApplyController@uploadgrades');
Route::post('/PBI/uploadmarks','PBI\ApplyController@uploadmarks');
Route::post('/PBI/upload_topic','PBI\ApplyController@submit_topic');



Route::get('/PBI/welcome_chairman','PBI\ApplyController@welcome_chairman');
Route::get('/PBI/welcome_faculty','PBI\ApplyController@welcome_faculty');
Route::get('/PBI/grades','PBI\ApplyController@grades');
Route::get('/PBI/marks','PBI\ApplyController@marks');
Route::get('/PBI/pbi_topics','PBI\ApplyController@pbi_topics');
Route::get('/PBI/faculty_list','PBI\ApplyController@faculty_list');
Route::get('/PBI/student_list','PBI\ApplyController@student_list');
Route::get('/PBI/viewreport','PBI\ApplyController@viewreport');
Route::get('/PBI/viewreport_chair','PBI\ApplyController@viewreport_chair');
Route::get('/PBI/cse_committee','PBI\ApplyController@cse_committee');
Route::get('/PBI/ece_committee','PBI\ApplyController@ece_committee');
Route::get('/PBI/mech_committee','PBI\ApplyController@mech_committee');
Route::get('/PBI/viewgrades','PBI\ApplyController@viewgrades');
Route::get('/PBI/view_marks','PBI\ApplyController@viewmarks');
Route::get('/PBI/view_marks_chair','PBI\ApplyController@viewmarks_chair');
Route::get('/PBI/viewgrades_chair','PBI\ApplyController@viewgrades_chair');
Route::get('/PBI/view_requests/{parameter}','PBI\ApplyController@details');
Route::post('/PBI/Accept/{parameter}','PBI\ApplyController@accept');
Route::post('/PBI/Decline/{parameter}','PBI\ApplyController@decline');
Route::get('/PBI/schedule','PBI\ApplyController@schedule');
Route::post('/PBI/post_schedule','PBI\ApplyController@uploadschedule');
Route::post('/PBI/review','PBI\ApplyController@review');
Route::get('/PBI/viewschedule','PBI\ApplyController@viewschedule');
Route::get('/PBI/apply1','PBI\ApplyController@apply1');
Route::get('/PBI/view_faculty_topic/{parameter}','PBI\ApplyController@view_faculty_topic');
