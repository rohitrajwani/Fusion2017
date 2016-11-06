<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link rel="stylesheet" href="/fonts/font-awesome-4.6.3/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/materialize.min.css">
        <link rel="stylesheet" href="/css/fusion_style.css">
        <link rel="stylesheet" href="/css/style.css">

    </head>

    @yield('css')

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
        
        @yield('content')

        <script src="{{URL::asset('js/jquery-3.1.1.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/materialize.min.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
        @yield('js')
        <!-- <script type="text/javascript" src="{{URL::asset('js/studentForm.js')}}"></script> -->
    </body>
</html>
