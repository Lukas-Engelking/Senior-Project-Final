<?php

session_start();
include 'db.inc.php';

// Set variables ============================== //
$email = trim($_POST['email']);
$pw = trim($_POST['password']);
$uName = trim($_POST['uName']);
$phone = trim($_POST['phone']);
$ec = trim($_POST['ec']);
$ecp = trim($_POST['ecp']);
$uId = $_SESSION['uId'];

// Validate input ============================== //
// Check all inputs are set ============================== //
if (!isset($email) || !isset($pw) || !isset($uName) || !isset($phone) || !isset($ec) || !isset($ecp)) {
	header("Location: ../php/user.php");
	exit();
}
// Verify phone numbers are numbers ============================== //
if (is_nan($phone) || is_nan(ecp)) {
	header("Location: ../php/user.php");
	exit();
}
// Verify email ============================== //
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: ../php/user.php");
	exit();
}

// Alter password letters ============================== //
$pwLength = strlen($pw);
$_SESSION["alteredPw"] = str_repeat("*", $pwLength);
//hash password
$hashedPw = password_hash($pw, PASSWORD_DEFAULT);

// Prepare and execute query ============================== //
$sql = "UPDATE user SET email=?, password=?, uName=?, phone=?, ec=?, ecp=? WHERE uId=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssisii", $email, $hashedPw, $uName, $phone, $ec, $ecp, $uId);
$stmt->execute();

// Clean up ============================== //
$conn->close();
header("Location: ../php/user.php");
exit();

?>