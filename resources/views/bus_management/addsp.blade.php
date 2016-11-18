@extends('layout')
@section('bus_content')
        <nav>
          <div class="nav-wrapper">
          <span style="margin-left: 50px">
              <a href="/bus_management/home" class="brand-logo"><i class="material-icons">directions_bus</i>HOME</a>
          </span>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                  <!-- <li><a href="/schedule"><i class="material-icons left">schedule</i>TODAY'S SCHEDULE</a></li>
                  <li><a href="/booknow"><i class="material-icons left">today</i>BOOK NOW</a></li> -->
                  <li><a href="#"><i class="material-icons left">account_box</i>ADMIN</a></li>
                    <!-- <li><a href="/booknow"><i class="material-icons left">place</i>TRACK BUS</a></li> -->
              </ul>
        </div> 
        </nav> <br> <br> <br>
        <center><h4 class="col s12 m4 offset-m4">ADD BUSES</h4></center>
        <form method="POST" action="{{route('bus_management/adding')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-field col s8">
            <input id="last_name" name="bus_id" type="number" class="validate">
            <label for="last_name">Bus ID</label>
        </div>

        <div class="input-field col s8">
            <input id="last_name" name="status" type="number" class="validate">
            <label for="last_name">Status</label>
        </div>

        <div class="input-field col s8">
            <input id="last_name"  name="capacity" type="number" class="validate">
            <label for="last_name">Capacity</label>
        </div>

        <div class="input-field col s8">
            <input id="last_name"  name="ticket_price" type="number" class="validate">
            <label for="last_name">Ticket Price</label>
        </div>

        <div class="input-field col s8">
            <input placeholder="time"  name="timing" id="first_name" type="time" class="validate">
            <label for="first_name"></label> 
        </div>

        <div class="input-field col s8">
            <input id="last_name" name="source" type="text" class="validate">
            <label for="last_name">Source</label>
        </div>

        <div class="input-field col s8">
            <input id="last_name"  name="destination" type="text" class="validate">
            <label for="last_name">Destination</label>
        </div>
        <center><div class="input-field col s6"><input type="submit" class="waves-effect btn" value="ADD"></div></center>
        <input type = "hidden" name = "_token" value = "{{{ csrf_token() }}}"  >
        </form>
@stop