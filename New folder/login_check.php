<?php 
if ($_POST['submit'] == 'Login'){ 
//Collect POST values 
$login = $_POST['login']; 
$password = $_POST['password']; 
if($login && $password){ 
//Connect to mysql server 
$link = @mysql_connect('dbms.iiitdmj.ac.in', '2016162', '292795f5'); 
//Check link to the mysql server 
if(!$link) { 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('2016162'); 
if(!$db) { 
die("Unable to select database"); 
} 
//Create query (if you have a Logins table the you can select login id and password from there)
//$qry='SELECT * FROM Logins WHERE login_id = "ABC" AND password = "12345"'; 
//Execute query 
//$result=mysql_query($qry); 
//Check whether the query was successful or not 
$qry= "SELECT password FROM counsel_member WHERE cons_id=$login"	;
$query = mysql_fetch_array(mysql_query($qry));

if($password == $query['password']) {
	include('counseler_login.html');
	echo'<center> Correct Username and Password !!!</center>';
	$count=1;
}
else{ 
//Login failed 
include('counseler_login.html'); 
echo '<center>Incorrect Username or Password !!!</center>'; 
exit(); 
} 
}


else{ 
include('counseler_login.html'); 
echo '<center>Username or Password missing!!</center>'; 
exit(); 
} 
} 
else{ 
header("location: counseler_login.html"); 
exit(); 
} 
?>
