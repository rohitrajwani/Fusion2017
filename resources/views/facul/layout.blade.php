<!DOCTYPE html>
<html>

<head>
	<title>Fusion - UI Documentation</title>
	<!--Import Google Icon Font-->
	<<!-- link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	 <link href="fonts/materialfont/material-icons.css" rel="stylesheet"/>
	<!--Import materialize.css-->
	<link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" />
	<link href="css/fusion_style.min.css" type="text/css" rel="stylesheet">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" /> </head>

<body>

	@yield('modal')
	
	<header>
		<nav>
			<div class="nav-wrapper"> <a href="#!" class="brand-logo">Fusion</a> <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="#">Change Password</a>
					</li>
					<li><a href="/logout">Logout</a>
					</li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="#">Link</a>
					</li>
					<li><a href="#">Link</a>
					</li>
					<li><a href="#">Link</a>
					</li>
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
		
			
		</ul> -->
	</div>
	<div class="main-container row" style="background: none; border: none;">
		
		<div class="col s12 m10 l8 offset-l1 offset-s1 offset-m1">
		<br>
			<div class="card-panel blue-grey lighten-5 z-depth-5">
			
				
				
				
				
				@yield('content')   
				
				
				
				
				
		</div>
		

	</div> 	
</div>

	@yield('script')

</body>

</html>