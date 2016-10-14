<?php session_start() ?>
Thank you for your order:
<?php 
	$totalPrice = 0;
	echo "<ul>";
	foreach ($_SESSION['cart_items'] as $product) {
		echo "<li>".$product['name']."</li>";
		$totalPrice += $product['price'];
	}
	echo "</ul>";
	echo "Total price: $".$totalPrice."!<br>";
	unset($_SESSION['cart_items']);
?>
<a href="index.php">Back to homepage</a>