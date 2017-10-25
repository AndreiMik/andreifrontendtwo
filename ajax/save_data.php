<?php session_start(); ?>

<?php
$array_data = array();
if ($_POST['array_data']) {
    $array_data = $_POST['array_data'];
} else {
    $array_data = null;
}

if ($array_data) {

    $items_count = count($array_data['items']);

    $pos = 0;
    for ($i = 0; $i < $items_count; $i++) {
        $array_data['total_price'] = number_format($array_data['total_price'], 2);
        unset($array_data['items'][$i]['price_per_unit']);
        $array_data['items'][$i]['price'] = number_format($array_data['items'][$i]['price'], 2);
    }

    $array_data = json_encode($array_data);
    $filename = '../cart/get/get.json';

    if (file_put_contents($filename, $array_data)) {
        unset($_SESSION['sessionStorage']);
        unset($array_data);
        ?>
        <script>
            var array_data = '<?php echo $array_data; ?>';
            $.ajax({type: 'POST', url: 'ajax/cart_hover_ajax.php', data: {'array_data': array_data}, dataType: 'html', success: function (data) {
                    $(".cart_part").html(data);
                }});
            sessionStorage.clear();
        </script>
        <?php
    }
}      