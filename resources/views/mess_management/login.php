<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        
        <link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css">
        
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
				    <li><a href="1.php">Home</a></li>
                    
                    <li><a href="#">Feedback</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                  <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
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
            <h4 class="col s12 m4 offset-m4"><b>CENTRAL MESS</b></h4>
                            
                
            
                
                    
        
                <div class="section col s12">
				<form method="POST" action="/login">
					 <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    
                    <h5 class="custom col s12">Login</h5>
                    
                    <div class="input-field col s6">
                          <input id="last_name" type="email" class="validate" name="email">
                          <label for="last_name">Email id</label>
                    </div></br>
					<div class="input-field col s6">
                          <input id="last_name" type="password" class="validate" name="password">
                          <label for="last_name">Password</label>
                    </div></br>
					</div>
					<div class="section col s12">
                    
                    
                     <button type="submit" class="waves-effect btn col" name="login">LOGIN</button>
                    
                </div>
                    </form>
					
                    
                    
                    
                    
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
    </body>
  </html>