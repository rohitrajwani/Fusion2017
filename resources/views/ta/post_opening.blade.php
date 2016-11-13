@extends('ta.layouts.master')
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
@section('title', 'POST OPENING')
@section('main_heading','Post Opening')
@section('links')
<nav class="mynav blue">
  <div class="nav-wrapper">
    <ul>
      <li><a href="TA">Home</a></li>
      <li class=""><a href="TA/approve_claims">Approve-Claims</a></li>
      <li class="active"><a href="TA/post_opening">Post-Opening</a></li>
      <li><a href="TA/mail">Mail</a></li>
    </ul>
  </div>
</nav>
@stop

@section('timetable')
 <div class="row">
			<div class="">
			     <?php  if(isset($errors)){
              if($errors->first('f')!=''){?>
              <p class="red white-text" style="padding:1%" id="para" ><?php echo $errors->first('f').'
              <button class="right" id="cross"><i class="fa fa-times" aria-hidden="true"></i></button>'; ?></p>
              <?php            }}
                  ?>

                  <?php 
                  		if(isset($aa)){?>

                  			<h4 class="green white-text center" style="padding: 2%;"> <?php echo $aa[0];?> </h4>

                  		<?php  } else{
                  ?>

				<table class="bordered highlight ">
			
                        <thead>
                          <tr>
                              <th>Course</th>
                              <th>Registered Students</th>
                              <th>Required Posts</th>
                              <th>Batches</th>
                          </tr>
                        </thead>
                       
                        <tbody>
                         <form action="store_post_opening" method="post">
                        <?php $i=0;foreach($course as $c) {?>
                          <tr>
                            <td>{{$c->course_name}} ({{$c->course_id}})</td>
                            <td>{{$no[$i]}}</td>
                            <td>
                            <input type="hidden" name="course_id" value="{{$c->course_id}}">
                            <div class="input-field">
                            <input type="number" class="validate" min="0" name="{{$c->course_id}}opening">
                            </div>
                             <input type="hidden" name=" _token" value="{{ csrf_token()}}">
							       </td>
							<td>
              <div class="input-field">
              <input type="number" min="0" class="validate" name="{{$c->course_id}}Batches"></div></td>
                          </tr>
                          <?php $i++;} ?>
                          <tr>
                          <td colspan="4">
                          <input type="submit" name="submit" class="btn right">
                          </td>
                          </tr>
                          </form>
                        </tbody>
                        
                        
    
                    </table>
                    <?php } ?>
                  
		</div>
		</div>
		
		
@stop

@section('script')
  
    $(document).ready(function() {
   $("#cross").click(function(){
    $("#para").hide(500);
});
  });
       @endsection