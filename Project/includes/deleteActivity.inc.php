<?php

session_start();
include 'db.inc.php';

// Set variables ============================== //
if ($_POST['safeId'])
	$value = $_POST['safeId'];
elseif ($_POST['checkId'])
	$value = $_POST['checkId'];

// Prepare and execute query ============================== //
$sql2 = "DELETE FROM activity WHERE id='$value'";
$result2 = mysqli_query($conn, $sql2);

// Clean up ============================== //
$conn->close();
if ($_POST['safeId'])
	header("Location: ../php/user.php");
elseif ($_POST['checkId'])
	header("Location: ../php/admin.php");
exit();
?>