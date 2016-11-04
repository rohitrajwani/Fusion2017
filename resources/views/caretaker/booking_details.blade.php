@extends('layout')

@section('nav')
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

@section('content')
<!-- 

  This shows the booking detials to Vh caretaker

  -->

  <div class="row">
    <div class="col s12 m4 offset-m4">
      <h4>Booking Details</h4>
    </div>
  </div>

  <table class="bordered highlight">
      <thead>
        <tr>
            <th>Name</th>
            <th>Purpose Of Visit</th>
            <th>Category</th>
            <th>Organization</th>
            <th>Status</th>
            <th><center>Details</center></th>
        </tr>
      </thead>
      <tbody>
          @foreach($requests as $request)
            <tr>          
            <td>{{ $request->name }}</td>
              <td>{{ $request->purpose_of_visit }}</td>
              <td>{{ $request->category }}</td>
              <td>{{ $request->organization }}</td>
              <td>
                <?php 
                if($request->status == '0') echo 'Action Not Taken';
                elseif($request->status == '1')  echo 'Approved'; 
                elseif($request->status == '2')  echo 'Not Approved'; 
                ?>
              </td>
              <td>
                <form method="POST" action="/{{$request->id}}/viewCT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <center><button type="submit" class="waves-effect btn">View</button></center>                     
                </form>
              </td>
            </tr>
          @endforeach       
      </tbody>
  </table>

@endsection