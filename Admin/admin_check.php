<?php 
    session_start();

	$password = $_POST['password']; 
	$admin_id=$_POST['adminid'];
	if($password && $admin_id){ 
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
        $qry= "SELECT password FROM administrator WHERE admin_id='$admin_id'";
        $result=mysqli_query($link,$qry) or die(mysqli_error($link));
        $array=mysqli_fetch_array($result);
        if($password == $array['password']) {
            $_SESSION['user_id']=$admin_id;
            header('Location:admin.php?msg='.$admin_id);
        }
        else{ 
            //Login failed 
            header('Location: index.php?msg=serror');
            exit(); 
        } 
    } 
    else {
        header:('Location: index.php?msg=serror');
    }
?>
