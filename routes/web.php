<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|jhjh
*/
Route::get('/',function(){
	return view('welcome');
});

Route::post('/login','dashboardController@login_check');

Route::post('/signup','dashboardController@signup');

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard','dashboardController@dashboard');
    Route::get('/logout','dashboardController@logout');
    Route::get('/attachRole/{role}','dashboardController@attachRole');
 });

Route::get('studentgymkhana/', function () {

    return view('index',compact('status'));
})->name('studentgymkhana/');

Route::post('studentgymkhana/role','rolecheck@start')->name('role');

//Route::get('studentgymkhana//student','PagesController@student');
Route::get('studentgymkhana/student/welcome','StudentController@welcome')->name('student/welcome');
Route::get('studentgymkhana/student/project','StudentController@project');
Route::get('studentgymkhana/student/guideline','StudentController@guideline');
Route::get('studentgymkhana/student/senate','StudentController@senate');
Route::get('studentgymkhana/student/committees','StudentController@committees');
Route::get('studentgymkhana/student/election','StudentController@election')-> name('student/election');
Route::get('studentgymkhana/student/{club}','StudentController@club');
Route::post('studentgymkhana/student/nominate','StudentController@nominate');
Route::post('studentgymkhana/student/vote','StudentController@vote');

//Route::get('studentgymkhana//project','PagesController@project');
///////////////////////////////////////////////////////////////////////
Route::get('studentgymkhana/faculty/welcome','FacultyController@welcome')->name('faculty/welcome');
Route::get('studentgymkhana/faculty/project','FacultyController@project')->name('faculty/project');;
Route::get('studentgymkhana/faculty/guideline','FacultyController@guideline')->name('faculty/guideline');;
Route::get('studentgymkhana/faculty/senate','FacultyController@senate')->name('faculty/senate');;
Route::get('studentgymkhana/faculty/committees','FacultyController@committees')->name('faculty/committees');;
Route::get('studentgymkhana/faculty/{club}','FacultyController@club')->name('faculty/{club}');;

////////////////////////////////////////////////////////////////////////
Route::get('studentgymkhana/deanstudent/welcome','DeanStudentController@welcome')->name('deanstudent/welcome');
Route::post('studentgymkhana/deanstudent/updateproject','DeanStudentController@welcome');
Route::post('studentgymkhana/deanstudent/deleteproject','DeanStudentController@deleteproject');
Route::post('studentgymkhana/deanstudent/insertproject','DeanStudentController@insertproject');
Route::post('studentgymkhana/deanstudent/insertnotification','DeanStudentController@insertnotification');
Route::post('studentgymkhana/deanstudent/deletenotification','DeanStudentController@deletenotification');
Route::post('studentgymkhana/deanstudent/deletecommittee','DeanStudentController@deletecommittee');
Route::post('studentgymkhana/deanstudent/insertcommittee','DeanStudentController@insertcommittee');
Route::post('studentgymkhana/deanstudent/insertcommitteemember','DeanStudentController@insertcommitteemember');

///////////////////////////////////////////////////////////////////////


Route::get('studentgymkhana/election/welcome','election@welcome')->name('election/welcome');
Route::post('studentgymkhana/election/createelection','election@createelection');
Route::post('studentgymkhana/election/updateelection','election@updateelection');
Route::post('studentgymkhana/election/deleteelection','election@deleteelection');
Route::post('studentgymkhana/election/approvenomination','election@approvenomination');
Route::post('studentgymkhana/election/deletenominee','election@deletenominee');




//Route::get('studentgymkhana/budget','club@updatebudget');
Route::get('studentgymkhana/coordinator/welcome','club@welcome')->name('coordinator/welcome');
Route::post('studentgymkhana/coordinator/updatewebsite','club@updatewebsite');
Route::post('studentgymkhana/coordinator/updateactivity','club@updateactivity');
Route::post('studentgymkhana/coordinator/deleteactivity','club@deleteactivity');
Route::post('studentgymkhana/coordinator/insertactivity','club@insertactivity');
Route::post('studentgymkhana/coordinator/deletemember','club@deletemember');
Route::post('studentgymkhana/coordinator/insertmember','club@insertmember');

//Route::get('studentgymkhana/cocobudget','club@updatebudget');
Route::get('studentgymkhana/cocoordinator/welcome','clubco@welcome')->name('cocoordinator/welcome');
Route::post('studentgymkhana/cocoordinator/cocoupdatewebsite','clubco@updatewebsite');
Route::post('studentgymkhana/cocoordinator/cocoupdateactivity','clubco@updateactivity');
Route::post('studentgymkhana/cocoordinator/cocodeleteactivity','clubco@deleteactivity');
Route::post('studentgymkhana/cocoordinator/cocoinsertactivity','clubco@insertactivity');
Route::post('studentgymkhana/cocoordinator/cocodeletemember','clubco@deletemember');
Route::post('studentgymkhana/cocoordinator/cocoinsertmember','clubco@insertmember');




Route::get('studentgymkhana/councilconvener/welcomet','councilconvener@welcomet')->name('councilconvener/welcomet');
Route::get('studentgymkhana/councilconvener/welcomec','councilconvener@welcomec')->name('councilconvener/welcomec');
Route::get('studentgymkhana/councilconvener/welcomes','councilconvener@welcomes')->name('councilconvener/welcomes');
Route::post('studentgymkhana/councilconvener/clubbudget','councilconvener@updatebudget');
Route::post('studentgymkhana/councilconvener/newclub','councilconvener@insertclub');
Route::post('studentgymkhana/councilconvener/deleteclub','councilconvener@deleteclub');
Route::post('studentgymkhana/councilconvener/updateco','councilconvener@updateco');
Route::post('studentgymkhana/councilconvener/updatecoco','councilconvener@updatecoco');

Route::get('studentgymkhana/convener/welcome','convener@welcome')->name('convener/welcome');
Route::post('studentgymkhana/convener/insertsenatemember','convener@insertsenate');
Route::post('studentgymkhana/convener/deletesenatemember','convener@deletesenate');
Route::post('studentgymkhana/convener/insertminutes','convener@insertminutes');