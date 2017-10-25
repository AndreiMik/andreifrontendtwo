
<div class="products_block">
    <?php
    $i = 0; //position
    $number_of_lines_at_desctop = 1;
    for ($counter = 0; $counter < $number_of_lines_at_desctop; $counter++) {
        $part_1_1 = '<div class="part_1_of_product_item"> <div id="product_item_left"> <img src="';
        $part_1_img_1 = $products[$i]['imgSrc'];
        $part_1_2 = '"><br><p imgSrc="' . $products[$i]['imgSrc'] . '" class="product_name" name="' . $products[$i]['name'] . '">';
        $part_1_name_1 = strtoupper($products[$i]['name']);
        $part_1_3 = '</p><p price="' . $products[$i]['price'] . '" discount_price="' . $products[$i]['discount_price'] . '" class="product_price">';
        $part_1_strike_1 = '<strike>&#8364;';
        $part_1_price_1 = number_format($products[$i]['price'], 2);
        $part_1_4 = '</strike><span style="padding-left: 0.7vw;color: #f05050">&#8364;';
        $part_1_price_1_discount = number_format($products[$i]['discount_price'], 2);
        if ($part_1_price_1_discount == 0) {
            $part_1_price_1_discount = '';
            $part_1_strike_1 = '&#8364;';
            $part_1_4 = '';
        }
        $part_1_5 = '</p><span class="add_to_cart_button" id="add_to_cart_button">ADD TO CART</span><span class="add_to_cart_button" id="add_to_cart_button_m">ADD TO CART</span></div><div id="product_item_right"><img src="';
        $i++;
        $part_1_img_2 = $products[$i]['imgSrc'];
        $part_1_6 = '" ><br> <p imgSrc="' . $products[$i]['imgSrc'] . '" class="product_name" name="' . $products[$i]['name'] . '">';
        $part_1_name_2 = strtoupper($products[$i]['name']);
        $part_1_7 = '</p> <p price="' . $products[$i]['price'] . '" discount_price="' . $products[$i]['discount_price'] . '" class="product_price">';
        $part_1_strike_2 = '<strike>&#8364;';
        $part_1_price_2 = number_format($products[$i]['price'], 2);
        $part_1_8 = '</strike><span style="padding-left: 0.7vw;color: #f05050">&#8364;';
        $part_1_price_2_discount = number_format($products[$i]['discount_price'], 2);
        if ($part_1_price_2_discount == 0) {
            $part_1_price_2_discount = '';
            $part_1_strike_2 = '&#8364;';
            $part_1_8 = '';
        }
        $part_1_9 = '</span></p><span class="add_to_cart_button" id="add_to_cart_button">ADD TO CART</span><span class="add_to_cart_button" id="add_to_cart_button_m">ADD TO CART</span> </div> </div>';

        $part_1 = $part_1_1 . $part_1_img_1 . $part_1_2 . $part_1_name_1 . $part_1_3 . $part_1_strike_1 . $part_1_price_1 . $part_1_4 . $part_1_price_1_discount . $part_1_5 . $part_1_img_2 . $part_1_6 . $part_1_name_2 . $part_1_7 . $part_1_strike_2 . $part_1_price_2 . $part_1_8 . $part_1_price_2_discount . $part_1_9;

        $i++;
        $part_2_1 = '<div class="part_2_of_product_item"> <div id="product_item_left"> <img src="';
        $part_2_img_1 = $products[$i]['imgSrc'];
        $part_2_2 = '"><br><p imgSrc="' . $products[$i]['imgSrc'] . '" class="product_name" name="' . $products[$i]['name'] . '">';
        $part_2_name_1 = strtoupper($products[$i]['name']);
        $part_2_3 = '</p><p price="' . $products[$i]['price'] . '" discount_price="' . $products[$i]['discount_price'] . '" class="product_price">';
        $part_2_strike_1 = '<strike>&#8364;';
        $part_2_price_1 = number_format($products[$i]['price'], 2);
        $part_2_4 = '</strike><span style="padding-left: 0.7vw;color: #f05050">&#8364;';
        $part_2_price_1_discount = number_format($products[$i]['discount_price'], 2);
        if ($part_2_price_1_discount == 0) {
            $part_2_price_1_discount = '';
            $part_2_strike_1 = '&#8364;';
            $part_2_4 = '';
        }
        $part_2_5 = '</p><span class="add_to_cart_button" id="add_to_cart_button">ADD TO CART</span> <span class="add_to_cart_button" id="add_to_cart_button_m">MORE INFO</span></div><div id="product_item_right"><img src="';
        $i++;
        $part_2_img_2 = $products[$i]['imgSrc'];
        $part_2_6 = '" ><br> <p imgSrc="' . $products[$i]['imgSrc'] . '" class="product_name" name="' . $products[$i]['name'] . '">';
        $part_2_name_2 = strtoupper($products[$i]['name']);
        $part_2_7 = '</p> <p price="' . $products[$i]['price'] . '" discount_price="' . $products[$i]['discount_price'] . '" class="product_price">';
        $part_2_strike_2 = '<strike>&#8364;';
        $part_2_price_2 = number_format($products[$i]['price'], 2);
        $part_2_8 = '</strike><span style="padding-left: 0.7vw;color: #f05050">&#8364;';
        $part_2_price_2_discount = number_format($products[$i]['discount_price'], 2);
        if ($part_2_price_2_discount == 0) {
            $part_2_price_2_discount = '';
            $part_2_strike_2 = '&#8364;';
            $part_2_8 = '';
        }
        $part_2_9 = '</p><span class="add_to_cart_button" id="add_to_cart_button">ADD TO CART</span><span class="add_to_cart_button" id="add_to_cart_button_m">MORE INFO</span> </div> </div>';

        $part_2 = $part_2_1 . $part_2_img_1 . $part_2_2 . $part_2_name_1 . $part_2_3 . $part_2_strike_1 . $part_2_price_1 . $part_2_4 . $part_2_price_1_discount . $part_2_5 . $part_2_img_2 . $part_2_6 . $part_2_name_2 . $part_2_7 . $part_2_strike_2 . $part_2_price_2 . $part_2_8 . $part_2_price_2_discount . $part_2_9;

        $part = $part_1 . $part_2;

        echo $part;
    }
    ?>

</div>