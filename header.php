<?php
   session_start();
   include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="alot.css" ?v=<?php echo time(  ); ?>>
    <link rel="stylesheet" href="css\all.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- THIS IS THE TOP OF THE HEADER -->

    <div class="headtop">
        <div class="small">
            <h3>ALOTSports</h3>
        </div>
        <div class="login">
            <!--this is the login form-->
            <?php if(isset($_SESSION["username"])){ 
                $useruser = $_SESSION["username"];
                ?>
            <div class="profile">
                <a href="profile.php"><p><h6><i class="fas fa-user"><span style="margin-right:3px"></span></i>View Your Profile, <?php print $useruser ?></h6></p> </a>
            </div>
            <div class="cart" >
                <a href="view-cart.php"><h6> <i class="fas fa-shopping-cart"></i> <span></span>Cart</h6></a>
            </div>
            <div class="register">
                <h6> <i class="fas fa-lock"></i><span style="margin-right:3px"></span><a href="#" id="losi">Logout</a></h6>
                <div class="losi">
                    <a href="/process/process-logout.php">Logout</a><br>
                </div>
            </div>
            <?php }
            else{ ?>
            <div class="profile"style="width:8.5vw">
                <a href="profile.php"><p><h6><i class="fas fa-user"></i><span style="margin-right:3px"></span>Sign In To View Profile</h6></p> </a>
            </div>
            
            <!--this is the cart-->
            <div class="cart">
                <a href="view-cart.php"><h6> <i class="fas fa-shopping-cart"></i> <span></span>Cart</h6></a>
            </div>
            <div class="register"style="width:5.5vw">
                <h6> <i class="fas fa-lock"></i><span style="margin-right:3px"></span><a href="#" id="losi">Login</a></h6>
                <div class="losi">
                    <a href="login.php"><h6></h6>Login</a><br>
                    <a href="signup.php">Signup</a><br>
                </div>
            </div>
            <?php }?>

        </div>
    </div>
    <!-- THIS IS THE BOTTOM OF THE HEADER -->
    <div class="headbottom">
        <div class="logo">
            <h3><i class="fab fa-accusoft"></i>\\\</h3>
        </div>
        <div class="navbar">

            <ul>
                <li><a href="index.php">HOME</a> </li>
                <li class="men"><a href="men.php">MEN'S</a>
                    
                </li>
                <li class="women"><a href="women.php">WOMEN'S</a>
                
                </li>
                <li><a href="brand.php">BRANDS</a></li>
                <li><a href="about.php">ABOUT</a></li>
            </ul>

        </div>
        <div class="search">
        <form action="search-products.php" method="POST">
            <input type="text" name="search" placeholder="Search-Man, Woman, Brands" id="search">
            <button type="submit" id="sbt"><i class="fas fa-search" ></i></button>
        </form>
        </div>
        </div>
    </div>
  
</body>

</html>