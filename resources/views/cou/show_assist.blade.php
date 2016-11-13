@extends('layout')
@section('content')
<br>
             <h4 class="center-align">Assistant Coordinators</h4><hr>
       
            
        
        <div>
        <table class="striped bordered hoverable centered">
        <thead>
          <tr>
             <th data-field="name">Assistant Coordinator</th>
			  <th data-field="id">Student Guides Assigned</th>
          </tr>
        </thead>
		
    @foreach($c as $cc)
        <tbody>
          <tr>
            <td>  {{$cc->assist_id}} </td>
			 <td>
				@foreach($d as $dd)
				
				@if ($cc->assist_id == $dd->assist_id)
           {{$dd->stuguide_id}}
			@endif
			
			@endforeach
			
			
			</td>

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