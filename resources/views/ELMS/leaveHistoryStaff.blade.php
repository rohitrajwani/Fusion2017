@extends('layout')

@section('title')
	
	<title>Leave History</title>

@stop

@section('main_content')
    <div class="main-container row">
    <nav class="mynav">
        <div class="nav-wrapper">
            <ul>
                <li><a href="/ELMS/homeStaff">HOME</a></li>
                <li><a href="/ELMS/leaveApplicationStaff">Apply for Leave</a></li>
                <li class="active"><a href="/ELMS/historyStaff">Leave History</a></li>
                <li><a href="/ELMS/statusStaff">Check Status</a></li>
                
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