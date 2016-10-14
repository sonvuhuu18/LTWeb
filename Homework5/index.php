<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | BKShop</title>
</head>
<body>
	<?php 
		if (isset($_SESSION['username'])) {
			$username = $_SESSION['username'];
			echo "Welcome $username to BKSHOP<br>";
			echo '<a href="logout.php">Log out</a>';
			echo ' | ';
			echo '<a href="cart.php">Shopping Cart</a><br><br>';
		} else {
			echo '<a href="login.php">Log in</a><br><br>';
		}
	?>
	<?php 
	$products = array(
		array("AK47", "Russia", 2700),
		array("M4A1", "USA", 3200),
		array("Galil", "Israel", 1900),
		array("Famas", "France", 2150),
		array("AWP", "UK", 5600),
		array("Desert Eagle", "Israel", 700),
		array("P90", "Belgium", 2350),
		array("XM1014", "Italy", 2200)
	);
	?>
	<table align="left" border="solid">
		<tr>
			<th>Name</th>
			<th>Origin</th>
			<th>Price</th>
		</tr>
		<?php 
			for ($row=0; $row < 8; $row++) { 
				echo "<tr>";
				$name = $products[$row][0];
				$origin = $products[$row][1];
				$price = $products[$row][2];
				for ($column=0; $column < 3; $column++) { 
					echo "<td>".$products[$row][$column]."</td>";
				}
				echo "<td>";
				echo "<a href=\"added.php?name=$name&origin=$origin&price=$price\">Add to cart</a>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>