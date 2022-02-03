<?php 

    //require_once "/conf/config.php";

    $mysqli = new mysqli('localhost', 'u1135833_fdb13df', 'Maniaz08', 'u1135833_off');
    
    if(isset($_GET['date'])){
        $hash = $_COOKIE['adgjl13579'];
        $date = $_GET['date'];

        $query_user_id = $mysqli->query("SELECT `users_id` FROM `users` WHERE `users_hash` = '$hash'");
        $row = mysqli_fetch_row($query_user_id);
        $user_id = $row[0];

        $query = $mysqli->query("SELECT * FROM `information` WHERE `information_date` = '$date' AND `users_id` = '$user_id'");
        
        $rows = mysqli_num_rows($query);

        if($rows > 0){
            $array = mysqli_fetch_row($query);
            echo json_encode($array);
        }
        else {
            echo json_encode(false);
        }

    }

    mysqli_close($mysqli);
?>