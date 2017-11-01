<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Sign Up</title>
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
		#signin
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
	<?php
		session_start();
	?>
</head>
<body>
<div class="container-fluid">
	<center>
	<img src = "logo.jpg" alt="logo" style="margin-top:10px;">
	</center>
	<nav class="navbar navbar-default" style="background-color:#b3c4ff;">
		<center> <h2> REGISTRATION </h2><center>
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
					<center><h3> Sign Up To Cotinue </h3></center>
					<br><br>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="form-group">
							<label for="name">Student Name:</label>
							<input type="name" class="form-control" id="name" name="name" >
						</div>
						<div class="form-group">
							<label for="email">Student Email Id:</label>
							<input type="name" class="form-control" id="email" name="email" >
						</div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" id="pwd" name="pass">
						</div>
						<br><br>
						<center>
						<button type="submit" class="btn btn-default" id="signin" style="background-color:#39ac39; border-top-color:black; border-left-color:black; box-shadow:1px 1px gray; "><h4>SIGN UP</h4></button>
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
		$name = mysqli_real_escape_string($conn,$_POST['name']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$pass = mysqli_real_escape_string($conn,$_POST['pass']);
		$sql = "INSERT INTO student (name,email,pass) VALUES ('$name','$email','$pass')";
		if($conn->query($sql) === TRUE)
		{
			echo "<script>window.open('login.php','_self')</script>";
		}
		else
			echo "ERROR: " .$sql. "<br>" .$conn->error;
	}
?>
</body>
</html>