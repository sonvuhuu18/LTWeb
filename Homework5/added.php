<?php session_start() ?>
<?php 
	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
	}
	$name = isset($_GET['name']) ? $_GET['name'] : "";
	$origin = isset($_GET['origin']) ? $_GET['origin'] : "";
	$price = isset($_GET['price']) ? $_GET['price'] : "";
	$product = array('name' => $name, 'origin' => $origin, 'price' => $price);

	if(!isset($_SESSION['cart_items'])){
   		$_SESSION['cart_items'] = array();
	}
	if(!isset($_SESSION['count_items'])){
   		$_SESSION['count_items'] = 0;
	}
	$index = $_SESSION['count_items'];
	$_SESSION['cart_items'][$index] = $product;
	$_SESSION['count_items']++;
?>
Product added!<br>
<a href="cart.php">Show cart</a> | <a href="index.php">Back to homepage</a>