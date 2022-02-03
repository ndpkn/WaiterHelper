<?php

    $mysqli = new mysqli('localhost', 'u1135833_fdb13df', 'Maniaz08', 'u1135833_off');

    if (isset($_COOKIE['adgjl13579'])){
        $hash = $_COOKIE['adgjl13579'];
        $query = $mysqli->query("SELECT `users_id` FROM `users` WHERE `users_hash` = '$hash'");

        $array = mysqli_fetch_row($query);
        $user_id = $array[0];
    }
    else{
        header('location: /');
        exit;
    }
    
    if(isset($_GET['act']) && $_GET['act'] == 'line'){
        $result = $mysqli->query("SELECT `information_percent` AS `Percent`, `information_tips` AS `Tips`, ROUND(`information_percent`*100/5, 0) AS `Kassa`, `information_date` AS `date` FROM `information` WHERE `users_id` = '$user_id' ORDER BY `information_date` DESC LIMIT 15");
    
        $array = array();

        $rows = mysqli_num_rows($result);
        
        for($i = 0; $i < $rows; $i++){
            $row = mysqli_fetch_row($result);
                $array[$i]['date'] = $row[3];
                $array[$i]['percent'] = $row[0];
                $array[$i]['tips'] = $row[1];
                $array[$i]['kassa'] = $row[2];
        }
    }
    
    echo json_encode($array);
?>