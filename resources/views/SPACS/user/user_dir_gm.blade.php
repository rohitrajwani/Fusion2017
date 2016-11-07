<?php
$scholarship_id=$_GET['id'];
$user_id=Auth::user()->username;
?>
<html>
<head>
<title>DIRECTOR GOLD MEDALS</title>
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
<h3>DIRECTORS GOLD MEDAL(UG)</h3>
<form name="dir_gm_form" action="/SPACS/dir_gm_form/{{$scholarship_id}}/{{$user_id}}" method="POST">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
<table align="center" cellpadding = "10">
 <tr>
 <td colspan="2">
 <h4><bold><br><br>Part-A</bold></h4><br>
 <h2><bold>PERSONAL DETAILS</bold></h2>
 
 </td>
 </tr>
 <?php
$student=DB::table('student')->where('student_id',Auth::user()->username)->get();
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
<td colspan="2" >
 <h4><bold><br><br>Part-B</bold></h4><br>
 <h2><bold>PROFESSIONAL ACHIEVEMENTS/LAURELS</bold></h2>
 </td>
 </tr>
<tr>
<?php
$scholarship=DB::table('medals_awards_scholarship')->where('scholarship_id',$scholarship_id)->get();
?>
<td colspan="2" >
<h4>Notes:<br>i.Eligibility Criteria:Minimum 8.0 CPI<br>
ii.Enclose Photocopy of Grade Sheets And other relevent Documents.<br>
iii.Incomplete forms will not be accepted <br>
iv.Last date for Submission is {{$scholarship[0]->end_date}}<br>
v.Please support all claims with authenticated documents.<br>
vi.Please fill form strictly in order of information sought lest the data will be lost.<br>
vii.You Should not have been indicted by SAC.<br>
viii.For internal festivals like tarang,abhikalpan,gusto the certificate for participation does not fetch any marks to candidates.<br>Marks may be assigned for being core team member or executive member for any of the internal festival.</h4>


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
$scho_achm=DB::table('awards_achievement')->where('student_id',Auth::user()->username)->get();
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
<tr><td colspan="2">3.Participation in various activities from Aug <input type="text" name="ClassX_Board" maxlength="30" /> to April<input type="text" name="ClassX_Board" maxlength="30" /><br>
(i)Carefully mention Separately the activities done in IIITDM JABALPUR and outside IIITDM JABALPUR.</td>
</tr>
<tr>
<td colspan="2"><b> A)Academic Achievements</b>
<?php
$acad_achm=DB::table('achievements')->where([['student_id',Auth::user()->username],
	['ach_type','academic'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th>Achievements </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($acad_achm as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>
</td>
</tr>

<tr>
<td colspan="2"> <b>B)RESEARCH ACTIVITIES</b><br>[Kindly attach the manuscript published or accepted for publication along with comments of editor in chief.without enclosure <br>no marks will be alloted.ensure manuscript no. is properly depicted]<br>a.&nbsp&nbsp National conference:1 mark<br>
              b.International conference:2 marks<br>c.Internaational conference Referred:3 marks<br>d.Journal:6 marks<br>e.Journal of high Repute:10 marks.</td></tr>
 <tr><td colspan="2">
<?php
$res_achm=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
	['ach_type','research'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th>Research Achievements </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($res_achm as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>
	</td>
	</tr>
	<tr>
<td colspan="2"> <b>C)Science and Technology Achievements</b><br>Technical Events outside IIITDMJ(IITs,NITs,IIITs)<br>
a.1st Prize:10 marks<br>b.2nd Prize:8 marks<br>c.3rd prize:6 marks <br>d.participation:4 marks<br>e.Events in IIITDMJ and lesser importance have half of the marks of previous case
<?php
$sci_achm=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
	['ach_type','science'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th>Science and Technology Achievements </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($sci_achm as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>
</td>
</tr>
<tr>
<td colspan="2"> <b>D)CULTURL ACHIEVEMENTS</b><br>Cultural Events outside IIITDMJ(IITs,NITs,IIITs)<br>
a.1st Prize:10 marks<br>b.2nd Prize:8 marks<br>c.3rd prize:6 marks <br>d.participation:4 marks<br>e.Events in IIITDMJ and lesser importance have half of the marks of previous case
<?php
$cul_achm=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
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
<tr>
<td colspan="2"> <b>E)GAMES AND SPORTS ACHIEVEMENTS</b><br>games and Sports Events outside IIITDMJ(IITs,NITs,IIITs)<br>
a.1st Prize:10 marks<br>b.2nd Prize:8 marks<br>c.3rd prize:6 marks <br>d.participation:4 marks<br>e.Events in IIITDMJ and lesser importance have half of the marks of previous case
<?php
$games_achm=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
	['ach_type','games'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th> Games and Sports Achievements </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($games_achm as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>
</td>
</tr>
<tr>
<td colspan="2"> <b>F)SOCIAL SERVICE</b>
<?php
$service_achm=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
	['ach_type','service'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th>Services Rendered </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($service_achm as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>

</td>
</tr>
<tr>
<td colspan="2"> <b>G)CORPORATE SERVICES</b><br>The services rendered by applicant in volunteering/smooth conduction of institute events like conference/workshop etc(other than student event)
<?php
$corp_service_achm=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
	['ach_type','corporate_service'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th>Achievements </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($corp_service_achm as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>

</td>
</tr>
<tr>
<td colspan="2"> <b>H)PARTICIPATION IN HALL RELATED ACTIVITIES</b><br>
a.Hall president:8 marks<br>b.Mess secretary:6 marks<br>c.Other Hall Secretaries:4 marks <br>d.member HEC:2 marks
<?php
$hall_activities_achm=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
	['ach_type','hall_activities'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th>Participation </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($hall_activities_achm as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>
</td>
</tr>
<tr>
<td colspan="2"> <b>I)GYMKHANA RELATED ACTIVITIES</b><br>a.Gymkhana President or Equivalent:10 marks<br>b.Gymkhana Secretaries or equivlent:8 marks<br>c.Gymkhana Senate member:4 marks 
<?php
$gymkhana_achm=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
	['ach_type','gymkhana'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th>Participation </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($gymkhana_achm as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>
</td>
</tr>
<tr>
<td colspan="2"> <b>J)PARTICIPATION IN INSTITUTE RELATED ACTIVITIES</b><br>
Institute Related Activity:4 marks(eg.member of UGCS/SACS/Placement cell or any other institute committee
<?php
$inst_activity=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
	['ach_type','institute_related'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th>Participation </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($inst_activity as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>

</td>
</tr>
<tr>
<td colspan="2"> <b>K)PARTICIPATION IN STUDENT COUNSELLING SERVICES</b><br>
a.Head Counselling:8 marks<br>b.Assistant Co-ordinater:5 marks<br>c.Student guide:3 marks 
<?php
$counselling_service=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
	['ach_type','counselling_service'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th>Participation </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($counselling_service as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>
</td>
</tr>
<tr>
<td colspan="2"> <b>K)ANY OTHER ACTIVITIES WORTH FOR MENTIONING</b> 
<?php
$other_achm=DB::table('achievements')->where([
	['student_id',Auth::user()->username],
	['ach_type','others'],
	])->get();
?>
<table>
	<tr><th>S.No</th>
	<th> Other Achievements/Activities </th>
	</tr>
	<?php
$i=1;
	?>
@foreach ($other_achm as $a)
	<tr>
	<td>{{$i++}}</td>
	<td>{{$a->description}}</td>
	</tr>
	@endforeach
</table>
</td>
</tr>
<tr >

<td colspan="2">
On clicking submit button you hereby ensure that,<br>
I Declare all entries in this form are true to the bestof my knowledge and belief
</td>
</tr>
<td colspan="2">
<center><button class="button button2">SUBMIT</button>
</center>
</td>
</tr>
</table>
</td>
</tr>
</table> 
</body>
</html>
