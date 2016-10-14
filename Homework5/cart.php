<?php session_start() ?>
Shopping cart<br>
<a href="checkout.php">Proceed to checkout</a> | <a href="index.php">Back to homepage</a><br><br>
<table align="left" border="solid">
	<tr>
		<th>Name</th>
		<th>Origin</th>
		<th>Price</th>
	</tr>
	<?php 
		if(!isset($_SESSION['cart_items'])){
   			$_SESSION['cart_items'] = array();
		}
		foreach ($_SESSION['cart_items'] as $index => $product) {
			echo "<tr>";
			echo "<td>".$product['name']."</td>";
			echo "<td>".$product['origin']."</td>";
			echo "<td>".$product['price']."</td>";
			echo "<td>"."<a href=\"remove.php?index=$index\">Remove from cart</a>"."</td>";
			echo "</tr>";
			$index++;
		}
	?>
</table>