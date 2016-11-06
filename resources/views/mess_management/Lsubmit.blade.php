<?php //Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
// Code to be executed when 'Insert' is clicked. 
if ($_POST['submit'] == 'SUBMIT')

{ 
//validation flag to check that all validations are done 
$validationFlag = true; 
//Check all the required fields are filled 
if(!($_POST['roll'] && $_POST['fdate'] && $_POST['tdate'] && $_POST['group1'])){
	echo 'All the fields marked as * are compulsary.<br>'; 
	$validationFlag = false; 
} 
else{ $roll = $_POST['roll'];
 $fdate = $_POST['fdate'];
 $tdate = $_POST['tdate'];
 $reason =$_POST['group1'];
 
}
//If all validations are correct, connect to MySQL and execute the query 

if($validationFlag)
{ //Connect to mysql server 
$link = mysqli_connect('localhost', 'root', '');
 //Check link to the mysql server 
 if(!$link){ die('Failed to connect to server: ' . mysqli_error()); } 
 
 //Select database 
 $db = mysqli_select_db($link, 'fusion'); 
 
 if(!$db)
 {
	 die("Unable to select database"); 
	 } 
 //Create Insert query 
 $query = "INSERT INTO mess_leave_application(application_id,from_date,till_date,reason)VALUES($roll,$fdate, $tdate, $reason)"; 
 
 //Execute query 
 
 $results = mysqli_query($link, $query); 
 //Check if query executes successfully 
 if($results == FALSE) echo mysqli_error($link) . '<br>'; 
 else
	 header('location:Lsubmit.blade.php'); 
 } 
 
 } 
 // Code to be executed when 'Update' is clicked. 
 
 
else{
	header('location:Leave.blade.php'); 
exit(); 

}

 ?>
 
 
 
 
 