<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kingdoms Roleplay</title>
	<meta name="description" content="Kingdoms Roleplay MTA:SA server website">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/scripts.js" type="text/javascript"></script>
  <style>
		body {
		  background-color: #5d482b;
		}
	</style>
</head>
<body>
	<!-- forms-above -->
	<div id="reg-Page">
		<button onclick="return regForm()" class="button regClose">Close</button>
		<div class="regPage-Terms">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="regPage-Form">
			<form method="post" class="form-Reg" action="includes/signup.inc.php">
				<div class="input input-effect">
					<input class="inputEffect" type="text" name="uReg-Username" placeholder="Username">
					<span class="focus-border">
						<i></i>
					</span>
				</div>
				<div class="input input-effect">
					<input class="inputEffect" type="password" name="uReg-Password" placeholder="Password">
					<span class="focus-border">
						<i></i>
					</span>
				</div>
				<div class="input input-effect">
					<input class="inputEffect" type="password" name="uReg-Password2" placeholder="Password again">
					<span class="focus-border">
						<i></i>
					</span>
				</div>
				<div class="input input-effect">
					<input class="inputEffect" type="text" name="uReg-Email" placeholder="E-mail address">
					<span class="focus-border">
						<i></i>
					</span>
				</div>
				<button class="button" type="submit" name="signup-submit"><span class='glyphicon glyphicon-log-in'></span> Sign up</button>
			</form>
		</div>
	</div>
	<!-- /forms-above -->

	<!-- header -->
	<?php require "header.php"; ?>
	<!-- /header -->

	<!-- body-container -->
	<div id='body-container'>
		<div id='body-left'>
			<div class="input input-effect">
				<input class="inputEffect" type="text" placeholder="Username">
					<span class="focus-border">
						<i></i>
					</span>
			</div>
		</div>
		<div id='body-right'>

		</div>
	</div>
	<!-- /body-container -->
	<script src="js/scripts.js"></script>
</body>
</html>
