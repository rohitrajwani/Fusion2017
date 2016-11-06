
@extends('layout')
		@section('content')
        
        
        <div class="main-container row">
            <h4 class="col s12 m4 offset-m4"><b>CENTRAL MESS</b></h4>
								
                            
							
                <div class="section col s12">
                    
                    
					<div class="divider col s12"></div>
                <div class="section col s12">
                    <h5 class="col s12">MESS CATERING SERVICE</h5>
                    <p class="col s12">Central mess is a common mess for boys and girls residing in all Halls, 
					with a total strength of around 1500. It is a special hall including both Veg and Non-Veg meals. 
					The whole mess is managed by a manger with a committee of 5 members of PG student. 
					Atmost 10-15 workers including cleaners and cook work here. 
					Central mess is situtated near all residing halls and Institute.<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					All the workers are from nearby villages. To check the list of workers click here . 
           The whole mess is managed by a manger with a committee of 5 members of PG student. 
		   Atmost 10-15 workers including cleaners and cook work here. Central mess is situtated near all residing halls and Institute. 
		   All the workers are from nearby villages.</p>
                </div>
					<br><h4 class="custom col s12">CheckOut Mess Menu</h4><br>
				<!-- Modal Trigger -->
  <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Mess I</a>
  <a class="modal-trigger waves-effect waves-light btn" href="#modal2">Mess II</a>
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mess-Menu I</h4>
          <table class="bordered highlight" border="1">
                        <thead>
                          <tr>
							  <th>Meal</th>
                              <th>Breakfast</th>
                              <th>Lunch</th>
                              <th>Dinner</th>
							 
                          </tr>
                        </thead>
                        <tbody>
						<tr>
						<td width="50"> <b>Monday</td>
						 @foreach($c1 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td  width="16"> <b> Tuesday</td>
						 @foreach($c2 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
                          <tr>
						<td  width="16"> <b> Wednesday</td>
						 @foreach($c3 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"><b> Thursday</td>
						 @foreach($c4 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Friday</td>
						 @foreach($c5 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Saturday</td>
						 @foreach($c6 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Sunday</td>
						 @foreach($c7 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
                        </tbody>
                    </table>
					
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Back</a>
    </div>
  </div>
   <div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mess-Menu II</h4>
      <table class="bordered highlight" border="1">
                        <thead>
                          <tr>
							  <th>Meal</th>
                              <th>Breakfast</th>
                              <th>Lunch</th>
                              <th>Dinner</th>
							 
                          </tr>
                        </thead>
                        <tbody>
						<tr>
						<td width="50"> <b>Monday</td>
						 @foreach($c8 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td  width="16"> <b> Tuesday</td>
						 @foreach($c9 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
                          <tr>
						<td  width="16"> <b> Wednesday</td>
						 @foreach($c10 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"><b> Thursday</td>
						 @foreach($c11 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Friday</td>
						 @foreach($c12 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Saturday</td>
						 @foreach($c13 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Sunday</td>
						 @foreach($c14 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
                        </tbody>
                    </table>
					
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Back</a>
    </div>
  </div>
  </div></div>
   
    
          
               
        
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
			  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
        </script>
    @stop