@extends('layout')

@section('VH_nav')
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



@section('VH_content')
<!--
  
  Main page for VH incharge

-->
   

      
        <h4 class="col s12 m4 offset-m4" style="border: transparent;">Admin Portal</h4>

      <div class="row">
               

         <div class="col s12 m8 l6 offset-m3 offset-l2">
        
          
            <div class="col s4 m4 offset-m4">
              <img src="{{URL::asset('/k1.png')}}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
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