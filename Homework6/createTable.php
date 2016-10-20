<?php 
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbName = "phpDB";

	$conn = mysqli_connect($servername, $username, $password, $dbName);
	if (!$conn) {
		die("Connection failed:".mysqli_connect_error());
	}

	$sql = "CREATE TABLE IF NOT EXISTS products(
   		productID INT NOT NULL AUTO_INCREMENT,
   		productName VARCHAR(40) NOT NULL,
   		productOrigin VARCHAR(40) NOT NULL,
   		productPrice INT NOT NULL,
   		quantity INT NOT NULL,
   		PRIMARY KEY ( productID )
	)";
	
	if (mysqli_query($conn, $sql)) {
		//echo "Table products created succesfully<br>";
	} else {
		echo "Error creating table: ".mysqli_error($conn)."<br>";
	}

	$sql = "CREATE TABLE IF NOT EXISTS users(
		userName VARCHAR(30) NOT NULL,
		password VARCHAR(30) NOT NULL,
		PRIMARY KEY ( userName )
		)";

	if (mysqli_query($conn, $sql)) {
		//echo "Table users created succesfully<br>";
	} else {
		echo "Error creating table: ".mysqli_error($conn)."<br>";
	}

	$sql = "CREATE TABLE IF NOT EXISTS orders(
		orderID INT NOT NULL AUTO_INCREMENT,
		userName VARCHAR(30) NOT NULL,
		PRIMARY KEY (orderID),
		FOREIGN KEY (userName) REFERENCES users(userName)
		)";

	if (mysqli_query($conn, $sql)) {
		//echo "Table orders created succesfully<br>";
	} else {
		echo "Error creating table: ".mysqli_error($conn)."<br>";
	}

	$sql = "CREATE TABLE IF NOT EXISTS orderItems(
		itemID INT NOT NULL AUTO_INCREMENT,
		orderID INT NOT NULL,
		productID INT NOT NULL,
		quantity INT NOT NULL,
		PRIMARY KEY (itemID),
		FOREIGN KEY (productID) REFERENCES products(productID),
		FOREIGN KEY (orderID) REFERENCES orders(orderID)
		)";

	if (mysqli_query($conn, $sql)) {
		//echo "Table orderItems created succesfully<br>";
	} else {
		echo "Error creating table: ".mysqli_error($conn)."<br>";
	}

	mysqli_close($conn);

?>