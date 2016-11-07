<!DOCTYPE html>
<html lang="en">
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

        <title>Update Existing Item</title>
           <!-- Fonts -->
         <link rel="stylesheet" href="fonts/font-awesome.min.css">
        
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection">
        
        <link href="css/fusion_style.min.css" type="text/css" rel="stylesheet">
        
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js"></script>
         
        <script type="text/javascript" src="/js/materialize.min.js"></script>
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

  @if($error == 1)
         <center> <h6>No sufficient stock left</h6></center>
        @endif

   <form method = "POST" action = "{{route('exist')}}">
                    
                    <div class="input-field col s6">
    <select name = "itemid">
        <option value=""  required = "true" disabled selected>Choose the Item</option>
        @foreach($item as $items)

          <option value = {{$items->item_id}}>{{$items->item_name}}</option>  

        @endforeach
        
        
    </select>
    
    <script>
        $(document).ready(function() {
    $('select').material_select();
  });
   $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
    </script>

</div>


                    <div class="input-field col s6">
                         <input id="item_amount" type="number"  required = "true" name = "quantity" min = 1 class="validate">
                         <label for="item_amount">Quantity</label>
                    </div>
                    
                    <form class="col s12">
                    <p>
                        <input name="group1" type="radio"  required = "true" id="Added"  value = "add"/>
                        <label for="Added">Add</label>
                    </p>
                    <p>
                        <input name="group1" type="radio"  required = "true" id="Removed" value = "remove"/>
                        <label for="Removed">Remove</label>
                    </p>
                    
<input type = "submit" class="waves-effect btn" value = "Submit">
                   <input type = "hidden" value = "{{Session::token()}}" name = "_token"></input>

                    </form>

</div>
        
        
        
       
    </body>
</html>
