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
      <li class="active"><a href="">HAI! ADMIN</a></li>
      <!--<li><a href="clinics.html">CLINICS</a></li>
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
			
		  
          <li><a href="dietandnutrition.html">Diet & Nutrition</a></li>
          <li><a href="eyecareatwork.html">EyeCare At Work</a></li>
        </ul>
      </li>
	  <li><a href="appointment.php"><span class="glyphicon glyphicon-list-alt"> APPOINTMENT</span></a></li>
      
    </ul>--->
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li style="font-family:Gill Sans MT"; ><a href="admin.php"><span class="glyphicon glyphicon-remove" >  LOGOUT  </span></a></li>
		
	 </ul>
      
    
  </div>
</nav>
</div><br><br><br><br>


<div class="container">

	<?php
//mysql connection
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
echo 'connected successfully';

$sql = "SELECT * FROM appointment1";

$records = mysql_query($sql);


?>

	<h1 style="color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:center;text-decoration:";>REPORTS</h1><BR>
	<h2 style="color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:left;text-decoration:";>Appointments</h2><br>
	<div class="row">
	<div class="col-md-2">
	
	</div>
	<div class="col-md-10">
		<div style="";>
			<table class="table">
			<tr>
				<th>Id No</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Contact Number</th>
				<th>Appointement Booked</th>
				<th><span class="glyphicon glyphicon-trash">Remove</span></th>
			</tr>	
			
			<?php
				while($appointment=mysql_fetch_assoc($records)){
					echo "<tr>
							<td>".$appointment['id']."</td>
							<td>".$appointment['fname']."</td>
							<td>".$appointment['lname']."</td>
							<td>".$appointment['gender']."</td>
							<td>".$appointment['email']."</td>
							<td>".$appointment['phno']."</td>
							<td>".$appointment['hospital']."</td>";
							echo "<td><a href=deleterecords.php?id=".$appointment['id']."><span class='glyphicon glyphicon-trash'></span></a></td> ";
						echo"  </tr> ";
				}
			?>
			</table>
		</div>
	</div>
	<div class="col-md-8">
	
	</div>
	</div>
</div> <br><br><br><br><br><br><br><br><br><br><br>

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
