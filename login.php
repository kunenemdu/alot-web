<!-- The header -->
<?php
require("header.php");
?>
<!-- the sign up form -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALOTSports | Login</title>
    <link rel="stylesheet" href="css\all.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="breadcrumb">
        <li><a href="index.php">HOME</a></li>
        <li>LOGIN</li>
    </div>
    <div class="divlog">
        <div class="cont">
            <div id="titlelog">
                <hp>LOGIN STAY CONNECTED SHOP ALOT</hp>
            </div>
            <div class="ilog">
                <h3><i class="fab fa-accusoft"></i>\\\</h3>
                <h5>ALOTSports</h5>
                </<h3>
            </div>
            <?php

            // first check if there is "error" in URL
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    print '<p class="error"> Fill in all the fields! </p>';
                } else if ($_GET['error'] == "invalidusernameemail") {
                    print '<p class="error"> Invalid username & email! </p>';
                } else if ($_GET['error'] == "usernotexist") {
                    print '<p class="error"> User does not exist. Please check your details! </p>';
                } else if ($_GET['error'] == "wrongpassword") {
                    print '<p class="error"> Wrong password! Try again. </p>';
                }
                else if ($_GET['error'] == "pleaselogin") {
                    print '<p class="error"> Please login to access your profile! </p>';
                }
            }
            ?>
            <form action="/process/process-login.php" class="loginform" method="post">
                <p>
                    <h6>Use Google Account Instead</h6>
                </p>
                <p><button class="google"><i class="fab fa-google-plus-g"></i>Google</button></p>
                <input type="text" name="username" placeholder="Email">
                <br>
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <br>
                <button class="loglog" type="submit" name="login-submit">LOGIN</button>
                
            </form>
            <a href="signup.php"><button class="loglog"> SIGN UP</button></a>
        </div>

    </div>
    <script src="alot.js"></script>
</body>

</html>

<!-- The footer -->
<?php
require("footer.php");
?>