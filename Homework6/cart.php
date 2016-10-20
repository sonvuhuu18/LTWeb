<?php session_start() ?>
Shopping cart<br>
<a href="checkout.php">Proceed to checkout</a> | <a href="index.php">Back to homepage</a><br><br>
<table align="left" border="solid">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Origin</th>
		<th>Price</th>
		<th>Quantity</th>
	</tr>
	<?php 
		if(!isset($_SESSION['cart_items'])){
   			$_SESSION['cart_items'] = array();
		}
		foreach ($_SESSION['cart_items'] as $id => $product) {
			echo "<tr>";
			echo "<td>".$id."</td>";
			echo "<td>".$product['name']."</td>";
			echo "<td>".$product['origin']."</td>";
			echo "<td>".$product['price']."</td>";
			echo "<td>".$product['quantity']."</td>";
			echo "<td>"."<a href=\"remove.php?id=$id&mode=one\">Remove 1 from cart</a>"."</td>";
			echo "<td>"."<a href=\"remove.php?id=$id&mode=all\">Remove all from cart</a>"."</td>";
			echo "</tr>";
		}
	?>
</table>