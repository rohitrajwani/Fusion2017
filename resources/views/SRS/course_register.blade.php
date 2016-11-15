@extends('SRS.layout')
@section('content')

<div style="margin:auto;width:80%">
        <div class="row">
          <h4>{{$username}}</h4><center><h4>Courses for semester {{$sem->semester}}</h4></center>
        </div>
<div class="row">

<h5><center>Please select 6 courses for this semester</center></h5>
<form action="/SRS/store-course{{$username}}" method="post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
  <div>
   <table class="responsive-table centered" align="center" border="2 px solid red">
        <thead>
          <tr>
              <th>Course code</th>
              <th>Course Name</th>
              <th>Department</th> 
              <th>Credit</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
      @foreach($courses as $course)
          <tr>

            <td>{{$course->credits}}</td>
            <td><input type="checkbox" class="filled-in" id="{{$course->course_id}}" name="" /><label for="{{$course->course_id}}"></label></td>
          </tr>
      @endforeach
        </tbody>
      </table>
     </div><br></br>
    <div class="row">
      
      <div class="center-align">
        <button style="background-color:#076392"  class="btn waves-effect waves-light" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
            </button>
        
      </div>
    </div>
   
   </form>










</div>

<br><br><a class="btn-large waves-effect waves-light btn" style="background-color:#076392;width:200px" href="/SRS/student/register_course/view_course"><span style="font-size:0.8em">View Courses</span></a>      
</div>
@stop
@section('foobar')
@stop