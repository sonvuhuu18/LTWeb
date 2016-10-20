<?php session_start() ?>
<?php 
	$id = $_GET['id'];
	$mode = $_GET['mode'];
	if ($mode === "all" || ($mode === "one" && $_SESSION['cart_items'][$id]['quantity'] == 1)) {
		unset($_SESSION['cart_items'][$id]);
	} else {
		$_SESSION['cart_items'][$id]['quantity']--;
	}
	header("Location: cart.php");
?>