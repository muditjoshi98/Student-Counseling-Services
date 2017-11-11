<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Counselling Services</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
	<body>
		<div>
			<img class="responsive-img" src="assets/img/logo.jpg" width="100%" alt="College Logo">	
		</div>
		<div class="menu">
			<h2>Student Counselling Services</h2>
			<nav>
				<li><a href="../index.html">Home</a></li>
				<li><a href="../whyconselling.html">Why Conselling??</a></li>
				<li><a href="../aboutus.html">About Us</a></li>
				<li><a href="../login.php">Login</a></li>
				<li><a href="../register.html">Register</a></li>
			</nav>
		</div>
		<div class="form">
			<form action="admin_check.php" method="POST">
			  <div class="container">
			  	<h2>Admin Login Form</h2><br>
				<label><b>Admin ID</b></label>
				<input type="text" placeholder="Enter ID" name="adminid" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
                <?php
                    if(array_key_exists("msg",$_GET)){
                        if($_GET['msg']=='serror')
                        {
                        echo '<p class="incorrect">Incorrect Login or Password</p>';
                        }
                    } 
                ?>
				<button type="submit">Login</button>	
			  </div>

			  <div class="container">
				<button type="button" class="cancelbtn"><a href="../index.html">Cancel</a>	</button>
			  </div>
			</form>
		</div>
	</body>
</html>