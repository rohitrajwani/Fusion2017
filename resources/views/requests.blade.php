<!DOCTYPE html>
<html lang="en">
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

        <title>Requests</title>

    

        <!-- Fonts -->
<link rel="stylesheet" href="css/font-awesome.min.css">
        
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection">
        
        <link href="css/fusion_style.min.css" type="text/css" rel="stylesheet">
        
        <link href="css/style.css" type="text/css" rel="stylesheet">
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
                <!-- Styles -->
            
    </head>
    <body>
        <header>
<nav>

    <div class="nav-wrapper">
                   <a href="/" class="brand-logo">Fusion</a>
</div>
</nav>
</header>
            <div class="sidebar">
            <ul id="slide-out" class="side-nav fixed">
                <li><a href = "/#">Link 1</a></li>
                <li><a href = "/#">Link 2</a></li>
                <li><a href = "/#">Link 3</a></li>
            </ul>
        </div>

<div class = "main-container">

<!-- Dropdown Structure -->

<nav class="mynav">
  <div class="nav-wrapper">
    <ul>
    <li><a href = "/stockhome">Home</a></li>
    <ul>
      
      <li><a class="dropdown-button" data-activates="dropdown2">Request Stock</a><i class="fa fa-arrow-down right"></i></li>
      <ul id="dropdown2" class="dropdown-content">
  <li><a href="/requests">Submit Request</a></li>
  <li><a href="/checkreq">Check Requests</a></li>
  
  </ul>
    @if($ut == "others")
     <li><a href="/view">View Stock</a></li>
      <!-- Dropdown Trigger -->
      <li>
          <a class="dropdown-button" data-activates="dropdown1">Update Stock <i class="fa fa-arrow-down right"></i></a>
      </li>
          </ul>

      <ul id="dropdown1" class="dropdown-content">
  <li><a href="/new">New Item</a></li>
  <li><a href="/existing">Existing Item</a></li>
  </ul>
    <script>
            $(document).ready(function() {
                $(".dropdown-button").dropdown();
            });
        </script>
        @endif
        </div>
</nav>

<br>
<form method = "POST" action = "{{route('addreq')}}">

<div class="input-field col s6">
    <select name = "req_to" required = "true">
        <option value="" disabled selected>Request the faculty</option>
        @foreach($prof as $reqto)
        
          <option value = {{$reqto->faculty_id}} >{{$reqto->name}}</option>  

        @endforeach
        
        
    </select>
    </div>

    
    <div class="input-field col s6">
    <select name = "item_id" required = "true">
        <option value="" disabled selected>Choose the Item</option>
        @foreach($item as $items)

          <option value= {{$items->item_id}} >{{$items->item_name}}</option>  

        @endforeach
        
        
    </select>
    </div>

    
    <script>
        $(document).ready(function() {
    $('select').material_select();
  });
   $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
    </script>


                    
                    <div class="input-field">
                         <input id="item_amount" type="number" required = "true" name = "item_amount" min = 1 class="validate">
                         <label for="item_amount">Quantity</label>
                    </div>
                    <input type = "submit" class="waves-effect btn" value = "Request">
                   <input type = "hidden" value = "{{Session::token()}}" name = "_token"></input>


</form>


</div>



</div>
            
            
        </body>
</html>
