<?php 
require_once '../db_conn.php';
session_start();

if (isset($_SESSION['user_id'])){
	//If already login, jump to home page directly
	header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/home/"); 
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SoundX Sign Up</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/login-style.css" />
	</head>
	
	<body>
		<div class="signup-bg">
				  <form action="" method="post" class="signup-container">
					<div class="sign-up-input-block">
						<div class="signup-title">
							<h1>Member Sign Up</h1>
						</div>
						<div class="input-field">
							<div id="name-input-row">
								<div id="name-input">
									<label for="FirstName"><b>First Name</b></label>
									<input type="text" placeholder="First Name" name="firstName" id="FirstName" required>
								</div>
								<div id="name-input">
									<label for="LastName"><b>Last Name</b></label>
									<input type="text" placeholder="Last Name" name="lastName" id="LastName" required>
								</div>
							</div>
							<div>
								<label for="Contact"><b>Contact</b></label>
								<input type="text" placeholder="Your Mobile No." name="contact" id="Contact" required>
								
								<label for="Email"><b>Email</b></label>
								<input type="text" placeholder="Your Email Adress" name="email" id="Email" required>
								
								<label for="Password"><b>Password</b></label>
								<input type="password" placeholder="Set Password." name="password" id="Password" required>
								
								<label for="ConfirmPassword"><b>Confirm Password</b></label>
								<input type="password" placeholder="Confirm Password" name="confirmPassword" id="ConfirmPassword" required>

								<div id="notSamePasswordAlert"></div>
							</div>
						</div>
						<div>
							<button type="submit" class="signup-button">Sign Up</button>
<?php
//first check whether the entered email is already in database
	if (isset($_POST['email']) && isset($_POST['password'])){
		$try_select = "SELECT email FROM users WHERE email='{$_POST['email']}'";
		$result = $db -> query($try_select);
		if ($result -> num_rows > 0){
			//the email has already been registereed
			echo "The email you entered is already registered!";
		} else {
			$insert_query = "INSERT INTO users (email, password, first_name, last_name, contact)";
			$insert_query .= "VALUES('{$_POST['email']}', '{$_POST['password']}', '{$_POST['firstName']}', '{$_POST['lastName']}', '{$_POST['contact']}')";
			$insert_res = $db -> query($insert_query);
			echo "Sign up successfully! Redirecting to login in 3 seconds...";
			header('Refresh: 3; url=../login/');
		}
}

?>
						</div>
				  </form>
			</div>
		</div>
		<script src="signup.js"></script>
	</body>
</html>
