<?php

// Query Functions ============================== //
// Query One ============================== //
function queryOne($table) {
	include 'db.inc.php';
	
	// Set variables ============================== //
	$uId = $_SESSION['uId'];
	
	// Prepare and execute query ============================== //
	$sql = "SELECT * FROM $table WHERE uId='$uId'";
	return mysqli_query($conn, $sql);
	
	// Clean up ============================== //
	$conn->close();
}

// Query Two ============================== //
function queryTwo($table) {
	include 'db.inc.php';
	
	// Prepare and execute query ============================== //
	$sql = "SELECT * FROM $table WHERE end < CURDATE();";
	return mysqli_query($conn, $sql);
	
	// Clean up ============================== //
	$conn->close();
}

// Display Functions ============================== //
// Display My Activities ============================== //
function displayMyActivities() {
	// Set variables ============================== //
	$result = queryOne('activity');
	
	// Loop through query results and echo html ============================== //
	while ($row = mysqli_fetch_array($result)) {
		echo "<div class='innerSection'>";
		echo "<ul>"; 
		echo "<li><h3 class='activityName'>" . $row[1] . "</h3></li>";
		echo "<li><form action='../includes/deleteActivity.inc.php' method='post'>";
		echo "<button class='safe' type='submit' name='safeId' value='$row[0]'>Done</button>";
		echo "</form></li><br>";
		echo "<li>WHERE: " . $row[2] . "</li>";
		echo "<li>FROM: " . $row[3] . " TO " . $row[4] . "</li>";
		echo "</ul>";
		echo "</div>";
	}	
}

// Display Date Inputs ============================== //
function displayDateInput($time) {
	// Set variables ============================== //
	$y = $time . 'Y';
	$m = $time . 'M';
	$d = $time . 'D';
	
	// Echo year select statement and options ============================== //
	echo "<select class='dateSelect' name='$y'>";
	echo "<option value=''></option>";
	for ($y = 2017; $y < 2022; $y++) {
		echo "<option value='$y'>$y</option>";
	}
	echo "</select>";
	
	// Echo month select statement and options  ============================== //
	echo "<select class='dateSelect' name='$m'>";
	echo "<option value=''></option>";
	for ($m = 1; $m <13; $m++) {
		if ($m < 10) {
			echo "<option value='$m'>0$m</option>";
		} else {
			echo "<option value='$m'>$m</option>";
		}
	}
	echo "</select>";
	
	// Echo day select statement and options  ============================== //
	echo "<select class='dateSelect' name='$d'>";
	echo "<option value=''></option>";
	for ($d = 1; $d < 32; $d++) {
		if ($d < 10) {
			echo "<option value='$d'>0$d</option>";
		} else {
			echo "<option value='$d'>$d</option>";
		}
	}	
	echo "</select>";
}

// Display Info ============================== //
function displayInfo($i) {
	// Set variables ============================== //
	$alteredPw = $_SESSION['alteredPw'];
	$result = queryOne('user');
	$row = mysqli_fetch_array($result);
	
	// Echo user info ============================== //
	if ($i == 'password')
		echo $alteredPw;
	else
		echo htmlspecialchars($row[$i]);
}

// Display User Activities ============================== //
function displayUserActivities() {
	// Set variables ============================== //
	$result = queryTwo('activity');
	
	// Loop through query results and echo html ============================== //
	while ($row = mysqli_fetch_array($result)) {
		echo "<div class='innerSection'>";
		echo "<ul>"; 
		echo "<li><h3 class='activityName'>" . $row[1] . "</h3></li>";
		echo "<button class='activityBtn' name='details' value='$row[5]' onclick='showDetails(this.value)'>Details</button></form></li>";
		echo "<li><form action='../includes/deleteActivity.inc.php' method='post'>";
		echo "<button class='activityBtn' type='submit' name='checkId' value='$row[0]'>Done</button>";
		echo "</form></li><br>";
		echo "<li>WHERE: " . $row[2] . "</li>";
		echo "<li>FROM: " . $row[3] . " TO " . $row[4] . "</li>";
		echo "</ul>";
		echo "</div>";
	}	
}

?>