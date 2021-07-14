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
	  <!--<li><a href="clinicslocator.html"><span class="glyphicon glyphicon-map-marker"> CLINICSLOCATOR</span></a></li>-->
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
	  <li class="active"><a href="appointment.php"><span class="glyphicon glyphicon-list-alt"> APPOINTMENT</span></a></li>
      
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li style="font-family:Gill Sans MT";><a href="admin.php"><span class="glyphicon glyphicon-user" >  ADMIN  </span></a></li>
		
	 </ul>
  </div>
</nav>
</div><br><br><br><br>

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

$fnameErr = $lnameErr = $genderErr = $emailErr = $phnoErr = $hospitalErr =  "";
$fname = $lname = $gender = $email = $phno = $hospital = $thankyou = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//first name validation
  if (empty($_POST["fname"])) {
    $fnameErr = "FirstName is required";
	unset($fname);
  } else {
    $fname = test_input($_POST["fname"]);
	
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
		//$fname = "";
		unset($fname);
      $fnameErr = "Only letters and white space allowed"; 
	  
    }
	/*else{
		$sql="INSERT INTO appointment (fname) VALUES ('$fname')";
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}
	}*/
  }
  //lastname validation
  if (empty($_POST["lname"])) {
    $lnameErr = "LastName is required";
	unset($lname);
  } else {
    $lname = test_input($_POST["lname"]);
	
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
		//$lname = "";
		unset($lname);
      $lnameErr = "Only letters and white space allowed"; 
	  
    }
	/*else{
		$sql="INSERT INTO appointment (lname) VALUES ('$lname')";
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}
	}*/
  }
  //gender error
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
	unset($gender);
  } else {
    $gender = test_input($_POST["gender"]);
	
		/*$sql="INSERT INTO appointment (gender) VALUES ('$gender')";
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}*/
	
  }
  //emial validation
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	unset($email);
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	//	$email = "";
	unset($email);
      $emailErr = "Invalid email format"; 
    }
	/*else{
		$sql="INSERT INTO appointment (email) VALUES ('$email')";
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}
	}*/
  }
  //phoneno validation
    if (empty($_POST["phno"])) {
    $phnoErr = "Phoneno is required";
	unset($phno);
  } else {
	  $phno = $_POST['phno'];
	  if(strlen($phno)<10 || strlen($phno)>10){
		//	$phno = "";
		unset($phno);
		   $phnoErr = "Invalid phoneno format";
		}
		/*else{
		$sql="INSERT INTO appointment (phno) VALUES ('$phno')";
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}
	}*/
	}
	//course validation
	if (empty($_POST["hospital"])) {
    $hospitalErr = "Select Any 1";
   } else {
    $hospital = test_input($_POST["hospital"]);
	
		/*$sql="INSERT INTO appointment (hospital) VALUES ('$hospital')";
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}*/
	
   }
   if(isset($fname) && isset($lname) && isset($gender) && isset($email)&& isset($phno) && isset($hospital))
   {
		//insertion of data
		$sql="INSERT INTO appointment1 VALUES ('','$fname','$lname','$gender','$email','$phno','$hospital')";
 
		$thankyou = "Your Booking Is SuccessFull We Have Mailed You The Details Of Your Booking. ThankYou For Using EYECARETMK.ORG.";
		
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}	
   }
  	
  mysql_close();
  
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}  

?>

<div class="container">
	<h1 style="color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:center;text-decoration:underline";>APPOINTMENT FORM</h1>
	<div class="row">
		<div class="col-md-7">
			<form style="border-style:ridge;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="form-group">
					<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;margin-left:5px;">NAME</label>
					<input  type="text" class="form-control" name="fname" placeholder="First Name" style="width:200px";><span class="error">* <?php echo $fnameErr;?></span><br>
					<input type="text" class="form-control" name="lname" placeholder="Last Name" style="width:200px";><span class="error">* <?php echo $lnameErr;?></span>
				</div>
				<div class="form-group">
					<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;">GENDER</label>
					<div class="radio">
						<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;">Male</label>
						<input type="radio" name="gender" value="Male" style="margin-left:30px";>
					</div>	
					<div class="radio">
						<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;">Female</label>
						<input type="radio" name="gender" value="Female" style="margin-left:15px";>
					</div>	
					<span class="error">* <?php echo $genderErr;?></span>
				</div>	
				<div class="form-group">
					<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;">E-Mail</label><br>
					<input type="e-mail" class="form-control" name="email" placeholder="Email" style="width:200px";>
					<span class="error">* <?php echo $emailErr;?></span>
				</div>	
				<div class="form-group">
					<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;">Contact Number</label><br>
					<input type="text" class="form-control" name="phno" placeholder="Contact Number" style="width:200px";>
					<span class="error">* <?php echo $phnoErr;?></span>
				</div>
				<div class="form-group">
					<label style="font-family:Gill Sans MT;font-size:16px;color:#7A8181;">Hospitals</label><br>
					<select class="form-control" style="width:200px;" name="hospital">
						<!--<option value="Dr.mahadevappa eye laser hospital">Dr.mahadevappa eye laser hospital</option>-->
						<!--<option value="Akshara eye foundation">Akshara eye foundation</option>-->
						<!--<option value="Vasan eye care">Vasan eye care</option>-->
						<!--<option value="Nayanadhama eye hospital">Nayanadhama eye hospital</option>-->
						<!--<option value="G S S Hospital">G S S Hospital</option>-->
						<option value="Raju E N T & Eye Clinic">Raju E N T & Eye Clinic</option>
						<!--<option value="Sri Lalitha Eye Clinic">Sri Lalitha Eye Clinic</option>-->
						<!--<option value="Sri Ranga hospital">Sri Ranga hospital</option>
						<option value="Sakshya eye care">Sakshya eye care</option>
						<option value="Jothi Nethralaya">Jothi Nethralaya</option>-->
					</select>
					<span class="error">* <?php echo $hospitalErr;?></span>
				</div>	
				<div class="form-group">
					<button class="btn-success btn-lg" name="book">Book</button>
					<button class="btn-danger btn-lg">Cancel</button>
				</div>	
				
			</form>
		</div>
		<?php
		if(isset($_POST['book']))
		{
			if(isset($fname) && isset($lname) && isset($gender) && isset($email)&& isset($phno) && isset($hospital))
			{
			echo"<div class='col-md-5'>
				<h3 style=color:#E82102;font-family:High Tower Text;font-weight:bold;text-align:left;text-decoration:;>Booking Details</h3>
				<!--<img src='images/eyecare1.png' class='img-thumbnail' alt=''>-->
				<table class='table'>
					<tr>
						<th><p>First Name</p></th>
						<td><p>$fname</p></td>
					</tr>
					<tr>
						<th><p>Last Name</p></th>
						<td><p>$lname</p></td>
					</tr>
					<tr>
						<th><p>Gender</p></th>
						<td><p>$gender</p></td>
					</tr>
					<tr>
						<th><p>Email Id</p></th>
						<td><p>$email</p></td>
					</tr>
					<tr>
						<th><p>Contact Number</p></th>
						<td><p>$phno</p></td>
					</tr>
					<tr>
						<th><p>Hospital</p></th>
						<td><p>$hospital</p></td>
					</tr>
				</table>
				<p>$thankyou</p>
			<!--	<form action='eyecarepdf.php' method='post'>
				
				<button class='btn-basic'><p>Print/Download</p></button>
				</form>-->
			</div>";
			}
		}
		/*else
		{
			echo"invalid";
		}*/
		?>
	</div>
	

</div>	<br>
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
