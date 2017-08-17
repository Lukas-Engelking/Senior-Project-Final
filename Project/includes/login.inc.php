<?php

session_start();
include 'db.inc.php';

// Verify form was submitted ============================== //
if (!isset($_POST['submit'])) {
	header("Location: ../php/index.php");
	exit();
}

// Set variables ============================== //
$email = trim(mysqli_real_escape_string($conn, $_POST['email']));
$pw = trim($_POST['pw']);
	
// Validate input ============================== //
// Check all inputs are set ============================== //
if (!isset($email) || !isset($pw)) {
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
	
if ($resultCheck < 1) {
	header("Location: ../php/index.php");
	exit();
}

// Check password match ============================== //
$row = mysqli_fetch_assoc($result);
$hashedPwCheck = password_verify($pw, $row['password']);

if ($hashedPwCheck == FALSE) {
	header("Location: ../php/index.php");
	exit();	
}

// Set session variables ============================== //
$_SESSION['uId'] = $row['uId'];
//alter password letters
$pwLength = strlen($pw);
$_SESSION["alteredPw"] = str_repeat("*", $pwLength);

// Clean up and log user in ============================== //
$conn->close();
if ($row['email'] == "admin@gmail.com")
	header("Location: ../php/admin.php");
else
	header("Location: ../php/user.php");
exit();

?>