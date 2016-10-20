<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in | BKShop</title>
</head>
<body>
	<?php 
	$msg = " ";
	if (isset($_POST['submit'])) {
		require 'connectDB.php';		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$tableName = "users";
		$sql = "SELECT * FROM `$tableName` WHERE userName LIKE '$username'";
		//echo $sql;
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_row($result);
			if ($password === $row[1]) {
				$msg = "";
				echo "Logged in <br>";
				echo '<a href="index.php">Back to Homepage</a>';
				$_SESSION['username'] = $username;
			} else {
				$msg = "Wrong password!";
			}
		} else {
			$msg = "Username doesn't exist!";
		}
		require 'closeDB.php';
	}
	if ($msg != "") {
	?>
	<form action="login.php" method="post">
		Username: <br>
		<input type="text" name="username"><br>
		Password: <br>
		<input type="password" name="password"><br><br>
		<input type="submit" value="Log in" name="submit"><br>
	</form>
	<?php 
		echo $msg;
	}
	?>
</body>
</html>