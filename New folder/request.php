<?php
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
//validation flag to check that all validations are done 
$validationFlag = true; 
//Check all the required fields are filled 
if(!($_POST['roll_no'])||!($_POST['cons_id'])||!($_POST['counsel_type']))
{ 
echo 'All the fields marked as * are compulsary.<br>'; 
$validationFlag = false; 
} 

else{ 
$roll_no = $_POST['roll_no']; 
$cons_id = $_POST['cons_id']; 
$counsel_type = $_POST['counsel_type'];
$desc= $_POST['desc'];
}


//If all validations are correct, connect to MySQL and execute the query 
if($validationFlag){ 
//Connect to mysql server 
$link = @mysql_connect('dbms.iiitdmj.ac.in', '2016162', '292795f5'); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('2016162'); 
if(!$db){ 
die("Unable to select database"); 
} 


$query = "INSERT INTO provide_counseling (roll_no, cons_id, type_of_service, description) VALUES ('$roll_no','$cons_id','$counsel_type','$desc')";
//Execute query 
$results = mysql_query($query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysql_error() . '<br>'; 
else 
echo 'Data inserted successfully! '; 
} 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>