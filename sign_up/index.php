<!DOCTYPE html>
<html lang="en">
<head>
	<title>SoundX Sign Up</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/login-style.css" />
	</head>
	
	<body>
		<div class="signup-bg">
				  <form action="" class="signup-container">
					<div class="sign-up-input-block">
						<div class="signup-title">
							<h1>Member Sign Up</h1>
						</div>
						<div class="input-field">
							<div id="name-input-row">
								<div id="name-input">
									<label for="FirstName"><b>First Name</b></label>
									<input type="text" placeholder="First Name" name="secondName" id="FirstName" required>
								</div>
								<div id="name-input">
									<label for="LastName"><b>Last Name</b></label>
									<input type="text" placeholder="Last Name" name="firstName" id="LastName" required>
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
								<input type="password" placeholder="Confirm Password" name="confirmPassword" id="ConfirmPassword" onchange="confirmPassword(this.value);" required>
							</div>
						</div>
						<div>
							<button type="submit" class="signup-button">Sign Up</button>
						</div>
				  </form>
			</div>
		</div>
		<script src="signup.js"></script>
	</body>
</html>