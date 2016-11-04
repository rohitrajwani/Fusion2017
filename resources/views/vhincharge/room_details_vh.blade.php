@extends('layout')

@section('nav')
<!--

  nav bar with the funtionality avial to VH incharge

-->
 <nav class="mynav">
  <div class="nav-wrapper">
    <ul>
      
      <li><a href="/vhbooking/roomDetailsVH">Room Details</a></li>
        <li><a href="/vhbooking/respond_to_complaint">Complaint</a></li>
          <li><a href="/vhbooking/bookingRequest">Booking Request</a></li>
            
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
  Following code allows the VH incharge to see details of every room present in VH.
  Check_in shows current status weather the following room is currently checked in or not.
  Availability shows availability of following room based on arrival_date and Departure_date.

-->

  <div class="row">
    <div class="col s12 m4 offset-m4">
      <h4>Room List</h4>
    </div>
  </div>

  <!-- <div class="row">    
    <div class="col s12">
      <h5>Enter Date - </h5>
    </div>
    <form action="/availability" method="POST">
    <div class="input-field col s6">
          <input name="Room[]" id="date1" type="text" class="validate">
          <label for="date1">From</label>
    </div>
    <div class="input-field col s6">
          <input name="Room[]" id="date2" type="text" class="validate">
          <label for="date2">To</label>
    </div>
    <div class="col s4 offset-s5">
        <button type="submit" class="waves-effect btn">Submit</button>
    </div>
  </div> -->


  <table class="bordered highlight">
      <thead>
        <tr>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>Checked_In</th>
            <!-- <th>Availability</th> -->
            <!-- <th><center>Details</center></th> -->
        </tr>
      </thead>
      <tbody>
          @foreach($rooms as $room)
            <tr>          
              <td>{{ $room->room_no }}</td>
              <td>{{ $room->room_type }}</td>
              <td>
                <?php 
                  if($room->checked_in == '0') echo 'Not Checked In';
                  else  echo 'Checked In'                     
                ?>
              </td>
              <!-- <td>
                <?php 
                  // if($room->availability == '0') echo 'Not Available';
                  // else  echo 'Available' 
                ?>
              </td> -->              
              <!-- <td>
                  <center><button class="waves-effect btn">View</button></center>                     
              </td> -->
            </tr>
          @endforeach       
      </tbody>
  </table>

  </br>

  <div class="row">    
    <div class="col s12">
      <center><h5>Check Availability</h5></center>
    </div>
    <div class="col s12">
      <h5>Enter Date - </h5>
    </div>
    <form action="/vhbooking/checkAvailabilityVH" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class="col s12 m6">
          <label for="date1">From</label>
          <input name="from" id="date1" type="date">                        
      </div>
      <div class="col s12 m6">
          <label for="date2">To</label>
          <input name="to" id="date2" type="date">                        
      </div>
      <div class="col s4 offset-s5">
          <button type="submit" class="waves-effect btn">Submit</button>
      </div>
      </form>
    </div>

<?php if(session()->has('data')) { 

  //$avails[] = Session::get('data');  
  // echo $avails;
  $room1 = App\Room::all();?>
 <table class="bordered highlight">
      <thead>
        <tr>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>Availability</th>
        </tr>
      </thead>
      <tbody>
          @foreach($room1 as $roo1)
            <tr>          
              <td>{{ $roo1->room_no }}</td>
              <td>{{ $roo1->room_type }}</td>
              <td>
                <?php 
                  if($roo1->availability == '0') echo 'Not Available';
                  else  echo 'Available' 
                ?>
              </td>
            </tr>
          @endforeach       
      </tbody>
  </table>

<?php } 
  $room2 = App\Room::all();
  foreach($room2 as $room) {
    $room->availability = 1;
    $room->save();
  }
?>

@endsection