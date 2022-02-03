<?php	

	class close extends CI_Head_controller
	{
		private $hash;

		public function index(){
			$this->hash = $_COOKIE['adgjl13579'];
			
			$array = array(
				"users_hash" => NULL
			);
			$this->db->update('users', $array);
			$this->db->where('users_hash', '=', $this->hash);
			$this->db->exec();
			
			setcookie('adgjl13579', '', time()-3600);

			header('location: /');
		}
	}
	
