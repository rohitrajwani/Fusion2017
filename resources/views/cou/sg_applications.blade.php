@extends('cou/layout')
@section('content')
      <br>
             <h4 class="center-align">Review Student Guide Applications</h4><hr>
            
        
        <div>
        <table class="striped bordered hoverable centered">
        <thead>
         <tr>
             <th data-field="name">Roll No</th>
			  <th data-field="id">Name</th>
			  <th data-field="id">Branch</th>
			  <th data-field="id">CPI</th>
			  <th data-field="id">Reason</th>
              
             
          </tr>
        </thead>
		@foreach($c as $cc)
        <tbody>
          <tr>
            <td>{{$cc->student_id}}</td>
			 <td>{{$cc->name}}</td>
			  <td>{{$cc->branch}}</td>
			  <td>{{$cc->cpi}}</td>
			   <td>{{$cc->reason}}</td>
          </tr>
		  @endforeach
        </tbody>
      </table>
            </div>
        </div>

    
    
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
       <script>$(document).ready(function() {
    $(".dropdown-button").dropdown();
});
      </script> 
      
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
        </script>
		@stop