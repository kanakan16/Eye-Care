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
	 <!-- <li><a href="clinicslocator.html"><span class="glyphicon glyphicon-map-marker"> CLINICSLOCATOR</span></a></li>-->
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
	<ul class="nav navbar-nav navbar-right">
		<li style="font-family:Gill Sans MT"; class="active"><a href="admin.php"><span class="glyphicon glyphicon-user" >  ADMIN  </span></a></li>
		
	 </ul>
      
    
  </div>
</nav>
</div><br><br><br><br>


<div class="container">
	<h1 style="color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:center;text-decoration:";>ADMIN LOGIN</h1><BR>
	<div class="row">
	<div class="col-md-4">
	
	</div>
	<div class="col-md-4">
		<div style="border-style:solid;border-width:2px";>
			<form method="post" action="admincheck.php">
				<div class="form-group" style="margin-left:20px;margin-top:20px">
					<span class="error">* Required </span><br>
					<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;">EMAIL ID</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Enter Your Email Id" style="width:300px";><br>
					<span class="error">* Required</span><br>
					<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;">PASSWORD</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" style="width:300px";><br>
				</div>
				<div class="form-group" style="margin-left:100px">
						<button class="btn-success btn-sm">LogIn</button>
						<button class="btn-danger btn-sm">Cancel</button>
				</div>	
				
			</form>
		</div>
	</div>
	<div class="col-md-4">
	
	</div>
	</div>
</div><br><br><br><br><br><br><br><br><br><br><br>

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
