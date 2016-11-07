<!DOCTYPE html>
<html lang="en">
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

        <title>View Stock</title>

    

        <!-- Fonts -->
<link rel="stylesheet" href="css/font-awesome.min.css">
        
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

<!-- Dropdown Structure -->

<nav class="mynav">
  <div class="nav-wrapper">
    <ul>
    <li><a href = "/stockhome">Home</a></li>
      <li><a class="dropdown-button" data-activates="dropdown2">Request Stock</a><i class="fa fa-arrow-down right"></i></li>
      <ul id="dropdown2" class="dropdown-content">
  <li><a href="/requests">Submit Request</a></li>
  <li><a href="/checkreq">Check Requests</a></li>
  
  </ul>
      <!-- Dropdown Trigger -->
      @if($ut == "others")
      <li>
          <a class="dropdown-button" data-activates="dropdown1">Update Stock</a>
      </li>
          </ul>

      <ul id="dropdown1" class="dropdown-content">
  <li><a href="/new">New Item</a></li>
  <li><a href="/existing">Existing Item</a></li>
  </ul>
  @endif
  </div>
</nav>

<table class = "bordered highlight">
    <thead>
    <tr>
        <th>Item ID</th>
        <th>Item Category</th>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Supplier ID</th>
        <th>Cost Price</th>
        <th>Items in hand</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($stock as $invent)
        <tr>
            <td>{{$invent->item_id}}</td>
            <td>{{$invent->item_category}}</td>
            <td>{{$invent->item_name}}</td>
            <td>{{$invent->item_description}}</td>
            <td>{{$invent->supplier_id}}</td>
            <td>{{$invent->cost_price}}</td>
            <td>{{$invent->item_in_hand}}</td>
            <td>
            @if ($invent->item_in_hand > 100)
              In Stock
            @elseif ($invent->item_in_hand <= 100 && $invent->item_in_hand > 50)
              Need to Be filled
            @elseif ($invent->item_in_hand <= 50 && $invent->item_in_hand > 0)
            Almost Empty
            @elseif ($invent->item_in_hand == 0 )
              Stock Empty
            @endif
            </td>
        </tr>    
    @endforeach
    </tbody>



</table>

</div> 

    <script>
            $(document).ready(function() {
                $(".dropdown-button").dropdown();
            });
        </script>
  
        
        

        </body>
        </html>