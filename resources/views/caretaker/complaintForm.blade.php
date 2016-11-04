@extends('layout')

@section('nav')
<!--

	nav bar with all the functionality provided to the Vh caretaker

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

@section('content')
<!--

	The following is the complaint-form using which VH caretaker can complaint about a visitor to Vh incharge
	Complainer's ID is the booking ID using which we can add fine or take neccessary action against the incorporater

-->

<div class="container">

	<div class="row">
		<div class="col s12 m5">			
			<h5 style="margin-top: 30px;"><b>Complaint Form</b></h5>
		</div>
	</div>


	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
           
                <li><h6 style="color: red">{{ $error }}*</h6></li>
               
            @endforeach
        </ul>
    </div>
@endif



	<form class="s12" method="POST" action="/addComplaint">

		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<div class="row">
			<div class="input-field col s6">
	      		<input name="booking_id" id="complainerID" type="text" class="validate">
	      		<label for="complainerID">Boking ID</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12">
	      		<textarea name="description" id="description" class="materialize-textarea"></textarea>
	      		<label for="description">Complaint Description</label>
			</div>
		</div>

		<div class="row">
            <div class="col s12 m4 offset-m4">
                <button type="submit" class="waves-effect btn">Submit</button>
            </div>
        </div>

	</form>

</div>

@endsection