<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  	<p>Login with your account credentials or sign up for an account below</p>
  </div>
	 
  <form class="form">
  		<label>Username:
  		    <input type="text" name="username" id="username_login" placeholder="Enter your username here">
        </label>
  		<label>Password:
            <input type="password" name="password" id="password_login" placeholder="Enter your password here">
        </label>

        <div class="btnArea">
            <button type="submit" class="loginBtn" name="login_user" id="loginButtonId" onclick="checkLoginCredentials()">Login</button>
            <button type="button" class="signupBtn" onclick="window.location.href='register.php'">Sign Up!</button>
        </div>

  </form>

  <script src="javascript.js"></script>
</body>
</html>
