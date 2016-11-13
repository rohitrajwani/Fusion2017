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


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/SPACS/', function(){
	if(Auth::user()->user_type=="student"){
    	return view('SPACS.user.user_home');
	} 
    else if(Auth::user()->hasRole('spacs_convener')){
		return view('SPACS.spacs.spacs_home');
	}

	if(Auth::user()->hasRole('spacscom_dir_gm')){
		return view('SPACS.spacscom_dir_gm.spacscom_dir_gm_home');
	}
	if(Auth::user()->hasRole('spacscom_dir_sc')){
		return view('SPACS.spacscom_dir_silver_cultural.spacscom_dir_silver_cultural_home');
	}
	if(Auth::user()->hasRole('spacscom_dir_sg')){
		return view('SPACS.spacscom_dir_silver_games.spacs_dir_silver_games_home');
	}
	if(Auth::user()->hasRole('spacscom_dm_gm')){
		return view('SPACS.spacscom_dm_prof_gm.spacscom_dm_prof_gm_home');
	}
	if(Auth::user()->hasRole('spacscom_iiitdmj_prof')){
		return view('SPACS.spacscom_iiitdmj_prof.spacscom_iiitdmj_prof_home');
	}
	
	if(Auth::user()->hasRole('awards_staff')){
		return view('SPACS.staff.staff_home');
	}
});

Route::get('/SPACS/spacs_mcm_results', function () {
    return view('SPACS.spacs.spacs_mcm_results');
});


Route::get('/SPACS/spacs_medals',function(){
    return view('SPACS.spacs.spacs_medals');
});

Route::get('/SPACS/spacs_home',function(){
    return view('SPACS.spacs.spacs_home');
});
Route::get('/SPACS/staff_home', function () {
    return view('SPACS.staff.staff_home');
});
Route::get('/SPACS/staff_mcm', function () {
    return view('SPACS.staff.staff_mcm');
});
Route::get('/SPACS/staff_verify_form', function () {
    return view('SPACS.staff.staff_verify_form');
});

Route::get('/SPACS/user_home', function () {
    return view('SPACS.user.user_home');
});
Route::get('/SPACS/spacs_not_fir_winners/{student_id}/{id}','SPACS\spacs_usermedalnameController@spacs_not_fir_winners');
Route::get('/SPACS/spacs_not_sec_thir_winners/{student_id}/{id}','SPACS\spacs_usermedalnameController@spacs_not_sec_thir_winners');
Route::get('/SPACS/spacs_mcm_sort','SPACS\spacs_usermedalnameController@spacs_mcm_sort');
Route::get('/SPACS/user_medals','SPACS\spacs_usermedalnameController@user_medals');
Route::get('/SPACS/user_spacs','SPACS\spacs_usermedalnameController@user_spacs');
Route::get('/SPACS/user_scholarship','SPACS\spacs_usermedalnameController@user_scholarship');
Route::get('/SPACS/spacs_scholarships','SPACS\spacs_usermedalnameController@spacs_scholarships');
Route::get('/SPACS/user_staffmember','SPACS\spacs_usermedalnameController@user_staffmember');
Route::get('/SPACS/user_winner_result','SPACS\spacs_usermedalnameController@user_winner_result');
Route::post('/SPACS/dir_gm_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_form');
Route::post('/SPACS/dm_prof_gm_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dm_prof_gm_form');
Route::post('/SPACS/iiitdmj_prof_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@iiitdmj_prof_form');

Route::get('/SPACS/spacscom_dir_gm_form','SPACS\spacs_usermedalnameController@spacscom_dir_gm_form');
Route::get('/SPACS/spacscom_dir_gm_docs','SPACS\spacs_usermedalnameController@spacscom_dir_gm_docs');
//--------------------------------------dir silver cultural---------------------------------------
Route::get('/SPACS/spacscom_dir_silver_cultural_docs','SPACS\spacs_usermedalnameController@spacscom_dir_silver_cultural_docs');
Route::get('/SPACS/spacscom_dir_silver_cultural_form','SPACS\spacs_usermedalnameController@spacscom_dir_silver_cultural_form');
//-------------------------------------silver games---------------------------------------------
Route::get('/SPACS/spacscom_dir_silver_games_docs','SPACS\spacs_usermedalnameController@spacscom_dir_silver_games_docs');
Route::get('/SPACS/spacscom_dir_silver_games_form','SPACS\spacs_usermedalnameController@spacscom_dir_silver_games_form');

//------------------------------------dm proficiency gold medal---------------------------------------
Route::get('/SPACS/spacscom_dm_prof_gm_docs','SPACS\spacs_usermedalnameController@spacscom_dm_prof_gm_docs');
Route::get('/SPACS/spacscom_dm_prof_gm_form','SPACS\spacs_usermedalnameController@spacscom_dm_prof_gm_form');

//-----------------------iiitdmj proficiency ---------------------------------------
Route::get('/SPACS/spacscom_iiitdmj_prof_docs','SPACS\spacs_usermedalnameController@spacscom_iiitdmj_prof_docs');
Route::get('/SPACS/spacscom_iiitdmj_prof_form','SPACS\spacs_usermedalnameController@spacscom_iiitdmj_prof_form');


