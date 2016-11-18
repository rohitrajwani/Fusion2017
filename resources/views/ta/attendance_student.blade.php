

<?php $_SESSION["ID"]="ID"; ?>

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

@extends('ta.layouts.master')
@section('main_heading','Attendance')
@section('title', 'Attendance')
        @section('links')
        <nav class="mynav blue">
          <div class="nav-wrapper">
            <ul>
              <li><a href="TA">Home</a></li>
              <li class="active"><a href="TA/attendance_student">Attendance</a></li>
              <li><a href="TA/taapplication">TA-Form</a></li>
              <li><a href="TA/claims">Assistanceship</a></li>
              <li><a href="TA/mail">Mail</a></li>
            </ul>
          </div>
        </nav>
        @stop
     <?php
        $i=0;
        $a=[];
        $ac=[];
         foreach ($Ta_Attendance_student as $tas) { 
            $d = date_parse_from_format("Y-m-d", $tas->date);
            $month=$d["month"];
            array_push($a, $month);
            array_push($ac, $tas->attendance_status);

            $i++;
            }

            $b=[];
            $ab=[];
            for ($j=1;$j<=12;$j++)
            {
                $b[$j]=0;
            }
            for ($j=1;$j<=12;$j++)
            {
                $ab[$j]=0;
            }

            for($j=0;$j<$i;$j++){
                if($ac[$j]==1)
                    $b[$a[$j]]++;
                elseif ($ac[$j]==0) {
                    $ab[$a[$j]]++;
                  
                }
            }
            $countpresent=0;
            for ($j=1;$j<=12;$j++)
            {
                $countpresent=$countpresent+$b[$j];
            }
            $month1=['January','Feburary','March','April','May','June','July','August','September','October','November','December'];
            ?>


@section('timetable')
<br>
<div class="row">
	<div class="col s12 l4 blue-text">
	<p>Total working days:<?php echo count($a); ?></p>
	</div>
	<div class="col s12 l4 green-text">
	<p>Total Present days:<?php echo $countpresent;?></p>
	</div>
	<div class="col s12 l4 orange-text">
	<p>Present Percentage:<?php 
    if (count($a)==0)
        echo "0";
    else
        echo round(($countpresent/count($a)*100));?>%</p>
	</div>
</div>
@stop
@section('cards')

    
    <table class="bordered highlight">
        <thead>
          <tr>
            <th data-field=""></th>
            <th data-field="">Month</th>
            <th data-field="">Present</th>
            <th data-field="">Absent</th>
          </tr>
        </thead>

        <tbody>

            <?php 
            for($j=1;$j<=12;$j++)
            {
                if ($b[$j]!=0 || $ab[$j]!=0){
            ?>

          <tr>
            <td></td>
            <td class="blue-text">{{ $month1[$j-1] }}</td>
            <td class="green-text"><?php echo $b[$j]; ?></td>
            <td class="red-text"><?php echo $ab[$j];?></td>

          </tr>
          <?php } } ?>
  
 
        </tbody>
      </table>
@stop