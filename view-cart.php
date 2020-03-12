<?php require("header.php");?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALOTSports | View Cart</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="/script & sheets/cart.css">
    <script src="/script & sheets/script.js"></script>
    <script src="https://use.fontawesome.com/cfbb02897a.js"></script>
</head>

<?php
require('conn.php');
$sql = "SELECT * 
FROM products p
INNER JOIN cart_items c 
ON p.id=c.id";
$products = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($products);

?>
<body>
<div class="breadcrumb">
                <li><a href="index.php">HOME</a></li>
                <li>VIEW CART</li>
        </div>
<div class="grid-containerx1">
    <?php //ELSE DISPLAY CART IF LOGGED IN OR NOT
    if ($rows > 0) : ?>
        <?php
        //if not logged in display discount offer to login
        if (!isset($_SESSION['username'])) : ?>
            <div class="promo-text1">
                <p class="p.text"> <a href="login.php">Login/Register</a> for 10% off your purchase</p>
            </div>
        <?php endif ?>
        <ul class="itemx1">
            <form action="/process/process-remove_from_cart.php" method="post">
            
                <table style="width:100%" id="products">
                <h1>Cart</h1>
                    <tr>
                        <th style="width: 3px"></th>
                        <th colspan="2">Product</th>
                        <th class="sizeth">Size</th>
                        <th>Quantity</th>
                        <th>Price (£)</th>
                    </tr>

                    <?php
                    while ($product = mysqli_fetch_assoc($products)) {
                        $name = $product['name'];
                        $id = $product['id'];
                        $colour = $product['colour'];
                        $category = $product['category'];
                        $gender = $product['gender'];
                        $brand = $product['brand'];
                        $price = $product['finalprice'];
                        $size = $product['size'];
                        $quantity = $product['quantity'];
                    ?>
                        <tr class="product" id="product">
                            <input type="hidden" name="rid" value="<?php print $id ?>">
                            <input type="hidden" name="rsize" value="<?php print $size ?>">
                            <?php
                            //if not logged in checkbox calls function with no discount
                            if (!isset($_SESSION['username'])) : ?>
                                <td class="inputx1">
                                    <input type="checkbox" name="checkbox" id="checkbox" value="<?php print $price ?>" checked onclick="totalIt()">
                                </td>
                            <?php
                            //if logged in checkbox calls function with 10% discount
                            else : ?>
                                <td class="inputx1">
                                    <input type="checkbox" name="checkbox" id="checkbox" value="<?php print $price ?>" checked onclick="totalItDiscount()">
                                </td>
                            <?php endif ?>
                            <td class="imagexx1">
                                <div class="imagex1">
                                    <button class="buttonx1" type="submit" name="remove-item"><i class="fa fa-times"></i></button>
                                    <input name="id_remove" type="hidden" value="">
                                    <img src="/kits/<?php print $id ?>.jpg" alt="">
                                </div>
                            </td>
                            <td class="detailsxx1">
                                <p class="namex1">
                                    <?php print $name ?>
                                </p>
                                <p class="brandx1">
                                    Brand: <?php print $brand ?>
                                </p>
                                <p class="colourx1">
                                    Colour: <?php print $colour ?>
                                </p>
                                <p class="categoryx1">
                                    Category: <?php print $category ?>
                                </p>
                                <p class="genderx1">
                                    Gender: <?php print $gender ?>
                                </p>
                            </td>
                            <td class="sizexx1">
                                <p class="sizex1">
                                    <?php print $size ?>
                                </p>
                            </td>
                            <td class="quantityxx1">
                                <p class="quantityx1">
                                    <?php print $quantity ?>
                                </p>
                            </td>
                            <td class="pricexx1">
                                <p class="pricex1">
                                    <?php print $price ?>
                                </p>
                            </td>
                        </tr>
                    <?php
                        // $totalpriceall += $price;
                    } ?>
                </table>
            </form>
            <script>
                //NOT LOGGED IN TOTAL PRICE
                function totalIt() {
                    var input = document.getElementsByName("checkbox");
                    var total = 0;
                    for (var i = 0; i < input.length; i++) {
                        if (input[i].checked) {
                            total += parseFloat(input[i].value);
                        }
                    }
                    document.getElementById("total").value = "£" + total.toFixed(2);
                };
                //LOGGED IN TOTAL PRICE
                function totalItDiscount() {
                    var input = document.getElementsByName("checkbox");
                    var total = 0;
                    for (var i = 0; i < input.length; i++) {
                        if (input[i].checked) {
                            var discount = parseFloat(input[i].value) * 0.1; // discount amount
                            total += parseFloat(input[i].value) - discount;
                        }
                    }
                    document.getElementById("total").value = "£" + total.toFixed(2);
                };
                //TOGGLE PRICE ON CHECKED OR NOT
                $(document).ready(function() {
                    var input = document.getElementsByName("checkbox");
                    var total = 0;
                    for (var i = 0; i < input.length; i++) {
                        if ($('#checkbox').is(':checked')) {
                            total += parseInt(input[i].value);
                        }
                        document.getElementById("total").value = "£" + total.toFixed(2);
                    }
                });
            </script>
        </ul>


        <?php if ($rows > 0) : ?>

        <?php endif ?>

    <?php else : ?>
        <h1>CART IS EMPTY</h1>
        <?php endif ?>

        <?php if ($rows > 0) : ?>
            <div class="managex1">
                <div class="total-menux1">
                    <div class="finalprice">
                        <button onclick="totalItDiscount()">TOTAL</button><input type="text" id="total" value="0" readonly="readonly" />
                    </div>
                </div>
                <a href="/process/process-add_to_cart.php?removeall=emptycart">Click here to empty the cart</a>
            </div>
        <?php else : ?>
            <script>
                alert("CART IS EMPTY");
            </script>
        <?php endif ?>
</div>
<script src="alot.js"></script>
</body>

<?php include("footer.php");?>