@extends('layout')

@section('stock_content')
<nav class="mynav">
  <div class="nav-wrapper">
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

<center><h4>
<p>Welcome to The Stock Management System</p>
<p>of PDPM IIITDM Jabalpur</p>
</h4></center>


@stop