<!--TA Supervisor Page Feedback Application Form-->
@extends('ta.layouts.master1')
@section('title','Feedback form')
@section('main_heading','Feedback')

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
      <li><a href="./show_claims">Assistance-Ship</a></li>
      <li><a href="./mail">Mail</a></li>
    </ul>
  </div>
</nav>
@stop
<?php 
    use App\TA;
   // session_start();
    $id = $_SESSION["id"];

    $course = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');//courses taken by faculty
    $ta = TA::whereIn('course_id',$course)->get();//tas under the faculty
    
?>
<!--Print Errors-->
<?php if($errors->first('id')){ ?>
    <p class="red lighten-2 white-text" style="padding:1%" id="para" >{{$errors->first('id')}}
        <button class="right" id="cross"><i class="fa fa-times" aria-hidden="true"></i></button>
    </p>
<?php } ?>

<?php if($errors->first('descp')){ ?>
    <p class="red lighten-2 white-text" style="padding:1%" id="para1" >The Description field is required
        <button class="right" id="cross1"><i class="fa fa-times" aria-hidden="true"></i></button>
    </p>
<?php } ?>

<?php if($errors->first('rating')){ ?>
    <p class="red lighten-2 white-text" style="padding:1%" id="para2" >The Rating field is required
    <button class="right" id="cross2"><i class="fa fa-times" aria-hidden="true"></i></button>
    </p>
<?php } ?>


<!--Feedback Form-->
<center>
    <form action="{{action('SupervisorController@save_feedback')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <table class="centered  highlight  bordered">
            <tr>
                <th>Student Roll No / Name:</th>
                <td>
                    <select name="id">
                        @foreach($ta as $row)
                            <option value='{{$row->student_id}}'>
                                {{$row->student_id}} / {{\DB::table('student')->where('student_id',$row->student_id)->first()->name}}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Description :</th>
                <td>
                    <textarea name="descp" id="comment" placeholder="Enter your feedback here" class="materialize-textarea"></textarea>
                    <label for="comment">Feedback</label>
                </td>
            </tr>
            <tr>
                <th>Performance Rating :</th>
                <td>
                    <select name="rating">
                        <option value="" selected>Select Rating</option>
                        <option value="1">Worst</option>
                        <option value="2">Bad</option>
                        <option value="3">Average</option>
                        <option value="4">Good</option>
                        <option value="5">Excellent</option>
                    </select>
                </td>
            </tr>
        </table><br><br>
        <button class="waves-effect waves-light btn" style="width:50%;" type="submit" value="Submit Feedback"/>Submit Feedback</button>    
    </form>
</center>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $('select').material_select();
                        $("#cross").click(function()
            {
            $("#para").fadeOut(500);
            });

            $("#cross1").click(function()
            {
            $("#para1").fadeOut(500);
            });

            $("#cross2").click(function()
            {
            $("#para2").fadeOut(500);
            });
          });
    </script>
@endsection