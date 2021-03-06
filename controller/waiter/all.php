<?php

	class all extends CI_Head_controller{
		public $percent;
		public $tips;
		public $taxi;
		public $rub;
		public $other;

		public function index(){
			$str_link = mb_substr($_SERVER['REQUEST_URI'], 4);
			if (strlen($str_link) != 0){
				$arr_get = explode("=", $str_link);
				$month = $arr_get[1];
			}
			else {
				$month = date('m');
			}
			//
			$this->db->query("SELECT ROUND(AVG(`information_percent`)) AS `AvgWage`, ROUND(AVG(`information_kassa`)) AS `AvgKassa`, ROUND(AVG(`information_tips`)) AS `AvgTips`, Count(information.`users_id`) AS `AmountOfWorkers`, `information_date`  AS `Date`, `information_work_id` AS `Work_place` FROM `information` INNER JOIN `users` USING(`users_id`) GROUP BY `information_date`, `Work_place`, `users_type` HAVING MONTH(`information_date`) = '$month' AND `information_work_id` = '{$this->get_work_id()}' AND users.`users_type` = 'waiter'");
			
			$array_work = $this->db->result();
			
			if($array_work){
				for($i = 0; $i < count($array_work); $i++){
					$array_work[$i]['Date'] = date('d.m.y', strtotime($array_work[$i]['Date']));
				}
			}
			//
			$this->db->query("SELECT ROUND(AVG(`percent`), 0) AS `percent`, ROUND(AVG(`kassa`), 0) AS 'kassa', ROUND(AVG(`tips`),0) AS 'tips' FROM (SELECT `information_date`, `information_work_id`, AVG(`information_percent`) AS 'percent', AVG(`information_kassa`) AS 'kassa', AVG(`information_tips`) AS 'tips' FROM `information` INNER JOIN `users` USING(`users_id`) GROUP BY `information_work_id`, `information_date`, `users_type` HAVING MONTH(`information_date`) = '$month' AND `information_work_id` = '{$this->get_work_id()}' AND users.`users_type` = 'waiter') AS `table`;");

			$AVG_day_work = $this->db->result();

			$this->db->query("SELECT COUNT(DISTINCT(information.`users_id`)) AS `col_users`, SUM(`information_percent`) AS `percent`, SUM(`information_kassa`) AS `kassa`, SUM(`information_tips`) AS `tips` FROM `information` INNER JOIN `users` USING(`users_id`) WHERE MONTH(`information_date`) = '$month' AND `information_work_id` = '{$this->get_work_id()}' AND `users_type` = 'waiter' ");
			
			$work_month = $this->db->result();

			$this->db->query("SELECT ROUND(AVG(`information_percent`)) AS `AvgWage`, ROUND(AVG(`information_kassa`)) AS `AvgKassa`, ROUND(AVG(`information_tips`)) AS `AvgTips`, Count(`users_id`) AS `AmountOfWorkers`, `information_date` AS `Date`, `information_work_id` FROM `information` INNER JOIN `users` USING(`users_id`) GROUP BY `information_date`, `users_type` HAVING MONTH(`information_date`) = '$month' AND users.`users_type` = 'waiter'");
			
			$array_work_all = $this->db->result();

			if($array_work_all){
				for($i = 0; $i < count($array_work_all); $i++){
					$array_work_all[$i]['Date'] = date('d.m.y', strtotime($array_work_all[$i]['Date']));
				}
			}
			
			$this->db->query("SELECT ROUND(AVG(`percent`), 0) AS `percent`, ROUND(AVG(`kassa`), 0) AS 'kassa', ROUND(AVG(`tips`),0) AS 'tips' FROM (SELECT `information_date`, AVG(`information_percent`) AS 'percent', AVG(`information_kassa`) AS 'kassa', AVG(`information_tips`) AS 'tips' FROM `information` INNER JOIN `users` USING(`users_id`) GROUP BY `information_date`, `users_type` HAVING MONTH(`information_date`) = '$month' AND `users_type` = 'waiter') AS `table`;");

			$AVG_month_work = $this->db->result();

			$this->db->query("SELECT COUNT(DISTINCT(`users_id`)) AS `col_users`, SUM(`information_percent`) AS `percent`, SUM(`information_kassa`) AS `kassa`, SUM(`information_tips`) AS `tips` FROM `information` INNER JOIN `users` USING(`users_id`)  WHERE MONTH(`information_date`) = '$month' AND `users_type` = 'waiter'");
			
			$work_month_all = $this->db->result();

			$data['title'] = '?????????? ????????????????????';

			require_once "views/template/".$this->get_type()."/head.php";
			require_once "views/".$this->get_type()."/view_all.php";
			require_once "views/template/".$this->get_type()."/foot.php";
		}
	}	

