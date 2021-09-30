<?php 
require_once '../db_conn.php';
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['password'])){
	//If already login, jump to home page directly
	header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/"); 
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<title>SoundX Login</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/login-style.css" />
	</head>
	
	<body>
		<div class="login-bg">
		  <form action="" method="post" class="login-container">
			<div>
				<div class="login-title">
					<h1>Login</h1>
				</div>
				<div class="input-field">
	
					<label for="Email"><b>Email</b></label>
					<input type="text" placeholder="Email" name="email" id="Email" required>

					<label for="Password"><b>Password</b></label>
					<input type="password" placeholder="Password" name="password" id="Password" required>
				</div>
				<div id="sign-up-request">
					<p>New user? <a href="signup.html">Sign up now!</a></p>
				</div>
				<div>
					<button type="submit" class="login-button">Login</button>
				<?php 
					//check whether the user is already in database
					if (isset($_POST['email']) && isset($_POST['password'])){
						//user has key in email and password, verify in database
						$query = "SELECT email, password FROM users WHERE ";
						$query.= "email='{$_POST['email']} 'and password='{$_POST['password']}'";
						echo $query;
						$result = $db->query($query);
						if ($result->num_rows > 0) {
							$_SESSION['email'] = $_POST['email'];
							$_SESSION['password'] = $_POST['password'];
							header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/"); 
						} else {
							echo "<div>Input email or password is not correct.</div>";
						}
						$_POST = array();
					}?>
				</div>
			</div>
		  </form>
		</div>
	</body>
</html>
