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

  Using this section Vh caretaker can allot rooms according to arrival and departure date
  the last query will generate the available rooms according to arrival and departure date
  which caretaker can finally assign to a booking_id and mail the corresponding response to the intender of the following booking

-->

  

  <center><h4 class="col s12 m4 offset-m4" style="border: transparent;">Details</h4><center>

        
        <div class="container">
          <table class="bordered highlight">          
             <div class="row">

                <tr>
                  <th>
                    <div class="col s3">Number Of Rooms:</div>
                    <div class="col s9">{{$room->no_of_rooms}}</div>
                  </th>              
                </tr>


                <tr>
                  <th>
                    <div class="col s3">Arrival Date:</div>
                    <div class="col s9">{{$room->arrival_date}}</div>
                  </th>            
                </tr>

                <tr>
                  <th>
                    <div class="col s3">Departure Date:</div>
                    <div class="col s9">{{$room->departure_date}}</div>
                  </th>            
                </tr>

             </div>
          </table> 

          
            
            <?php

              $booked = App\Book::where( function ($q) use($room) {
                                      $q->where( function ($query) use($room) {
                                            $query->where('arrival_date','<=',$room->arrival_date)
                                                  ->where('departure_date','>=',$room->arrival_date)
                                                  ->Where('departure_date','<=',$room->departure_date);
                                           })
                                        ->orWhere( function ($query) use($room) {
                                            $query->where('arrival_date','>=',$room->arrival_date)
                                                  ->where('arrival_date','<=',$room->departure_date)
                                                  ->Where('departure_date','>=',$room->departure_date);
                                        });
                                    })              
                                ->where('room_no','!=','Not Assigned')
                                ->where('status','=',1)->get(['id']);

              

              $rooms = App\Room::all();

              $bookRooms = App\bookRooms::all(); 
              

              //$rooms = App\Room::where('room_no','!=',$booked->room_no)->get();
              //echo $rooms;

            ?>


            
           </br></br>

          <div class="row">
              <div class="col s6">
                  <h5>Rooms Already Booked</h5>
              </div>

              <div class="col s6">
                  <h5>Rooms List</h5>
              </div>
          </div>

          <div class="row">

            <div class="col s6 container">
                @foreach($booked as $book)
                  @foreach($bookRooms as $bookRoom)
                    <?php if($book->id == $bookRoom->booking_id) { ?>
                      <div class="col s6 offset-s2">
                          <h6>{{$bookRoom->room_no}}</h6>
                      </div>
                    <?php } ?>
                  @endforeach
                @endforeach
            </div>

            <div class="col s6 container" >
              @foreach($rooms as $list)
                      <div class="col s4 offset-s2">
                          <h6>{{$list->room_no}}</h6>
                      </div>
                      <div class="col s4 offset-s2">
                          <h6>{{$list->room_type}}</h6>
                      </div>
               @endforeach
            </div>
           </div> 

          </br>

       @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                 
                      <li><h6 style="color: red">{{ $error }}*</h6></li>
                     
                  @endforeach
              </ul>
          </div>
      @endif


            <form method="POST" action="/{{$room->id}}/assign">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="row">

                @for($x = 1 ; $x <= $room->no_of_rooms ; $x++)
                  <div class="input-field col s6">
                        <input name="Room[]" id="{{$x}}" type="text" class="validate">
                        <label for="{{$x}}">Enter Room {{$x}}</label>
                  </div>
                @endfor  

                <div class="col s4 offset-s4">
                    <button type="submit" class="waves-effect btn">Assign</button>
                </div>
              </div>
            </form> 

@endsection     