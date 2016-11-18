<!DOCTYPE html>
  <html>
    <head>
        
        <title>Welcome to CC-Complaint|IIITDM Fusion</title>    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        {!!MaterializeCSS::include_full()!!}
        <!-- <link rel="stylesheet" href="cc/asset/css/materialize.min.css"> -->
        <link rel="stylesheet" href="/css/fusion_style.css">
        
         <link rel="stylesheet" href="/css/style.css">
        <!--shortcut icon on tab-->
        
        @stack('css')
        @stack('admin_css')
        <!--Let browser know website is optimized for mobile-->

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
                    <li><a href="#">Link</a></li>
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
            <!--For Admin -->
            
                    @yield('admin_header')
                
               
                    @yield('header')
              
                    </div>
            
        
      

         <!-- <script type="text/javascript" src="cc/asset/js/jquery.js"></script>
        <script src="cc/asset/js/jquery.min.js"></script>
        <script type="text/javascript" src="cc/asset/js/materialize.min.js"></script> -->
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
        </script>
        @stack('js')
        @stack('admin_js')
    </body>
  </html>