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
	
	Route::get('fac', 'fac\QualController@index');
	Route::post('fac/add', 'fac\QualController@store');
	Route::get('del/{id}',['as' => 'del', 'uses' => 'fac\QualController@destroy']);
	Route::post('addexp','fac\expcontroller@addexperience');
	Route::post('fac/achadd', 'fac\achcontroller@ach_store');
	Route::get('acdel/{id}',['as' => 'acdel', 'uses' => 'fac\achController@destroy']);
	Route::post('fac/rpdd', 'fac\reprojcontroller@rp_store');
	Route::get('rpdel/{id}',['as' => 'rpdel', 'uses' => 'fac\reprojcontroller@destroy']);
	Route::post('fac/rjadd', 'fac\rejourcontroller@rj_store');
	Route::get('rjdel/{id}',['as' => 'rjdel', 'uses' => 'fac\rejourcontroller@destroy']);
	Route::post('fac/cadd', 'fac\consulcontroller@c_store');
	Route::get('cdel/{id}',['as' => 'cdel', 'uses' => 'fac\consulcontroller@destroy']);
	Route::post('fac/padd', 'fac\patcontroller@p_store');
	Route::get('pdel/{id}',['as' => 'pdel', 'uses' => 'fac\patcontroller@destroy']);
	Route::post('fac/pubadd', 'fac\pubcontroller@pu_store');
	Route::get('pubdel/{id}',['as' => 'pubdel', 'uses' => 'fac\pubcontroller@destroy']);
	Route::post('fac/theadd', 'fac\thecontroller@t_store');
	Route::get('thedel/{id}',['as' => 'thedel', 'uses' => 'fac\thecontroller@destroy']);
	Route::post('fac/lecadd', 'fac\leccontroller@l_store');
	Route::get('lecdel/{id}',['as' => 'lecdel', 'uses' => 'fac\leccontroller@destroy']);
	Route::post('fac/vadd', 'fac\viscontroller@v_store');
	Route::get('vdel/{id}',['as' => 'vdel', 'uses' => 'fac\viscontroller@destroy']);


	Route::post('fac/up', 'fac\QualController@update');

	Route::get('upd/{id}','fac\QualController@update');

	Route::get('/getPDF','fac\PDFController@getPDF');
	
	Route::post('/fac/upd', 'fac\faculty@update');
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