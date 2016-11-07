<!DOCTYPE HTML>

<html>
	<head>
		<title>Student Gymkhana</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/materialize.min.css" />		
		<link rel="stylesheet" href="assets/css/fusion_style.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/css/materialize.min.css">	
		-->
		
			
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
			<div class="Col s12 m8 offset-m2 l6 offset-l3 center">
				<h2> Student Gymkhana System </h2>
				
				<h4> Select Your Role </h4>
			</div>

			<div class="input-field col s12  m6 offset-m3 l4 offset-l4 center">

			<form method="post" action="studentgymkhana/role">	
					<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />			
				    <select name="roleis" >
				      <option value="" disabled selected>Choose your option</option>
				      <option  value="student">Student</option>
				      <option  value="co">Club Coordinator</option>
				      <option  value="coco">Club Co-Coordinator</option>
				      <option  value="faculty">Faculty</option>
				      <option  value="convener">Student Convener</option>
				      <option  value="election">Election Controller</option>
				      <option  value="cultural">Cultural Council Convener</option>
				      <option  value="technical">Technical Council Convener</option>				     
				      <option  value="sports">Sports Council Convener</option>
				      <option  value="dean">Dean Student</option>
					</select>
    				<label>Role</label>
  				</br>
  				<button class="btn waves-effect waves-light" type="submit" name="action"  >Submit<i class="material-icons right"></i>
				</button>
				
  			</form>
  			<div class="Col s12 m4 offset-m4 l4 offset-l4 center">
  					@if(Session::has('message'))
  						<p style="color:red;"> {{ Session::get('message') }}</p>
  					@endif
  			</div>
  			
			</div>
  			
		</div>
		<!-- Scripts -->

			
		<script src="assets/js/jquery-2.1.3.min.js"></script> 
		<script src="assets/js/materialize.min.js"></script>
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/js/materialize.min.js"></script> -->
		<script src="assets/js/main.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->

	</body>
</html>