@extends('layout')

@section('stock_content')
<nav class="mynav">
  <div class="nav-wrapper">
    <ul>
    <li><a href = "/stock_management">Home</a></li>
    
      <li><a class="dropdown-button" data-activates="dropdown2">Request Stock</a><i class="fa fa-arrow-down right"></i></li>
      <ul id="dropdown2" class="dropdown-content">
  <li><a href="/stock_management/requests">Submit Request</a></li>
  <li><a href="/stock_management/checkreq">Check Requests</a></li>
  
  </ul>
  @if($ut == "others")
      <li><a href = "/view">View Stock</a></li>
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

  @if($error == 1)
         <center> <h6>No sufficient stock left</h6></center>
        @endif

   <form method = "POST" action = "/stock_management/exist">
                    
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

@stop