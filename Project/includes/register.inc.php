<?php

include 'db.inc.php';

// Verify form was submitted ============================== //
if (!isset($_POST['submit'])) {
	header("Location: ../php/index.php");
	exit();
}

// Set variables ============================== //
$email = trim(mysqli_real_escape_string($conn, $_POST['email']));
$pw1 = trim($_POST['pw1']);
$pw2 = trim($_POST['pw2']);
	
// Validate input ============================== //
// Check all inputs are set ============================== //
if (!isset($email) || !isset($pw1) || !isset($pw2)) {
	header("Location: ../php/index.php");
	exit();
}
// Verify passwords match ============================== //
if ($pw1 !== $pw2) {
	header("Location: ../php/index.php");
	exit();
}
// Verify email ============================== //
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: ../php/index.php");		
	exit();
}

// Prepare and execute query ============================== //
$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
	header("Location: ../php/index.php");
	exit();
}

// Hash password ============================== //
$hashedPw = password_hash($pw1, PASSWORD_DEFAULT);

// Prepare and execute second query ============================== //
$sql2 = "INSERT INTO user (email, password) VALUES (?, ?)";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("ss", $email, $hashedPw);
$stmt2->execute();

// Clean up ============================== //
$stmt2->close();
$conn->close();
header("Location: ../php/index.php");
exit();

?>

