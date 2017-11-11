<?php
$email=$_POST['Semail'];
$password=$_POST['Spassword'];
$query = "SELECT first_name, last_name, roll_no, dept_code FROM student WHERE password = '$password'";
$result= mysqli_query($link,$query) or die(mysqli_error($link));
$array=mysqli_fetch_array($result);

			
