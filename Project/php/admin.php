<?php
session_start();
include '../includes/display.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>	
	<!-- Header ============================== -->
	<div id="header">
		<div id="title">
			<h1>Senior Project</h1>
		</div>
		<form id="logout-form" action="../includes/logout.inc.php" method="post">
			<button id="logout-btn" type="submit" name="logout">Logout</button>
		</form>
	</div>
	
	<!-- Container ============================== -->
	<div id="container">
		
		<!-- Main ============================== -->
		<div id="main">		
			<!-- Activities ============================== -->
			<div id="" class="section">		
				<h2>Activities</h2>
				<div>
					<?php displayUserActivities() ?>
				</div>
			</div>
		</div>
			
		<!-- Side ============================== -->
		<div id="side">
			<!-- Details ============================== -->
			<div class="section">
				<h2>Details</h2>
				<div class='innerSection'>
					<div id="details"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer Start ============================== -->
	<div id="footer">
		<p>Created by Lukas Engelking</p>	
	</div>
	<script src="../js/index.js"></script>
</body>
</html>