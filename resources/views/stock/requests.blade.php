@extends('layout')
@section('stock_content')
<nav class="mynav">
  <div class="nav-wrapper">
    <ul>
    <li><a href = "/stock_management/">Home</a></li>
    <ul>
      
      <li><a class="dropdown-button" data-activates="dropdown2">Request Stock</a><i class="fa fa-arrow-down right"></i></li>
      <ul id="dropdown2" class="dropdown-content">
  <li><a href="/stock_management/requests">Submit Request</a></li>
  <li><a href="/stock_management/checkreq">Check Requests</a></li>
  
  </ul>
    @if($ut == "others")
     <li><a href="/stock_management/view">View Stock</a></li>
      <!-- Dropdown Trigger -->
      <li>
          <a class="dropdown-button" data-activates="dropdown1">Update Stock <i class="fa fa-arrow-down right"></i></a>
      </li>
          </ul>

      <ul id="dropdown1" class="dropdown-content">
  <li><a href="/stock_management/new">New Item</a></li>
  <li><a href="/stock_management/existing">Existing Item</a></li>
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
<form method = "POST" action = "{{route('/stock_management/addreq')}}">

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


@stop