<?php 

    if(isset($_POST['subject']) && isset($_POST['message'])){
        $mysqli = new mysqli('localhost', 'u1135833_fdb13df', 'Maniaz08', 'u1135833_off');
        $mysqli->set_charset("utf8");

        $hash = $_COOKIE['adgjl13579'];

        $result = $mysqli->query("SELECT `users_name`, `users_last_name` FROM `users` WHERE `users_hash` = '{$hash}'");

        $array = mysqli_fetch_row($result);

        $subject = $_POST['subject'];

        $message = $_POST['message']."\r\n Отправитель - ".$array[0]." ".$array[1];
        
        $mail[0] = mail('kor.dima97@mail.ru', $subject, $message);
        $mail[1] = mail('denis.nedopokin@gmail.com', $subject, $message);
        
        if($mail[0] == 1 && $mail[1] == 1){
            echo json_encode('Сообщение отправлено');
        }
        else{
            echo json_encode('Ошибка отправки сообщения');
        }
    }

?>