<!--Admin/HOD Page Show Selected TA's-->
<?php
	use App\Claim;
	use App\TA;
	
	$id = $_SESSION['id'];
    $fac = \DB::table('Faculty')->where('faculty_id',$id)->first();
    $dept = $fac->department;//Depatment of the HOD
    $c = \DB::table('Course')->where('department',$dept)->pluck('course_id');//courses under the department headed by the HOD/Admin.
    $i=0;
    $details = \DB::table('Ta')->whereIn('course_id',$c)->orderby('course_id')->get();//Details     
?>
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
@extends('ta.layouts.master1')
@section('title','Selected TA\'s')
@section('main_heading','Selected TA\'s')
@section('links')
<nav class="mynav blue">
  <div class="nav-wrapper">
    <ul>
      <li><a href="TA">Home</a></li>
      <li><a href="TA/approve_claims">Approve-Calims</a></li>
      <li><a href="TA/post_opening">Post-Opening</a></li>
      <li><a href="TA/mail">Mail</a></li>
    </ul>
  </div>
</nav>
@stop
@section('body')
	
	

	@if(count($details)==0)
		<br><br><center><h5 class="red-text">No Selected TA's!!</h5></center>
	@else
	<center>
	
	<table class="centered  highlight  bordered">
		<thead>
			<tr>
				<th></td>
				<th>TA Name</td>
				<th>TA ID</td>
				<th>Selected For Course</td>
				<th>TA Stipend</td>
			</tr>
		</thead>
		<tbody>
			
			@foreach($details as $row)
				
			     <tr>
                    <th>{{++$i}}</th>
                    <td class="blue-text">{{\DB::table('student')->where('student_id',$row->student_id)->first()->name}}</td>
                    <td class="grey-text">{{$row->student_id}}</td>
                    <td class="orange-text">{{$row->course_id}}</td>
                    <td class="green-text">{{$row->default_stipend}}</td>
                    
                </tr>
				
			@endforeach
			
		</tbody>
	@endif
	</table>
	<br><br>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $('select').material_select();
          });
    </script>
@endsection