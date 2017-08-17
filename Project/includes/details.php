<?php

session_start();
include 'db.inc.php';

// Set variables ============================== //
$q = intval($_GET['q']);

// Prepare and execute query ============================== //
$sql="SELECT * FROM user WHERE uId = '$q'";
$result = mysqli_query($conn, $sql);

// Loop through query results and echo html ============================== //
while($row = mysqli_fetch_array($result)) {
	echo "<ul>";
	echo "<li>Email: " . $row[1] . "</li><br>";
	echo "<li>Name: " . $row[3] . "</li><br>";
	echo "<li>Phone: " . $row[4] . "</li><br>";
	echo "<li>Emergency Contact: " . $row[5] . "</li><br>";
	echo "<li>Emergency Contact Phone: " . $row[6] . "</li><br>";
	echo "</ul>";
}

// Clean up ============================== //
mysqli_close($conn);
?>