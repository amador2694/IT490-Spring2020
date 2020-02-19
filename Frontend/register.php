<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register an Account</title>
  <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">

</head>
<body>
  <div class="header">
      <ul class="topnav">
          <li><a class="active" href="index.html">Home</a></li>
          <li><a href="search.php">Search</a></li>
          <li><a href="forum.php">Forum</a></li>
          <li><a href="leaderboard.php">Leaderboard</a></li>
      </ul>
  	<h2>Register</h2>
  	<p>Enter your information below to sign up for an account</p>
      <p style="text-decoration: underline">Note: all fields are required</p>
  </div>
	
  <form class="form">
      <label>First Name:</label>
      <input type="text" name="firstname" id="id_firstname" placeholder="Example: John">

      <label>Last Name:</label>
      <input type="text" name="lastname" id="id_lastname" placeholder="Example: Does">

      <label>Username:</label>
  	  <input type="text" name="username" id="id_username" placeholder="Example: JohnDoe95">

  	  <label>Email:</label>
  	  <input type="email" name="email" id="id_email" placeholder="Example: johndoe95@gmail.com">

  	  <label>Password:</label>
  	  <input type="password" name="password_1" id="id_password" placeholder="Enter your password here">

  	  <label>Confirm password:</label>
  	  <input type="password" name="password_2" id="id_confirm_password" placeholder="Confirm your password here">

  	  <button type="submit" class="signupBtn" id="registerButtonId" name="reg_user" onclick="checkRegisterCredentials()">Register</button>

  </form>
  <script src="javascript.js"></script>
</body>
</html>