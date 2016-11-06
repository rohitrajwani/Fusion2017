<!--Faculty Page Manual Batch Assignment-->
<?php
	use App\TA;
	$id = $_SESSION['id'];
	$course = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');
	$tas = TA::join('Ta_Post_Openings','Ta.course_id','=','Ta_Post_Openings.course_id')->whereIn('Ta.course_id',$course)
			->orderby('Ta.course_id')->get();
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
      <li><a href="./blade">Home</a></li>
      <li><a href="./attendance">Attendance</a></li>
      <li class="active"><a href="./mnl_batch_assgn">Batch-Assign</a></li>
      <li><a href="./show_claims">Assistance-Ship</a></li>
      <li><a href="./mail">Mail</a></li>
    </ul>
  </div>
</nav>
@stop
@section('body')
     <?php  if(isset($errors)){
              if($errors->first()!=''){?>
              <p class="red white-text" style="padding:1%" id="para" ><?php echo 'Please Select Batch For All TAs'.'
              <button class="right" id="cross"><i class="fa fa-times" aria-hidden="true"></i></button>'; ?></p>
              <?php            }}
                  ?>	

	<form action="{{action('SupervisorController@save_batches')}}" method="post">
	<input hidden value="{{$id}}" name= "id">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
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
                    <td>
	                    <select name="{{$row->student_id}}" class="blue-text">
	                    		<option class="blue-text" value=""
	                    			@if($row->batch==NULL)
	                    				selected
	                    			@endif
	                    		>Select Batch</option>

	                    	@for($j=1;$j<=$row->no_of_batches;$j++)
	                    		<option class="blue-text" value="{{$j}}"
	                    			@if($row->no_of_batches==$j)
	                    				selected
	                    			@endif
	                    		>Batch #{{$j}}</option>
	                    	@endfor
	                    </select>
                    </td>
                </tr>
				
			@endforeach      
		</tbody>
	</table>
	@if($i!=0)
	<button type="submit" class="waves-effect waves-light btn" style="width:50%" type='submit' value='Save'/>Save</button>
	@else
		<h5 class="center red-text"><i>NO TAs</i></h5>
  	@endif
	</center>
	</form>
	<br><br>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $('select').material_select();
               $("#cross").click(function(){
    $("#para").hide(500);
});

          });
    </script>
@endsection