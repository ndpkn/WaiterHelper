<?php

	require_once "conf/config.php";
	require_once "conf/function.php";
	require_once "conf/routes.php";


	//Получение get параметра, если он существует, если его нет, прогрузится страница по умолчанию
	if(isset($_GET['path'])){
		$key_path = $_GET['path'];
		
		//Проверка на существование такого маршрута в роутах
		if(isset($path[$key_path])){
			$path_array = explode('/', $path[$key_path]);
			$dir_path = 'controller/';

			//если он существует, то перебираются ячейки адресной строки, пока не будет найден конец директории, 
			//соответвенно будет найдено название файла и его класса
			for($i = 0; $i < count($path_array); $i++){
				$dir_path = $dir_path.$path_array[$i].'/';

				//Нахождение конца директории
				if(!is_dir($dir_path)){
					//Удаление последнего слеша
					$dir_path = mb_substr($dir_path, 0, -1); //Удаление последнего слеша
					
					//Подключение контроллера
					require_once "$dir_path.php"; //

					//Создание объекта класса
					$class = new $path_array[$i]; 

					//Поиск названия вызываемого метода
					if(isset($path_array[++$i])){
						//Если существует продолжение маршрута в роутах, значит будет вызван не индексный метод
						$function_name = $path_array[$i];
						$class->$function_name();
					}
					else {
						//иначе происходит вызов индексного метода
						$class->index();
					}

				}
			}
		}
		else{
			//Подключение страницы по умолчанию
			require_once "controller/".$path['default'].".php";

			//Получение имени класса
			$array = explode('/', $path['default']);
			$number = count($array)-1;
			$class = $array[$number];

			//создание объекта класса и вызова индексного метода
			$class = new $class();
			$class->index();
		}
	} 
	else {
		//Подключение страницы по умолчанию
		require_once "controller/".$path['default'].".php";

		//Получение имени класса
		$array = explode('/', $path['default']);
		$number = count($array)-1;
		$class = $array[$number];

		//создание объекта класса и вызова индексного метода
		$class = new $class();
		$class->index();
	}

?>
