<?php

//Check all the required fields are filled 
if(!($_POST['roll_no'])||!($_POST['fname'])||!($_POST['father_name'])||!($_POST['contact_no'])||!($_POST['password'])||!($_POST['email']))
{ 
echo 'All the fields marked as * are compulsary.<br>'; 
$validationFlag = false; 
}

else{ 
$roll_no = $_POST['roll_no']; 
$fname = $_POST['fname']; 
$lname = $_POST['lname']; 
$gender = $_POST['sex']; 
$dob = $_POST['dob']; 
$fathers_name = $_POST['father_name'];
$dept = $_POST['dept_code']; 
$hostel = $_POST['hostel_id']; 
$contact_no = $_POST['contact_no'];
$password = $_POST['password']; 
$email = $_POST['email'];
}



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
//Create Insert query 
$query = "INSERT INTO student (roll_no, first_name, last_name, email, password, date_of_birth, contact_no, fathers_name, sex, dept_code, hostel_id ) 
VALUES ('$roll_no','$fname','$lname','$email','$password','$dob','$contact_no','$fathers_name','$gender','$dept','$hostel')"; 
//Execute query 
$results = mysql_query($query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysql_error() . '<br>'; 
else {
echo 'Data inserted successfully! Welcome to IIITDMJ Counseling.'; 
echo '<a href="index.html">Click Here</a>';
}
?>
