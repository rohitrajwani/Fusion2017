<!DOCTYPE html> 
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        
        <!-- <link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css"> -->
          <link href="fonts/materialfont/material-icons.css" rel="stylesheet">

          <script src="js/jquery-3.1.1.min.js"></script>

          <script type="text/javascript" src="js/materialize.min.js"></script>

          <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        
          <link href="css/fusion_style.css" type="text/css" rel="stylesheet">
        
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
                <li><a href="#!" class="waves-effect">Bus management</a></li>
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
                  <!-- <li><a href="/schedule"><i class="material-icons left">schedule</i>TODAY'S SCHEDULE</a></li>
                  <li><a href="/booknow"><i class="material-icons left">today</i>BOOK NOW</a></li> -->
                  <li><a href="#"><i class="material-icons left">account_box</i>ADMIN</a></li>
                    <!-- <li><a href="/booknow"><i class="material-icons left">place</i>TRACK BUS</a></li> -->
              </ul>
        </div> 
        </nav> <br> <br> <br>
        <center><h4 class="col s12 m4 offset-m4">ADD BUSES</h4></center>
        <form method="POST" action="{{route('adding')}}">
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
</div>
        