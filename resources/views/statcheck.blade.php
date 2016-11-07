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
      <li><a class="dropdown-button" data-activates="dropdown2">Request Stock</a><i class="fa fa-arrow-down right"></i></li>
      <ul id="dropdown2" class="dropdown-content">
  <li><a href="/requests">Submit Request</a></li>
  <li><a href="/checkreq">Check Requests</a></li>
  
  </ul>
      <!-- Dropdown Trigger -->
      @if($ut == "others")
      <li><a href="/view">View Stock</a></li>
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
</nav>

<br>
<form method = "post" action = "{{route('confirm')}}">
  <table>
  <tr>
  <td>Requested By</td>
  <td>{{$pending->user_id}}
  <input type = "hidden" name = "reqid" value = {{$pending->req_id}}
  </td>
  </tr>
  <tr><td>
  Requested To
  </td>
  <td>
    {{$pending->req_to}}
  </td>
  </tr>
  <tr>
  <td>Item Name</td>
  <td>{{$itid->item_name}}</td>
  </tr>
  <tr>
  <td><p>
    <input name="status" value = "Approved" type="radio" id="test1" />
    <label for="test1">Approve</label>
</p>
  </td>
  <td> <p>
    <input name="status" type="radio" value = "Rejected" id="test2" />
    <label for="test2">Reject</label>
</p> </td>
  </tr>


  </table>
  <input type = "submit" class="waves-effect btn" value = "Submit">
                   <input type = "hidden" value = "{{Session::token()}}" name = "_token"></input>

  </form>


</div>



</div>
            
            
        </body>
</html>
