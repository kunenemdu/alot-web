<?php
  require "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <?php if(isset($_SESSION["email"])){?>
    <div class="profile-page">
        <p><i class="fas fa-user"><span style="margin-right:3px"></span></i></p>
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
    }else if ($_GET['error'] == "emailtaken") {
        print '<p class="error"> Account With Email Already Exists! </p>';
    }
    else if ($_GET['error'] == "success") {
        print '<p class="error"> Details updated successfully! </p>';
    }
}

$email = $_SESSION["email"];
$sql = "SELECT * FROM users WHERE email='$email'";
$users = mysqli_query($conn,$sql);

while($user = mysqli_fetch_assoc($users)){
    $firstname = $user['firstname'];
$lastname = $user['lastname'];
$username = $user['username'];
$_SESSION["username"] = $username;
}
?>
        <form action="/process/process-update_profile.php" method="POST">
            Unique ID: <?php print $_SESSION["user_id"] ?>
            <br>
            <br>
            Email: <?php print $_SESSION["email"] ?>
            <br>
            <br>
            First Name:<input type="text"name="firstname" placeholder="<?php print $firstname?>">
            
            <br>
            <br>
            Last Name:<input type="text"name="lastname" placeholder="<?php print $lastname?>">
            
            <br>
            <br>
            
            Username:<input type="text"name="username" placeholder="<?php print $username ?>">
            
            <br>
            <br>
            <button class="edit" name="update-submit" type="submit">Update Profile</button>
        </form>
    </div>
    <script src="alot.js"></script>
<?php } else {
    header("Location: ../login.php?error=pleaselogin");
    exit();
}
    ?>

</body>
</html>

<?php
   require "footer.php";
?>