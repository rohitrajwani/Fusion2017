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
      <li><a href="/stock_management/view">View Stock</a></li>
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
</nav>

<br>
<form method = "post" action = "{{route('/stock_management/confirm')}}">
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

@stop