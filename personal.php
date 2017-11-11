<?php
session_start();
$get=$_GET["user_id"];
?>
<html>
<head>


 <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" href = "assets/css/style_team.css">
  </head>
  
  
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="#">Student Counselling Service</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="student_profile.php?user_id=<?php echo $get ; ?>">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Our Services <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="personal.php?user_id=<?php echo $get ; ?>">Personal</a></li>
          <li><a href="academic.php?user_id=<?php echo $get ; ?>">Academic</a></li>
          <li><a href="career.php?user_id=<?php echo $get ; ?>">Career</a></li>
        </ul>
      </li>
      <li><a href="#">Request</a></li>
	  </ul>
	   <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Edit Profile</a></li>
      <li><a href="student_logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
    </ul>
  </div>
</nav>



	<?php
		if(isset($_SESSION["user_id"])&&$_SESSION["user_id"]==$_GET["user_id"]) {
			$link = @mysql_connect('dbms.iiitdmj.ac.in', '2016162', '292795f5');  

		/*Check link to the mysql server*/ 
		if(!$link)
		{ 
			die('Failed to connect to server: ' . mysql_error());
		} 

		/*Select database*/ 
		$db = mysql_select_db('2016162'); 
		if(!$db)
		{
			die("Unable to select database"); 
		}
		$qry = 'SELECT first_name, last_name, designation, email, contact_no, description  FROM speciality, counsel_member 
		WHERE speciality.cons_id = counsel_member.cons_id AND speciality="Personal"';
		$result = mysql_query($qry);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
			}		
		echo '<br><br><br><h1><center>Our Personal counselling team </center></h1>';
		$i=0;
		while($array=mysql_fetch_assoc($result)) {
			$arr[]=array($array);
			$i++;
		}
		$j=$i;
		for($i=0;$i<$j;$i=$i+3) {
			echo'<br><br><center><div class="row" >';
	if($j>($i))	{	
			
			echo'<div class="column" style="margin-left:6%" >
			<div class="card" >
			<center><img src="assets/img/profile.jpg" class="img-circle" alt="Cinque Terre" width="170" height="170" class="a"></center>
			<div class="container">
			<h2>'.$arr[$i][0]['first_name'].' '.$arr[$i][0]['last_name'].'</h2>
			<p class="title">'.$arr[$i][0]['designation'].'</p>
			<p>'.$arr[$i][0]['description'].'</p>
			<p>'.$arr[$i][0]['email'].'</p>
			<p>'.$arr[$i][0]['contact_no'].'</p>
      </div>
    </div>
  </div>';
	}
	
if($j>($i+1)){
  echo'<div class="column">
   <div class="card">
      <center><img src="assets/img/profile.jpg" class="img-circle" alt="Cinque Terre" width="170" height="170"></center>
      <div class="container">
        <h2>'.$arr[$i+1][0]['first_name'].' '.$arr[$i+1][0]['last_name'].'</h2>
			<p class="title">'.$arr[$i+1][0]['designation'].'</p>
			<p>'.$arr[$i+1][0]['description'].'</p>
			<p>'.$arr[$i+1][0]['email'].'</p>
			<p>'.$arr[$i+1][0]['contact_no'].'</p>
      </div>
    </div>
  </div>';
}
if($j>($i+2)){
	echo ' <div class="column">
    <div class="card">
      <center><img src="assets/img/profile.jpg" class="img-circle" alt="Cinque Terre" width="170" height="170"></center>
      <div class="container">
        <h2>'.$arr[$i+2][0]['first_name'].' '.$arr[$i+2][0]['last_name'].'</h2>
			<p class="title">'.$arr[$i+2][0]['designation'].'</p>
			<p>'.$arr[$i+2][0]['description'].'</p>
			<p>'.$arr[$i+2][0]['email'].'</p>
			<p>'.$arr[$i+2][0]['contact_no'].'</p>
      </div>
    </div>
  </div>
</div></center>';
} 

			
			
		//echo $arr[$i][0]['first_name']."<br>";
		}
		}
else{ 
header('location:login_form.php'); 
exit(); 
} 
		
		
		?>
	
</body>
</html>