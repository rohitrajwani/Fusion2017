@extends('CAMS.layout')
@section('class_attendance_content')
	<div class="container">
		<div class="row">
			<div class="col s6 offset-s3 m6 offset-m3 l6 offset-l3">
				<center><span class="rt"><h3>{{$coursename}} {{$date}}</h3></span></center>
			</div>
		</div>
		
	<div  style="width:100%;height:200px;overflow-y:scroll;margin:auto">
	 <table class="responsive-table centered " align="center" border="2 px solid red">
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Roll No.</th>
              <th data-field="price">Status</th>
			  
			  
          </tr>
        </thead>

        <tbody>
			@foreach( $student_record as $student)
          <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->roll_no}}</td>
			@if($student->status)
				<td><input type="checkbox" class="filled-in" checked="checked" /><label for="{{$student->roll_no}}"></label></td>
			@else
				<td><input type="checkbox"/><label for="{{$student->roll_no}}"></label></td>
			@endif
          </tr>
		  @endforeach
        </tbody>
      </table>
     </div></div><br></br><br></br></br>
@stop