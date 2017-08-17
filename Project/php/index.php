<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>	
	<!-- Header ============================== -->
	<div id="header">
		<div id="title">
			<h1>Senior Project</h1>
		</div>
		<div id="clear"></div>
	</div>
	
	<!-- Container ============================== -->
	<div id="container">				
		
		<!-- Main ============================== -->
		<div id="main">
			<!-- About ============================== -->
			<div id="about" class="section">
				<h2>About</h2>
				<p>This idea is all about reporting and recording. We all will face potentially dangerous situations throughout our lives, be it purposefully or not. Either way, it might be helpful if somebody knew if we were safe. Here you can create a profile, login, set activities, and mark your safe return from said activities. In this way, we can keep track of when somebody is potentially doing something dangerous. When they notify they've finished the activity, we know they are safe. If they fail to notify their safety, it could be a sign they are in danger. In some situations, this could help somebody if they ever need it.</p>
			</div>
		</div>
		
		<!-- Side ============================== -->
		<div id="side">
			<!-- Buttons ============================== -->
			<div class="buttons">
				<button id="loginBtn">Login</button><button id="registerBtn">Register</button>
			</div>
			
			<!-- Sign In ============================== -->
			<div id="login" class="section">			
				<form action="../includes/login.inc.php" method="post" onsubmit="return validateLogin()" name="loginForm">
					<label for="email">Email</label>
					<input type="text" name="email">
					<label for="password">Password</label>
					<input type="password" name="pw">
					<button type="submit" name="submit">Login</button>	
				</form>
			</div>
			<div id="loginText" class="formText"></div>

			<!-- Register ============================== -->
			<div id="register" class="section">
				<form action="../includes/register.inc.php" method="post" onsubmit="return validateRegister()" name="registerForm">
					<label for="email">Email</label>
					<input type="text" name="email">
					<label for="pw1">Password</label>
					<input type="password" name="pw1">
					<label for="pw2">Verify Password</label>
					<input type="password" name="pw2">
					<button type="submit" name="submit">Register</button>	
				</form>
			</div>
			<div id="registerText" class="formText"></div>
		</div>
	</div>
		
	<!-- Footer ============================== -->
	<div id="footer">
		<p>Created by Lukas Engelking</p>	
	</div>	
	<script src="../js/index.js"></script>
</body>
</html>