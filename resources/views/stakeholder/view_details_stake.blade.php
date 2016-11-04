@extends('layout')

@section('nav')
 <nav class="mynav">
  <div class="nav-wrapper">
    <ul>
      <li><a href="/vhbooking/requestForm">Book Room</a></li>
      <li><a href="/vhbooking/cancelRoom">Cancel Room</a></li>
          <li><a href="/vhbooking/bookingHistory">Booking History</a></li>
            <li><a href="/vhbooking/rules">Rules&Regulations</a></li>
      <!-- Dropdown Trigger -->
     
    </ul>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/vhbooking">Home</a></li>

        </ul>
  </div>
</nav>

@endsection

@section('content')

   

      
        <center><h4 class="col s12 m4 offset-m4" style="border: transparent;">Details</h4><center>

        
        <div class="container">
        <table class="bordered highlight">          
         <div class="row">

            <tr>
              <th>
                <div class="col s3">Booking ID:</div>
                <div class="col s9">{{$booking->id}}</div>
              </th>              
            </tr>

            <tr>
              <th>
                <div class="col s3">Name:</div>
                <div class="col s9">{{$booking->name}}</div>
              </th>              
            </tr>


            <tr>
              <th>
                <div class="col s3">Organization:</div>
                <div class="col s9">{{$booking->organization}}</div>
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Address:</div>
                <div class="col s9">{{$booking->address}}</div>
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Purpose Of Visit:</div>
                <div class="col s9">{{$booking->purpose_of_visit}}</div>
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Nationality:</div>
                <div class="col s9">{{$booking->nationality}}</div>
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Room No:</div>
                <?php $bookRooms = App\bookRooms::where('booking_id',$booking->id)->get(); ?>
                @foreach($bookRooms as $bookRoom)
                  <div class="col s9"><pre>{{$bookRoom->room_no}}  </pre></div>
                @endforeach
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Phone No:</div>
                <div class="col s9">{{$booking->phone_no}}</div>
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Email:</div>
                <div class="col s9">{{$booking->email_id}}</div>
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Number Of Persons:</div>
                <div class="col s9">{{$booking->no_of_persons}}</div>
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Number Of Rooms:</div>
                <div class="col s9">{{$booking->no_of_rooms}}</div>
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Category:</div>
                <div class="col s9">{{$booking->category}}</div>
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Arrival Details:</div>
                <div class="col s3"><?php echo'On   ',$booking->arrival_date?></div>
                <div class="col s3"><?php echo'At   ',$booking->arrival_time?></div>
              </th>            
            </tr>

            <tr>
              <th>
                <div class="col s3">Departure Details:</div>
                <div class="col s3"><?php echo'On   ',$booking->departure_date?></div>
                <div class="col s3"><?php echo'At   ',$booking->departure_time?></div>
              </th>            
            </tr> 
      </table>
    </div>

@endsection