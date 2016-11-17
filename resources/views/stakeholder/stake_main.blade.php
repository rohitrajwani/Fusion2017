@extends('layout')


@section('VH_nav')

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

 @if($alert = Session::get('message'))
            <script type="text/javascript">alert("{{$alert}}");</script>
        @endif 


   

      
        <h4 class="col s12 m4 offset-m4" style="border: transparent;">Visitor Hostel Booking</h4>

      <div class="row">
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{URL::asset('/vh1.jpg')}}">
                        </div>
                        <div class="card-content">
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{URL::asset('/vh2.jpg')}}">
                        </div>
                        <div class="card-content">
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{URL::asset('/vh3.jpg')}}">
                        </div>
                        <div class="card-content">
                            <p></p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="container">

                <div class="col s12 m12 l10 offset-l1">Housed in an imposing triple storied building and located at a central place, Visitors’ Hostel provides boarding and loading facilities for the Institutes guests, newly appointed faculty and staff members, delegates and participations attending various conferences, seminars, symposia and workshops. Visitors’ Hostel has some allied facilities on the campus.<br><br>
                The Visitors’ Hostel and allied facilities are operated as a non-profit activity to mainly support the academic and research activity on the campus with a homely atmosphere and ambience, traditionally acclaimed for its environs of hygiene and food of homely relish and richness.
                
                    </div>
                    </div>
                    <div class="divider col s12"></div>
                    
                

</div>

                   


          

@endsection