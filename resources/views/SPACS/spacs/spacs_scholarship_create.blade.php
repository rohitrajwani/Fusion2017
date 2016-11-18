<html>
<head>
<title>SCHOLARSHIPS</title>
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
<h3>New Scholarship</h3>
<form action="/SPACS/spacs_create_sch" method="POST">
 
<table align="center" cellpadding = "10" height="500" width="500">

+
<!----- First Name ---------------------------------------------------------->
<tr>
<td>Title</td>
<td>
<select name="title">
        <option value="" disabled selected><center>Choose your option</center></option>
        <option value="MCM Scholarship">MCM</option>
</select></td>

</tr>
<tr>
<td>Type</td>
<td><select name="type">
        <option value="" disabled selected><center>Choose your option</center></option>
        
        <option value="scholarship">Scholarship</option>

</select>
</td>
</tr>
<tr>
<td>Description:</td>
<td><textarea name="description" maxlength="500"></textarea>
</td>
</tr>
<tr>
<td>Start Date</td>
<td><input type="text" name="startdate" maxlength="30"/>
</td>
</tr>
<tr>
<td>End Date</td>
<td><input type="text" name="enddate" maxlength="30"/>
</td>
</tr>


<td colspan="2">
<center><button class="button button2">SUBMIT</button>
</center>
</td>
</tr>
</table>
</body>
</html>
