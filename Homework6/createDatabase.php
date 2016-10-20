<?php 
	$servername = "localhost";
	$username = "root";
	$password = "root";

	$conn = mysqli_connect($servername, $username, $password);
	if (!$conn) {
		die("Connection failed:".mysqli_connect_error()."<br>");
	}

	$sql = "CREATE DATABASE IF NOT EXISTS `phpDB`";
	if (mysqli_query($conn, $sql)) {
		//echo "Database created successfully<br>";
	} else {
		echo "Error creating database: ".mysqli_error($conn)."<br>";
	}	
	
	mysqli_close($conn);
?>