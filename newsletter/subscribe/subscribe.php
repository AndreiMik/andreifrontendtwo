<?php session_start(); ?>
<?php
$email = htmlspecialchars($_POST['subscribe_text']);
$error = array();

if ($email == "") {
    $error[] = 'Enter email';
} else
if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/", trim($email)) || (strlen($email) < 3 or strlen($email) > 255)) {
    $error[] = 'Check correctness of entered email';
}

$response_array = array();

if (!count($error)) {
    $response_array['response'] = 1;
    $response_array['text'] = 'Subscription succesful.';
    $response_json = json_encode($response_array);
    ?>
    <script>
        var response_json = '<?php echo $response_json; ?>';
        sessionStorage.setItem("subscribe_json_response", response_json);
    </script>   
    <?php
} else {
    $response_array['response'] = 0;
    $response_array['text'] = 'Email varification failed...';
    $response_json = json_encode($response_array);
    ?>
    <script>
        var response_json = '<?php echo $response_json; ?>';
        sessionStorage.setItem("subscribe_json_response", response_json);
    </script>  
    <?php
} 