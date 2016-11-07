<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        
        <link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css"> 

         <link href="fonts/materialfont/material-icons.css" rel="stylesheet">

        
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        
        <link href="css/fusion_style.min.css" type="text/css" rel="stylesheet">
        
        <link href="css/style.css" type="text/css" rel="stylesheet">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        
        <header>
            <nav>
                <div class="nav-wrapper">
                  <a href="#!" class="brand-logo">Fusion</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul class="right hide-on-med-and-down">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="/logout">Logout</a></li>
                  </ul>
                  <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
<li><a href="/logout">Logout</a></li>
                  </ul>
                </div>
            </nav>
        </header>
        
        <div class="sidebar">
            <ul id="slide-out" class="side-nav fixed">
                <li><a href="#!" class="waves-effect">First Link</a></li>
                <li><a href="#!" class="waves-effect">Second Link</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link</a></li>
            </ul>
        </div> 
        
        <div class="main-container row">
        <nav>
          <div class="nav-wrapper">
          <span style="margin-left: 50px">
            <a href="/home" class="brand-logo"><i class="material-icons">directions_bus</i>HOME</a>
            </span>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/schedule"><i class="material-icons left">schedule</i>TODAY'S SCHEDULE</a></li>
                    <li><a href="/booknow"><i class="material-icons left">today</i>BOOK NOW</a></li>
                    <li><a href="/admin"><i class="material-icons left">account_box</i>ADMIN</a></li>
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
    <form action="{{route('payment')}}" method = "POST">
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

                    <!-- <table class="bordered highlight">
                       <thead>
      <tr>
          <th>Time</th> 
          <th>Source</th>
          <th>Destination</th>
      <th>Fare(rs)</th>
      <th>Availabilty</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
    <p>
      <input name="group1" type="radio" id="test1" />
      <label for="test1">3:40</label>
      </p>
      </td>
        <td>College</td>
        <td>City</td>
        <td>10</td>
        <td>30</td>
      </tr>
      <tr>
        <td>

    <p>
      <input name="group1" type="radio" id="test2" />
      <label for="test2">5:15</label>
    </p>
  </td>
        <td>College</td>
        <td>City</td>
        <td>10</td>
        <td>30</td>
      </tr>
      <tr>
        <td>
    <p>
      <input name="group1" type="radio" id="test3" />
      <label for="test3">5:45</label>
    </p>
</td>
        <td>College</td>
        <td>City</td>
        <td>10</td>
        <td>30</td>
      </tr>
      <tr>
        <td>
    <p>
      <input name="group1" type="radio" id="test4" />
      <label for="test4">6:45</label>
    </p>
</td>
        <td>City</td>
        <td>College</td>
        <td>10</td>
        <td>30</td>
      </tr>
      <tr>
        <td>
    <p>
      <input name="group1" type="radio" id="test5" />
      <label for="test5">7:50</label>
    </p>
    </td>
        <td>City</td>
        <td>College</td>
        <td>10</td>
        <td>30</td>
      </tr>
     <tr>
        <td>
    <p>
      <input name="group1" type="radio" id="test6" />
      <label for="test6">9:15</label>
    </p>
    </td>
        <td>City</td>
        <td>College</td>
        <td>10</td>
        <td>30</td>
      </tr>
    </tbody>
</table> -->
<br>
<br>      
</html> 