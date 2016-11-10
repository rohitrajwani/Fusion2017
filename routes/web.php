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
    
			Route::get('/main','counselling_cell/counsellingcontroller@main');

			Route::get('/logout','dashboardController@logout');

			//Function to attach role
			Route::get('/attachRole/{role}','dashboardController@attachRole');
			
			//------------------------------------------counselling routes-----------------------------
			
			//Student guide application form

			Route::get('/student_guide_form',function(){
				return view('/cou/Student_guide_form');
				});
            Route::get('/assign_guides',function(){
				return view('/cou/assign_sg');
				});
            Route::get('/assign_assistant',function(){
				return view('/cou/assign_asc');
				});
   
   
			//assistant coordinator form

			Route::get('/assistant_coordinator_form',function(){
			return view('/cou/Asst_Coord_form');
				});

			Route::post('studymaterial', 'counselling_cell/counsellingcontroller@studymaterial');//post study material 
			
			Route::post('form_asstcoor', 'counselling_cell/counsellingcontroller@asst_coor_form'); //assistant_coordinator form
			
			Route::post('form_stu_guide', 'counselling_cell/counsellingcontroller@stu_guide_form'); //assistant_coordinator form
			
			Route::get('/study_material', 'counselling_cell/counsellingcontroller@studyymaterial');//study portal view
			// problem portal

			Route::get('/problemportal','counselling_cell/counsellingcontroller@problemmportal');//problem portal view
			
			Route::post('{cc}/answer', 'counselling_cell/counsellingcontroller@answers'); //assistant_coordinator form
			
			Route::post('question', 'counselling_cell/counsellingcontroller@problem'); //assistant_coordinator form
			
			Route::get('/student_guides_list','counselling_cell/counsellingcontroller@stuguide');//view student guide list
			
			Route::get('/assistant_coordinator_list','counselling_cell/counsellingcontroller@assistcoord');//assistant_coordinator list
			
			Route::get('/student_guides_application','counselling_cell/counsellingcontroller@stuguideapp');//application of assistant_coordinator list
			
			Route::get('/assistant_coordinator_application','counselling_cell/counsellingcontroller@assistcoordapp');//application of stu_guide_form
			
			Route::get('/privateportal','counselling_cell/counsellingcontroller@privateportal');//private portal view

			Route::post('privatequestion', 'counselling_cell/counsellingcontroller@privatequestion'); //private problem post
			
			Route::post('{cc}/privateanswer', 'counselling_cell/counsellingcontroller@privateanswer'); //private answer post
			
			Route::get('/faculty_access','counselling_cell/counsellingcontroller@adminportal');//faculty admin access portal
			
			
			// application page where links to the forms of student guide and assistant coordinators are present
			Route::get('/formfill',function(){
				return view('/cou/applications'); 
			});


	
	
    

});