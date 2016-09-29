<!DOCTYPE html>
<html>
<head>
	<title>Convert Degree to Radian</title>
</head>
<body>
	<?php
		function convert($value, $type) {
			$constant = 57.2957795;
			if ($type === "Rad") {
				$result = $value * $constant;
				echo $value." radians is ".$result." degress.<br>";
			} else {
				$result = $value / $constant;
				echo $value." degrees is ".$result." radians.<br>";
			}
		}
	?>
	<?php
		if (isset($_POST["submit"])) {
			convert($_POST["value"], $_POST["type"]);
		} else {
	?>
	<form action="Convert.php" method="post">
		Value: <input type="number" name="value" step="0.01"><br>
		<input type="radio" name="type" value="Rad" checked>Radians to Degrees
		<input type="radio" name="type" value="Deg">Degrees to Radians<br>
		<input type="submit" value="Convert!" name="submit">
	</form>
	<?php } ?>
	
</body>
</html>