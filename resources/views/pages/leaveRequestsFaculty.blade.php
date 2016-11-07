@extends('layout')

@section('title')
	
	<title>Pending Requests</title>

@stop

@section('main_content')
	<?php

        $table = \DB::table('employee_leave')->where([['leave_granting_officer','=',$facdet->faculty_id],['status','=',0]])->get();
        $counter = 0;
        foreach($table as $tuple)
          $counter = $counter + 1;
      
    ?>
    <div class="main-container row">
    <nav class="mynav">
        <div class="nav-wrapper">
            <ul>
                <li><a href="/ELMS/homeFacultyLGO">HOME</a></li>
                <li><a href="/ELMS/leaveApplicationFacultyLGO">Apply for Leave</a></li>
                <li><a href="/ELMS/historyFacultyLGO">Leave History</a></li>
                <li><a href="/ELMS/statusFacultyLGO">Check Status</a></li>
                <li class="active"><a href="/ELMS/requestsFacultyLGO">Pending Leave Requests<span class="badge">{{$counter}}</span></a></li>
               
            </ul>
        </div>
    </nav>
    <div class=" col s12 m12"><br>
        <div style="text-align: center; font-size: 24px; font-weight: 300">Pending Requests<hr></div>
    </div>
  
    <table class="bordered highlight">
    	<thead>
     		<tr>
	          <th>App. Id</th>
	          <th>P.F. No.</th>
	          <th>Name</th>
	          <th>Type of Leave</th>
	          <th>From</th>
	          <th>To</th>
	          <th>Purpose</th>
	          <th>Action</th>
	          <th>Submit</th>
	      	</tr>
	    </thead>
	    <tbody>
	     <?php 
	      	$counter=0;
	      	$cnt=0;
	     ?>
	     @foreach($leavedet as $leave)
	      	<?php 
	      		$s = 0;
	      		$f = 0;
	      		$counter = $counter + 1;
	      		$cnt = $cnt + 1;
	      		// $staffdet = \DB::table('staff')->where('staff_id','=',$leave->user_id)->first();
	      		$facdet = \DB::table('faculty')->where('faculty_id','=',$leave->user_id)->first();
	      		// if($staffdet == NULL)
	      			$f = 1;
	      		// else
	      			// $s = 1;
	      	?>
	      	<tr>
		      <form action="/ELMS/grantingFaculty/{{$leave->app_id}}" method="post">
		        <!-- <td>{{$counter}}</td> -->
		        <td>{{$leave->app_id}}</td>
		        <td>{{$leave->user_id}}</td> 
		        @if($f == 1)
		        	<td><a href="/ELMS/leaveHistory/{{$leave->app_id}}">{{$facdet->name}}</a></td>
		        @else
		       		<td><a href="/ELMS/leaveHistory/{{$leave->app_id}}">{{$staffdet->name}}</a></td>
		        @endif
		        <td>{{$leave->leave_type}}</td>
		        <td>{{$leave->from}}</td>
		        <td>{{$leave->to}}</td>
		        <td>{{$leave->purpose}}</td>
		        <td>
		        		<p>
						    <input name="group" type="radio" id="<?php echo "test".$cnt ?>" value=1/>
						    <label for="<?php echo "test".$cnt ?>">Yes</label>
						</p>
						<?php $cnt = $cnt+1; ?>
						<p>
	    					<input name="group" type="radio" id="<?php echo "test".$cnt ?>" value=2/>
	    					<label for="<?php echo "test".$cnt ?>">No</label>
						</p>
		        </td>
		        <td>
		        	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                <div>
	                   	<br><button type="<?php echo "submit".$counter ?>" name="action" class="wave-action btn">Submit</button>
	                </div>
		        </td>
		      </form>
	      </tr>
	    @endforeach
	    </tbody>
	</table>
	</div>
@stop