<!DOCTYPE html>
<html lang="en">
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

        <title>IIITDMJ Fusion</title>

       

        <!-- Fonts -->
         <link rel="stylesheet" href="css/font-awesome.min.css">
        
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection">
        
        <link href="css/fusion_style.min.css" type="text/css" rel="stylesheet">
        
        <link href="css/style.css" type="text/css" rel="stylesheet">
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

<nav class="mynav">
  <div class="nav-wrapper">
    <ul>
    <li><a href = "/stockhome">Home</a></li>
      <li><a class="dropdown-button" data-activates="dropdown2">Request Stock</a><i class="fa fa-arrow-down right"></i></li>
      <ul id="dropdown2" class="dropdown-content">
  <li><a href="/requests">Submit Request</a></li>
  <li><a href="/checkreq">Check Requests</a></li>
  
  </ul>
  @if($ut == "others")
      <li><a href = "/view">View Stock</a></li>
      <li>
          <a class="dropdown-button" data-activates="dropdown1">Update Stock</a>
      </li>
          </ul>

      <ul id="dropdown1" class="dropdown-content">
  <li><a href="/new">New Item</a></li>
  <li><a href="/existing">Existing Item</a></li>
  </ul>
         <!-- Dropdown Trigger -->
      
    </ul>
    @endif
  </div>
</nav>
<br>
<br>
<form method = "post" action = "{{route('additem')}}">

<div class="input-field col s6">
                       <input id="item_name" type="text"  required = "true" name = "item_name" class="validate">
                      <label for="item_name">Item Name</label>
                    </div>
                    <div class="input-field col s6">
                       <input id="cat" type="text"  required = "true" name = "item_cat" class="validate">
                      <label for="cat">Category</label>
                    </div>
                    <div class="input-field col s6">
                         <input id="item_amount" type="number"  required = "true" name = "amount" min = 1 class="validate">
                         <label for="item_amount">Quantity</label>
                    </div>
                    <div class="input-field col s6">
                       <input id="item_desc" type="text"  required = "true" name = "item_desc" class="validate">
                      <label for="item_desc">Item Description</label>
                    </div>
                    <div class="input-field col s6">
                       <input id="supplier" type="text"  required = "true" name = "supplier" class="validate">
                      <label for="supplier">Supplier</label>
                    </div>
                    <div class="input-field col s6">
                         <input id="Cost" type="number"  required = "true" name = "Cost" min = 1 class="validate">
                         <label for="Cost">Cost</label>
                    </div>
                    
                   <input type = "submit" class="waves-effect btn" value = "Add">
                   <input type = "hidden" value = "{{Session::token()}}" name = "_token"></input>


</form>


</div>
        
<script src="js/jquery-3.1.1.min.js"></script>
         
        <script type="text/javascript" src="/js/materialize.min.js"></script>

    </body>
</html>
