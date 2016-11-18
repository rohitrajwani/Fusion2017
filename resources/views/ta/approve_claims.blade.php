<!--Admin Head of Discipline Page Approve Claims-->
<?php
	use App\Claim;
	use App\TA;
	
	$id=$_SESSION['id'];//$_SESSION['id'];assumed session variable id
	$fac = \DB::table('faculty')->where('faculty_id',$id)->first();
	$dept = $fac->department;//fetching department of the faculty.
	$course = \DB::table('course')->where('department',$dept)->pluck('course_id');//courses corresponding to the department
	//print_r($course);
	$tadetails = TA::whereIn('course_id',$course)->get();//get tas
	$tas = $tadetails->pluck('student_id');
	$claims = Claim::whereIn('student_id',$tas)->where('status','1')->orderBy('month')->get();
	$res = $claims->pluck('student_id');

	$i=0;
?>
@extends('ta.layouts.master1')
@section('title','TA Claims')
@section('main_heading','Pending Claims')
<?php
    if(isset($_SESSION['hod']))
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
      <li><a href="TA/">Home</a></li>
      <li class="active"><a href="TA/approve_claims">Approve-Claims</a></li>
      <li><a href="TA/post_opening">Post-Opening</a></li>
      <li><a href="TA/mail">Mail</a></li>
    </ul>
  </div>
</nav>
@stop

	@if(count($claims)==0)<!--If there are no pending claims-->
		<br><br><center><h5>No Pending Claims!!</h5></center>
	@else
	<center>
	<form method="post" action="{{action('AdminController@approve')}}">
	<table class="centered  highlight  bordered">
		<thead>
			<tr>
				<th></th>
				<th>TA Name</th>
				<th>TA ID</th>
				<th>Month Applied for</th>
				<th>TA Stipend</th>
				
			</tr>
		</thead>
		<tbody>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			
			@foreach($claims as $row)
				<input type="hidden" name="claims[]" value="{{$row->student_id}}"/><!--Simple loop to print all the claims-->
			     <tr>
                    <th>{{++$i}}</th>
                    <td>{{\DB::table('student')->where('student_id',$row->student_id)->first()->name}}</td>
                    <td>{{$row->student_id}}</td>
                    <td>{{DateTime::createFromFormat('!m', $row->month)->format('F')}}</td>
                    <td>{{$row->stipend}}</td>
                    
                    
                 </tr>
				
			@endforeach
			
		</tbody>
	</table><button class="waves-effect waves-light btn" style="width:50%;" type="submit" value="Approve All"/>Approve All</button></form>      </center>
	@endif
	<br><br>
@endsection
