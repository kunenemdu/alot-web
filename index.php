<!-- including the database file-->
<?php
include_once "conn.php";
?>
<!-- including the header file-->
<?php
include "header.php";
?>

<!DOCTYPE html>
<html lang="en" ng-app>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style media="screen"></style>
    <link rel="stylesheet" href="alot.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
</head>


<!-- THE HOME PAGE MAIN -->

<body>

        <!--The image slider -->
            <div class="slider">
            <!-- slide next buttons -->

            <ul class="swipes">
                <li class="swipe" id="sw1">
                    <h5>Fair deal to suit your pocket</h5>
                    <h6>More on brands</h6>
                    <h4 id="sota">MAN-U KITS FAIR PRICE</h4>
                </li>
                <li class="swipe" id="sw2">
                    <h5>Buy two get one free</h5>
                    <h6>More on brands</h6>
                    <h4 id="sota2">AWAY KITS 25% OFF</h4>
                </li>
                <li class="swipe" id="sw3">
                    <h5 style="color:black" >Saves</h5>
                    <h6>More on brands</h6>
                    <h4 id="sota3">MIGHTY GLOVES GOAL-KEEP</h4>
                </li>
                <li class="swipe" id="sw4">
                    <h5 style="color:red">Nation Kits</h5>
                    <h6>More on brands</h6>
                    <button class="dbl" ><i class="fas fa-chevron-right"></i></i></button>
                    <h4 id="sota4">BE FIRST TO SHOP ALOT</h4>
                </li>
                <!-- the play button -->
                <button class="play" ><i class="fas fa-play"></i></button>
               
                <p>
                    <h6>Talk of phantom talk of durability</h6>
                </p>
                <p>
                    <h4>ADIDAS NEW IN'S</h4>
                </p>
              
            </ul>
        </div>

           <!--The trending Products-->
           
               <div class="trending-title">
                     <p>Trending Products</p>
                </div>

            <div class="trending">
                <a href="product-page.php?pid=MUN-1000">
                <div class="trend-card">
                 <p class="image"><img src="kits/MUN-1000.jpg" alt=""></p>
                 <p class="name"> Manchester United FC 19/20 Home Shirt </p>
                 <p class="price">£65 </p>
                </div>
                 </a>
                <a href="product-page.php?pid=ARS-1000">
                <div class="trend-card">
                 <p class="image"><img src="kits/ARS-1000.jpg" alt=""></p>
                 <p class="name"> Arsenal FC 19/20 Away Shirt </p>
                 <p class="price">£65 </p>
                </div>
                 </a>
                <a href="product-page.php?pid=BAR-1000">
                <div class="trend-card">
                 <p class="image"><img src="kits/BAR-1000.jpg" alt=""></p>
                 <p class="name"> FC Barcelona 19/20 Home Shirt </p>
                 <p class="price">£65 </p>
                </div>
                 </a>
                <a href="product-page.php?pid=MAN-2000">
                <div class="trend-card">
                 <p class="image"><img src="kits/MAN-2000.jpg" alt=""></p>
                 <p class="name"> Manchester United Ball </p>
                 <p class="price">£30 </p>
                </div>
                 </a>
            </div>
          
          
            <!-- recommended men and women -->
             <div class="recomm-title"><p>Recommended For You</p></div>
            <div class="recommended">
                <div class="recomm-card">
                            <p><h5>MEN</h5></p>
                            <p><img src="kits/RM-1002.jpg" alt=""></p>
                            <p><h4>TRACK CLASSICS:DATED TO LAST FOR YOU</h4></p>
                            <p><button class="shop"><h6>SHOP FOR HIM</h6></button></p>
                </div>
                <div class="recomm-card">
                            <p><h5>WOMEN</h5></p>
                            <p><img src="kits/RM-1000.jpg" alt=""></p>
                            <p><h4>TRACK CLASSICS:DATED TO LAST FOR YOU</h4></p>
                            <p><button class="shop"><h6>SHOP FOR HER</h6></button></p>
                </div>
            </div>


            <!-- items on offer -->
            <div class="offers-title">
                <p>Shop Items On Offer</p>
            </div>
            <div class="offers">
                <a href="product-page.php?pid=MUN-1000">
                    <div class="offers-card">
                 <p class="image"><img src="kits/MUN-1000.jpg" alt=""></p>
                </div>
                 </a>
                <a href="product-page.php?pid=BAY-1001">
                    <div class="offers-card">
                 <p class="image"><img src="kits/BAY-1001.jpg" alt=""></p>
                </div>
                 </a>
                <a href="product-page.php?pid=BAR-1000">
                    <div class="offers-card">
                 <p class="image"><img src="kits/BAR-1000.jpg" alt=""></p>
                </div>
                 </a>
                <a href="product-page.php?pid=PUM-B000">
                    <div class="offers-card">
                 <p class="image"><img src="kits/PUM-B000.jpg" alt=""></p>
                </div>
                 </a>
                <a href="product-page.php?pid=RM-1000">
                    <div class="offers-card">
                 <p class="image"><img src="kits/RM-1000.jpg" alt=""></p>
                </div>
                 </a>
                <a href="product-page.php?pid=NIK-B000">
                    <div class="offers-card">
                 <p class="image"><img src="kits/NIK-B000.jpg" alt=""></p>
                </div>
                 </a>
            </div>
        
    <script src="alot.js"></script>
   
</body>
</html>

<?php
require "footer.php";
?>