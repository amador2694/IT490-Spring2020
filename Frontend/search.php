<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>User Profile</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="search.php">Search</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="forum.php">Forums</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="leaderboard.php">Leaderboards</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-1">
            <?php
            if (isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                echo "<li class='nav-item'>
                <a class='nav-link' href='profile.php'>$username <i class='far fa-address-card'></i></a>
            </li>";
            }else {
                echo "<button type=\"button\" class=\"btn btn-primary btn-lg\" data-toggle=\"modal\" data-target=\"#loginmodal\">Login In</button>";
            }
            ?>
        </ul>
    </div>
</nav>


<button type="button" class="loginBtn" name="logout_user" id="logoutButtonId" onclick="logout()">Logout</button>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/761d96f64b.js" crossorigin="anonymous"></script>
<script src="javascript.js"></script>
</body>
</html>
