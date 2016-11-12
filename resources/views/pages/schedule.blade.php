<!DOCTYPE html>
  <html> 
    <head> 
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        <!-- 
        <link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css"> -->

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
                    <li><a href="/booknow"><i class="material-icons left">today</i>BOOK NOW</a></li><!-- 
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
        @foreach($fare as $f)
        @if ($f->bus_id == $sch->bus_id)
        <td>
        
        
        {{$f->capacity}}
        
        

        </td>
        <td>{{$f->ticket_price}}</td>
        @endif
        @endforeach
      </tr>
    @endforeach
      
    </tbody> 
</table> 
<br>
<br>

    <div>
      <h5><b>Enter your valuable feedback here</b></h5>
      <form method="POST" action="/schedule/achadd">
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


          </div>       
</html> 