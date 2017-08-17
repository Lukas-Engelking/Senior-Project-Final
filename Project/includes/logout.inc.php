<?php

// Verify form was submitted ============================== //
if (isset($_POST['logout'])) {
	// End session and return to index ============================== //
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../php/index.php");
	exit();
}

?>