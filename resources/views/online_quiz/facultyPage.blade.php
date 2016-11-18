@extends('layout')

@section('content')


		<br><br><br><br><br><br>
		<div class="button-container col s12 m6">
    		<a href="<?php echo '/online_quizzing/faculty_quiz/'.$faculty_id ?>" class="button col s8 offset-s2">
        	<i class="fa fa-quora"></i>
        	<div class="divider col s12"></div>
        	<h5 class="col s12">View Quizzes</h5>
    		</a>
		</div>

		<div class="button-container col s12 m6">
    		<a href="/online_quizzing/phostquiz" class="button col s8 offset-s2">
        	<i class="fa fa-bullhorn"></i>
        	<div class="divider col s12"></div>
        	<h5 class="col s12">Host A Quiz</h5>
    		</a>
		</div>
	

@stop
