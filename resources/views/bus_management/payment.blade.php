@extends('layout')
@section('bus_content')
            <nav>
          <div class="nav-wrapper">
          <span style="margin-left: 50px">
            <a href="/bus_management/home" class="brand-logo"><i class="material-icons">directions_bus</i>HOME</a>
            </span>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/bus_management/schedule"><i class="material-icons left">schedule</i>TODAY'S SCHEDULE</a></li>
                    <li><a href="/bus_management/booknow"><i class="material-icons left">today</i>BOOK NOW</a></li><!-- 
                    <li><a href="/admin"><i class="material-icons left">account_box</i>ADMIN</a></li> -->
                    <!-- <li><a href="/booknow"><i class="material-icons left">place</i>TRACK BUS</a></li> -->
                </ul>
         </div>
         </nav>
         <br> <br>
            <center><h4 class="col s12 m4 offset-m4">PAYMENT RECIEPT</h4></center>
            <br>
		        <div class="container row">
                <div class="section col s8 offset-s2">
                      <table  class="bordered highlight">
                       
                                  <tr>
                                      <th>Receipt no</th>
                                      <td>{{$receipt->booking_id}}</td>         <!--to be taken from database.-->
                                  </tr>
                                  <tr>
                                      <th>Number of tickets</th>
                                      <td>1</td>                <!--to be taken from database.-->
                                  </tr>
                      </table>
    
                </div>
            </div>
@stop
    
