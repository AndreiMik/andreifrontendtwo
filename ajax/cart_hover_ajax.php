<?php
$array_data = array();
if ($_POST['array_data']) {
    $array_data = $_POST['array_data'];
} else {
    $array_data = null;
}
$total_items = $array_data['total_items'];
$total_price = $array_data['total_price'];

$data = array();
$data = $array_data['items'];
?>
<li>
    <input type="text" class="cart"  value="<?php if ($total_items) {
    echo $total_items;
} else {
    echo '0';
} if ($total_items == 1) {
    echo ' item in your cart';
} else {
    echo' items in your cart';
}; ?>" >
    <input type="text" class="cart_price"  value="&#8364; <?php if ($total_price) {
    echo number_format($total_price, 2);
} else {
    echo '0.00';
} ?>" >
</li>
<ul class="cart_sub_part" id="cart_sub_part"> 
    <li class="cart_drop_down" id="cart_drop_down" <?php if (!$data) {
                echo " style='visibility: hidden'";
            } ?>>
        <table class="cart_drop_down_items">

<?php if ($data){  foreach ($data as $item): ?> 
                <tr>
                    <td class="cart_drop_down_item_img" ><img src=" <?php echo $item['imgSrc'] ?> "</td>
                    <td class="cart_drop_down_item_data"><p class="item_name"><?php echo strtoupper($item['name']); ?></p><p><?php echo $item['qty'] ?> x &#8364;<?php echo ' '; echo number_format($item['price_per_unit'], 2); ?></p></td>
                    <td class="cart_drop_down_delete_item"><span class="cart_drop_down_delete_item_button" item_src="<?php echo $item['imgSrc']; ?>"><img src="css/images/delete.png"></span></td>
                </tr>
<?php endforeach; } ?> 

        </table>
        <div style=""><span class="go_to_checkout_button">GO TO CHECKOUT</span></div>              
    </li>
</ul>
<script type="text/javascript">
    $(".cart_drop_down_delete_item_button").click(function () {
        var parent = $(this).parent();
        var delete_item_src = parent.find('.cart_drop_down_delete_item_button').attr('item_src');
        var array_data = getDataFromStorage();
        $.ajax({
            type: 'POST',
            url: 'ajax/delete_item_ajax.php',
            data: {'delete_item_src': delete_item_src, 'array_data': array_data},
            dataType: 'html',
            success: function (data) {
                $(".ajax").html(data);//alert(delete_item_src)
            }
        });
    });

    $(".go_to_checkout_button").click(function () {
        var array_data = getDataFromStorage();
        $.ajax({
            type: 'POST',
            url: 'ajax/save_data.php',
            data: {'array_data': array_data},
            dataType: 'html',
            success: function (data) {
                $(".ajax").html(data);
            }
        });
    });
    function getDataFromStorage() {
        var json_data = sessionStorage.getItem("json_data");
        if (json_data) {
            if (JSON.parse(json_data)) {
                var array_data = JSON.parse(json_data);
            } else {
                sessionStorage.clear();
                var array_data = null;
            }
        } else {
            var array_data = null;
        }
        return array_data;
    }
</script>  