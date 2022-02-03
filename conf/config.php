<?php

	//данные для подключение к СУБД MySQL
	$host = 'localhost';
	$user = 'u1135833_fdb13df';
	$password = 'Maniaz08';
	$db_name = 'u1135833_off';

	//Адрес сайта
	$home_adress = 'https://waiter-helper.ru/';

	//Вывод ошибок
	$err = false;

	if($err == true){
		ini_set('error_reporting', E_ALL);
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
	}
	
	//months
	$months = array(
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь'
    );

?>
