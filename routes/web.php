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
	Route::get('/counselling_cell/','counsellingcontroller@main');

	Route::get('/logout','dashboardController@logout');

	//Function to attach role
	Route::get('/attachRole/{role}','dashboardController@attachRole');

	//------------------------------------------counselling routes-----------------------------

	//Student guide application form

	Route::get('/counselling_cell/student_guide_form',function(){
		return view('/cou/Student_guide_form');
		});
	Route::get('/counselling_cell/assign_guides',function(){
		return view('/cou/assign_sg');
		});
	Route::get('/counselling_cell/assign_assistant',function(){
		return view('/cou/assign_asc');
		});
	//assistant coordinator form
	Route::get('/counselling_cell/assistant_coordinator_form',function(){
	return view('/cou/Asst_Coord_form');
		});
	Route::post('/counselling_cell/studymaterial', 'counsellingcontroller@studymaterial');//post study material 
	Route::post('/counselling_cell/form_asstcoor', 'counsellingcontroller@asst_coor_form'); //assistant_coordinator form
	Route::post('/counselling_cell/form_stu_guide', 'counsellingcontroller@stu_guide_form'); //assistant_coordinator form
	Route::get('/counselling_cell/study_material', 'counsellingcontroller@studyymaterial');//study portal view
	// problem portal
	Route::get('/counselling_cell/problemportal','counsellingcontroller@problemmportal');//problem portal view
	Route::post('/counselling_cell/{cc}/answer', 'counsellingcontroller@answers'); //assistant_coordinator form
	Route::post('/counselling_cell/question', 'counsellingcontroller@problem'); //assistant_coordinator form
	Route::get('/counselling_cell/student_guides_list','counsellingcontroller@stuguide');//view student guide list
	Route::get('/counselling_cell/assistant_coordinator_list','counsellingcontroller@assistcoord');//assistant_coordinator list
	Route::get('/counselling_cell/student_guides_application','counsellingcontroller@stuguideapp');//application of assistant_coordinator list
	Route::get('/counselling_cell/assistant_coordinator_application','counsellingcontroller@assistcoordapp');//application of stu_guide_form
	Route::get('/counselling_cell/privateportal','counsellingcontroller@privateportal');//private portal view
	Route::post('/counselling_cell/privatequestion', 'counsellingcontroller@privatequestion'); //private problem post
	Route::post('/counselling_cell/{cc}/privateanswer', 'counsellingcontroller@privateanswer'); //private answer post
	Route::get('/counselling_cell/faculty_access','counsellingcontroller@adminportal');//faculty admin access portal
	// application page where links to the forms of student guide and assistant coordinators are present
	Route::get('/counselling_cell/formfill',function(){
		return view('/cou/applications'); 
	});

});