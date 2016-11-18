<!--Student Page Claim Application Form-->
@extends('ta.layouts.master1')
@section('title','TA Main Page')
@section('main_heading','Assistantship Claim Form ')
<?php
    if(isset($_SESSION['student_ta']))
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
      <li><a href="TA">Home</a></li>
      <li><a href="TA/taapplication" >TA-form</a></li>
      <li><a href="TA/attendance_student">Attendance</a></li>
      <li><a href="TA/claims" class="active">Assistanceship</a></li>
      <li><a href="TA/mail">Mail</a></li>
    </ul>
  </div>
</nav>
@stop
<?php 
    use App\TA;
    $id=$_SESSION['id'];//$id = 'T1';//$_SESSION["id"];
    $details = TA::find($id);
?>

<!--Print Errors-->
<?php if($errors->first('month')){ ?>
    <p class="red lighten-2 white-text" style="padding:1%" id="para" >{{$errors->first('month')}}
        <button class="right" id="cross"><i class="fa fa-times" aria-hidden="true"></i></button>
    </p>
<?php } ?>

<?php if($errors->first('acc_no')){ ?>
    <p class="red lighten-2 white-text" style="padding:1%" id="para1" >{{$errors->first('acc_no')}}
        <button class="right" id="cross1"><i class="fa fa-times" aria-hidden="true"></i></button>
    </p>
<?php } ?>

<?php if($errors->first('applicability')){ ?>
    <p class="red lighten-2 white-text" style="padding:1%" id="para2" >{{$errors->first('applicability')}}
    <button class="right" id="cross2"><i class="fa fa-times" aria-hidden="true"></i></button>
    </p>
<?php } ?>

<!--Claim Form-->
<center>
<form action="{{action('TAMainController@addclaim')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <table class="centered  highlight  bordered" >
            <tr>
            <td>Name : </td>
            <td>{{\DB::table('student')->where('student_id',$id)->first()->name}}</td>

            </tr>
            <tr>
                <td>Roll No.:</td>
                <td>
                {{$id}}</td>
            </tr>
            <tr>
                <td>Month Applying for:</td>
                <td>
                    <div class = "select-wrapper">
                        <select name="month" >
                            
                            <option value='1'>January</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Account No.:</td>
                <td>
                <div class="input-field">
                    <input name="acc_no" type="number" class="validate" required>
                </div>
                </td>
            </tr>
            <tr>
                <td>Applicability:</td>
                <td><div class="input-field">
                        <select name="applicability">
                            <option value="" selected disabled> Select Applicability</option>
                          <option value="GATE">GATE</option>
                          <option value="CAT">CAT</option>                          
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td >Default Stipend:<br><div style="color: blue;">(*will be later calculated as per attendance)</div></td>
                <td>
                    
                    {{$details->default_stipend}}
                </td>
            </tr>
      </table><br><br>
        <center><button class="waves-effect waves-light btn" style="width:50%" type='submit'> Apply for Assistantship Claim</button></center>
      <input type ='hidden' name='id' value='{{$id}}'>
      <input type ='hidden' name='stipend' value='{{$details->default_stipend}}'>
</form>


</center>
@endsection
@section('footer')
    <script>
        $(document).ready(function()
         {
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