<?php
    session_start();
    if(isset($_SESSION["user_id"])&&$_SESSION["user_id"]==$_GET["msg"]) {
        //Check all the required fields are filled 
        if(!($_POST['admin_id'])||!($_POST['passold'])||!($_POST['passnew']))
        { 
        echo 'All the fields marked as * are compulsary.<br>'; 
        $validationFlag = false; 
        }

        else{ 
        $admin_id = $_POST['admin_id']; 
        $passold = $_POST['passold']; 
        $passnew = $_POST['passnew'];

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
        $get=$_GET["msg"];
        $qry=mysql_fetch_array(mysql_query("SELECT password FROM administrator WHERE admin_id LIKE '$get' "));
        //Create Insert query 
        if($passold==$qry[0]) {
            $query = "UPDATE administrator SET password= $passnew WHERE admin_id LIKE '$admin_id' ";
            $results = mysql_query($query);
            if($results == FALSE) 
                echo mysql_error() . '<br>'; 
            else {
                echo 'Password Succesfully Changed ... '; ?> 
                <a href="home1.php?msg=<?php echo $_GET["msg"]; ?>">Click Here</a>
        <?php
            }
        }
        else {
            echo 'Wrong Combination!!! ... '; ?> 
            <a href="home1.php?msg=<?php echo $_GET["msg"]; ?>">Click Here</a>
        <?php
        }
    }
    else {
        header:('Location:index.php');
        exit();
    }

?>