@extends('layout')

@section('VH_nav')
<!--

  nav bar for stakeholder

-->

       <nav class="mynav">
  <div class="nav-wrapper">
    <ul>
      <li><a href="/vhbooking/requestForm">Book Room</a></li>
      <li><a href="/vhbooking/cancelRoom">Cancel Room</a></li>
          <li><a href="/vhbooking/bookingHistory">Booking History</a></li>
            <li><a href="/vhbooking/rules">Rules&amp;Regulations</a></li>
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

    Following is the room reservation cancellation form

-->
<div class="container">

	<div class="row">
		<div class="col s12 m5">			
			<h5 style="margin-top: 30px;"><b>Cancel Room Form</b></h5>
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



	<form class="s12" method="POST" action="/cancel">

  		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

  		<div class="row">
  			<div class="input-field col s6">
  	      		<input name="booking_id" id="bookingID" type="text" class="validate">
  	      		<label for="bookingID">Booking ID</label>
  			</div>
  		</div>


  		<div class="row">
          <div class="col s12 m4 offset-m8" style="margin-top:20px">
              <button type="submit" class="waves-effect btn">Submit</button>
          </div>
      </div>

	</form>


</div>

@endsection