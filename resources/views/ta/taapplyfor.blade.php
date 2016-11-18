
@extends('ta.layouts.master')
@section('title', 'Preference for TA post')
@section('main_heading','Fill Preference For TA post')
@section('links')
<nav class="mynav blue">
  <div class="nav-wrapper">
    <ul>
      <li><a href="TA">Home</a></li>
      <li><a href="TA/attendance_student">Attendance</a></li>
      <li class="active"><a href="TA/taapplication">TA-Form</a></li>
      <li><a href="TA/claims">Assistanceship</a></li>
      <li><a href="TA/mail">Mail</a></li>
    </ul>
  </div>
</nav>
<?php
    if(isset($_SESSION['student_ta']) || isset($_SESSION['student_not_ta']))
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
@stop
@section('timetable')
<?php
if (isset($errors)) {
    if ($errors->first('f') != '')
       {
?>
<p class="red lighten-2 white-text"  style="padding:1%" id="para" >
<?php
        echo $errors->first('f') . '
    <button class="right grey" id="cross"><i class="fa fa-times" aria-hidden="true"></i></button>';
?>
</p>
<?php
    } 
    elseif ($errors->first('g') != '') {
?>
<p class="green lighten-2 white-text"  style="padding:1%" id="para" >
<?php
        echo $errors->first('g') . '
    <button class="right grey" id="cross"><i class="fa fa-times" aria-hidden="true"></i></button>';
?>
  </p>
<?php
    }
}
?>
<br>
<div class="row">
    <div class="col l6 s6 m6 ">
        <h5 class="blue-text left">Available Courses:</h5>
    </div>
    <div class="col l6 s6 m6 " >
    <h5 class="left"><a class="waves-effect hoverable waves-light green-text modal-trigger " href="#modal1" ><u>Important Instruction</u></a></h5>
    </div>
</div>
<table class="centered  highlight  bordered">
    <thead>
        <tr>
            <th data-field="">S.No.</th>
            <th data-field="">Course Name</th>
            <th data-field="">No. Of Openings </th>
            <th >Preference</th>
            <th data-field="">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i=0;
            foreach ($taopening as $to) {
               if($to->no_of_openings!=0) {
              $i++;
            ?>
        <tr>
            <form method="post" action="store_tapplication">
                <input type="hidden" name=" _token" value="{{ csrf_token()}}">
            
                <td>{{$i}}</td>
                <td class="blue-text">{{ $to->course_id}}
                    <input type="hidden" name="course_id" value="{{ $to->course_id}}">
                </td>
                <td class="orange-text">{{$to->no_of_openings }}</td>
                <td>
                    <div class="row">
                        <div class="input-field offset-l4 col l4">
                            <input type="number" name="preference_no" class="validate" required>
                        </div>
                    </div>
                </td>
                <td> 
                    <button type="submit" class="btn green ">Apply</button>
            </form>
        </tr>
        <?php } }
            ?>
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4 class="green-text">Important Instructions</h4>
                  <p class="orange-text">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                    <i>You Can Apply For One Course Exactly One Time Only.</i>
                  </p>

                  <p class="orange-text">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                    <i>You Cannot Change Your Respone After Applying.</i>
                  </p>

                <p class="orange-text">
                  <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                  <i>You Have To Give Preference Number For Every Course.</i>
                </p>

                <p class="orange-text">
                  <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                  <i>You Cannot Give Negative Preference For Any Course and Also Cannot Give Preference Greater Than Total No of Course.</i>
                </p>
              </div>
          <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
          </div>
      </div>
    </tbody>
</table>
<?php
    if($i==0)
    {
      echo '<div class="center red-text" style="font-size:20px"><i>There Is No Opening </i></div>';
    }
    ?>
<br>
<div class="row">
    <div class="">
        <h5 class="blue-text">Previous Application:</h5>
        <table class="centered responsive-table highlight center bordered">
            <thead>
                <tr>
                    <th data-field="">Preference</th>
                    <th data-field="">Course Name</th>
                    <th data-field="">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($taapplyfor as $ta) {
                    ?>
                <tr>
                    <td>{{$ta->preference_no}}</td>
                    <td class="blue-text">{{$ta->course_id}}</td>
                    <td class="green-text">Applied</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
  $(document).ready(function() 
  {
    $("#cross").click(function()
    {
      $("#para").hide(200);
    });
  });
@endsection