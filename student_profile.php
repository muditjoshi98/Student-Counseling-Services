<?php
session_start();
$get=$_GET["user_id"];
?>
	
<!doctype html>
<html lang="en">
<head>
		 <style>
		 		 
 body {
      background-image: url("assets/img/hope.jpg");
min-height: 100%;
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center;
background-size: cover;
opacity: .95;
}

  }
  ul.nav-pills {
      top: 20px;
      position: fixed;
  }
  div.col-sm-9 div {
      height: 250px;
      font-size: 28px;
  }
  
 
  
  .style_prevu_kit
{
    display:inline-block;
    border:0;
    width:250px;
    height:250px;
    position: relative;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1); 
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1); 
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1);
    transition: all 200ms ease-in;
    transform: scale(1);   
	color: #fff;
	padding:1%;
}
.style_prevu_kit:hover
{
    box-shadow: 0px 0px 150px #000000;
    z-index: 2;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1.2);
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1.2);   
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1.2);
    transition: all 200ms ease-in;
    transform: scale(1.1);
}
  

    }
  }
  
 
  </style>
		
		<title>database connections</title>
		 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
		
		
	<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
	
	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
    <div class="navbar-header">
     <a class="navbar-brand" href="#">Student Counselling Service</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a  href="#">Home</a></li>
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
				$username = "2016162";
				$password = "292795f5";
				$host = "dbms.iiitdmj.ac.in";
				$email=$_GET["user_id"];
				$connector = @mysql_connect($host,$username,$password) or die("Unable to connect");
				$selected = mysql_select_db("2016162") or die("Unable to connect");

				//execute the SQL query and return records
				$qry= "SELECT * FROM student WHERE email='$email'";
				$result = mysql_query($qry);
		
				$row = mysql_fetch_array( $result);
				echo '<br><br><br><h2><center><marquee>Welcome '.$row['first_name'].' to our counselling service.</marquee></center></h2><br><br>'; 
				echo '<div><div class="container" style="float: left; width:25%; margin-left:3% ">            
				<img src="assets/img/profile.jpg" class="img-circle" alt="Cinque Terre" width="200" height="200"> 
				</div><br>
				 
					
					 <div class="container" style="float: right; width:70%; ">
          <br><table class="table table-striped" style="width: 4%; padding:2px; width:50%; ">
        <tr><td style="font-size: 20px; background-color: #ECF0F1; width: 40%;padding:4px">Name</td><td style="font-size: 20px; background-color: #ECF0F1; padding:4px">'.$row['first_name'].' '.$row['last_name'].'</td></tr>
		<tr><td style="font-size: 20px; background-color: #ABEBC6  ;width: 40%;padding:4px" >Roll Number</td><td style="font-size: 20px ; background-color: #ABEBC6;padding:4px  ">'.$row['roll_no'].'</td></tr>
        <tr><td style="font-size: 20px; background-color: #ECF0F1;width: 40%;padding:4px" >Discipline</td><td style="font-size: 20px; background-color:#ECF0F1 ;padding:4px   ">'.$row['dept_code'].'</td></tr>
		<tr><td style="font-size: 20px;  background-color: #ABEBC6  ;width: 40%;padding:4px ">Contact Number</td><td style="font-size: 20px; background-color: #ABEBC6 ;padding:4px ">'.$row['contact_no'].'</td></tr>
	  </table>
  </div>
</div>';
    
	echo'<br><br><br><div style=" width:100%;">

<br><div class="style_prevu_kit" style="background-color: #73C6B6; width:60%; margin-left:20%; margin-top:5%; margin-bottom: 1%">
<h2>Personal Counselling</h2>
        <p style="font-size: 17px" >Personal counselling is a one on one counselling process of a patient and a trained psychiatrist,
		psychotherapist or psychologist.
		It is mainly a process of self-discovery and overcoming your problems, where a person works out his/her issues under the guidance of an expert. 
		Individual counselling is popular because it provides the setting for a patient to talk openly about his/her problems and disclose his/her feelings, without fear of being judged. 
		Individual counselling helps patients explore themselves better and work out their issues, 
		and basically discuss issues which they may not be comfortable discussing with others.</p></div>
<div class="style_prevu_kit" style="background-color:#2471A3; width:60%; margin-left: 10%; margin-top:1%; margin-bottom: 1% ">
<h2>Academic Counselling</h2>
        <p style="font-size: 17px">Academics is one of the biggest reasons of stress and anxiety in students and parents alike. 
		So academic counselling is counselling pertaining to time management, procrastination and study tips. 
		We also provide you with the guides that helps you to clear your doubts clearly and regularly.</p></div>
<div class="style_prevu_kit" style="background-color:#F1948A; width:60%; margin-left:20%; margin-top:1%; margin-bottom: 1% ">
<h2>Career Counselling</h2>
        <p style="font-size: 17px">Career counselling is for both students who are about to decide their
		careers and professionals, to guide them on their professional growth trajectory.
		It mainly is an assessment of your strengths and discovering where your interests lie.
		Career counseling generally takes place in a high school setting, 
		and could also involve help in selection of colleges to best suit the students needs and requirements. 
		However, it could also be for professionals who want to switch careers 
		or want to learn how to progress in the career they have chosen.</p></div>

</div>';
			}
			else {
				header('Location:login.php');
				exit();
			}
		?>
		</table>
		<?php mysql_close($connector); ?>
	</body>
</html>