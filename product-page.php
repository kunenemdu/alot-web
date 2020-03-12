<?php
require("header.php");
error_reporting(E_ALL);
ini_set('display_errors', '1'); //display ALL ERRORS if any
?>
<?php
require_once('conn.php');
$id = $_GET['pid'];
$sql = "SELECT *
FROM products p
INNER JOIN product_page pp
ON p.id=pp.id
INNER JOIN sizes s
ON p.id='$id'
AND p.id=s.id
INNER JOIN description d
ON p.id=d.id"; //INCLUDE A SIZE FOR A FIELD TO DISPLAY ON PRODUCT PAGE

$products = mysqli_query($conn, $sql);
while ($product = mysqli_fetch_assoc($products)) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ALOTSports | <?php print $product['name'] ?> </title>
        <link rel="stylesheet" href="/script & sheets/product-page1.css">
        <script src="/script & sheets/script.js"></script>
        <script src="https://use.fontawesome.com/cfbb02897a.js"></script>
    </head>
        

    <body>
        <div class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="<?php print $product['gender'] ?>.html"><?php print $product['gender'] ?></a></li>
                <li><a href="<?php print $product['gender'] ?>-shirts.php"><?php print $product['category'] ?></a></li>
                <li><a href="<?php print $product['brand'] ?>.php"><?php print $product['brand'] ?></a></li>
                <li> <?php print $product['name'] ?> </li>
        </div>
        <div class="grid-container">
            <div class="images">
                <div class="image">
                    <img src="/kits/<?php print $product['id'] ?>.jpg" alt="" style="background-color: rgb(238, 237, 237)">
                </div>
                <div class="image">
                    <img src="<?php print $product['zoom1'] ?>" alt="" style="background-color: rgb(238, 237, 237)">
                </div>
                <div class="image">
                    <img src="<?php print $product['zoom2'] ?>" alt="" style="background-color: rgb(238, 237, 237)">
                </div>
                <div class="image">
                    <img src="<?php print $product['zoom3'] ?>" alt="" style="background-color: rgb(238, 237, 237)">
                </div>
            </div>
            <div class="details">
                <div class="item-info">
                    <p class="category"><?php print $product['gender'] ?> <?php print $product['category'] ?></p>
                    <h1 class="title"><?php print $product['brand'] ?> <?php print $product['name'] ?> </h1>
                    <p class="price">£<?php print $product['price'] ?></p>
                    <div class="choose">
                        <p>Choose Size</p>
                    </div>
                </div>
                <form action="process/process-add_to_cart.php" method="POST">
                    <ul class="sizes" id="sizes">
                        <li class="size">
                            <input type="radio" name="size" id="size1" value="<?php print $product['size1'] ?>">
                            <label for="size1"> <?php print $product['size1'] ?> </label>
                        </li>
                        <li class="size">
                            <input type="radio" name="size" id="size2" value="<?php print $product['size2'] ?>">
                            <label for="size2"><?php print $product['size2'] ?> </label>
                        </li>
                        <li class="size">
                            <input type="radio" name="size" id="size3" value="<?php print $product['size3'] ?>">
                            <label for="size3"><?php print $product['size3'] ?> </label>
                        </li>
                        <li class="size">
                            <input type="radio" name="size" id="size4" value="<?php print $product['size4'] ?>">
                            <label for="size4"><?php print $product['size4'] ?> </label>
                        </li>
                        <li class="size">
                            <input type="radio" name="size" id="size5" value="<?php print $product['size5'] ?>">
                            <label for="size5"><?php print $product['size5'] ?> </label>
                        </li>
                        <li class="size">
                            <input type="radio" name="size" id="size6" value="<?php print $product['size6'] ?>">
                            <label for="size6"><?php print $product['size6'] ?> </label>
                        </li>
                    </ul>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="10">
                    <input type="hidden" name="pid" id="pid" value="<?php print $product['id'] ?>">
                    <input type="hidden" name="price" id="price" value="<?php print$product['price'] ?>">
                    <div class="cartx1">
                        <ul>
                            <li>
                                <button class="add" type="submit">ADD TO CART</button>
                                <!-- <button class="wishlist"><i class="fa fa-heart"></i></button> -->
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
            <div class="description">
                <h5 style="font-weight: 450">Product Description</h5>
                <p>
                    <?php print $product['description1'] ?> <br>
                </p>
                <!-- printed from the database using INNER JOIN on 3 tables(sizes table, products table, descriptions table) -->
                <h5 style="font-weight: 450">Specifications</h5>
                    Colour: <?php print $product['colour'] ?> <br>
                    SKU Code: <?php print $product['id'] ?> <br>
                    <?php print $product['description2'] ?>
                    <p>
                        <?php print $product['description3'] ?>
                    </p>
            </div>
        </div>
        <script src="alot.js"></script>
<?php } ?>    
</body>
</html>
<?php include("footer.php");?>