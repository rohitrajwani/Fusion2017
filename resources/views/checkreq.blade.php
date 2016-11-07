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
@if($ut == "faculty")
      <table class = "bordered highlight">
    <thead>
    <tr>
        <th>Request ID</th>
        <th>Requested By</th>
        <th>Requested to</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($req as $invent)
    @if ($invent->req_to == $un)
        <tr>
            <td>{{$invent->req_id}}</td>
            <td>{{$invent->user_id}}</td>
            <td>{{$invent->req_to}}</td>
            <td>@foreach($item as $inv)
            @if($invent->item_id == $inv->item_id)
            {{$inv->item_name}}
            @endif
            @endforeach</td>
            <td>{{$invent->quantity}}</td>
            <td>
            @if ($invent->status == "Pending")
            <a href = "/status{{$invent->req_id}}">{{$invent->status}}</a>
            @else 
            {{$invent->status}}
            @endif
            </td>
        </tr>
        @endif    
    @endforeach
    </tbody>



</table>
@endif

@if($ut == "student")
      <table class = "bordered highlight">
    <thead>
    <tr>
        <th>Request ID</th>
        <th>Requested By</th>
        <th>Requested to</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($req as $invent)
    @if ($invent->user_id == $un)
        <tr>
            <td>{{$invent->req_id}}</td>
            <td>{{$invent->user_id}}</td>
            <td>{{$invent->req_to}}</td>
            <td>
            
            @foreach($item as $inv)
            @if($invent->item_id == $inv->item_id)
            {{$inv->item_name}}
            @endif
            @endforeach

            </td>
            <td>{{$invent->quantity}}</td>
            <td>
            {{$invent->status}}
            </td>
        </tr>
        @endif    
    @endforeach
    </tbody>



</table>
@endif

@if($ut == "others")
      <table class = "bordered highlight">
    <thead>
    <tr>
        <th>Request ID</th>
        <th>Requested By</th>
        <th>Requested to</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($req as $invent)
        @if($invent->status == 'Approved')
        <tr>
            <td>{{$invent->req_id}}</td>
            <td>{{$invent->user_id}}</td>
            <td>{{$invent->req_to}}</td>
            <td>
            @foreach($item as $inv)
            @if($invent->item_id == $inv->item_id)
            {{$inv->item_name}}
            @endif
            @endforeach
            </td>
            <td>{{$invent->quantity}}</td>
            <td>
                
                {{$invent->status}}
                
            </td>
        </tr>
        @endif
        @endforeach
        </tbody>



</table>
@endif


</div>
       
 
    </body>
</html>