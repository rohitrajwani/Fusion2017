<?php
$scholarship_id=$_GET['id'];
$user_id=Auth::user()->username;
?>
<html>
<head>
<title>MCM</title>
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
<?php
$student=DB::table('student')->where('student_id',$user_id)->get();

?>

</style>
</head>
 
<body>
<h3>APPLICATION FO MCM</h3>
<form action="/SPACS/mcm_form/{{$scholarship_id}}/{{$user_id}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}} ">
 
<table align="center" cellpadding = "10">

 
<!----- First Name ---------------------------------------------------------->
<tr>
<td>1.NAME OF THE APPLICANT</td>
<td>{{$student[0]->name}}
</td>
</tr>
 
<!----- Last Name ---------------------------------------------------------->
<tr>
<td>2.CATEGORY</td>
<td>{{$student[0]->category}}


</td>
</tr>
 
 <tr>
<td>3.  (i)Institute Roll No:</td>
<td>{{$student[0]->roll_no}}
</td>
</tr>
 <tr>
<td>   &nbsp&nbsp&nbsp (ii)hall:</td>
<td>{{$student[0]->hall_no}}
</tr>
<tr>
<td>  &nbsp&nbsp&nbsp (iii) Room No :</td>
<td>{{$student[0]->room_no}}
</td>
</tr>


 
<!----- Email Id ---------------------------------------------------------->
<tr>
<td>4.EMAIL ID</td>
<td>{{$student[0]->name}}email</td>
</tr>
 
<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>5.MOBILE NUMBER</td>
<td>{{$student[0]->student_phone_no}}
</td>
</tr>
<ol type="i" start="1">
<tr>
        <td><li >
        Father Name:<br>
      </li></td>
      <td>{{$student[0]->fathers_name}}<br>
      </td>
 </tr>
 <tr>
      <td><li>Mother Name:<br>
        </li></td>
        <td> {{$student[0]->mothers_name}}<br>
      </td>
 </tr>
 <tr>
      <td><li>Name of Brother*:<br>
        </li></td>
        <td> <input type="text" name="b_name" ><br>
      </td>
 </tr>

<tr>
      <td>Occupation of Brother*:<br>
        </td>
        <td> <input type="text" name="occu_bro" ><br>
      </td>
 </tr>
 <tr>
      <td><li>Name of Sister*:<br>
        </li></td>
        <td> <input type="text" name="s_name" ><br>
      </td>
 </tr>
 <tr>
      <td>Occupation of Sister*:<br>
        </td>
        <td> <input type="text" name="occu_sis" value=" "><br>
      </td>
 </tr>
 </ol>        
 <!----- Address ---------------------------------------------------------->
<tr>
<td>6. POSTAL ADDRESS OF FATHER/GUARDIAN:<br /><br /><br /></td>
<td>{{$student[0]->permanent_address}}</td>
</tr>
 <tr>
 <td>
 7.(i)Fathers Gross Annual Income<br>
 &nbsp&nbsp&nbsp(ii)Mothers Gross Annual Income(If Necessary)<br>
 &nbsp&nbsp&nbsp(iii)Annual Income From Other Source<br>(i.e investment in bank/post office/UTI/LIC/Shares/<br>Debenture/Landed Property/Income in Name of Student etc., )<br>
</td>
</tr>
 <tr>
 <td>
 TOTAL OF (i)+(ii)+(iii):
 </td>
 <td>
 <input type="text" name="tot_an_inc_p" ><br>
      </td>
 </tr>
 <tr>
 <td>8.FATHERS/GUARDIANS OCCUPATIONAL STATUS:</td>
 </tr>
 <tr>
<td>&nbsp&nbsp&nbsp A)IN SERVICE(OR)
</td>
<td><input type="radio" name="service_type" value="Public"  />Public
<input type="radio" name="service_type" value="Governmet" />Government
<input type="radio" name="service_type" value="Private" />Private
</td>
</tr>
 <tr>
<td>&nbsp&nbsp&nbsp B)PENSIONERS/FAMILY PENSIONERS<br>
(Supported by Non Employment Certificate to be issued by<br> SDO/BDO/MRO/Tahsildar/Gram Panchayat etc.,
</td>
<td><input type="radio" name="poccupation" value="pensioner" />Yes
<input type="radio" name="poccupation" value="not a pensioner" />No
</td>
</tr>
 <tr>
<td>&nbsp&nbsp&nbsp C)OTHER THAN SALARIED/PENSIONERS<br>
(Supported by Annual Income Certificate to be issued by<br> SDO/BDO/MRO/Tahsildar/Gram Panchayat etc.,
</td>
</tr>
<tr><td >&nbsp&nbspIf Business/Medical/Legal Practitioner/Consultant etc.,</td>
<td>a)Name and address of firm/Organization/Shop: <input type="text" name="firm_address" ><br>
b)Nature of Trade/Business:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="nature_of_business" ><br>

