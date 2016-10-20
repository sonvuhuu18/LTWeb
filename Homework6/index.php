<?php session_start() ?>
<?php require_once 'initDatabase.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | CSShop</title>
</head>
<body>
	<?php 
		if (isset($_SESSION['username'])) {
			$username = $_SESSION['username'];
			echo "Welcome $username to CSSHOP<br>";
			echo '<a href="logout.php">Log out</a>';
			echo ' | ';
			echo '<a href="cart.php">Shopping Cart</a><br><br>';
		} else {
			echo '<a href="login.php">Log in</a><br><br>';
		}
	?>
	
	<?php require 'connectDB.php' ?>
	<table align="left" border="solid">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Origin</th>
			<th>Price</th>
			<th>Quantity</th>
		</tr>
		<?php 
			$tableName = "products";
			$sql = "SELECT * FROM `$tableName`";
			$result = mysqli_query($conn,$sql);
			if ($result) {
				while ($row = mysqli_fetch_row($result)) {
					echo "<tr>";
					$id = $row[0];
					foreach ($row as $field) {
						echo "<td>$field</td>";
					}
					echo "<td>";
					echo "<a href=\"added.php?id=$id\">Add to cart</a>";
					echo "</td>";
					echo "</tr>";
				}
			}
		?>
	</table>
	<?php require 'closeDB.php' ?>
</body>
</html>