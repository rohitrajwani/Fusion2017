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

Route::get('TA/blade','CardsController@index');///Main Page -- will automatically redirect to student, Faculty or HOD.

Route::get('TA/wele', 'dashboardController@dashboard');

Route::get('TA/attendance','CardsController@attendance');//faculty attendance page

Route::get('TA/attendance_student','CardsController@attendance_student');//student attendance page

Route::get('TA/faculty','CardsController@about');//Faculty Main Page

Route::get('TA/taapplication','CardsController@taapplication');//Student page -- Apply for TA Post Openings

//ta application store

Route::post('TA/store_tapplication','CardsController@store_tapplication');//Post method.

Route::post('TA/attendance_store_faculty','CardsController@attendance_store_faculty');//POST method 

Route::post('TA/store_post_opening','CardsController@store_post_opening');//POST method.

Route::get('TA/post_opening','CardsController@post_opening');//Admin page-- createpost openings

Route::get('TA/claims', 'TAMainController@viewclaims');//claims of the TA

Route::get('TA/claimform', 'TAMainController@claimform');//display claim form

Route::post('TA/addclaim','TAMainController@addclaim');//save_claims 

Route::get('TA/show_claims','SupervisorController@show_claims');//show ta claims-- Faculty page

Route::post('TA/forward_claim','SupervisorController@forward_claim');//forward claim post method. -- Fcaulty page

Route::get('TA/mnl_batch_assgn','SupervisorController@mnl_batch_assgn');//Assign Batches --- Faculty page.

Route::post('TA/save_batches','SupervisorController@save_batches');//save batches -- post method

Route::get('TA/show_batches','SupervisorController@show_batches');	//show assigned batches faculty batches

Route::get('TA/feedback','SupervisorController@feedback');//show feedback page 

Route::post('TA/save_feedback','SupervisorController@save_feedback');//savefeedback post method.

Route::get('TA/approve_claims','AdminController@approve_claims');//approve claims admin hod page

Route::post('TA/approve','AdminController@approve');//post method 

Route::get('TA/finalize-selection','AdminController@finalize');//finalize seletion of ta's who have applied for the TA post

Route::get('TA/show-tas','AdminController@show_tas');//show the ta selected after the finalize selection process.

Route::get('TA/mail','TAMainController@mail');//mail system common for ta and faculty.

Route::post('TA/sendmail','TAMainController@sendmail');//post method

Route::get('TA/attendance_view','CardsController@attendance_view');//view attendance 

Route::get('TA/view_feedback','AdminController@view_feedback');//view feedback admin page.