c)Trade/Prof. License/Reg No: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="registration_no" ><br>
d)Sales Tax/Commercial Tax No/Zone/: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="tax_reg_no" ><br>
</td>
</tr>
<tr>
<td>9.MOTHERS OCCUPATION:<br>(If employed Provide the Address)</td>
<td><textarea name="m_occ_address" rows="4" cols="30"></textarea></td>
</tr>
<hr>
<tr >

<td colspan="2">
<center>DECLARATION</center>
&nbsp&nbsp&nbsp&nbsp I Declare the following Things:
1.No Disciplinary Action Has Been Taken Against Me in the Preceeding Year.<br>
2.I am Not in receipt of any other Scholarship/Stipend/Financial assistance etc from any other sources.

</td>
</tr>
<tr >

<td colspan="2">
<input type="checkbox" name="declare" value="declare" />I Declare
</td>
</tr>

<tr >

<td colspan="2">
<center><button class="button button2">SUBMIT</button>
</center>
</td>
</tr>














<!----- City ----------------------------------------------------------
<tr>
<td>CITY</td>
<td><input type="text" name="City" maxlength="30" />
(max 30 characters a-z and A-Z)
</td>
</tr>
 
<!----- Pin Code ----------------------------------------------------------
<tr>
<td>PIN CODE</td>
<td><input type="text" name="Pin_Code" maxlength="6" />
(6 digit number)
</td>
</tr>
 
<!----- State ----------------------------------------------------------
<tr>
<td>STATE</td>
<td><input type="text" name="State" maxlength="30" />
(max 30 characters a-z and A-Z)
</td>
</tr>
 
<!----- Country ----------------------------------------------------------
<tr>
<td>COUNTRY</td>
<td><input type="text" name="Country" value="India" readonly="readonly" /></td>
</tr>
 
<!----- Hobbies ----------------------------------------------------------
 
<tr>
<td>HOBBIES <br /><br /><br /></td>
 
<td>
Drawing
<input type="checkbox" name="Hobby_Drawing" value="Drawing" />
Singing
<input type="checkbox" name="Hobby_Singing" value="Singing" />
Dancing
<input type="checkbox" name="Hobby_Dancing" value="Dancing" />
Sketching
<input type="checkbox" name="Hobby_Cooking" value="Cooking" />
<br />
Others
<input type="checkbox" name="Hobby_Other" value="Other">
<input type="text" name="Other_Hobby" maxlength="30" />
</td>
</tr>
 
<!----- Qualification----------------------------------------------------------
<tr>
<td>QUALIFICATION <br /><br /><br /><br /><br /><br /><br /></td>
 
<td>
<table>
 
<tr>
<td align="center"><b>Sl.No.</b></td>
<td align="center"><b>Examination</b></td>
<td align="center"><b>Board</b></td>
<td align="center"><b>Percentage</b></td>
<td align="center"><b>Year of Passing</b></td>
</tr>
 
<tr>
<td>1</td>
<td>Class X</td>
<td><input type="text" name="ClassX_Board" maxlength="30" /></td>
<td><input type="text" name="ClassX_Percentage" maxlength="30" /></td>
<td><input type="text" name="ClassX_YrOfPassing" maxlength="30" /></td>
</tr>
 
<tr>
<td>2</td>
<td>Class XII</td>
<td><input type="text" name="ClassXII_Board" maxlength="30" /></td>
<td><input type="text" name="ClassXII_Percentage" maxlength="30" /></td>
<td><input type="text" name="ClassXII_YrOfPassing" maxlength="30" /></td>
</tr>
 
<tr>
<td>3</td>
<td>Graduation</td>
<td><input type="text" name="Graduation_Board" maxlength="30" /></td>
<td><input type="text" name="Graduation_Percentage" maxlength="30" /></td>
<td><input type="text" name="Graduation_YrOfPassing" maxlength="30" /></td>
</tr>
 
<tr>
<td>4</td>
<td>Masters</td>
<td><input type="text" name="Masters_Board" maxlength="30" /></td>
<td><input type="text" name="Masters_Percentage" maxlength="30" /></td>
<td><input type="text" name="Masters_YrOfPassing" maxlength="30" /></td>
</tr>
 
<tr>
<td></td>
<td></td>
<td align="center">(10 char max)</td>
<td align="center">(upto 2 decimal)</td>
</tr>
</table>
 
</td>
</tr>
 
<!----- Course ----------------------------------------------------------
<tr>
<td>COURSES<br />APPLIED FOR</td>
<td>
BCA
<input type="radio" name="Course_BCA" value="BCA">
B.Com
<input type="radio" name="Course_BCom" value="B.Com">
B.Sc
<input type="radio" name="Course_BSc" value="B.Sc">
B.A
<input type="radio" name="Course_BA" value="B.A">
</td>
</tr>
</ol>
 
<!----- Submit and Reset -------------------------------------------------
<tr>
<td colspan="2" align="center">
<input type="submit" value="Submit">
<input type="reset" value="Reset">
</td>
</tr>
</table>
 
</form>
 
</body>
</html>
