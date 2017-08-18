<?php
session_start();
include '../includes/display.inc.php';
$alteredPw = $_SESSION['alteredPw'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User</title>
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
			<!-- MyActivities ============================== -->
			<div id="myActivities" class="section">	
				<h2>My Activities</h2>
				<?php displayMyActivities(); ?>			
			</div>
			
			<!-- MyInfo ============================== -->
			<div id="myInfo" class="section">
				<h2>Information</h2>
				<div class='innerSection'>
					<h3>My Info</h3>
					<ul>
						<li>Name: <?php displayInfo('uName'); ?></li><br>
						<li>Phone: <?php displayInfo('phone'); ?></li><br>
						<li>Email: <?php displayInfo('email'); ?></li><br>
						<li>Password: <?php displayInfo('password'); ?></li>
					</ul>
				</div>

				<div class='innerSection'>
					<h3>Emergency Contact</h3>
					<ul>
						<li>Name: <?php displayInfo('ec'); ?></li><br>
						<li>Phone: <?php displayInfo('ecp'); ?></li><br>
					</ul>
				</div>
			</div>
		</div>
		
		<!-- Side ============================== -->
		<div id="side">
			<!-- Buttons ============================== -->
			<div class="buttons">
				<button id="createActivityBtn">Create Activity</button><button id="editInfoBtn">Edit Info</button>
			</div>
			
			<!-- CreateActivity ============================== -->
			<div id="createActivity" class="section">
				<form action="../includes/createActivity.inc.php" method="post" onsubmit="return validateCreateActivity()" name="createActivityForm">
					<label for="aName">Activity Name</label>
					<select name="aName" onchange="showfield(this)">
						<option value=""></option>
						<option value="Hiking">Hiking</option>
						<option value="Blind Date">Blind Date</option>
						<option value="Travel">Travel</option>
						<option value="Work">Work</option>
						<option value="Night Out">Night Out</option>
						<option value="Other">Other</option>
					</select>
					<div id="div1"></div>
					<label for="location">Location</label>
					<input type="text" name="location">
					<label for="start">Start Date</label>
					<div class="date"><?php displayDateInput('start'); ?></div>
					<label for="end">End Date</label>
					<div class="date"><?php displayDateInput('end'); ?></div>
					<button type="submit">Create</button>
				</form>
			</div>
			<div id="createActivityText" class="formText"></div>
			
			<!-- EditInfo ============================== -->
			<div id="editInfo" class="section">
				<form action="../includes/edit.inc.php" method="post" onsubmit="return validateEditInfo()" name="editInfoForm">				
					<label for="email">Email</label>
					<input type="text" name="email" value="<?php displayInfo('email');?>">
					<label for="password">Password</label>
					<input type="password" name="password" value="<?php displayInfo('password');?>">
					<label for="uName">Name</label>
					<input type="text" name="uName" value="<?php displayInfo('uName');?>">
					<label for="phone">Phone</label>
					<input type="text" name="phone" value="<?php displayInfo('phone');?>">
					<!-- the name attribute acronym ec stands for "emergency contact" -->
					<label for="ec">Emergency Contact</label>
					<input type="text" name="ec" value="<?php displayInfo('ec');?>">
					<!-- the name attribute acronym ecp stands for "emergency contact phone" -->
					<label for="ecp">Emergency Contact Phone</label>
					<input type="text" name="ecp" value="<?php displayInfo('ecp');?>">
					<button type="submit">Update</button>			
				</form>
			</div>
			<div id="editInfoText" class="formText"></div>
		</div>
	</div>

	<!-- Footer ============================== -->
	<div id="footer">
		<p>Created by Lukas Engelking</p>	
	</div>
	<script src="../js/index.js"></script>
</body>
</html>