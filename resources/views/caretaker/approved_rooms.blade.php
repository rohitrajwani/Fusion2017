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

  This section allows the VH caretaker to see all the previous booking History till date.

-->

  @if($alert = Session::get('alert'))
      <script type="text/javascript">alert("{{$alert}}");</script>
  @endif

  <div class="row">
    <div class="col s12 m4 offset-m4">
      <h4>Approved Rooms</h4>
    </div>
  </div>

  <table class="bordered highlight">
      <thead>
        <tr>
            <th>Booking ID</th>
            <th>Name Of Visitor</th>
            <th>Arrival Date</th>
            <th><center>Room</center></th>
        </tr>
      </thead>
      <tbody>
          @foreach($rooms as $room)
            <tr>          
              <td>{{ $room->id }}</td>
              <td>{{ $room->name }}</td>
              <td>{{ $room->arrival_date }}</td>
              <td>
                @if($room->room_no == 'Not Assigned')
                <form method="POST" action="/{{$room->id}}/assignRoom">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <center><button type="submit" class="waves-effect btn">Assign</button></center>                     
                </form>
                @endif
                @if($room->room_no != 'Not Assigned')
                  <center><p>Assigned</p></center>
                @endif                  
              </td>
            </tr>
          @endforeach       
      </tbody>
  </table>

@endsection