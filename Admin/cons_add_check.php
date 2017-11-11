<?php
    session_start();
    if(isset($_SESSION["user_id"])&&$_SESSION["user_id"]==$_GET["msg"]) {
        //Check all the required fields are filled 
        if(!($_POST['cons_id'])||!($_POST['first_name'])||!($_POST['contact_no'])||!($_POST['email'])||!($_POST['password'])||!($_POST['designation']))
        { 
        echo 'All the fields marked as * are compulsary.<br>'; 
        $validationFlag = false; 
        }

        else{ 
        $cons_id = $_POST['cons_id']; 
        $fname = $_POST['first_name']; 
        $lname = $_POST['last_name'];
        $designation = $_POST['designation']; 
        $email = $_POST['email'];
        $contact_no = $_POST['contact_no']; 
        $password = $_POST['password']; 
        $description = $_POST['description'];

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
        $pass =$fname.$cons_id;
        $qry=mysql_fetch_array(mysql_query("SELECT password FROM administrator WHERE admin_id LIKE '$get' "));
        //Create Insert query 
        if($password==$qry[0])
        $query = "INSERT INTO counsel_member (cons_id, first_name, last_name, designation, email, contact_no, password, description) VALUES ('$cons_id','$fname','$lname','$designation','$email','$contact_no','$pass','$description')"; 
        //Execute query 
        $results = mysql_query($query); 

        //Check if query executes successfully 
        if($results == FALSE) 
        echo mysql_error() . '<br>'; 
        else {
            echo 'Student successfully deleted... '; ?> 
            <a href="home1.php?msg=<?php echo $_GET["msg"]; ?>">Click Here</a>
        <?php
        }
    }
    else {
        header:('Location:index.php');
        exit();
    }
?>
