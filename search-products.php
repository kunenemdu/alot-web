<?php require('header.php') ?>
<? //first establish connection to database and SELECT * from PRODUCTS (into maybe an array????)
// to show all the products that exist we can use WHILE LOOP
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALOTSports | Search</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="/script & sheets/script.js"></script>
    <link rel="stylesheet" href="/script & sheets/nike-brand.css">
</head>
<body>
<div class="breadcrumb">
                <li><a href="index.php">HOME</a></li>
                <li>SEARCH</li>
        </div>
    <div class="grid-container">
        <div class="logo-left"></div>
        <div class="item">
            <h2>Explore Our Products</h2>
            <p>Find the product you are looking for through our huge <br> catalogue of premium quality products.</p>
        </div>
        <div class="item1">
            <nav class="product-filter">
                <div class="sort">
                    <div class="collection-sort">
                        <label>Sort by</label>
                        <select>
                            <option value="/">Popularity</option>
                            <option value="abc">Name: Ascending</option>
                            <option value="cba">Name: Descending</option>
                            <option value="l2h">Price: Ascending</option>
                            <option value="h2l">Price: Descending</option>
                            <option value="/">Date: Newest</option>
                        </select>
                    </div>
                </div>
            </nav>
        </div>
        <div class="item2">
            <div class="brands">
                <h5>Find Your Team</h5>
                <input type="text" placeholder="Team..." id="myInput" onkeyup="filterFunction()">
            </div>
            <div class="brand">
                <h5>Brand</h5>
                <button class="filter-button" data-filter="Nike">Nike</button>
                <button class="filter-button" data-filter="adidas">adidas</button>
                <button class="filter-button" data-filter="PUMA">PUMA</button>
            </div>
            <div class="gender">
                <h5>Gender</h5>
                <button class="filter-button" data-filter="Men">Men</button>
                <button class="filter-button" data-filter="Women">Women</button>
                <button class="filter-button" data-filter="Unisex">Unisex</button>
            </div>
            <div class="type">
                <h5>Type</h5>
                <button class="filter-button" data-filter="Gear">Gear</button>
                <button class="filter-button" data-filter="Equipment">Equipment</button>
                <button class="filter-button" data-filter="Boots">Boots</button>
                <button class="filter-button" data-filter="Shirts">Shirts</button>
            </div>
            <div class="colour">
                <h5>Colour</h5>
                <button class="filter-button" data-filter="Red" style="background-color: red"></button>
                <button class="filter-button" data-filter="Blue" style="background-color: rgb(89, 89, 240)"></button>
                <button class="filter-button" data-filter="Black" style="background-color: black"></button>
                <button class="filter-button" data-filter="Brown" style="background-color: brown"></button>
                <button class="filter-button" data-filter="White" style="background-color: white"></button>
                <button class="filter-button" data-filter="Yellow" style="background-color: yellow"></button>
                <button class="filter-button" data-filter="Pink" style="background-color: rgb(253, 173, 186)"></button>
                <button class="filter-button" data-filter="Green" style="background-color: green"></button>
                <button class="filter-button" data-filter="Grey" style="background-color: grey"></button>
            </div>
            <div class="reset">
                <button class="filter-button" data-filter="all"><i class="fa fa-refresh"></i></button>
            </div>
        </div>
        <div class="item3 dropdown">
            <div id="myDropdown" class="products dropdown-content">
                <?php
                // Create connection
                require_once('conn.php');
                $search = $_POST["search"];
                $sql = "SELECT * FROM products 
                WHERE colour='$search' 
                OR name LIKE '%$search%'
                OR category LIKE '%$search%'
                OR brand='$search'
                OR gender LIKE '%$search'";

                $allproducts = mysqli_query($conn, $sql);
                while ($product = mysqli_fetch_assoc($allproducts)) { ?>
                    <a href="product-page.php?pid=<?php print $product['id'] ?>">
                        <div class="product-card filter <?php print $product['colour'] ?> <?php print $product['gender'] ?> <?php print $product['category'] ?> <?php print $product['brand'] ?>">
                            <div class="product-image">
                                <img src="/kits/<?php echo $product['id'] ?>.jpg">
                            </div>
                            <div class="product-info">
                                <h5><?php echo $product['brand'] . " " . $product['name'] ?></h5>
                                <p class="colour"><?php print $product['colour'] ?></p>
                                <p class="category"><?php print $product['gender'] ?> <?php print $product['category'] ?></p>
                                <p class="price">£<?php print $product['price'] ?></p>
                            </div>
                        </div>
                    </a><?php } // close while loop 
                        ?>
            </div>
        </div>
        <div class="item5">
            <button>SHOW MORE</button>
        </div>

    </div>
    <script src="alot.js"></script>
</body>

</html>
<?php require("footer.php");