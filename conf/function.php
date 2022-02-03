<?php

    function user_type(){
        if(isset($_COOKIE['adgjl13579'])){
            $mysqli = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db_name']);
            $mysqli->set_charset('utf8');

            $hash = $_COOKIE['adgjl13579'];

            $query = $mysqli->query("SELECT `users_type` FROM `users` WHERE `users_hash` = '{$hash}'");
            
            $rows = mysqli_num_rows($query);
   
            if($rows){
                $val = mysqli_fetch_row($query);
                $type = $val[0];
            }
            else{
                $type = 'not_type';
            }
            
            mysqli_close($mysqli);
        }
        else{
            $type = 'not_type';
        }
        
        return $type;
    }

    function __autoload($className){
		$className = str_replace( "..", "", $className );
  		require_once "classes/$className.php";
	}