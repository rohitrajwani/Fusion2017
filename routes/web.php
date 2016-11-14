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

    Route::get('course_management/', function(){
    	if(Auth::user()->user_type == 'faculty'){
			$faculty = DB::table('faculty')->where('faculty_id','=',Auth::user()->username)->get()->first();
			return view('html.index',compact('faculty'));
		}
		else if(Auth::user()->user_type == 'student'){
			$student = DB::table('student')->where('student_id','=',Auth::user()->username)->get()->first();
			return view('html.student',compact('student'));
		}
		else if(Auth::user()->user_type == 'others' && Auth::user()->hasRole('Acad_staff')){
				return view('html.students');
		}
    });
	
	Route::get('cms/faculty/{id}',[
			'uses' => 'cms@home',
			'as' => 'home'
		]);
		Route::post('cms/students/del',[
			'uses' => 'cms@delStudent',
			'as' => 'delStudent'
		]);
		Route::post('cms/students/add',[
			'uses' => 'cms@addStudent',
			'as' => 'addStudent'
		]);
		Route::post('cms/faculty/del',[
			'uses' => 'cms@delFaculty',
			'as' => 'delFaculty'
		]);
		Route::post('cms/faculty/add',[
			'uses' => 'cms@addFaculty',
			'as' => 'addFaculty'
		]);
	Route::get('cms/{id}/courses',[
			'uses' => 'cms@getCourses',
			'as' => 'courses'
		]);
	Route::get('cms/{fid}/course1/{id}',[
			'uses' => 'cms@getCourse',
			'as' => 'course1'
		]);
		Route::get('cms/students',[
			'uses' => 'cms@manageStudent',
			'as' => 'student'
		]);
		Route::get('cms/faculty1',[
			'uses' => 'cms@manageFaculty',
			'as' => 'faculty'
		]);
		Route::get('cms/', function () {
    return view('threads.onethread');

});
Route::post('cms/forum/addthread/faculty/{fid}',[
			'uses' => 'cms@addthread',
			'as' => 'addthread'
		]);
Route::post('cms/forum/addthread/student/{sid}',[
			'uses' => 'cms@addthreadstudent',
			'as' => 'addthreadstudent'
		]);
Route::post('cms/forum/faculty/{fid}/{tid}',[
			'uses' => 'cms@addanswer',
			'as' => 'addanswer1'
		]);
Route::post('cms/forum/student/{fid}/{tid}',[
			'uses' => 'cms@addanswerstudent',
			'as' => 'addanswer1student'
		]);
Route::get('cms/forum/faculty/{fid}',[
			'uses' => 'cms@getforum',
			'as' => 'forum'
		]);
Route::get('cms/forum/student/{sid}',[
			'uses' => 'cms@getforumstudent',
			'as' => 'forumstudent'
		]);
	Route::get('cms/forum/faculty/{fid}/one/{tid}',[
			'uses' => 'cms@getthread',
			'as' => 'onethread'
		]);
	Route::get('cms/forum/student/{sid}/one/{tid}',[
			'uses' => 'cms@getthreadstudent',
			'as' => 'onethreadstudent'
		]);
	Route::get('cms/forum/faculty/{fid}/one/{tid}/delete',[
			'uses' => 'cms@deletethread',
			'as' => 'deletethread'
		]);
	Route::get('cms/forum/faculty/{fid}/one/{tid}/edit',[
			'uses' => 'cms@editthread',
			'as' => 'editthread'
		]);
	Route::get('cms/forum/student/{sid}/one/{tid}/edit',[
			'uses' => 'cms@editstudentthread',
			'as' => 'editstudentthread'
		]);
	Route::get('cms/forum/faculty/{fid}/new',[
			'uses' => 'cms@newthread',
			'as' => 'newthread'
		]);
	Route::get('cms/forum/student/{sid}/new',[
			'uses' => 'cms@newthreadstudent',
			'as' => 'newthreadstudent'
		]);
	Route::post('cms/forum/student/{sid}/one/{tid}',[
			'uses' => 'cms@changestudentthread',
			'as' => 'changestudentthread'
		]);
	Route::post('cms/forum/faculty/{fid}/one/{tid}',[
			'uses' => 'cms@changethread',
			'as' => 'changethread'
		]);

	Route::get('cms/index', function () {
    return view('index');
    
		});
Route::get('cms/threads','ThreadsController@index');


Route::get('cms/threads/new','ThreadsController@create');

});