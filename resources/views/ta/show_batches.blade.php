<!--Faculty Page Show Assigned Batches-->
<?php
	use App\TA;
	$id = $_SESSION['id'];
	$course = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');
	$tas = App\TA::whereIn('course_id',$course)->get();
	$batch = 4;
	$i=0;
?>
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
@extends('ta.layouts.master1')
@section('title','TA Manual Batch Assignment')
@section('main_heading','TA Manual Batch Assignment')
 @section('links')
        <nav class="mynav blue">
          <div class="nav-wrapper">
            <ul>
              <li><a href="TA">Home</a></li>
              <li><a href="TA/attendance">Attendance</a></li>
              <li><a href="TA/mnl_batch_assgn">Batch-Assign</a></li>
              <li><a href="TA/show_claims">Assistance-Ship</a></li>
              <li><a href="TA/mail">Mail</a></li>
            </ul>
          </div>
        </nav>

@stop
@section('body')
	<p style="color:red">
		@if($errors->first())
			Please Select Batches for all TA's.
			@endif
	</p>	

	<center><table class="centered  highlight  bordered">
		<thead>
			<tr>
				<th></td>
				<th>TA Name</td>
				<th>TA ID</td>
				<th>Course ID</td>
				<th>Batch</td>
			</tr>
		</thead>
		<tbody>
			@foreach($tas as $row)
			     <tr>
                    <th>{{++$i}}</th>
                    <td class="blue-text">{{\DB::table('student')->where('student_id',$row->student_id)->first()->name}}</td>
                    <td class="orange-text">{{$row->student_id}}</td>
                    <td class="green-text">{{$row->course_id}}</td>
                    <td class="blue-text">
            			@if($row->batch==NULL)
            				NA
            			@else
            				Batch #{{$row->batch}}
            			@endif
                    </td>
                </tr>
				
			@endforeach      
		</tbody>
	</table><br>
  @if($i!=0)
	<a href='TA/mnl_batch_assgn' class="waves-effect waves-light btn" style="width:50%">Edit Batches</a></center>
  @else
    <h5 class="center red-text"><i>NO TAs</i></h5>
  @endif
	<br><br>
@endsection
