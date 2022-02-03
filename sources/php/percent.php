<?php

    $mysqli = new mysqli('localhost', 'u1135833_fdb13df', 'Maniaz08', 'u1135833_off');
    
    $hash = $_COOKIE['adgjl13579'];

    $result = $mysqli->query("SELECT `settings_percent` FROM `settings` WHERE `users_id` = (SELECT `users_id` FROM `users` WHERE `users_hash` = '$hash')");

    $array = mysqli_fetch_row($result);

    echo json_encode($array);

    mysqli_close($mysqli);
?>