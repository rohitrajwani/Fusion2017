@extends('layout')

@section('stock_content')
<nav class="mynav">
  <div class="nav-wrapper">
    <ul>
    <li><a href = "/stock_management/">Home</a></li>
      <li><a class="dropdown-button" data-activates="dropdown2">Request Stock</a><i class="fa fa-arrow-down right"></i></li>
      <ul id="dropdown2" class="dropdown-content">
  <li><a href="/stock_management/requests">Submit Request</a></li>
  <li><a href="/stock_management/checkreq">Check Requests</a></li>
  
  </ul>
  @if($ut == "others")
      <li><a href = "/stock_management/view">View Stock</a></li>
      <li>
          <a class="dropdown-button" data-activates="dropdown1">Update Stock</a>
      </li>
          </ul>

      <ul id="dropdown1" class="dropdown-content">
  <li><a href="/stock_management/new">New Item</a></li>
  <li><a href="/stock_management/existing">Existing Item</a></li>
  </ul>
         <!-- Dropdown Trigger -->
      
    </ul>
    @endif
  </div>
</nav>
<br>
<br>
<form method = "post" action = "{{route('/stock_management/additem')}}">

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


@stop