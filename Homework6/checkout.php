<?php session_start() ?>
Thank you for your order:<br>
<?php 
	require 'connectDB.php';
	$sql = "SELECT COUNT(*) AS `count` FROM `orders`";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$orderID = $row['count']+1;
	$userName = $_SESSION['username'];
	$sql = "INSERT INTO `orders` (orderID, userName) VALUES ($orderID, '$userName')";
	if (mysqli_query($conn, $sql)) {
    		echo "Order #".$orderID."<br>";
    		$totalPrice = 0;
			echo "<ul>";
			foreach ($_SESSION['cart_items'] as $id => $product) {
				$productID = $id;
				$quantity = $product['quantity'];
				echo "<li>".$product['name'].": ".$product['quantity']."</li>";
				$totalPrice += $product['price']*$product['quantity'];
				$sql = "INSERT INTO `orderItems` (orderID, productID, quantity) VALUES ($orderID, $productID, $quantity)";
				if (!mysqli_query($conn, $sql)) {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
				}
				// $sql = "SELECT quantity FROM `products` WHERE productID = $productID";
				// if (!mysqli_query($conn, $sql)) {
				// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
				// }
				// $row = mysqli_fetch_row($result);
				// $oldQuantity = $row[0];
				// $newQuantity = $oldQuantity - $quantity;
				$sql = "UPDATE `products` SET quantity = quantity - $quantity WHERE productID = $productID";
				if (!mysqli_query($conn, $sql)) {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
				}
			}
			echo "</ul>";
			echo "Total price: $".$totalPrice."!<br>";
			unset($_SESSION['cart_items']);
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
		}
	require 'closeDB.php';
?>
<a href="index.php">Back to homepage</a>