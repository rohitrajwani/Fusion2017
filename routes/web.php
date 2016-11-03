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
	

Route::get('/online_quizzing/quiz','QuizController@show');

Route::get('/online_quizzing/quiz/{quiz}','QuizController@edit');

Route::get('/online_quizzing/question/{question}','QuizController@question');

Route::get('/online_quizzing/addquestion','QuizController@addquestion');

Route::post('/online_quizzing/savequestion','QuizController@savequestion');

Route::get('/online_quizzing/quiz_questions',function()
	{
		return view('quiz_questions');
	});

Route::get('/online_quizzing/give_quiz/{quiz}/{student_id}','QuizController@give_quiz');

Route::get('/online_quizzing/answer_question/{ques}/{student_id}','QuizController@answer_question');

Route::post('/online_quizzing/save_answer','QuizController@save_answer');

Route::get('/online_quizzing/faculty/{faculty_id}','QuizController@facultyhome');

Route::get('/online_quizzing/faculty_quiz/{faculty_id}','QuizController@faculty_quiz');

Route::get('/online_quizzing/phostquiz','QuizController@hostquiz');

Route::get('/online_quizzing/submit_quiz/{student_id}/{quiz}','QuizController@submit_quiz');

Route::get('/online_quizzing/view_profile/{student_id}','QuizController@view_profile');

Route::get('/online_quizzing/student/{student_id}','QuizController@studenthome');

Route::get('/online_quizzing/student_quiz/{student_id}','QuizController@student_quiz');

Route::get('/online_quizzing/view_result/{quiz}','QuizController@view_result');

Route::post('/online_quizzing/add_quiz','QuizController@add_quiz');

    

});