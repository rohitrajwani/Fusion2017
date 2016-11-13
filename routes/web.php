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

Route::get('TA/','TA\CardsController@index');///Main Page -- will automatically redirect to student, Faculty or HOD.

Route::get('TA/wele', 'dashboardController@dashboard');

Route::get('TA/attendance','TA\CardsController@attendance');//faculty attendance page

Route::get('TA/attendance_student','TA\CardsController@attendance_student');//student attendance page

Route::get('TA/faculty','TA\CardsController@about');//Faculty Main Page

Route::get('TA/taapplication','TA\CardsController@taapplication');//Student page -- Apply for TA Post Openings

//ta application store

Route::post('TA/store_tapplication','TA\CardsController@store_tapplication');//Post method.

Route::post('TA/attendance_store_faculty','TA\CardsController@attendance_store_faculty');//POST method 

Route::post('TA/store_post_opening','TA\CardsController@store_post_opening');//POST method.

Route::get('TA/post_opening','TA\CardsController@post_opening');//Admin page-- createpost openings

Route::get('TA/claims', 'TA\TAMainController@viewclaims');//claims of the TA

Route::get('TA/claimform', 'TA\TAMainController@claimform');//display claim form

Route::post('TA/addclaim','TA\TAMainController@addclaim');//save_claims 

Route::get('TA/show_claims','TA\SupervisorController@show_claims');//show ta claims-- Faculty page

Route::post('TA/forward_claim','TA\SupervisorController@forward_claim');//forward claim post method. -- Fcaulty page

Route::get('TA/mnl_batch_assgn','TA\SupervisorController@mnl_batch_assgn');//Assign Batches --- Faculty page.

Route::post('TA/save_batches','TA\SupervisorController@save_batches');//save batches -- post method

Route::get('TA/show_batches','TA\SupervisorController@show_batches');	//show assigned batches faculty batches

Route::get('TA/feedback','TA\SupervisorController@feedback');//show feedback page 

Route::post('TA/save_feedback','TA\SupervisorController@save_feedback');//savefeedback post method.

Route::get('TA/approve_claims','TA\AdminController@approve_claims');//approve claims admin hod page

Route::post('TA/approve','TA\AdminController@approve');//post method 

Route::get('TA/finalize-selection','TA\AdminController@finalize');//finalize seletion of ta's who have applied for the TA post

Route::get('TA/show-tas','TA\AdminController@show_tas');//show the ta selected after the finalize selection process.

Route::get('TA/mail','TA\TAMainController@mail');//mail system common for ta and faculty.

Route::post('TA/sendmail','TA\TAMainController@sendmail');//post method

Route::get('TA/attendance_view','TA\CardsController@attendance_view');//view attendance 

Route::get('TA/view_feedback','TA\AdminController@view_feedback');//view feedback admin page.