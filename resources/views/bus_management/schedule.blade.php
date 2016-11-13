@extends('layout')
@section('content')
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
         </nav
         <br> <br> <br>
            <center><h4 class="col s12 m4 offset-m4">TODAY'S SCHEDULE</h4></center>
      <h6 align="center" class="custom col s12"><b>
      <?php
            echo "". date("d.m.Y") . "  ";
            echo "". date("l");
      ?></b></h6>
            <div class="container" style="width:90%">
               
                <div class="section col s12">
                    <table class="bordered highlight">
                       <thead>
      <tr>
          <th>Time</th>
          <th>Source</th>
          <th>Destination</th>
          <th>Availabilty</th>
          <th>Fare(rs)</th>
      </tr>
    </thead>
    <tbody>
    @foreach($schedule as $sch)
      <tr>
        <td>{{ $sch->timestamp}}</td>
        <td>{{ $sch->source }}</td>
        <td>{{ $sch->destination }}</td>
        <td>
        @foreach($fare as $f)
        @if ($f->bus_id == $sch->bus_id)
        {{$f->capacity}}
        @endif
        @endforeach

        </td>
        <td>{{$f->ticket_price}}</td>
      </tr>
    @endforeach
      
    </tbody> 
</table> 
<br>
<br>

    <div>
      <h5><b>Enter your valuable feedback here</b></h5>
      <form method="POST" action="/bus_management/schedule/achadd">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-field col s6">
              <textarea name="description" class="materialize-textarea" required="true"></textarea>
        </div><br>
              <input  type="submit" class="waves-effect btn"></input>
              <input type = "hidden" name = "_token" value = "{{{ csrf_token() }}}"  >
      </form>

      <div class = "main-container">
      <center><h5><b>
        All notifications here 
      </b></h5></center><hr>
      <table class = "bordered highlight">
        @foreach($not as $n)
          <tr> 
          <td>{{$n->notification}}</td></tr>
          @endforeach
      </table>

      </div>


@stop