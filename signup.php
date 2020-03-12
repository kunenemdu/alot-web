<!-- The header -->
<?php
require ("header.php");
?>
<!-- the sign up form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\all.css">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</head>
<body>
 <!-- use this php -->
    <div class="divsign">
    
    <div id="titlesign"><hp>REGISTER HERE FOR EASY CHECKOUT</hp></div>
    
        <form action="/process/process-register.php" method="POST" class="signupform">
        
        <h3><i class="fab fa-accusoft"></i>\\\</h3><h5>ALOTSports</h5></<h3>
        <?php

// first check if there is "error" in URL
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        print '<p class="error"> Fill in all the fields! </p>';
    } else if ($_GET['error'] == "invalidusernameemail") {
        print '<p class="error"> Invalid username & email! </p>';
    } else if ($_GET['error'] == "invalidemail") {
        print '<p class="error"> Invalid Email Entered! </p>';
    } else if ($_GET['error'] == "invalidusername") {
        print '<p class="error"> Invalid Username Entered! </p>';
    }
    else if ($_GET['error'] == "passwordcheck") {
        print '<p class="error"> Passwords Do Not Match! </p>';
    }
    else if ($_GET['error'] == "emailtaken") {
        print '<p class="error"> Account With Email Already Exists! </p>';
    }
}
?>
            <br>
            <input type="text"name="firstname" placeholder="Firstname">
            <br>
            <br>
            <input type="text"name="lastname" placeholder="Lastname">
            <br>
            <br>
            <input type="text"name="username" placeholder="Username">
            <br>
            <br>
            <input type="text"name="email" placeholder="Email">
            <br>
            <br>
            <input type="password"name="password" placeholder="Password">
            <br>
            <br>
            <input type="password"name="rep-password" placeholder="Repeat Password">
            <br>
            <button class="signup" type="submit" name="register-submit">SIGNUP</button>
        </form>
    </div>
 
    <script src="alot.js"></script>
</body>
</html>

<!-- The footer -->
<?php
require ("footer.php");
?>

