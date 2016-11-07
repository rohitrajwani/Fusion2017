@extends('layouts.master')
@section('title')
	courses
@endsection

@section('content')
		<h4>Courses</h4>
		@foreach($courses as $course)
			<a class="course-block" href="{{ route('course1',['fid'=>$faculty->faculty_id,'id'=>$course->course_id]) }}"><h4 style="color : white;">{{ $course->course_id }}</h4><br><h5>{{ $course->course_name }}</h5></a>
		@endforeach
@endsection