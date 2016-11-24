
<html>
    <head>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script src="/js/jquery-3.1.1.min.js"></script>
         {!! MaterializeCSS::include_full() !!}
         
        <!-- <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/> -->
        <link type="text/css" rel="stylesheet" href="/css/fusion_style.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"  media="screen,projection"/>

        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"> 
        <!-- <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"> -->
       
       
    <style>
    body
        {
            padding: 0;
            margin: 0;
                    }
/*    table,tr,th,td
        {
            border: 1px solid grey;
        }*/
   #intro
        {
            border: 1px solid grey;
            padding:5px;
        }
        #para {
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
                .tabf
                {
                    font-size: 11px;
                }
           
                
            }
    </style>
    </head>
    <body class="">   

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
        <div class="">
        <div class="row">
        <div class="col l3">
        @include('sidebar')
        </div>
        </div>
        </div>
<!--     <div class="main-container row">
            <div class="container col s12" style="width:100%">
                 
        </div>
    </div>
  
 -->
        <!-- @yield('intro') -->

    <div class="main-container row">
            
            @yield('links')
            @yield('intro')
            
        <h4 class="col s12 m12 center blue-text" style="margin-top: 2%">@yield('main_heading')</h4>
            <div class="col s12 m12" style="width:100%;margin-top: 1%" >

                @yield('timetable')
                @yield('cards')
            </div>
    </div>
        
        
        <script>
        @yield('script')
                $(document).ready(function(){
                    $('.modal-trigger').leanModal();
                        $('ul.tabs').tabs();
                        $('.datepicker').pickadate({
                            selectMonths: true, // Creates a dropdown to control month
                            selectYears: 15, // Creates a dropdown of 15 years to control year,
                            formatSubmit: 'yyyy-mm-dd',
                            hiddenName: true,
                        });
                        $('select').material_select();
                })
        </script>
    </body>
</html>