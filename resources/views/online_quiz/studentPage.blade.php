@extends('layout')

@section('online_quiz_content')

	<div class="main-container row">
		<br><br><br><br><br><br>
		<div class="button-container col s12 m6">
    		<a href="<?php echo '/online_quizzing/student_quiz/'.$student_id ?>" class="button col s8 offset-s2">
        	<i class="fa fa-quora"></i>
        	<div class="divider col s12"></div>
        	<h5 class="col s12">View Quizzes</h5>
    		</a>
		</div>

		<div class="button-container col s12 m6">
    		<a href="<?php echo '/online_quizzing/view_profile/'.$student_id ?>" class="button col s8 offset-s2">
        	<i class="fa fa-user-circle"></i>
        	<div class="divider col s12"></div>
        	<h5 class="col s12">Profile</h5>
    		</a>
		</div>
	</div>

@stop