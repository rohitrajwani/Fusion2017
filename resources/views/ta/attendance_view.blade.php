
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
@section('title','Attendacne')
@section('main_heading','Attendance Of TA')
@section('body')
        @section('links')
        <nav class="mynav blue">
          <div class="nav-wrapper">
            <ul>
              <li><a href="TA/">Home</a></li>
              <li class="active"><a href="TA/attendance">Attendance</a></li>
              <li><a href="TA/mnl_batch_assgn">Batch-Assign</a></li>
              <li><a href="TA/show_claims">Assistance-Ship</a></li>
              <li><a href="TA/mail">Mail</a></li>
            </ul>
          </div>
        </nav>

        @stop
<?php $k=0;?>
	<center><table class="centered  highlight  bordered">
		<thead>
			<tr>
				<th></td>
				<th>TA Name</td>
				<th>TA ID</td>
				<th>Total Working Days</td>
				<th>Present Days</td>
				<th>Percent</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tas1 as $row)
			<?php

				$Ta_Attendance_student = \DB::table('Ta_Attendance')->where('student_id',$row->student_id)->get();
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
      	

			?>
			     <tr>
                    <th >{{++$k}}</th>
                    <td class="blue-text">{{$row->name}}</td>
                    <td class="orange-text">{{$row->student_id}}</td>
                    <td class="yellow-text">{{count($a)}}</td>
                    <td class="green-text">{{$countpresent}}</td>
                    <td class="red-text">
                    <?php 
   						if (count($a)==0)
   							echo "0";
    					else
        					echo round(($countpresent/count($a)*100));?>%
        			</td>
                   
                </tr>
				
			@endforeach      
		</tbody>
	</table><br>
	
@endsection
