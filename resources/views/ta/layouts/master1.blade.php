
<!DOCTYPE html>
  <html>
    <head>
        
        <title>@yield('title')</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
         {!! MaterializeCSS::include_full() !!}
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/> -->
        <link type="text/css" rel="stylesheet" href="/css/fusion_style.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"  media="screen,projection"/>
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"> 
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style type="text/css">
            #para,#para1,#para2 {
            display: block;
            margin-top: 1em;
            margin-bottom: 1em;
            margin-left: 0;
            margin-right: 0;
            border-radius: 10px;
                        }

            @media only screen and (max-width: 1000px)
            {
                .main-container{
                        margin: 55px 10px 10px 10px;
                        height: auto;
                        background-color: white;
                        border: 1px solid rgba(128, 128, 128, 0.22);
                        box-shadow: 0 0 3px rgba(0,0,0,0.1);
                            }

            }
        @media only screen and (max-width: 550px)
            {
                .main-container{
                        margin: 55px 10px 10px 5px;
                        height: auto;
                        background-color: white;
                        border: 1px solid rgba(128, 128, 128, 0.22);
                        box-shadow: 0 0 3px rgba(0,0,0,0.1);
                            }
                
            }
        </style>
    </head>

    <body >
        
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
            @yield('links')
            <h4 class="col s12 m12 blue-text l12 center" style="margin-top: 2%">@yield('main_heading')</h4>
            <div class="container col s12" style="width:100%">
                
                @yield('body')
                
            </div>
        </div>

       
        <script>
            $(document).ready(function() {
                $(".dropdown-button").dropdown();
                $('ul.tabs').tabs();
				$('select').material_select();
            });
        </script>
        @yield('footer')
    </body>
  </html>