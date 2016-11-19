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
      <!-- Dropdown Trigger -->
      @if($ut == "others")
      <li>
          <a class="dropdown-button" data-activates="dropdown1">Update Stock</a>
      </li>
          </ul>

      <ul id="dropdown1" class="dropdown-content">
  <li><a href="/stock_management/new">New Item</a></li>
  <li><a href="/stock_management/existing">Existing Item</a></li>
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

@stop