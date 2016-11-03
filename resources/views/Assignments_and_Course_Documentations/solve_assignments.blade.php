@extends('layout')
@section('content')
	<nav class="mynav">
	  <div class="nav-wrapper">
		  <ul>
		    <li><a href="/Assignments_and_Course_Documentations/student">Registered Courses</a></li>
		  </ul>
	  </div>
	</nav>
			
	<h4> {{ $course }} </h4>                    
  
  <table class="bordered highlight centered">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Date/Time</th>
        <th>Topic</th>
        <th>Deadline</th>
		    <th>Upload </th>
      </tr>
    </thead>
    
    <tbody>
      @foreach( $solve as $solve1 )
        <tr>
          <td>{{ $solve1->assign_id }}</td>
          <td>{{ $solve1->upload_time }}</td>
          <td><a href="/Assignments_and_Course_Documentations/assignments/{{ $solve1->url_assign }}" download>{{ $solve1->url_assign }}</a></td>
          <td id="deadline{{$solve1->assign_id}}">{{ $solve1->deadline }}</td>

      		<td>
            <form action="/Assignments_and_Course_Documentations/solve_assignment" method='post' class="col s12" enctype="multipart/form-data">
              {{ csrf_field() }}

              <input type='hidden' name='dummy' value= {{ $solve1->course_id }} >
              <input type='hidden' name='student' value= "{{ Auth::user()->username }}" >
              <input type='hidden' name='assign' value= {{ $solve1->assign_id }} >
              <input type='hidden' name='deadline' value= {{ $solve1->deadline }} >


              <div class="file-field input-field">
                <div class="btn">
                  <span>Upload</span>
                  <input type="file" name="solved_assignment">
                </div>
                <div class="file-path-wrapper col s3">
                  <input class="file-path validate" name='assignment' type="text">
                </div>
              </div>
              
              <div class="input-field col s2" id="submit{{$solve1->assign_id}}">
                <input type='submit' value='Submit' class="waves-effect btn-flat" >
              </div>
            </form>
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <script>
	$(document).ready(function(){
		var deadlines = [];
		var solved = [];
		var ids = [];
		@foreach($solve as $s)
			deadlines.push('{{ $s->deadline }}');
			ids.push('{{ $s->assign_id }}');
		@endforeach

		@foreach($assigns as $a)
			solved.push('{{ $a->assign_id }}');
		@endforeach

		for(var i=0; i<ids.length; i++){
			var cur_date = new Date();

			var t = deadlines[i].split('-');
			var dd = new Date(t[0], parseInt(t[1])-1, t[2]);

			if(cur_date.getTime() > dd.getTime()){
				$('#deadline'+ids[i]).css('color', 'red');
				$('#submit'+ids[i]).children('input').attr('disabled', 'true');
			}

			var f = 1;
			for(var j=0; j<solved.length; j++){
				if(solved[j] == ids[i]){
					f = 0; break;
				}
			}

			if(f==0){
				$('#deadline'+ids[i]).css('color', 'green');
                                $('#submit'+ids[i]).children('input').attr('disabled', 'true');
			}
		}
	});
  </script>
@stop
