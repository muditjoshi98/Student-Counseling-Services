<?php
    session_start();
    if(isset($_SESSION["user_id"])&&$_SESSION["user_id"]==$_GET["msg"]) {
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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Home</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style_home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
    
<body>
    <div>
		<img class="responsive-img" src="assets/img/logo.jpg" width="100%" alt="College Logo">	
	</div>
    
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          Student Counselling Services
        </div>
        <div class="check"><ul class="nav navbar-nav navbar-right  ">
          <li><a href="../index.html">Home</a></li>
          <li><a href="../whycounselling.html">Why Counselling ??</a></li>
          <li><a href="passchange.php?msg=<?php echo $_GET["msg"]; ?>">Change Password</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul></div>
      </div>
    </nav>
    <div class=container>
        <div class="page-header" id="header">
            <h1>Welcome <u><?php echo " ".$_GET['msg'];?></u> </h1>                 
        </div>
    </div>
    
    
    <div class="container">
        <div class="row content">
            <div class="col-sm-3 sidenav" id="side">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="home1.php?msg=<?php echo $_GET["msg"]; ?>">Counseller</a></li>
                    <li><a href="home2.php?msg=<?php echo $_GET["msg"]; ?>">Student</a></li>
                    <li class='active'><a href="#">Requests</a></li>
                </ul><br>
            </div>

            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <a href="request_list.php?msg=<?php echo $_GET["msg"]; ?>" >
              <h4>View Requests</h4>
              <img src="assets/img/req.png" class="img-responsive" style="width:100%" alt="Requests">
            </a>                                                                                
            </div> 
        </div>
    </div>
    
    
    <?php
    }
    else {
        header:('Location:index.php');
        exit();
    }
?>
</body>
</html>