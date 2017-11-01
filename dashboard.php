<?php
	session_start();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Dashboard</title>
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
		<center> <h2> Student Dashboard </h2><center>
		<a href="index.php" data-toggle="tooltip" title="Home"><span class="glyphicon glyphicon-home" style="float:right; font-size:20px; margin-right:20px; margin-top:-25px;"></span></a>
		<a href="logout.php" data-toggle="tooltip" title="Log Out"><span class="glyphicon glyphicon-log-out" style="float:right; font-size:20px; margin-right:80px; margin-top:-25px;"></span></a>
		
	</nav>
	<div class="panel">
		<div class="panel-body">
			<a href="index.php" style="float: right;"><h5>Available Workshops</h5></a>
			<h5>Student Name: <?php echo $_SESSION['name']; ?></h5>
			<center><h3>Applied Workshops</h3></center>
			<?php
				//include database connectivity information
				include("dbinfo.php");

				$i=1;
				$sid = $_SESSION['sid'];
				$sql = "SELECT * FROM wstatus WHERE Sid='$sid'";
				$result = $conn->query($sql);
				echo "<table id='wslist' class='table table-bordered'>
							<tr>
								<th style='width:10%;'><center>S.No</center></th>
								<th style='width:30%;'><center>Workshop Topic</center></th>
								<th style='width:20%;'><center>Date</center></th>
								<th style='width:20%;'><center>Time</center></th>
								<th style='width:20%;'><center>Status</center></th>
							</tr>";
				if(!$result)
				{
					echo "Error!";
				}
				else
				{
					while($row = $result->fetch_assoc())
					{
						$wid = $row['Wid'];
						$sql1 = "SELECT * FROM workshop WHERE Wid='$wid'";
						$result1 = $conn->query($sql1);
						$row1 = $result1->fetch_assoc();
						echo "<tr>";
						echo "<td><center>".$i."</center></td>";
						echo "<td><center>".$row1['topic']."</center></td>";
						echo "<td><center>".$row1['date']."</center></td>";
						echo "<td><center>".$row1['time']."</center></td>";
						echo "<td><center>Applied</center></td>";
						echo "</tr>";
						$i++;
					}
				}						

			?>
		</div>
	</div>
</div>
</body>
</html>