<!DOCTYPE html> 
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        
        <!-- <link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css"> -->
          <link href="fonts/materialfont/material-icons.css" rel="stylesheet">

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
              <!-- <a href="/home" class="brand-logo"><i class="material-icons">directions_bus</i>HOME</a> -->
          </span>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
              <!-- 
                  <li><a href="/schedule"><i class="material-icons left">schedule</i>TODAY'S SCHEDULE</a></li> -->
                  <li><a href="#"><i class="material-icons left">account_box</i>ADMIN</a></li>
                    <!-- <li><a href="/booknow"><i class="material-icons left">place</i>TRACK BUS</a></li> -->
              </ul>
        </div> 
        </nav> <br> <br> <br>
        <center><h4 class="col s12 m4 offset-m4">ADMIN PAGE</h4></center>
        
        
      <div class="container" style="width:90%"> 
               
                <!-- <div class="section col s12">
        <h5 class="custom col s6">Manage admin</h5>
        <a class="waves-effect btn">Update admin</a>
        <a class="waves-effect btn">Delete admin</a>
        <br>
        <h5 class="custom col s6">Manage employee</h5>
        <a class="waves-effect btn">Update employee</a>
        <a class="waves-effect btn">Delete employee</a>
        <br>
        <h5 class="custom col s6">Post notification</h5>
        <a class="waves-effect btn">Post</a> -->

       <!-- <div class=" col s12 m5 offset-m3"> <br>
            <center><div class="card small">
            <div class="card-image">
                <img src="images/sample.jpg">
                <span class="card-title">Admin</span>
            </div>
            <div class="card-content">
                <p>Update and Delete Admins</p> 
            </div>
            <div class="card-action">
                <a href="#">Manage Admin</a>
            </div>
            </div></center>
        </div> -->
        <div class=" col s12 m6 offset-m3"> 
        <center>
        <h6>
            WELCOME 
        </h6>
        </div>
        </center>
      </div>
      
      <div class="code col s12">
      <table><tr><td><center>
        <h5> 
          Reset the availability of tickets here
        </h5>
        <a class="waves-effect btn" href = "reset">RESET</a>
  </center></td><td>
  <center>
        <h5>
          Delete all the feedback here
        </h5>
        <a class="waves-effect btn" href = "delete">DELETE</a>
       </center> </td></tr></table>
      </div> <br> <br>

      <div class="code col s12">
      <h5>Post Notifications :</h5>
      <form method="POST" action="/post_not">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-field col s6"> 
              <textarea name="notification" class="materialize-textarea" required="true"></textarea>
        </div><br>
              <input  type="submit" class="waves-effect btn"></input>
              <input type = "hidden" name = "_token" value = "{{{ csrf_token() }}}"  >
      </form> 
      </div>

      <div class="code col s12">
      <center>
        <h5>
          Update and edit special buses
        </h5>
        <a class="waves-effect btn" href = "addsp">ADD</a>
        <a class="waves-effect btn" href = "delsp">DELETE</a>
      </center>
      </div>

      </div>

      <div class = "main-container">
      <center><h5><b>
        All feedbacks here 
      </b></h5></center><hr>
      <table class = "bordered highlight">
      @foreach($feed as $feedback)
      <tr><td>{{$feedback->feedback_id}}</td>
      <td>{{$feedback->description}}</td>
      </tr>
      @endforeach
      </table>

      </div>

      </body>
  </html>
