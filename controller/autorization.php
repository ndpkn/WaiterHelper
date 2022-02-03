<?php

	class autorization extends CI_Head_controller{
		public $login;
		public $password;
		public $auto;

		public function index(){
			if (isset($_POST['login'])){
				require_once "modules/auto.php";

				$this->auto = new auto();

				$res = $this->auto->examination();

				if($res === false){
					$err['error'] = 'Логин или пароль введены не верно';
				}
				else{
					$this->auto->autorization();
					header('location: /info');
					exit;
				}
			}
			$data['title'] = 'Авторизация';
			
			$page = 'auto';
			require_once "views/template/waiter/head.php";
			require_once "views/auto.php";
			require_once "views/template/waiter/foot.php";
		}
	}
	
?>
