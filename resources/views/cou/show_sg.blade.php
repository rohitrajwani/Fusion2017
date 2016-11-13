@extends('layout')
@section('content')
<br>
             <h4 class="center-align">Student Guides</h4><hr>
            
        
        <div>
        <table class="striped bordered hoverable centered">
        <thead>
          <tr>
             <th data-field="name">Student Guide</th>
			 <th data-field="id">Student Assigned</th>
              
          </tr>
        </thead>
	@foreach($c as $cc)
        <tbody>
          <tr>
            <td>  {{$cc->stuguide_id}} </td>
			 <td>
				@foreach($d as $dd)
				
					@if ($cc->stuguide_id == $dd->stuguide_id)
						{{$dd->student_id}}
					@endif
			
				@endforeach
			
			
			</td>

		    </tr>
			@endforeach
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