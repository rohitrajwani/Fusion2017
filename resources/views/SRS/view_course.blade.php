@extends('SRS.layout')
@section('content')

<div class="container">
<div class="row">
<br>
<table class="bordered highlight">
            <thead>
              <tr>
                <th>Course Name</th>
                <th>Course Id</th>
                <th>Department</th>
                <th>Credits</th>
                <th>Total Classes</th>
                <th>Syllabus url</th>
              </tr>
            </thead>
            <tbody>
        
              @foreach($courses as $course) <tr>
              <td>{{$course->course_name}}</td>  
              <td>{{$course->course_id}}</td>
              <td>{{$course->department}} </td>
              <td>{{$course->credits}} </td>
              <td>{{$course->total_classes}} </td>
              <td>{{$course->syllabus_url}} </td>
              </tr> 
              @endforeach 
    
            </tbody>
</table>
</div>
<div class="row">
 <div class="center-align">
  <a href="/SRS/student/register_course" class="btn wave-effect wave light">Go back</a>
 </div>
 </div>
</div>

@stop
@section('foobar')
@stop