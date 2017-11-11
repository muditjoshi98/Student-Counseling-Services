<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">-->

  
      <link rel="stylesheet" href="css/style.css">
 
</head>

<body>
	<div class="background-image"></div>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Student Login</a></li>
        <li class="tab"><a href="#login">Counsellor Login</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Welcome back!</h1>
          
          <form action="login_check.php" method="post">
          
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="Semail"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="Spassword"/>
          </div>
		  <div>
			<?php
			if(array_key_exists("msg",$_GET)){
				if($_GET['msg']=='serror')
				{
				echo '<p class="incorrect">Incorrect Login or Password</p>';
				}
			} ?>
		</div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block" name="Ssubmit" value="Login"/>Login</button>
          </form>
        </div>
        
		
        <div id="login">   
          c"><h1>Someone needs you!</h1>
          
          <form action="login_check.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="Cemail" />
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="Cpassword"/>
          </div>
          <div>
			<?php
			if(array_key_exists("msg",$_GET)){
				if($_GET['msg']=='cerror')
				{
				echo '<p class="incorrect">Incorrect Login or Password</p>';
				}
			} ?>
		</div>
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block" name="Csubmit"/>Let's Counsel</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
