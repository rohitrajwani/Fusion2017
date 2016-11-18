@extends('layout')
@section('bus_content')
        <nav>
          <div class="nav-wrapper">
          <span style="margin-left: 50px">
              <a href="/bus_management/home" class="brand-logo"><i class="material-icons">directions_bus</i>HOME</a>
          </span>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                 <!--  <li><a href="/schedule"><i class="material-icons left">schedule</i>TODAY'S SCHEDULE</a></li>
                  <li><a href="/booknow"><i class="material-icons left">today</i>BOOK NOW</a></li> -->
                  <li><a href="#"><i class="material-icons left">account_box</i>ADMIN</a></li>
                    <!-- <li><a href="/booknow"><i class="material-icons left">place</i>TRACK BUS</a></li> -->
              </ul>
        </div> 
        </nav> <br> <br> <br>
        <center><h4 class="col s12 m4 offset-m4">DELETE BUSES</h4></center>

        <form method = "POST" action="{{route('bus_management/delll')}}">
        <div class="input-field col s6">
          <select name="bus_id" required="true">
            <option value="" disabled selected>
              Choose The Bus ID
            </option>
            @foreach($bus as $busid)

            <option value = {{$busid->bus_id}}> {{$busid->bus_id}} </option>

            @endforeach
          </select>
        </div>

        <script>
          $(document).ready(function(){
            $('select').material_select();
          });
          $(document).ready(function(){
            $('select').material_select();
            $(".dropdown-button").dropdown();
          });
        </script>

         <div class="input-field col s6">
         <input type = "submit" value = "Delete" class = "waves-effect btn">
         </div>
        <input type = "hidden" name = "_token" value = "{{{ csrf_token() }}}"></input>
        </form>
@stop