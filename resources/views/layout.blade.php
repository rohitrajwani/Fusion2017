<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        
        {!! MaterializeCSS::include_full() !!}
        
        <!-- <link rel="stylesheet" href="{{asset("fonts/font-awesome-4.6.3/css/font-awesome.min.css")}}">
        
        <link type="text/css" rel="stylesheet" href="{{asset("css/materialize.min.css")}}"  media="screen,projection"/> -->
        
        <link href="{{asset("css/fusion_style.css")}}" type="text/css" rel="stylesheet">
        
        <link href="{{asset("css/style.css")}}" type="text/css" rel="stylesheet">

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

            <!-- <h4 class="col s12 m4 offset-m4">Visitor Hostel Booking</h4> -->
            
            @yield('nav')
            @yield('content')

        </div>

         <script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="{{asset("js/materialize.min.js")}}"></script>

        @yield('scripts')

    </body>
  </html>