<!--TA Supervisor Page Forward Claims-->
<?php
	use App\Claim;
	use App\TA;
	$id = $_SESSION['id'];
	$course = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');//select courses taken by the faculty
	$tas = TA::whereIn('course_id',$course)->pluck('student_id');//ta's under the faculty
	$claims = Claim::whereIn('student_id',$tas)->where('status','0')->orderBy('month')->get();//claims of the ta's
	$i=0;
?>
@extends('ta.layouts.master1')
@section('title','TA Claims')
@section('main_heading','Pending Claims')
<?php
    if(isset($_SESSION['faculty']))
    {

    }
    else
    {
        echo "<script>
            alert('NOT ALLOWED TO VIEW THIS PAGE');
        </script>";
        header("Refresh:0 url=wele",true,303);
        exit();
    }
?>
@section('body')
@section('links')
<nav class="mynav blue">
  <div class="nav-wrapper">
    <ul>
      <li><a href="./blade">Home</a></li>
      <li><a href="./attendance">Attendance</a></li>
      <li><a href="./mnl_batch_assgn">Batch-Assign</a></li>
      <li class="active" <a href="./show_claims">Assistance-Ship</a></li>
      <li><a href="./mail">Mail</a></li>
    </ul>
  </div>
</nav>
@stop
	

	@if(count($claims)==0)
		<br><br><center><h5>No Pending Claims!!</h5></center>
	@else
	<center>
	<form method="post" action="{{action('SupervisorController@forward_claim')}}">
	<input name="faculty_id" value="{{$id}}" hidden/><!--Hidden input tag to pass faculty id-->

	<table class="highlight  bordered">
		<thead>
			<tr>
				<th></td>
				<th>Name</td>
				<th>TA ID</td>
				<th>Month Applied for</td>
				<th>TA Stipend</td>
				<th colspan=2>Action</td>
			</tr>
		</thead>
		<tbody>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			@foreach($claims as $row)
				
			     <tr>
                    <th style="width:2%;">{{++$i}}</th><!--Serial No.-->
                    <td style="width:20%;">{{\DB::table('student')->where('student_id',$row->student_id)->first()->name}}</td><!--Retrieving name-->
                    <td style="width:20%;">{{$row->student_id}}</td>
                    <td style="width:15%;">{{DateTime::createFromFormat('!m', $row->month)->format('F')}}</td><!--Month Applied for-->
                    <td style="width:15%;">{{$row->stipend}}</td><!--Calculated Stipend based on attendance-->
                    
                    <input type="hidden" name="{{$row->student_id}}month" value="{{$row->month}}"/><!--hidden input tag for passing month-->
                    
                    <td colspan=2>
	                       <!-- Radio  buttons Satisfactory and Unsatisfactory-->
	                    	<input name="{{$row->student_id}}perf" type="radio" id="{{$row->student_id}}S" checked="true" value="{{$row->student_id}}{{$row->month}}S"/>
	                    	<label for="{{$row->student_id}}S">Satisfactory</label>
	                    
	                    	<input name="{{$row->student_id}}perf" type="radio" id="{{$row->student_id}}U" value="{{$row->student_id}}{{$row->month}}U"/>	
	                    	<label for="{{$row->student_id}}U">Unsatisfactory</label>
	                    
                    </td>
                </tr>
                <tr id="panel2{{$row->student_id}}" style="display:none"><!--Hidden Panel for TA Stipend penalty and description-->
                	<td style="width:2%;"></td>
                	<td style="width:20%;">
                    <div class="input-field">
                		<select name="{{$row->student_id}}stipend_penalty">
                			<option selected value="0">0%</option>
                			<option value="1">1%</option>
                			<option value="2">2%</option>
                			<option value="3">3%</option>
                			<option value="5">5%</option>
                			<option value="10">10%</option>
                			<option value="20">20%</option>
                			<option value="30">30%</option>
                			<option value="40">40%</option>
                			<option value="50">50%</option>
                		</select>
                		<label for="cut">Stipend penalty percentage</label>
                    </div>
                	</td>
                	<td style="width:20%;"></td>
                	<td  colspan=4>
                        <div class="input-field">
                		<input name="{{$row->student_id}}comment" placeholder="Any Comments on TA" class="materialize-textarea"/><!--TextArea-->
                        </div>
                	</td>
                	</div>
                </tr>
				
			@endforeach
			
		</tbody>
	</table><button class="waves-effect waves-light btn" style="width:50%;" type="submit" value="Forward"/>Forward</button></form></center>
	@endif
	<br><br>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $('select').material_select();
        
        
        @foreach ($claims as $row)

        	$("#{{$row->student_id}}U").click(function(){
        		if($(this).is(':checked')){
        			$("#panel2{{$row->student_id}}").slideDown("slow");
        		}
        	});	
        	
        	$("#{{$row->student_id}}S").click(function(){
        		if($(this).is(':checked')){
        			$("#panel2{{$row->student_id}}").hide();
        		}
        	});

        @endforeach
        
        });

    </script>
@endsection