<?php session_start(); ?>

<?php
$new_item = array();
$new_item['name'] = $_POST['name'];
$new_item['price'] = $_POST['price'];
$new_item['qty'] = 1;
$new_item['imgSrc'] = $_POST['imgSrc'];
$new_item['discount_price'] = $_POST['discount_price'];
$array_data = array();

if ($_POST['array_data']) {
    $array_data = $_POST['array_data'];
} else {
    $array_data = null;
}

if ($array_data) {
    $array_data['total_items'] = 0;
    $array_data['total_price'] = 0;
    $items_count = count($array_data['items']);
    $check = 1;
    $pos = 0;
    for ($i = 0; $i < $items_count; $i++) {
        if ($array_data['items'][$i]['imgSrc'] == $new_item['imgSrc']) {
            $array_data['items'][$i]['qty'] ++;

            if ($new_item['discount_price']) {
                $array_data['items'][$i]['price'] = $array_data['items'][$i]['price'] + $new_item['discount_price'];
            } else {
                $array_data['items'][$i]['price'] = $array_data['items'][$i]['price'] + $new_item['price'];
            }
            $check++;
        }
        $array_data['total_price'] = $array_data['total_price'] + $array_data['items'][$i]['price'];
        $pos++;
    }
    if ($check == 1) {
        $array_data['items'][$pos] = $new_item;
        if ($new_item['discount_price']) {
            $array_data['items'][$pos]['price'] = $new_item['discount_price'];
            $array_data['items'][$pos]['price_per_unit'] = $new_item['discount_price'];
        } else {
            $array_data['items'][$pos]['price_per_unit'] = $new_item['price'];
        }
        $array_data['total_price'] = $array_data['total_price'] + $array_data['items'][$pos][price];
        unset($array_data['items'][$pos]['discount_price']);
    }
    $array_data['total_items'] = count($array_data['items']);
    $array_data = json_encode($array_data);
    $_SESSION['sessionStorage'] = $array_data;
} else {
    $array_data['total_items'] = 1;
    $array_data['total_price'] = 0;

    $array_data['items'][0] = $new_item;

    if ($new_item['discount_price']) {
        $array_data['items'][0]['price'] = $new_item['discount_price'];
        $array_data['items'][0]['price_per_unit'] = $new_item['discount_price'];
    } else {
        $array_data['items'][0]['price_per_unit'] = $new_item['price'];
    }
    unset($array_data['items'][0]['discount_price']);
    $array_data['total_price'] = $array_data['items'][0][price];
    $array_data = json_encode($array_data);
}
?>
<script type="text/javascript">
    function setJsonDataToLocalStorage() {
        var array_data = '<?php echo $array_data; ?>';

        sessionStorage.setItem("json_data", array_data);
        sessionStorage.setItem("time_data", 1);
        setTimeout(function () {
            sessionStorage.setItem("time_data", null);
        }, 60000);
    }
    setJsonDataToLocalStorage();
    /*******************************************************************************************************************************/
    function getDataFromSessionlStorage() {
        var json_data = sessionStorage.getItem("json_data");

        if (json_data) {
            var array_data = JSON.parse(json_data);
        } else {
            var array_data = null;
        }
        $.ajax({type: 'POST', url: 'ajax/cart_hover_ajax.php', data: {'array_data': array_data}, dataType: 'html', success: function (data) {
                $(".cart_part").html(data);
            }});
    }
    getDataFromSessionlStorage();

</script>