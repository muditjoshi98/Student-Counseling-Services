<?php 
session_start();

if($_POST['Ssubmit']) {
	$email=$_POST['Semail'];
	$password = $_POST['Spassword']; 
	if($password && $email){ 
	//Connect to mysqli server 
	$link = mysqli_connect('dbms.iiitdmj.ac.in','2016162','292795f5'); 
	//Check link to the mysqli server 
	if(!$link) { 
	die('Failed to connect to server: ' . mysqli_error()); 
	} 
	//Select database 
	$db = mysqli_select_db($link,'2016162'); 
	if(!$db) { 
	die("Unable to select database"); 
	} 
	//Create query (if you have a Logins table the you can select login id and password from there)
	$qry= "SELECT password FROM student WHERE email='$email'";
	$result=mysqli_query($link,$qry) or die(mysqli_error($link));
	$array=mysqli_fetch_array($result);
	if($password == $array['password']) { 
		$_SESSION["user_id"] = $email; 
		header('Location:student_profile.php?user_id='.$email);
	}
	else{ 
		//Login failed 
		header('Location: login.php?msg=serror');
		exit(); 
	} 
	}

	else{ 
	include('login.php'); 
	echo '<center>Username or Password missing!!</center>'; 
	exit(); 
	} 
}
else {
	$email=$_POST['Cemail'];
	$password = $_POST['Cpassword']; 
	if($password && $email){ 
	//Connect to mysqli server 
	$link = mysqli_connect('dbms.iiitdmj.ac.in','2016162','292795f5'); 
	//Check link to the mysqli server 
	if(!$link) { 
	die('Failed to connect to server: ' . mysqli_error()); 
	} 
	//Select database 
	$db = mysqli_select_db($link,'2016162'); 
	if(!$db) { 
	die("Unable to select database"); 
	} 
	//Create query (if you have a Logins table the you can select login id and password from there)
	$qry= "SELECT password FROM counsel_member WHERE email='$email'";
	$result=mysqli_query($link,$qry) or die(mysqli_error($link));
	$array=mysqli_fetch_array($result);
	if($password == $array['password']) {
		header('Location:counsel.php');
	}
	else{ 
		//Login failed 
		header('Location: login.php?msg=cerror');
		exit(); 
	} 
	}

	else{ 
	include('login.php'); 
	echo '<center>Username or Password missing!!</center>'; 
	exit(); 
	} 
}
?>
