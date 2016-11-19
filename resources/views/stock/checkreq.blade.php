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
            <a href = "/stock_management/status{{$invent->req_id}}">{{$invent->status}}</a>
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

@stop