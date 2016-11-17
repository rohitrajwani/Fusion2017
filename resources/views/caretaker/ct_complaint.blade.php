@extends('layout')

@section('VH_nav')
<!--

	nav bar with functionality avail to the VH caretaker

-->
 <nav class="mynav">
  <div class="nav-wrapper">
    <ul>
      <li><a href="/vhbooking/roomDetailsCT">Room Details</a></li>
      <li><a href="/vhbooking/complaintStatus">Complaint Status</a></li>
        <li><a href="/vhbooking/complaintForm">File Complaint</a></li>
          <!-- <li><a href="#">Update Room Status</a></li> -->
          <li><a href="/vhbooking/approvedRooms">Approved Rooms</a></li>
           <li><a href="/vhbooking/bookingDetails">Booking Details</a></li>
            
      <!-- Dropdown Trigger -->
     
    </ul>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/vhbooking">Home</a></li>
        </ul>
  </div>
</nav>

@endsection

@section('VH_content')
<!--

	Following page shows the Complaint list and the fine added by VH incharge for the following complaint
	Un read complaint will have created_at and updated_at same
	When complaint is added no fine is charged. Fine can only be charged by VH incharge.

-->

	<div class="row">
		<div class="col s12 m4 offset-m4">
			<h4>Complaints List</h4>
		</div>
	</div>

	<table class="bordered highlight">
	    <thead>
	      <tr>
	          <th>Complaint No</th>
	          <th>Booking ID</th>
	          <th>Fine</th>
	          <th>Description</th>
	          <th>Created_At</th>
	          <th>Updated_At</th>
	      </tr>
	    </thead>
	    <tbody>
	      	@foreach($complaints as $complaint)
		      	<tr>	      	
			    	<td>{{ $complaint->complaint_no }}</td>
			        <td>{{ $complaint->booking_id }}</td>
			        <td>{{ $complaint->fine }}</td>
			        <td>{{ $complaint->description }}</td>
			        <td>{{ $complaint->created_at }}</td>
			        <td>{{ $complaint->updated_at }}</td>	        
		      	</tr>
	      	@endforeach	      
	    </tbody>
	</table>

@endsection