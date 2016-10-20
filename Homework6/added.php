<?php session_start() ?>
<?php 
	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
	}
	$id = isset($_GET['id']) ? $_GET['id'] : "";
	if(!isset($_SESSION['cart_items'])){
   		$_SESSION['cart_items'] = array();
	}
	if (isset($_SESSION['cart_items'][$id])) {
		$_SESSION['cart_items'][$id]['quantity']++;
	} else {
		require 'connectDB.php';
		$tableName = "products";
		$sql = "SELECT * FROM `$tableName` WHERE productID = $id";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_row($result);
			$name = $row[1];
			$origin = $row[2];
			$price = $row[3];
			$product = array('name' => $name, 'origin' => $origin, 'price' => $price, 'quantity' => 1);
		}
		$_SESSION['cart_items'][$id] = $product;
		require 'closeDB.php';
	}
?>
<?php 
	require 'connectDB.php';
	$tableName = "products";
	$sql = "SELECT * FROM `$tableName` WHERE productID = $id";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_row($result);
		$quantity = $row[4];
	}
	$expectedQuantity = $_SESSION['cart_items'][$id]['quantity'];
	if ($quantity < $expectedQuantity) {
		echo "Not enough products!<br>";
		if ($_SESSION['cart_items'][$id]['quantity'] == 1) {
			unset($_SESSION['cart_items'][$id]);
		} else {
			$_SESSION['cart_items'][$id]['quantity']--;
		}
	} else {
		echo "Product added!<br>";
	}
	require 'closeDB.php';
?>
<a href="cart.php">Show cart</a> | <a href="index.php">Back to homepage</a>