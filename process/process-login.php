<?php

// if user accessed this page using the button do this...
if(isset($_POST['login-submit'])){
    
    require('../conn.php');

    //first use these variables to login
    $email = $_POST['username'];
    $password = $_POST['password'];

    //check if entered fields are empty
    if(empty($password) || empty($email)){
        header("Location: ../login.php?error=emptyfields");
        exit();
    }

    //check if info entered exists
    else{
        $sql = "SELECT * FROM users WHERE email=? OR username=?"; //placeholders for more secure prepared statements
        $stmt = mysqli_stmt_init($conn);

        // runs the sql statement in the DB and checks if theres an error
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        }

        else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            header("Location: ../login.php?error=invalidusernameemail");
            exit();
        }

        // execute and check the $sql with the below parameters
        else{
            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // is there a result from above statement?
            if($row = mysqli_fetch_assoc($result)){
                $passCheck = password_verify($password, $row['passw']); // fucntion takes both passwords hashes it and see if the match together with DB password T/F
                if($passCheck == false){
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }

                //then we start the session here
                else{
                    //then assign SESSION variables for the logged in user
                    session_start();
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_id'] = $row['user_id'];

                    header("Location: ../profile.php");
                    exit();
                }
            }
            else{
                header("Location: ../login.php?error=usernotexist");
                exit();
            }
        }
    }
}
else{
    header("Location: ../index.php");
    exit();
}