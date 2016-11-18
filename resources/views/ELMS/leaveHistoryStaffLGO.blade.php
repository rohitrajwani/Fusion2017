@extends('layout')

@section('title')
	
	<title>Leave History</title>

@stop

@section('main_content')
	<?php

        $table = \DB::table('employee_leave')->where([['leave_granting_officer','=',$staffdet->staff_id],['status','=',0]])->get();
        $counter = 0;
        foreach($table as $tuple)
          $counter = $counter + 1;
      
    ?>
    <div class="main-container row">
    <nav class="mynav">
       <div class="nav-wrapper">
            <ul>
                <li><a href="/ELMS/homeStaffLGO">HOME</a></li>
                <li><a href="/ELMS/leaveApplicationStaffLGO">Apply for Leave</a></li>
                <li class="active"><a href="/ELMS/historyStaffLGO">Leave History</a></li>
                <li><a href="/ELMS/statusStaffLGO">Check Status</a></li>
                <li><a href="/ELMS/requestsStaffLGO">Pending Leave Requests<span class="badge">{{$counter}}></span></a></li>
                
            </ul>
        </div>
    </nav>

    <div class=" col s12 m12"><br>
        <div style="text-align: center; font-size: 24px; font-weight: 300">Leave History<hr></div>
    </div>
      
    <table class="bordered highlight">
	    <thead>
	      <tr>
	          <th>S. No.</th>
	          <th>Application Submitted On</th>
	          <th>Type of Leave</th>
	          <th>From</th>
	          <th>To</th>
	          <th>No. of days</th>
	          <th>Purpose</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php 
	      		$counter=0;
	    ?>
	    @foreach($leavedet as $leave)
	      <tr>
	      	<?php 
	      		$counter=$counter+1;
	      	?>
	        <td> {{$counter}} </td>
	        <td> {{$leave->created_at}} </td>
	        <td> {{$leave->leave_type}} </td>
	        <td> {{$leave->from}} </td>
	        <td> {{$leave->to}} </td>
	        <?php
                $f = strtotime($leave->from);
                $t = strtotime($leave->to);
                $difference = ($t-$f+86400)/86400;
            ?>
	        <td> {{$difference}} </td>
	        <td> {{$leave->purpose}} </td>
	      </tr>
	     @endforeach

	    </tbody>
	</table>
	</div>
@stop