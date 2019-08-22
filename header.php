
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Próba BLOG</title>
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

	<!-- reg-form -->
	<div id="reg-Page">
		<button onclick="return regForm()" class="button regClose">Close</button>
		<div class="regPage-Terms">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="regPage-Form">
			<?php
				if (isset($_GET['regerror'])) {
					if ($_GET['regerror'] == "emptyfields") {
						echo '<p class="regError-p">Fill in all fields!</p>';
					}
					else if ($_GET['regerror'] == "invalidmailuid") {
						echo '<p class="regError-p">Invalid username and email!</p>';
					}
					else if ($_GET['regerror'] == "invalidmail") {
						echo '<p class="regError-p">Give a valid email!</p>';
					}
					else if ($_GET['regerror'] == "invaliduid") {
						echo '<p class="regError-p">The username can contains characters: a-z, A-Z, 0-9</p>';
					}
					else if ($_GET['regerror'] == "pwdcheck") {
						echo '<p class="regError-p">The passwords have to be the same!</p>';
					}
					else if ($_GET['regerror'] == "sqlerror") {
						echo '<p class="regError-p">Mysql error!</p>';
					}
					else if ($_GET['regerror'] == "uidtaken") {
						echo '<p class="regError-p">This username is already used!</p>';
					}
				}
			?>
			<form method="post" class="form-Reg" action="includes/signup.inc.php">
				<div class="input input-effect">
					<?php
						$username = $_GET['uid'] ?? '';
						$email = $_GET['mail'] ?? '';

					echo '<input class="inputEffect" type="text" name="uReg-Username" placeholder="Username" value='.$username.'>';
					?>
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
					<?php
						$email = $_GET['mail'] ?? '';
						echo '<input class="inputEffect" type="text" name="uReg-Email" placeholder="E-mail address" value='.$email.'>';
					?>
					<span class="focus-border">
						<i></i>
					</span>
				</div>
				<button class="button" type="submit" name="signup-submit"><span class='glyphicon glyphicon-log-in'></span> Sign up</button>
			</form>
		</div>
	</div>
	<!-- /reg-form -->

  <!-- header -->
  <div id='head'>
    <div id='head-roof'>
      <p>Welcome adventurer to <span id='head-roof-name'>Kingdoms Roleplay</span>'s website!</p>
    </div>

    <div id='head-container'>
      <div id='head-logo'>
        <img src="img/logo.png" width="100%" height="100%">
      </div>

      <!-- account-header -->
      <div id='head-account'>
				<?php
					if (isset($_SESSION['uID'])) {
						echo '
							<div class="profilePicture">
								<img src="img/asd.png" width="100px" height="100px">
							</div>
							<form method="post" class="form-Logout" action="includes/logout.inc.php">
								<label>Welcome, '.$_SESSION["uName"].'!</label><br>
								<button class="button" type="submit" name="logout-submit"><span class="glyphicon glyphicon-log-in"></span> Logout</button>
							</form>
						';
					} else {
						echo '
							<form method="post" class="form-Log" action="includes/login.inc.php">
								<label>Are you an experienced adventurer? Sign in!</label><br>
								<div class="input input-effect">
									<input type="text" class="inputEffect" name="uLog-Username" placeholder="Username">
									<span class="focus-border">
										<i></i>
									</span>
								</div>
								<div class="input input-effect">
									<input type="password" class="inputEffect" name="uLog-Password" placeholder="Password">
									<span class="focus-border">
										<i></i>
									</span>
								</div><br>
								<button class="button" type="submit" name="login-submit"><span class="glyphicon glyphicon-log-in"></span> Sign in</button>
								<label>Are you not one of us yet? Sign up!</label>
								<button class="button" type="button" name="button" onclick="return regForm()"><i class="fas fa-user-plus"></i> Sign up</button>
							</form>
						';
					}
				?>
      </div>
      <!-- /account-header -->

      <!-- menu-navbar -->
      <div id="menu-nav">
          <div id="navigation-bar">
            <ul>
              <li><a href="index.php"><i class="fa fa-home"></i><span> Home</span></a></li>
              <li><a href="#"><i class="fa fa-handshake"></i><span> Services</span></a></li>
              <li><a href="about.php"><i class="fa fa-user"></i><span> About</span></a></li>
              <li><a href="#"><i class="fa fa-book"></i><span> Contact</span></a></li>
            <li><a href="#"><i class="fa fa-rss"></i> <span> Blog</span></a></li>
            </ul>
          </div>
      </div>
      <!-- /menu-navbar -->
    </div>
  </div>
  <!-- /header -->
  <script src="js/scripts.js"></script>
</body>
</html>
