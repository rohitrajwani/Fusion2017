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


   //Assignments_and_Course_Documentation Routes
   Route::get('/Assignments_and_Course_Documentation', 'Assignments_and_Course_Documentations\Student@check');
   Route::get('/Assignments_and_Course_Documentation/student', 'Assignments_and_Course_Documentations\Student@home');
   Route::get('/Assignments_and_Course_Documentation/student/{course}','Assignments_and_Course_Documentations\Student@selected_course');
   Route::get('/Assignments_and_Course_Documentation/student/{course}/solve_assignment','Assignments_and_Course_Documentations\Student@solve_assignment');
   Route::get('/Assignments_and_Course_Documentation/faculty/{course}/assess_assignments', 'Assignments_and_Course_Documentations\Faculty@assess_assignment');
   Route::get('/Assignments_and_Course_Documentation/student/{course}/course_documents', 'Assignments_and_Course_Documentations\Student@course_documents');
   Route::get('/Assignments_and_Course_Documentation/faculty', 'Assignments_and_Course_Documentations\Faculty@home');
   Route::get('/Assignments_and_Course_Documentation/faculty/{course}', 'Assignments_and_Course_Documentations\Faculty@selected_course2');
   Route::get('/Assignments_and_Course_Documentation/faculty/{course}/Documents2', 'Assignments_and_Course_Documentations\Faculty@Documents2');
   Route::get('/Assignments_and_Course_Documentation/faculty/{course}/Documents2/delete', 'Assignments_and_Course_Documentations\Faculty@delete');
   Route::post('/Assignments_and_Course_Documentation/document', 'Assignments_and_Course_Documentations\Faculty@store');
   Route::post('/Assignments_and_Course_Documentation/assignment', 'Assignments_and_Course_Documentations\Faculty@store1');
   Route::post('/Assignments_and_Course_Documentation/assess_assignment', 'Assignments_and_Course_Documentations\Faculty@store2');
   Route::post('/Assignments_and_Course_Documentation/solve_assignment','Assignments_and_Course_Documentations\Student@store');

});
