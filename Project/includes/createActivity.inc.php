<?php

session_start();
include 'db.inc.php';

// Set variables ============================== //
$aName = trim($_POST['aName']);
$location = trim($_POST['location']);
$startY = trim($_POST['startY']);
$startM = trim($_POST['startM']);
$startD = trim($_POST['startD']);
$endY = trim($_POST['endY']);
$endM = trim($_POST['endM']);
$endD = trim($_POST['endD']);
$uId = $_SESSION['uId'];

// Format dates ============================== //
$start = $startY . '-' . $startM . '-' . $startD;
$end = $endY . '-' . $endM . '-' . $endD;

// Validate input ============================== //
// Check all inputs are set ============================== //
if (!isset($aName) || !isset($location) || !isset($startY) || !isset($startM) || !isset($startD) || !isset($endY) || !isset($endM) || !isset($endD)) {
	header("Location: ../php/user.php");
	exit();
}
// Verify dates make sense ============================== //
$x = strtotime($end);
$y = strtotime($start);

if ($x <= $y) {
	header("Location: ../php/user.php");
	exit();
}

// Prepare and execute query ============================== //
$sql = "INSERT INTO activity (aName, location, start, end, uId) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $aName, $location, $start, $end, $uId);
$stmt->execute();

// Clean up ============================== //
$conn->close();
header("Location: ../php/user.php");

?>