<?php

// check if user accessed this page using "submit" from previous page
if(isset($_POST['update-submit'])){
     
    session_start();
    require('../conn.php');
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $user_id = $_SESSION["user_id"];

    //check if entered fields are empty
    if(empty($username) || empty($firstname) || empty($lastname)){
        header("Location: ../profile.php?error=emptyfields&firtsname=".$firstname."&lastname=".$lastname."&username=".$username."&email=".$email);
        exit();
    }
    //check if username is valid with normal characters
    elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../profile.php?error=invalidusername&firtsname=".$firstname."&lastname=".$lastname."&email=".$email);
        exit();
    }

    else{
        //1st check if statements work and execute
        $sql = "SELECT * FROM users WHERE user_id=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../profile.php?error=sqlerror");
            exit();
        }

        // check if username exists
        else{
            mysqli_stmt_bind_param($stmt, "s", $user_id); // bind email to later use in the statement
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt); //check if there was a match in DB and store it in $stmt
            

            // insert user info into table if it doesn't exist
                $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username' WHERE user_id='$user_id'";
                $stmt = mysqli_stmt_init($conn);
                //if sql fails do this...
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../profile.php?error=sqlerror");
                    exit();
                }

                // here this hashes the password so that it cant be intercepted when we are inserting into the table OBVIOUSLY
                else{

                    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    // after inserting: SUCCESS MESSAGE
                    header("Location: ../profile.php?error=success");
                    exit();
                }
            
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

// if user tries to access this page without clicking sign-up button because of "isset"
else if (!isset($_SESSION["username"])){
    header("Location: ../login.php?error=pleaselogin");
    exit();
}