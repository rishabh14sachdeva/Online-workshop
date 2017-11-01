<?php
	
		$host="localhost";
	 	$username="root";
	 	$password="";
	 	$db_name="workshop";

	 	$conn = mysqli_connect($host, $username, $password);

		// Check connection
		if (!$conn) 
		{
		    die("Connection failed: " . mysqli_connect_error());
		}

		// Access the database
		mysqli_select_db( $conn , $db_name);
		return($conn);
	
?>