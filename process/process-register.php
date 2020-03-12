<?php

// check if user accessed this page using "submit" from previous page
if(isset($_POST['register-submit'])){
     
    require('../conn.php');
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeat_password = $_POST['rep-password'];
    $email = $_POST['email'];

    print "reached here";

    //check if entered fields are empty
    if(empty($username) || empty($firstname) || empty($lastname) || empty($password) || empty($email)){
        header("Location: ../signup.php?error=emptyfields&firtsname=".$firstname."&lastname=".$lastname."&username=".$username."&email=".$email);
        exit();
    }

    // validate email/username string
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invalidusernameemail");
        exit();
    }

    //check if email is valid
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidemail&firtsname=".$firstname."&lastname=".$lastname."&username=".$username);
        exit();
    }

    //check if username is valid with normal characters
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invalidusername&firtsname=".$firstname."&lastname=".$lastname."&email=".$email);
        exit();
    }

    //check if passwords match
    elseif($password !== $repeat_password){
        header("Location: ../signup.php?error=passwordcheck&firtsname=".$firstname."&lastname=".$lastname."&username=".$username."&email=".$email);
        exit();
    }

    else{
        //1st check if statements work and execute
        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }

        // check if username exists
        else{
            mysqli_stmt_bind_param($stmt, "s", $email); // bind email to later use in the statement
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt); //check if there was a match in DB and store it in $stmt
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){ 
                header("Location: ../signup.php?error=emailtaken&firtsname=".$firstname."&lastname=".$lastname."&username=".$username);
                exit();
            }

            // insert user info into table if it doesn't exist
            else{
                $sql = "INSERT INTO users (firstname, lastname, username, passw, email) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                //if sql fails do this...
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }

                // here this hashes the password so that it cant be intercepted when we are inserting into the table OBVIOUSLY
                else{
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username, $password_hash, $email);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    // after inserting: SUCCESS MESSAGE
                    header("Location: ../login.php");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

// if user tries to access this page without clicking sign-up button because of "isset"
else{
    header("Location: ../signup.php");
    exit();
}
