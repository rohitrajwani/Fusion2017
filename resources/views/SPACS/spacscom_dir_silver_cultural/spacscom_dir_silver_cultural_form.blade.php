<?php
$scholarship_id=$_GET['id'];
$student_id=$_GET['student_id'];
?>
<html>
<head>
<title>DIRECTOR SILVER CULTURAL</title>
<style type="text/css">
h3{font-family: Calibri; font-size: 22pt; font-style: normal; font-weight: bold; color:black;
text-align: center; text-decoration: underline }
table{font-family: Calibri; color:black; font-size: 11pt; font-style: normal;
text-align:; background-color: white;  border: 2px solid black}
table.inner{border: 0px}
/*border-collapse: collapse;*/
hr {
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button2 {background-color: #008CBA;} /* Blue */

</style>
</head>
 
<body>
<h3>DIRECTORS SILVER MEDAL </h3>
<form name="dir_sil_cul_form" action="/SPACS/dir_form/{{$scholarship_id}}/{{$student_id}}" method="POST">

 
<table align="center" cellpadding = "10">
 

<!----- First Name ---------------------------------------------------------->
<?php
$student=DB::table('student')->where('student_id',$student_id)->get();
?>
<!----- First Name ---------------------------------------------------------->
<tr>
<td>1.NAME :</td>
<td>{{$student[0]->name}}</td>
</tr>
 <tr>
<td>2.ROLL NO: </td>
<td>{{$student[0]->roll_no}}</td>
</tr>
<tr>
<td>3.BRANCH: </td>
<td>{{$student[0]->branch}}</td>
<tr>
<td>4.PROGRAMME: </td>
<td>{{$student[0]->programme}}</td>
</tr>
<tr>
<td>5.EMAIL ADDRESS:</td>
<td>{{$student[0]->email}}</td>
</tr>
<tr>
<td>6.HALL OF RESIDENCE:</td>
<td>{{$student[0]->hall_no}}</td>
</tr>
<td>7.ROOM NO:</td>
<td>{{$student[0]->room_no}}</td>
</tr>
<td>8.FATHERS/GUARDIAN NAME:</td>
<td>{{$student[0]->fathers_name}}</td>
</tr>
<tr>
<td>9.PERMANENT ADDRESS:</td>
<td>{{$student[0]->permanent_address}}</td>

</td>
</tr>
<tr>
<td>1O.TEL NO:</td>
<td>{{$student[0]->fathers_phone_no}}</td>
</tr>
<tr>
<td>11.MOBILE NO:
</td>
<td>{{$student[0]->student_phone_no}}</td>
</tr>
<tr>
<td>12. ADDRESS OF CORRESPONDENCE:</td>
<td>{{$student[0]->correspondence_address}}</td>

</td>
</tr>
 <tr>
<td colspan="2">1.Scholarship/Financial assiastance/loan received during last 4 years(eg:KVPY,NTSE)please specify categorically with proof :<br>
<table>
 
<tr>
<td align="center"><b>Name of Scholarship/<br>financial assistance/loan</b></td>
<td align="center"><b>Awarding Authority</b></td>
<td align="center"><b>Period for which awarded</b></td>
<td align="center"><b>Amount per Month</b></td>
<td align="center"><b>Total Amount Drawn</b></td>
</tr><?php
$scho_achm=DB::table('awards_achievement')->where('student_id',$student_id)->get();
?>
 @foreach ($scho_achm as $a)
<tr>
<td><input type="text" name="scholarship_name" maxlength="30" />{{$a->name}}</td>
<td><input type="text" name="award_authority" maxlength="30" />{{$a->awardiing_authority}}</td>
<td><input type="text" name="time_period" maxlength="30" />{{$a->p_time_period}}</td>
<td><input type="text" name="tot_amount" maxlength="30" />{{$a->amount}}</td>
</tr>
 @endforeach
<tr>

</table>
 
</td>
</tr>
<tr>
<td colspan="2">2.Grade in Prev semesters:<br>
<table border="1" >
 
<tr>
<td align="center" rowspan="2" ><b>Academic Year</b></td>
<td align="center" colspan="3"><b>1st Semester</b></td>
<td align="center" colspan="3"><b>2nd Semester</b></td>
</tr>
 <tr>
<td align="center" ><b>SPI</b></td>
<td align="center" ><b>CPI</b></td>
<td align="center" ><b>Rank Based <br>on CPI</b></td>
<td align="center" ><b>SPI</b></td>
<td align="center" ><b>CPI</b></td>
<td align="center" ><b>Rank Based <br>on CPI</b></td>
</tr>

<tr>
<td>Firstyear</td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Percentage" maxlength="30" /></td>
<td><input type="text" name="ClassX_YrOfPassing" maxlength="30" /></td>
<td><input type="text" name="ClassX_YrOfPassing" maxlength="30" /></td>

</tr>
 <tr>
<td>Second year</td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Percentage" maxlength="30" /></td>
<td><input type="text" name="ClassX_YrOfPassing" maxlength="30" /></td>
<td><input type="text" name="ClassX_YrOfPassing" maxlength="30" /></td>

</tr>
<tr>
<td>Third year</td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Percentage" maxlength="30" /></td>
<td><input type="text" name="ClassX_YrOfPassing" maxlength="30" /></td>
<td><input type="text" name="ClassX_YrOfPassing" maxlength="30" /></td>

</tr>
<tr>
<td>Fourth year</td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Percentage" maxlength="30" /></td>
<td><input type="text" name="ClassX_YrOfPassing" maxlength="30" /></td>
<td><input type="text" name="ClassX_YrOfPassing" maxlength="30" /></td>

</tr>
</table>
 
</td>
</tr>
<tr>
<td colspan="2"> <b>D)CULTURL ACHIEVEMENTS</b><br>Cultural Events outside IIITDMJ(IITs,NITs,IIITs)<br>
a.1st Prize:10 marks<br>b.2nd Prize:8 marks<br>c.3rd prize:6 marks <br>d.participation:4 marks<br>e.Events in IIITDMJ and lesser importance have half of the marks of previous case
<?php
$cul_achm=DB::table('achievements')->where([
    ['student_id',$student_id],
    ['ach_type','cultural'],
    ])->get();
?>
<table>
    <tr><th>S.No</th>
    <th>Cultural Achievements</th>
    </tr>
    <?php
$i=1;
    ?>
@foreach ($cul_achm as $a)
    <tr>
    <td>{{$i++}}</td>
    <td>{{$a->description}}</td>
    </tr>
    @endforeach
</table>

</td>
</tr>

</table>
</body>
</html>
