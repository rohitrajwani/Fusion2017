@extends('layout')

@section('title')
	
	<title>Leave History</title>

@stop

@section('main_content')
    <div class="main-container row">
    <nav class="mynav">
        <div class="nav-wrapper">
            <ul>
                <li><a href="/ELMS/homeStaffLGO">HOME</a></li>
                <li><a href="/ELMS/leaveApplicationStaffLGO">Apply for Leave</a></li>
                <li class="active"><a href="/ELMS/historyStaffLGO">Leave History</a></li>
                <li><a href="/ELMS/statusStaffLGO">Check Status</a></li>
                <li><a href="/ELMS/requestsStaffLGO">Pending Leave Requests</a></li>
                
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
	          <th>Type of Leave</th>
	          <th>From</th>
	          <th>To</th>
	          <th>No. of days</th>
	          <th>Purpose</th>
	          <th>Status</th>
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
	        <?php
	        	if($leave->status == 0)
	        		$variable = "No Action Taken";
	        	else if($leave->status == 1)
	        		$variable = "Sanctioned";
	        	else if($leave->status == 2)
	        		$variable = "Rejected";
	        ?>
	        <td> {{$variable}} </td>
	      </tr>
	     @endforeach

	    </tbody>
	</table>
	</div>
@stop