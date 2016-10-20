<?php 
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbName = "phpDB";

	$conn = mysqli_connect($servername, $username, $password, $dbName);
	if (!$conn) {
		die("Connection failed:".mysqli_connect_error());
	}

	$account = array(
		array("admin", "admin"),
		array("username", "password")
		);

	foreach ($account as $user) {
		$username = $user[0];
		$password = $user[1];
		$sql = "INSERT IGNORE INTO users (userName, password) VALUES ('$username', '$password')";
		if (mysqli_query($conn, $sql)) {
    		//echo "New user created successfully<br>";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
		}
	}

	$products = array(
		array(1, "AK47", "Russia", 2700, 100),
		array(2, "M4A1", "USA", 3200, 100),
		array(3, "Galil", "Israel", 1900, 100),
		array(4, "Famas", "France", 2150, 1),
		array(5, "AWP", "UK", 5600, 100),
		array(6, "Desert Eagle", "Israel", 700, 100),
		array(7, "P90", "Belgium", 2350, 100),
		array(8, "XM1014", "Italy", 2200, 100)
	);

	foreach ($products as $product) {
		$productID = $product[0];
		$productName = $product[1];
		$productOrigin = $product[2];
		$productPrice = $product[3];
		$quantity = $product[4];
		$sql = "INSERT IGNORE INTO products (productID, productName, productOrigin, productPrice, quantity) 
				VALUES ('$productID', '$productName', '$productOrigin', '$productPrice', '$quantity')";
		if (mysqli_query($conn, $sql)) {
    		//echo "New product created successfully<br>";
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
		}
	}
	mysqli_close($conn);
?>