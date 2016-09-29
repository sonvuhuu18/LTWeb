<!DOCTYPE html>
<html>
<head>
	<title>Birthday Calculatator</title>
</head>
<body>
	<?php 
		function displayDate($name, $inputDate) {
			$date = date("l, F d, Y", strtotime($inputDate));
			echo $name."'s birthday is ".$date."<br>";
		}

		function different($date1, $date2) {
			$diff = date_diff(date_create($date1), date_create($date2));
			echo "Different between two birthdays is ".$diff->format("%a days.<br>");
		}

		function yrsOldCalc($name1, $name2, $date1, $date2) {
			$yrsOld1 = date_diff(date_create($date1), date_create('today'))->y;
			$yrsOld2 = date_diff(date_create($date2), date_create('today'))->y;
			echo $name1." is ".$yrsOld1." year(s) old.<br>";
			echo $name2." is ".$yrsOld2." year(s) old.<br>";
			$yrsOldDiff = date_diff(date_create($date1), date_create($date2))->y;
			echo "Different between ".$name1." and ".$name2." is ".$yrsOldDiff." year(s).<br>";
		}
	?>
	<?php 
		if (isset($_POST["submit"])) {
			echo "<h2>Result</h2>";
			displayDate($_POST["name1"], $_POST["bday1"]);
			displayDate($_POST["name2"], $_POST["bday2"]);
			different($_POST["bday1"], $_POST["bday2"]);
			yrsOldCalc($_POST["name1"], $_POST["name2"], $_POST["bday1"], $_POST["bday2"]);
		} else {
	?>
	<h2>Date Time Function</h2>
	<form action="DateTimeFunction.php" method="post">
		Person 1:<br>
		Name: <input type="text" name="name1"><br>
		Birthday: <input type="date" name="bday1" min="1916-01-01"><br>
		<br>
		Person 2:<br>
		Name: <input type="text" name="name2"><br>
		Birthday: <input type="date" name="bday2" min="1916-01-01"><br>
		<br>
		<input type="submit" name="submit" value="Submit"><br>
	</form>
	<?php } ?>
</body>
</html>