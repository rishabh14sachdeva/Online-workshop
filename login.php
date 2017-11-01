<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Log In</title>
	 <link rel="icon" href="#" type="image/x-icon">
    <!-- For mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For Social Icons -->
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- For Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Arima Madurai' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<!-- For Bootstrap -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<style>
		#login
		{
			width:26%;
			height:60px;
			border-radius:5px;
			font-family: 'Arima Madurai';
			font-weight:bold;
			background-color:#39ac39; 
			color:#f2f2f2; 
			border-top-color:black;
			
		}
		h3
		{
			font-family: 'Arima Madurai';
			font-weight:bold;
		}
		h4
		{
			color:#f2f2f2;
			font-family: 'Arima Madurai';
			font-weight:bold;
		}
		label
		{
			font-family:"Roboto";
			color:#00004d;
			font-size:17px;
		}
		.panel
		{
			background:linear-gradient(#ffffff, #e6e6ff);
			box-shadow:1px 1px gray;
		}
	</style>
	
</head>
<body>
<div class="container-fluid">
	<center>
	<img src = "logo.jpg" alt="logo" style="margin-top:10px;">
	</center>
	<nav class="navbar navbar-default" style="background-color:#b3c4ff;">
		<center> <h2> LOGIN </h2><center>
		<a href="index.php" data-toggle="tooltip" title="Home"><span class="glyphicon glyphicon-home" style="float:right; font-size:20px; margin-right:20px; margin-top:-25px;"></span></a>
		<a href="signup.php"><span style="float:right; font-size:20px; margin-right:80px; margin-top:-25px;">Sign Up</span></a>
		<a href="login.php"><span style="float:right; font-size:20px; margin-right:20px; margin-top:-25px;">Login</span></a>
	</nav>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
					<center><h3> Log In To Your Account To Continue </h3></center>
					<br><br>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="form-group">
							<label for="email">User Email Id:</label>
							<input type="name" class="form-control" id="email" name="email" >
						</div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" id="pwd" name="pass">
						</div>
						<br>
						<a href="signup.php"><p>Registration for New User</p></a>
						<br>
						<center>
						<button type="submit" class="btn btn-default" id="login" style="background-color:#39ac39; border-top-color:black; border-left-color:black; box-shadow:1px 1px gray; "><h4>Log In</h4></button>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2">
		</div>
	</div>	
	<div class="footer">
		<br><br>
		<center><span class="glyphicon glyphicon-copyright-mark"></span> Copyrights 2017 </center>
	</div>
</div>
<?php
	//include database connectivity information
	include("dbinfo.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$pass = mysqli_real_escape_string($conn,$_POST['pass']);
		$sql = "SELECT * FROM student WHERE email='$email' AND pass='$pass'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$check_user = mysqli_num_rows($result);
		
			if($check_user>0)
			{
				$_SESSION['name']=$row['name'];
				$_SESSION['email']=$row['email'];
				$_SESSION['sid']=$row['Sid'];
				echo "<script>window.open('dashboard.php','_self')</script>";
			}
			else
			{
				echo "<script>alert('Please Check Your Email Id Or Passoword!!')</script>";
			}
		
	}
?>
</body>
</html>