Route::post('/SPACS/dir_sil_cul_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_sil_cul_form');
Route::post('/SPACS/dir_sil_gam_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_sil_gam_form');
Route::post('/SPACS/mcm_announce/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@mcm_announce');
Route::post('/SPACS/chair_announce/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@chair_announce');
Route::post('/SPACS/acad_announce/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@acad_announce');
//-----------Chairman------------------------------
Route::get('/SPACS/spacs_chairman_gm','SPACS\spacs_usermedalnameController@spacs_view_chairman');

//-----------academic------------------------------
Route::get('/SPACS/spacs_academic','SPACS\spacs_usermedalnameController@spacs_view_academic');

//-----------notional-----------------------------
Route::get('/SPACS/spacs_notional_first','SPACS\spacs_usermedalnameController@spacs_view_notional_first');
Route::get('/SPACS/spacs_notional_second_third','SPACS\spacs_usermedalnameController@spacs_view_notional_second_third');
Route::post('/SPACS/mcm_form/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@mcm_form');
Route::post('/SPACS/dir_gm_m/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_m');
Route::post('/SPACS/dir_sil_gam_m/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_m');
Route::post('/SPACS/dir_sil_cul_m/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_m');
Route::post('/SPACS/dm_prof_gm_m/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_m');
Route::post('/SPACS/iiitdmj_prof_m/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_m');
Route::post('/SPACS/dir_gm_a/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_a');
Route::post('/SPACS/dir_sil_gam_a/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_a');
Route::post('/SPACS/dir_sil_cul_a/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_a');
Route::post('/SPACS/dm_prof_gm_a/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_a');
Route::post('/SPACS/iiitdmj_prof_a/{scholarship_id}/{student_id}','SPACS\spacs_usermedalnameController@dir_gm_a');
Route::post('/SPACS/spacs_create_sch','SPACS\spacs_usermedalnameController@spacs_create_sch');

Route::get('/SPACS/user_winners',function(){
    return view('SPACS.user.user_winners');
});

Route::get('/SPACS/spacs_scholarship_create',function(){
    return view('SPACS.spacs.spacs_scholarship_create');
});
Route::get('/SPACS/spacs_medal_create',function(){
    return view('SPACS.spacs.spacs_medal_create');
});


Route::get('/SPACS/user_summarycurrent','SPACS\spacs_usermedalnameController@user_summarycurrent');
Route::get('/SPACS/user_summaryprevious','SPACS\spacs_usermedalnameController@user_summaryprevious');
Route::get('/SPACS/user_mcmform',function(){
    return view('SPACS.user.user_mcmform');
});
Route::get('/SPACS/user_dir_gm', function () {
    return view('SPACS.user.user_dir_gm');
});
Route::get('/SPACS/user_dm_prof_gm', function () {
    return view('SPACS.user.user_dm_prof_gm');
});
Route::get('/SPACS/user_dir_silver_cultural', function () {
    return view('SPACS.user.user_dir_silver_cultural');
});
Route::get('/SPACS/user_dir_silver_games', function () {
    return view('SPACS.user.user_dir_silver_games');
});
Route::get('/SPACS/user_iiitdmj_prof', function () {
    return view('SPACS.user.user_iiitdmj_prof');
});
Route::get('/SPACS/spacscom_dir_gm_home', function () {
    return view('SPACS.spacscom_dir_gm.spacscom_dir_gm_home');
});
Route::get('/SPACS/spacscom_dir_silver_cultural_home', function () {
    return view('SPACS.spacscom_dir_silver_cultural.spacscom_dir_silver_cultural_home');
});
Route::get('/SPACS/spacscom_dir_silver_games_home', function () {
    return view('SPACS.spacscom_dir_silver_games.spacs_dir_silver_games_home');
});
Route::get('/SPACS/spacscom_dm_prof_gm_home', function () {
    return view('SPACS.spacscom_dm_prof_gm.spacscom_dm_prof_gm_home');
});
Route::get('/SPACS/spacscom_iiitdmj_prof_home', function () {
    return view('SPACS.spacscom_iiitdmj_prof.spacscom_iiitdmj_prof_home');
});
Route::get('/SPACS/spacscom_dir_gm_results','SPACS\spacs_usermedalnameController@spacscom_dir_gm_results');
Route::post('/SPACS/staff_verify/{student_id}/{scholarship_id}','SPACS\spacs_usermedalnameController@staff_verify');
Route::get('/SPACS/staff_view_form','SPACS\spacs_usermedalnameController@staff_view_form');
Route::get('/SPACS/spacscom_dir_silver_cultural_results','SPACS\spacs_usermedalnameController@spacscom_dir_silver_cultural_results');
Route::get('/SPACS/spacs_dir_silver_games_results','SPACS\spacs_usermedalnameController@spacs_dir_silver_games_results');
Route::get('/SPACS/spacscom_dm_prof_gm_results','SPACS\spacs_usermedalnameController@spacscom_dm_prof_gm_results');
Route::get('/SPACS/spacscom_iiitdmj_prof_results','SPACS\spacs_usermedalnameController@spacscom_iiitdmj_prof_results');

?>