<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <link href="css/style.css" rel= "stylesheet" type="text/css"/>
        <link href="css/m_style.css" rel= "stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>
    <body>
        <hr class="top_background">
        <div class="ajax"></div>
        <?php
        // Creating the array of products. As identifier is used "imgSrc" key  
        $products = array();
        $products[0]['imgSrc'] = 'img/products/belt.jpg';
        $products[0]['name'] = 'Belt';
        $products[0]['price'] = 79;
        $products[0]['discount_price'] = 0;
        $products[1]['imgSrc'] = 'img/products/hat.jpg';
        $products[1]['name'] = 'Hat';
        $products[1]['price'] = 79;
        $products[1]['discount_price'] = 59;
        $products[2]['imgSrc'] = 'img/products/scarf.jpg';
        $products[2]['name'] = 'Scarf';
        $products[2]['price'] = 79;
        $products[2]['discount_price'] = 0;
        $products[3]['imgSrc'] = 'img/products/bag.jpg';
        $products[3]['name'] = 'Bag';
        $products[3]['price'] = 79;
        $products[3]['discount_price'] = 0;

// Sorting the products alphabetically from A-Z by first key "name"
        array_multisort($products);
        ?>
        <header class="header">

            <?php
            require_once 'blocks/header.php';
            ?>
        </header>
        <main class="content">
            <?php
            require_once 'blocks/content.php';
            ?>
        </main>
        <footer class="footer">
            <?php
            require_once 'blocks/footer.php';
            ?>
        </footer>

    </body>
    <script src="js/index.js"></script>

</html>