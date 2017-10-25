<div class="footer_block">
    <div id="footer_col_1">
        <p id="footer_row_top">TOP CATEGORIES</p>
        <P id="footer_text">WOMEN<br>
            MEN<br>
            JUNIOR<br>
            ACCESSORIES</p>
    </div>
    <div id="footer_col_2">
        <p id="footer_row_top">CUSTOMER SERVICE</p>
        <p id="footer_text">RETURNS<br>
            SHIPPING<br>
            ABOUT US<br>
            CONTACT US</p>
    </div>
    <div id="footer_col_3" class="footer_col_3">
        <p id="footer_row_top" style="letter-spacing: 0.02vw">NEWSLETTER SUBSCRIBE</p>           
        <input id="subscribe_input_text" class="subscribe_input_text" value="" type="text" placeholder="Enter your email address"><button id="subscribe_button" class="subscribe_button">SUBSCRIBE</button>
        <div class="load_div">  <p id="subscribing_message"><img id="loader_gif" src="css/images/loader.gif">Subscribing to newsletter...</p></div>
        <div class="fail_div"> <p id="failed_message"><img id="exclamation_icon" src="css/images/exclamation_icon.png"> Email varification failed...</p></div>
        <div class="ok_div"><p id="success_message"><img id="ok_icon" src="css/images/ok_icon.png">Subscription successful.</p></div>
    </div>
</div>
<script type="text/javascript">
    $("#subscribing_message").hide();
    $("#loader_gif").hide();
    $("#failed_message").hide();
    $("#success_message").hide();
    var button_subscribe = document.getElementById("subscribe_button");
    $(".subscribe_button").click(function () {
        button_subscribe.disabled = true;
        setTimeout(function () { button_subscribe.disabled = false;}, 10000);
        
        //      document.getElementById("subscribe_input_text").value = "";
        $("#subscribing_message").hide();
        $("#loader_gif").hide();
        $("#failed_message").hide();
        $("#success_message").hide();

        setTimeout(function () {
            $("#subscribing_message").fadeIn(100, function () {
                document.getElementById("subscribe_input_text").value = "";
            });
        }, 200);
        setTimeout(function () {
            $("#loader_gif").fadeIn(100);
        }, 200);
        setTimeout(function () {
            $("#subscribing_message").fadeOut(1000);
        }, 2000);
        setTimeout(function () {
            $("#loader_gif").fadeOut(1000,
                    function () {
                        var json_data = sessionStorage.getItem("subscribe_json_response");
                        //          alert(json_data);
                        var array_data = JSON.parse(json_data);
                        //      alert(array_data.response);

                        if (array_data.response === 1) {
                            setTimeout(function () {
                                $("#success_message").fadeIn(200);
                            }, 1500);
                            setTimeout(function () {
                                $("#success_message").fadeOut(500);
                            }, 10000);
                        } else {
                            setTimeout(function () {
                                $("#failed_message").fadeIn(200);
                            }, 1500);
                            setTimeout(function () {
                                $("#failed_message").fadeOut(500);
                            }, 10000);
                        }
                    });
        }, 2000);
    });
</script>