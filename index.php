<?php
	session_start();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Available Workshops</title>
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
		h5
		{
			font-family: 'Roboto';
			padding :10px;
			color:#00004d;
			font-size:16px;
		}
		h2, h3
		{
			font-family: 'Arima Madurai';
			font-weight:bold;
			margin-left:8px;
			color:#000033;
		}
		.panel
		{
			background:linear-gradient(#ffffff, #e6e6ff);
		}
	</style>
	
</head>
<body>
<div class="container-fluid">
	<center><img src = "logo.jpg" alt="logo" style="margin-top:40px;"></center>
	<nav class="navbar navbar-default" style="background-color:#b3c4ff;">
		<center> <h2> Available Workshops </h2><center>
		<a href="index.php" data-toggle="tooltip" title="Home"><span class="glyphicon glyphicon-home" style="float:right; font-size:20px; margin-right:20px; margin-top:-25px;"></span></a>
		<a href="signup.php" id="l1"><span style="float:right; font-size:20px; margin-right:80px; margin-top:-25px;">Sign Up</span></a>
		<a href="login.php" id="l2"><span style="float:right; font-size:20px; margin-right:20px; margin-top:-25px;">Login</span></a>
		<a href="dashboard.php" id="l3"><span style="float:right; font-size:20px; margin-right:80px; margin-top:-25px;">Dashboard</span></a>
		<?php
			if(isset($_SESSION['email']))
			{
				echo "<script>
							document.getElementById('l1').style.display='none';
							document.getElementById('l2').style.display='none';
				      </script>";
			}
			else
			{
				echo "<script>
							document.getElementById('l3').style.display='none';
				      </script>";
			}	
		?>
	</nav>
	<div class="panel">
		<div class="panel-body">
			<?php
				//include database connectivity information
				include("dbinfo.php");

				$i=1;
				$sql = "SELECT * FROM workshop";
				$result = $conn->query($sql);
				echo "<table id='wslist' class='table table-bordered'>
							<tr>
								<th style='width:10%;'><center>S.No</center></th>
								<th style='width:30%;'><center>Workshop Topic</center></th>
								<th style='width:20%;'><center>Date</center></th>
								<th style='width:20%;'><center>Time</center></th>
								<th style='width:20%;'></th>
							</tr>";
				if(!$result)
				{
					echo "Error!";
				}
				else
				{
					while($row = $result->fetch_assoc())
					{
						echo "<tr>";
						echo "<td><center>".$i."</center></td>";
						echo "<td><center>".$row['topic']."</center></td>";
						echo "<td><center>".$row['date']."</center></td>";
						echo "<td><center>".$row['time']."</center></td>";
						echo "<td>
									<form method='POST'>
										<input type='text' name='wid' style='display: none;' value='".$row['Wid']."'></input>
										<center><input type='submit' name='submit' value='Apply' class='btn btn-info btn-block'></input></center>
									</form>
							  </td>";
						echo "</tr>";
						$i++;
					}
				}			
			?>
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					if(!isset($_SESSION['email']))
					{
						echo "<script>window.open('login.php','_self')</script>";
					}
					else
					{
						$sid = $_SESSION['sid'];
						$wid = mysqli_real_escape_string($conn,$_POST['wid']);
						$sql = "SELECT * FROM wstatus WHERE Sid='$sid' AND Wid='$wid'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
						$check = mysqli_num_rows($result);
						if($check != 0)
						{
							echo "<script> alert('You have already Applied for this workshop!!!'); </script>";
						}
						else
						{
							$sql1 = "INSERT INTO wstatus(Sid,Wid) VALUES('$sid','$wid')";
							$conn->query($sql1);
							echo "<script> alert('Successfully Applied For The Workshop!!!'); </script>";
						}	
					}	
				}

				
			?>
		</div>
	</div>
</div>
</body>
</html>