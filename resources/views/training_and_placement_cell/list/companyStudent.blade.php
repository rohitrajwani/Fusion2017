@extends('training_and_placement_cell.layout')

@section('content')

<div class="main-container row">
		
            <div class="col s12 m4 offset-m4">
                <h4>Selection status</h4>
            </div>
            
        	
             <a href="/training_and_placement_cell/tpo/page">
                <div class="col m1 offset-m3 link" style="background-color:#076392;">
                    <center><h5 style="color:white;"><i class="fa fa-home"></i></h5></center>
                </div>
            </a>
            
      
      
           	{!! Form::open(array('route' => 'companyStudent_store', 'class' => 'form')) !!}
           	<div class="dummy" style="display:none;">
           		{!! Form::text('dummy', null, 
		                    array('id' => 'dummy', 
		                       'class'=>'validate')) !!}
           	</div>
                @foreach($company as $comp)
               <div class="company container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
               <div>
               <div style="display: none;">
	           		{!! Form::text('company_id', $comp->company_id, 
			                    array('id' => 'company_id', 
			                       'class'=>'validate')) !!}
			                       </div>
                </div>
                <div class="col s4"><h5 style="float:left;">{{ $comp->name }}</h5></div>
                @endforeach
                  <div class="col s8"  style="overflow:scroll;">
                  		@foreach( $student as $stud )
                  			@if( $stud->name1 == $comp->name )
		                      	<div class="student row">
			                        <div class="col s2">
			                        	{{ $stud->roll_no }} 
			                        </div>
			                        <div class="col s3">
			                            {{ $stud->name }} 
			                        </div>
			                        <div >
			                        <div style="display: none;">
						                {!! Form::text('student_id[]', $stud->student_id, 
							                    array('id' => 'student_id', 
							                       'class'=>'validate')) !!}
						                       	</div>
						                
				                	</div>
		                          <div class="col s6 offset-s1">
		                          	<input name="group{{$stud->student_id}}" type="radio" id="test1{{$stud->student_id}}" value="Selected" />
		                            <label for="test1{{$stud->student_id}}">Selected</label>
                		           	
                		           	<input name="group{{$stud->student_id}}" type="radio" id="test2{{$stud->student_id}}" value="Not Selected" />
	                	            <label for="test2{{$stud->student_id}}">Not Selected</label>
		                          </div>
		                       	</div>
		                    @endif
                       	@endforeach

                    </div>
                    {!! Form::submit('Submit', 
	                array('class'=>'waves-effect btn')) !!}
       			</div>
       			
       		
	       		
          	{!! Form::close() !!}

	@section('js')
		<script>
			$(document).ready(function (){
				var $studCount = $('.student').length;
				$(this).find('#dummy').attr('value', $studCount);
			});
		</script>

	@stop


@stop