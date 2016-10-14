<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in | BKShop</title>
</head>
<body>
	<?php 
	$account = array('admin' => 'admin', 'username' => 'password');
	$msg = " ";
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if (!array_key_exists($username, $account)) {
			$msg = "Username doesn't exist!";
		} elseif ($account[$username] != $password) {
			$msg = "Wrong password!";
		} else {
			$msg = "";
			echo "Logged in <br>";
			echo '<a href="index.php">Back to Homepage</a>';
			$_SESSION['username'] = $username;
		}
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