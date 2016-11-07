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

Route::post('/login','stock@login_check');

Route::post('/signup','stock@signup');

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard','stock@dashboard');

    Route::get('/logout','stock@logout');

    //Function to attach role
    Route::get('/attachRole/{role}','stock@attachRole');

    

});
Route::get('/stockhome', [
    'uses'=>'stock@stockhome',
]);

Route::get('/requests',[
	'uses'=>'stock@reqhome',
	'as'=>'requests'
	]);

Route::get('/stock', function () {
    return view('stock');
});

Route::get('/view', [
	'uses'=>'stock@viewstock'
	]);

Route::get('/new',[
	'uses'=>'stock@newpage'
	]);

Route::get('/existing',[
	'uses'=>'stock@existing'
	]);

Route::post('/additem',[
	'uses'=>'stock@additem',
	'as'=>'additem'
	]);

Route::post('/exist',[
	'uses'=>'stock@addexist',
	'as'=>'exist'
	]);

Route::post('/addreq',[
	'uses'=>'stock@addreq',
	'as'=>'addreq'
	]);

Route::get('/checkreq',[
	'uses'=>'stock@chrhome',
	'as'=>'checkreq'
	]);

Route::get('/status{req}',[
		'uses'=>'stock@status',
		'as'=>'/status{req}'
	]);

Route::post('/confirm',[
	'uses'=>'stock@statconf',
	'as'=>'confirm'
	]);