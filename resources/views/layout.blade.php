<!DOCTYPE html>
<<<<<<< HEAD
  <html>
    <head>
        
        <title>Fusion</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 

        {!! MaterializeCSS::include_full() !!}
        <script src="https://use.fontawesome.com/5fd0aa1ca7.js"></script>
        
        <link href="/css/fusion_style.css" type="text/css" rel="stylesheet">
        
        <link href="/css/style.css" type="text/css" rel="stylesheet">
	      <link href="/css/tt_style.css" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/hostel_complaint_style.css') }}" type="text/css" rel="stylesheet">

        

        <script src="/js/jspdf.debug.js"></script>
        <script src="/js/jspdf.plugin.autotable.js"></script>
        
                
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
        </script>

    </head>

    <body>
        @if($alert = Session::get('alert'))
            <script type="text/javascript">alert("{{$alert}}");</script>
        @endif
        
        <header>

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
        	@yield('TT_content')
            @yield('VH_nav')
            @yield('VH_content')
            @yield('hostel_complaint_content')

        </div>

        @yield('scripts')

    </body>
  </html>