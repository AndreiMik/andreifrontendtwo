function getDataFromSessionlStorage() {

    var time_data = sessionStorage.getItem("time_data");
    if (time_data != 1) {
        sessionStorage.clear();
    }

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

    $.ajax({type: 'POST', url: 'ajax/cart_hover_ajax.php', data: {'array_data': array_data}, dataType: 'html', success: function (data) {
            $(".cart_part").html(data);
        }});
    setTimeout(function () {
        sessionStorage.setItem("time_data", null);
    }, 60000);
}
getDataFromSessionlStorage();