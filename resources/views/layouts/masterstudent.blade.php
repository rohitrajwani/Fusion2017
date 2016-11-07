
<!DOCTYPE html>
  <html>
    <head>
        
        <title>@yield('title')</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/design.css">
        
        <link type="text/css" rel="stylesheet" href="{{ URL::to('src/css/materialize.min.css') }}"  media="screen,projection"/>
        
        <link href="{{ URL::to('src/css/fusion_style.min.css') }}" type="text/css" rel="stylesheet">
        
        <link href="{{ URL::to('src/css/style.css') }}" type="text/css" rel="stylesheet">
		
		<link href="{{ URL::to('src/css/design.css') }}" type="text/css" rel="stylesheet">

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
            @include('includes.headerstudent')
			@yield('content')
			@yield('addinstructor')
			@yield('addstudent')
		</div>
        
        <script src="http://localhost:8000/js/jquery-3.1.1.min.js"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="http://localhost:8000/js/materialize.min.js"></script>
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
    </body>
  </html>
