@extends('layout')
@section('content')
        <nav>
          <div class="nav-wrapper">
          <span style="margin-left: 50px">
            <a href="/bus_management/home" class="brand-logo"><i class="material-icons">directions_bus</i>HOME</a>
            </span>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/bus_management/schedule"><i class="material-icons left">schedule</i>TODAY'S SCHEDULE</a></li>
                    <li><a href="/bus_management/booknow"><i class="material-icons left">today</i>BOOK NOW</a></li>
                    <li><a href="/bus_management/admin"><i class="material-icons left">account_box</i>ADMIN</a></li>
                    <!--   -->
                </ul>
         </div>
         </nav>
         <br> <br> <br>
            <center><h4 class="col s12 m4 offset-m4">BOOK TICKETS</h4></center>
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
      <th>Select</th>
          <th>Time</th>
          <th>Source</th>
          <th>Destination</th>
          <th>Availabilty</th>
          <th>Fare(rs)</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $num = 0;
    ?>
    <form action="{{route('bus_management/payment')}}" method = "POST">
    @foreach($schedule as $sch)
      <tr>
      <td>
      
      <p>

      @foreach($fare as $f)
        @if ($f->bus_id == $sch->bus_id)

        @if($f->capacity > 0)
    <input name="group1" type="radio" id="test{{$num}}" value = {{$sch->bus_id}} >
    <label for="test{{$num}}"></label>
    @else 
    <input name="group1" type="radio" id="test{{$num}}" disabled value = {{$sch->bus_id}}>
    <label for="test{{$num}}"></label>
    @endif
</p>
      </td>
        <td>{{ $sch->timestamp}}</td>
        <td>{{ $sch->source }}</td>
        <td>{{ $sch->destination }}</td>
        <td>
          
        {{$f->capacity}}
        
        </td>
        <td>{{$f->ticket_price}}</td>
      </tr>
      <?php
      $num++;
      ?>
      @endif
        @endforeach
    @endforeach
      
    </tbody>
</table>
<br>
<center>
<input type="submit" value="PROCEED" class="waves-effect btn" >
<input type = "hidden" name = "_token" value = "{{{ csrf_token() }}}">
</center>
</form>
@stop