<?php
    session_start();
    if(isset($_SESSION["user_id"])&&$_SESSION["user_id"]==$_GET["msg"]) {
        if(!($_POST['cons_id'])||!($_POST['first_name'])||!($_POST['password'])) { 
            header('Location:cons_del.php?msg='.$_GET["msg"]);
            exit();
        } 
        else { 
            $get=$_GET["msg"];
            $cons_id = $_POST['cons_id']; 
            $first_name = $_POST['first_name']; 
            $password = $_POST['password']; 
        }
        
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
        $query="DELETE FROM counsel_member WHERE cons_id= $cons_id AND first_name='$first_name' AND '$password' LIKE (SELECT password FROM administrator WHERE admin_id='$get')";
        $result = mysql_query($query);
        if($result) {
            echo 'Counsel Member successfully deleted... '; ?> 
            <a href="home1.php?msg=<?php echo $_GET["msg"]; ?>">Click Here</a>';
        <?php
        }
        else {
            echo mysql_error() . '<br>';
        }
    }
    else {
        header:('Location:index.php');
        exit();
    }
?>