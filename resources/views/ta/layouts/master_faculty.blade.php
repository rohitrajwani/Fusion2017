<html>
    <head>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        {!! MaterializeCSS::include_full() !!}
        <link type="text/css" rel="stylesheet" href="./css/fusion_style.min.css"  media="screen,projection"/>
        <link rel="stylesheet" href="./font-awesome-4.5.0/css/font-awesome.min.css">
       
       
    <style>
    body
        {
            padding: 0;
            margin: 0;
        }
    table,tr,th,td
        {
            border: 1px solid grey;
        }
   #intro
        {
            border: 1px solid grey;
            padding:5px;
        }
    </style>
    </head>
    <body>
   
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!"></a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>
<nav class="mynav blue">
  <div class="nav-wrapper">
    <ul>
      <li><a href="./faculty">Home</a></li>
      <li><a href="#">Components</a></li>
      <!-- Dropdown Trigger -->
      <li>
          <a class="dropdown-button" href="#!" data-activates="dropdown1">
              Dropdown
              <i class="fa fa-arrow-down right"></i>
          </a>
      </li>
    </ul>
  </div>
</nav>
        <br>
         <div class="container">
        <div class="">
                
        </div>
        @yield('intro')

        <div class="row ">
            <div class="col s12 l3 m6">
                    <a class="waves-effect waves-light btn" style="width:90%" href="./ta_apply_form_faculty">TA APPLICATION</a>        
            </div>
            <div class="col s12 l3 m6">
                    <a class="waves-effect waves-light btn" style="width:90%" href="./ta_assist_form_faculty">ASSISTANSHIP</a>        
            </div>
            <div class="col s12 l3 m6">
                    <a class="waves-effect waves-light btn" style="width:90%">ATTENDANCE</a>        
            </div>
            <div class="col s12 l3 m6">
                    <a class="waves-effect waves-light btn" style="width:90%" href="https://mail.google.com" target="_blank">MAIL</a>        
            </div>
        </div>
        @yield('timetable')
        @yield('cards')
     </div>
        
        
        
        <script>
              $(document).ready(function(){
                  $('.modal-trigger').leanModal();
            })
        </script>
    </body>
</html>