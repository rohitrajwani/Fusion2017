@extends('layout')

@section('nav')
<!--
     nav bar including various functionality avail to the stakeholder

     1.Book Room directs to request form
     2.cancel Room directs to Cancel reservation form
     3.Booking History Shows the previous booking history
     4.Rules and regulation shows the Rules and regulations of VH 
     5.Home button will take us back to Home page

 -->
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
<!--

    follwing section builds the VH request form 
    Will ask for name,organization,address and other attributes require to book a room in VH
    Following Details will be saved in booking table which will then pass on to Vh incharge for confermation of booking

-->

<div class="row">
                <div class="col s12 m7 offset-m3">
                    <h5>Requisition Form for <b>Booking</b> of Accommodation</h5>
                </div>
</div>

<div class="container">
			
            <div class="row">
                <div class="col s12 m6">
                    <h5>Visitor And Booking Details : </h5>
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

          <form class="s12" method="POST" action="{{ url('/addRequest') }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="row">
                    <div class="input-field col s6">
                        <input name="nam" id="name" type="text" class="validate">
                        <label for="name">Name</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="org" id="organization" type="text" class="validate">
                        <label for="organization">Organization</label>
                    </div> 

                    <div class="input-field col s12">
                        <textarea name="add" id="address" class="materialize-textarea"></textarea>
                        <label for="address">Address</label>
                    </div>

                    <div class="input-field col s12">
                        <input name="visit" id="purpose" type="text" class="validate">
                        <label for="purpose">Purpose of Visit</label>
                    </div> 

                    <div class="input-field col s4">
                        <input name="nation" id="nationality" type="text" class="validate">
                        <label for="nationality">Nationality</label>
                    </div> 

                    <div class="input-field col s4">
                        <input name="no" id="phone" type="text" class="validate">
                        <label for="phone">Phone</label>
                    </div> 

                    <div class="input-field col s4">
                        <input name="mail" id="email" type="text" class="validate">
                        <label for="email">Email ID</label>
                    </div> 
                
                    <div class="divider col s12"></div>

                                <!--Dropdown-->
                    <div class="input-field col s4">
                        <select name="persons">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <label>Number Of Persons</label>
                    </div>                

                    <div class="input-field col s4">
                        <input name="rooms" id="no_of_rooms" type="text" class="validate">
                        <label for="no_of_rooms">Number of Rooms</label>
                    </div>  

                    <div class="input-field col s4">
                        <select name="category">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <label>Visitor Category</label>
                    </div> 

                    <div class="divider col s12"></div>

                    <div class="col s12 m4">
                        <h6>Arrival Details - </h6>
                    </div>
                    <div class="col s12 m4">
                        <label for="arr_date">Arrival Date</label>
                        <input name="arrival_date" id="arr_date" type="date" >                        
                    </div>
                    <div class="col s12 m4">
                        <label for="arr_time">Time</label>
                        <input name="arrival_time" id="arr_time" class="timepicker" type="time">
                    </div>

                    <div class="col s12 m4">
                        <h6>Departure Details - </h6>
                    </div>
                    <div class="col s12 m4">
                        <label for="der_date">Departure Date</label>
                        <input name="dep_date" id="der_date" type="date">                        
                    </div>
                    <div class="col s12 m4">
                        <label for="der_time">Time</label>
                        <input name="dep_time" id="der_time" class="timepicker" type="time">
                    </div>

                </div>

                <div class="divider col s12"></div>

                <div class="row">
                    <div class="col s3">
                        <p><b>Bill To Be Settled By : </b></p>
                    </div>              
                    <div class="col s3">                     
                        <p>
                            <input name="bill" type="radio" id="one" value="Visitor"/>
                            <label for="one">Visitor</label>
                        </p>
                    </div>
                    <div class="col s3">
                        <p>
                            <input name="bill" type="radio" id="two" value="Intender"/>
                            <label for="two">Intender</label>
                        </p>
                    </div>
                    <div class="col s3">
                        <p>
                            <input name="bill" type="radio" id="three" value="Institute/No Charges"/>
                            <label for="three">Institute/No Charges</label>
                        </p>
                    </div>
                </div>

                <div class="row>">
                    <div class="col s3">
                        <h6><b>Food : </b></h6>               
                    </div>    
                    <div class="col s3">
                        <p>
                            <input name="food" type="radio" id="1" value="1"/>
                            <label for="1">Yes</label>
                        </p>
                    </div>
                    <div class="col s3">
                        <p>
                            <input name="food" type="radio" id="2" value="0"/>
                            <label for="2">No</label>
                        </p>                        
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

@section('scripts')

    <script>

        $(document).ready(function() {
            $('select').material_select();
            $("dropdown-button").dropdown();
          });

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

          $('#timepicker').pickatime({
            autoclose: false,
            twelvehour: false
          });


    </script>

@endsection