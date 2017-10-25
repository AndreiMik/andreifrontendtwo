<?php session_start(); ?>

<?php
$delete_item = $_POST['delete_item_src'];
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
        if ($array_data['items'][$i]['imgSrc'] == $delete_item) {
            $array_data['total_price'] = $array_data['total_price'] - $array_data['items'][$i]['price'];
            unset($array_data['items'][$i]);
        }
        $pos++;
    }
    $array_data['total_items'] = count($array_data['items']);
    $array_data = json_encode($array_data);
    $_SESSION['sessionStorage'] = $array_data;
}

$_SESSION['sessionStorage'] = $array_data;
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