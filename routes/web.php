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

Route::get('/','feedback_system\HomeController@home1');   


Route::get('/home/{type1}',[
	'uses'=>'feedback_system\HomeController@home',
	'as'=>'/home/{type1}']);


Route::get('admin','feedback_system\HomeController@admin'); 


Route::get('/feed/{cour}/{facid}/{id}/{type1}',[
'uses'=>'feedback_system\HomeController@feedback',
'as'=>'/feedback/{cour}/{facid}/{id}/{type1}'
	]);


Route::get('/sem',[
	'uses'=>'feedback_system\HomeController@sem',
	'as'=>'/sem']);



Route::get('/view/{type}',[
	'uses'=>'feedback_system\HomeController@view',
	'as'=>'/view/{type}']);

Route::post('/feedinsert',[
	'uses'=>'feedback_system\HomeController@feedbackinsert',
	'as'=>'feedinsert'
	]);

Route::get('/faculty/{fid}/{type}',[
	'uses'=>'feedback_system\HomeController@courses',
	'as'=>'/faculty/{fid}/{type}'
]);


Route::get('course{cid}',[
	'uses'=>'feedback_system\HomeController@review',
	'as'=>'course{cid}']);

Route::get('/review/{fid}/{cid}/{type}',[
	'uses'=>'feedback_system\HomeController@review1',
	'as'=>'/review/{fid}/{cid}/{type}'
	]);
Route::post('/admin/add','feedback_system\HomeController@add');
Route::post('/admin/delete','feedback_system\HomeController@destroy');