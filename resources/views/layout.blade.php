<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <script src="/js/jquery-3.1.1.min.js"></script>
        {!! MaterializeCSS::include_full() !!}

        

        <script src="https://use.fontawesome.com/5fd0aa1ca7.js"></script>
        
        <link href="/css/stylemain.css" rel="stylesheet">
        <link href="/css/fusion_style.css" type="text/css" rel="stylesheet">
        <link href="/css/style.css" type="text/css" rel="stylesheet">

        <link href="/css/tt_style.css" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/hostel_complaint_style.css') }}" type="text/css" rel="stylesheet">
        <link href="/css/pbi_style.css" type="text/css" rel="stylesheet">
        <link href="/css/SPACS_style.css" type="text/css" rel="stylesheet">
        

        <script src="/js/jspdf.debug.js"></script>
        <script src="/js/jspdf.plugin.autotable.js"></script>
        <script src="/js/tokenizer.js"></script>
        <script src="/js/studentForm.js"></script>
        

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
            <nav>
                <div class="nav-wrapper">
                  <a href="/dashboard" class="brand-logo">Fusion</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul class="right hide-on-med-and-down">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="/logout">Logout</a></li>
                  </ul>
                </div>
            </nav>
        </header>
            @include('sidebar')

        <div class="main-container row">
            @yield('signup_form')
            @yield('content')
            @yield('TT_content')
            @yield('VH_nav')
            @yield('VH_content')
            @yield('hostel_complaint_content')
            @yield('assignments_content')
            @yield('main_content')
            @yield('SPACS_content')
            @yield('mess_content')
            @yield('acad_content')
            @yield('bus_content')
            @yield('counselling_content')
            @yield('online_quiz_content')
            @yield('placement_content')
            @yield('health_center_content')
            @yield('cms_content')
            @yield('stock_content')
            @yield('feedback_content')
        </div>

        @yield('scripts')
        
        <script>
            $(document).ready(function() {
                $('.modal-trigger').leanModal();
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
        </script>
    </body>
  </html>
