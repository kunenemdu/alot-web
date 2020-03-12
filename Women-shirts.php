<?php require('header.php') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALOTSports | Women's Shirts</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="/script & sheets/nike-brand.css">
    <script src="/script & sheets/script.js"></script>
    <script src="https://use.fontawesome.com/cfbb02897a.js"></script>
</head>
<body>
<div class="breadcrumb">
                <li><a href="index.php">HOME</a></li>
                <li><a href="womens.php">WOMEN</a></li>
                <li>ADIDAS</li>
        </div>
    <div class="grid-container">
    <div class="logo-left"></div>
    <div class="item">
        <h2>Women's Football Shirts</h2>
        <p>Lads, Get behind your team with official football shirts from ALOTSports <br> from the
            most iconic names in world club football as well as shirts from international teams. <br> Look the part
            whether you’re on the pitch, in the stand or in <br> the comfort of your armchair.
            <br>
            Browse the full range of shirts at ALOTSports today.</p>
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
        <div class="colour">
            <h5>Colour</h5>
            <button class="filter-button" data-filter="Red" style="background-color: rgb(226, 66, 66)"></button>
            <button class="filter-button" data-filter="Blue" style="background-color: rgb(89, 89, 240)"></button>
            <button class="filter-button" data-filter="White" style="background-color: white"></button>
            <button class="filter-button" data-filter="Yellow" style="background-color: yellow"></button>
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
            $sql = "SELECT * FROM products 
                WHERE gender='Women'";

            $allproducts = mysqli_query($conn, $sql);
            while ($product = mysqli_fetch_assoc($allproducts)) { ?>
                <a href="product-page.php?pid=<?php print $product['id']?>">
                    <div class="product-card filter <?php print $product['colour'] ?> <?php print $product['gender'] ?> <?php print $product['category'] ?>">
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
</body>