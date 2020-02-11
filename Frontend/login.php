<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>LoginL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  	<p>Login with your account credentials or sign up for an account below</p>
  </div>
	 
  <form method="post" action="login.php" class="form">
  	<?php include('errors.php'); ?>
  		<label>Username:</label>
  		<input type="text" name="username" placeholder="Enter your username here">

  		<label>Password:</label>
  		<input type="password" name="password" placeholder="Enter your password here">
        <div class="btnArea">
            <button type="submit" class="loginBtn" name="login_user" onclick="checkLoginCredentials()">Login</button>
            <button type="button" class="signupBtn" onclick="window.location.href='register.php'">Sign Up!</button>
        </div>

  </form>

  <script src="javascript.js"></script>
</body>
</html>
