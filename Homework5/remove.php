<?php session_start() ?>
<?php 
	$index = $_GET['index'];
	unset($_SESSION['cart_items'][$index]);
	header("Location: cart.php");
?>