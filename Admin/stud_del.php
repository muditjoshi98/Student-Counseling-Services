<?php
    session_start();
    if(isset($_SESSION["user_id"])&&$_SESSION["user_id"]==$_GET["msg"]);
    else {
        header:('Location:index.php');
        exit();
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
                    <li class='active'><a href="home2.php?msg=<?php echo $_GET["msg"]; ?>">Student</a></li>
                    <li><a href="home3.php?msg=<?php echo $_GET["msg"]; ?>">Requests</a></li>
                </ul><br>
            </div>
            
            <div class="col-sm-1"></div>
            <div class="col-sm-1"></div>
            <div class="col-sm-6">
                <h2>Enter the details of the student</h2>
                <form action="stud_del_check.php?msg=<?php echo $_GET["msg"]; ?>" method="post">
                    <div class="form-group">
                        <label for="roll_no">Roll No:</label>
                        <input type="text" class="form-control" id="roll_no" placeholder="Enter Roll No" name="roll_no" required>
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" placeholder="Enter name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Admin Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter You Password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>            
        </div>
    </div>
</body>
</html>