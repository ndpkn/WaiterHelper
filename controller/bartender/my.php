<?php

	class my extends CI_Head_controller{
		public $percent;
		public $tips;
		public $taxi;
		public $rub;
		public $other;

		public function index(){

			$str_link = mb_substr($_SERVER['REQUEST_URI'], 4);
			if (strlen($str_link) != 0){
				$arr_get = explode("=", $str_link);
				$month = trim($arr_get[1]);
				if(!is_numeric($month) || ($month < 1 && $month > 12)){
					$month = date('m');
				}
			}
			else {
				$month = date('m');
			}
			$user_id = $this->get_id();

			$this->db->get('information');
			$this->db->where('users_id', '=', $user_id);
			$this->db->and('MONTH(information_date)', '=', $month);
			$this->db->order_by('information_date');
			$result = $this->db->result();

			if(!$result && $month != date('m')){
				$month = date('m');
				$this->db->get('information');
				$this->db->where('users_id', '=', $user_id);
				$this->db->and('MONTH(information_date)', '=', $month);
				$this->db->order_by('information_date');
				$result = $this->db->result();
			}

			$this->db->get('settings');
			$this->db->where('users_id', '=', $this->get_id());
			$settings = $this->db->result();
			
			if($result){
				for($i = 0; $i < count($result); $i++){
					$result[$i]['information_date'] = date('d.m.y', strtotime($result[$i]['information_date']));
				}
			}
			

			$this->db->query("SELECT DISTINCT(MONTH(`information_date`)) AS `date` FROM `information` WHERE `users_id` = '$user_id' ORDER BY `date` ASC");
			$result_month = $this->db->result();

			$this->db->query("SELECT SUM(`information_percent`) AS `percent`, SUM(`information_tips`) AS `tips`, SUM(`information_taxi`) AS `taxi`, SUM(`information_other`) AS `other` FROM `information` WHERE MONTH(`information_date`) = '$month' AND `users_id` = '$user_id'");

			$result_outcome = $this->db->result();

			$this->db->query("SELECT ROUND(AVG(`information_percent`), 0) AS 'percent', ROUND(AVG(`information_tips`), 0) AS 'tips', ROUND(AVG(`information_taxi`), 2) AS 'taxi', ROUND(AVG(`information_other`), 0) AS 'other' FROM `information` WHERE `users_id` = '{$this->get_id()}' AND MONTH(`information_date`) = '{$month}';");

			$AVG_day = $this->db->result();
			
			if($result_month){
				for ($i = 0; $i < count($result_month); $i++){
					$list_month[] = $result_month[$i]['date'];
				}	
			}
			else{
				$list_month[] = $month;
			}
			
			$data['title'] = 'Моя статистика';
			
			require_once "views/template/".$this->get_type()."/head.php";
			require_once "views/".$this->get_type()."/view_my.php";
			require_once "views/template/".$this->get_type()."/foot.php";
		}
	}	
