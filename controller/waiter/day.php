<?php

	class day extends CI_Head_controller{
		public $percent;
		public $tips;
		public $taxi;
		public $rub;
		public $other;
		public $model;

		public function index(){
			if (isset($_POST['act'])){
				$act = $_POST['act'];
				
				require_once "modules/day_info.php";

				$this->model = new modules_day();

				$this->model->examination($this->get_id());

			}
			$hours = date("H");

			if($hours < 2){
				$date = date('Y-m-d', strtotime("-1 day"));
			}
			else {
				$date = date('Y-m-d');
			}
		
			$data = array(
				'title' => 'Заполнение данных',
				'today_date' => $date
			);

			$this->db->get('settings');
			$this->db->where('users_id', '=', $this->get_id());
			$settings = $this->db->result();

			$this->db->get('information');
			$this->db->where('information_date', '=', $date);
			$this->db->and('users_id', '=', $this->get_id());
			$date_result = $this->db->result();
			
			require_once "views/template/".$this->get_type()."/head.php";
			require_once "views/".$this->get_type()."/form_day.php";
			require_once "views/template/".$this->get_type()."/foot.php";
		}
	}	

