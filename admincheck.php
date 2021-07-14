<!DOCTYPE html>
<html lang="en">
<head>
  <title>EyeCare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style> .error{color:red; font-weight:bolder;font-family:Maiandra GD;font-size:18px} </style>
  
  <style>
		p{
			font-family:Gill Sans MT;
			font-size:18px;
			color:#7A8181;
		}
  </style>
</head>
<body><!-- style="height:1000px"-->
<div>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#000080;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="font-family:copperplate gothic;font-size:28px;font-weight:bold;">EyeCare <span class="glyphicon glyphicon-eye-open"></a>
    </div>
	<ul class="nav navbar-nav" style="font-family:Gill Sans MT";>
      <li ><a href="welcome.html">HOME</a></li>
      <li><a href="clinics.html">HOSPITALS</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">EYE & VISION PROBLEMS <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="a-d.html">A - D</a></li>
			
          <li><a href="e-o.html">E - O</a></li>
          <li><a href="p-z.html">P - Z</a></li>
        </ul>
      </li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">EYECARE <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="goodvisionforlife.html">Good Vision For Life</a>
			
		  
          <!-- <li><a href="dietandnutrition.html">Diet & Nutrition</a></li>-->
          <li><a href="computervisionsyndrome.html">EyeCare At Work</a></li>
        </ul>
      </li>
	  <li><a href="appointment.php"><span class="glyphicon glyphicon-list-alt"> APPOINTMENT</span></a></li>
      
    </ul>
	<!--<ul class="nav navbar-nav navbar-right">
		<li style="font-family:Gill Sans MT;font-weight:bold;font-size:20px";><a href="">Hai ! Admin</a></li>
		<li style="font-family:Gill Sans MT";><a href="admin.php"><span class="glyphicon glyphicon-remove" >  LOGOUT	  </span></a></li>
		
	 </ul>-->
      
    
  </div>
</nav>
</div><br><br><br><br>

<div class="container">
<?php 
	//get values of username and password
	$username = "";
	$password= "";
	$usernameErr = "";
	$passwordErr = "";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$usernameSuccess = "";
	$passwordSuccess = "";
	
	//connect to server and db
	define('DB_NAME','eyecare');
	define('DB_USER','root');
	define('DB_PASSWORD','');
	define('DB_HOST','localhost');

	$link = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	if(!$link)
	{
		die('could not connect:'.mysql_error());
	}
	$db_selected=mysql_select_db(DB_NAME,$link);
	if(!$db_selected)
	{
		die('can\'t use'.DB_NAME.':'.mysql_error());
	}
	echo "<h2 style=color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:left;text-decoration:;></h2><br>";
	
	/*//emial validation
	if (empty($_POST["username"])) {
    $usernameErr = "Email Id is required";
  } else {
    $username = test_input($_POST["username"]);
	
    // check if e-mail address is well-formed
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
		$username = "";
      $usernameErr = "Invalid email format"; 
    }
  }
  
  //password validation
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
	
    
  }*/
  
	$result = mysql_query("select * from admin where username = '$username' and password = '$password'")
				or die("Failed to query database ".mysql_error());
				
	$row = mysql_fetch_array($result);
	if ( $row['username'] == $username && $row['password'] == $password )
	{
		if (empty($_POST["username"]) && empty($_POST["password"]) ) {
			$usernameErr = "Email Id is required";
			$passwordErr = "Password is required";
			
			echo "<div class=row>
					<div class=col-md-6>
						
						<h2 style=color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:left;text-decoration:;>Empty Input</h2><br>
						<p>Failed To Login.</p><br>
						<p>EmailId & Password Is Required.</p><br>
						<p><a href=admin.php>Go Back</a></p>
					</div>
					<div class=col-md-6>
						<img src=images/error.png class=img-circle  width=400px >
					</div>
				</div>	";
			
			
		}
		else{
			
			echo "<div class=row>
					<div class=col-md-6>
						
						<h2 style=color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:left;text-decoration:;>Login Successfull</h2><br>
						<p>Welcome $row[username]</p>
						
						<p><a href=reports.php>Reports</a></p>
					</div>
					<div class=col-md-6>
						<img src=images/success.jpg class=img-circle  width=400px >
					</div>
				</div>	";
			
			
			
		}
	}
	else
	{
		echo " 
				<div class=row>
					<div class=col-md-6>
						
						<h2 style=color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:left;text-decoration:;>Wrong Input</h2><br>
						<p>Failed to login</p><br>
						<p>Please Input A Valid EmailId & Password.</p><br>
						<p><a href=admin.php>Go Back</a><p>
					</div>
					<div class=col-md-6>
						<img src=images/error.png class=img-circle  width=400px >
					</div>
				</div>	";
				
				
		
	}				
  
 /* function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}  */
	
	
	
?>	
</div>	
		
		<!--<h1 style="color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:center;text-decoration:";>WELCOME TO ADMIN VIEW</h1>
		<h2 style="font-family:High Tower Text;font-weight:bold;color:#303E3E  ;">Reports</h2>
</div>-->


	<!--<h1 style="color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:center;text-decoration:";>ADMIN LOGIN</h1><BR>
	<div class="row">
	<div class="col-md-4">
	
	</div>
	<div class="col-md-4">
		<div style="border-style:solid;border-width:2px";>
			<form method="post" action="admincheck.php">
				<div class="form-group" style="margin-left:20px;margin-top:20px">
					<span class="error">* <?php echo $usernameErr;?></span><br>
					<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;">EMAIL ID</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Enter Your Email Id" style="width:300px";><br>
					<span class="error">* <?php echo $passwordErr;?></span><br>
					<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;">PASSWORD</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" style="width:300px";><br>
				</div>
				<div class="form-group" style="margin-left:100px">
						<button class="btn-success btn-sm">LogIn</button>
						<button class="btn-danger btn-sm">Cancel</button>
				</div>	
				
			</form>
			<h3 style="color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:center;text-decoration:";><?php echo $usernameSuccess;?></h3><BR>
		</div>
	</div>
	<div class="col-md-4">
	
	</div>
	</div>-->

<br><br><br><br><br><br><br><br><br><br><br>

<div>
<nav class="navbar navbar-inverse navbar-bottom"style="background-color:#000080">
  <div class="container-fluid">
    <div class="navbar-footer">
      <ul class="nav navbar-nav navbar-left">
	    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
		<li><a href="#"><span class="fa fa-twitter"></span></a></li>
		<li><a href="#"><span class="fa fa-skype"></span></a></li>
	  
     
    </ul>
   <ul>
      <ul class="nav navbar-nav navbar-right">
		<li ><a href="#" style="font-family:copperplate gothic;">Eyecaretmk@gmail.com</a></li>
      <li><a href="#" style="font-family:copperplate gothic;">CopyRight@2018 All Rights Reserved</a></li>
    </ul>
    </div>
  </div>
</nav>
</div>
</body>
</html>
