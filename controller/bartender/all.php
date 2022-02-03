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
			
			$this->db->query("SELECT ROUND(AVG(`information_percent`)) AS `AvgWage`, ROUND(AVG(`information_kassa`)) AS `AvgKassa`, ROUND(AVG(`information_tips`)) AS `AvgTips`, Count(`users_id`) AS `AmountOfWorkers`, `information_date`  AS `Date`, `information_work_id` AS `Work_place` FROM `information` GROUP BY `information_date`, `Work_place` HAVING MONTH(`information_date`) = '$month' AND `information_work_id` = '{$this->get_work_id()}'");
			
			$array_work = $this->db->result();
			
			if($array_work){
				for($i = 0; $i < count($array_work); $i++){
					$array_work[$i]['Date'] = date('d.m.y', strtotime($array_work[$i]['Date']));
				}
			}
			
			$this->db->query("SELECT ROUND(AVG(`percent`), 0) AS `percent`, ROUND(AVG(`kassa`), 0) AS 'kassa', ROUND(AVG(`tips`),0) AS 'tips' FROM (SELECT `information_date`, `information_work_id`, AVG(`information_percent`) AS 'percent', AVG(`information_kassa`) AS 'kassa', AVG(`information_tips`) AS 'tips' FROM `information` GROUP BY `information_work_id`, `information_date` HAVING MONTH(`information_date`) = '$month' AND `information_work_id` = '{$this->get_work_id()}') AS `table`;");

			$AVG_day_work = $this->db->result();

			$this->db->query("SELECT COUNT(DISTINCT(`users_id`)) AS `col_users`, SUM(`information_percent`) AS `percent`, SUM(`information_kassa`) AS `kassa`, SUM(`information_tips`) AS `tips` FROM `information` WHERE MONTH(`information_date`) = '$month' AND `information_work_id` = '{$this->get_work_id()}'");
			
			$work_month = $this->db->result();

			$this->db->query("SELECT ROUND(AVG(`information_percent`)) AS `AvgWage`, ROUND(AVG(`information_kassa`)) AS `AvgKassa`, ROUND(AVG(`information_tips`)) AS `AvgTips`, Count(`users_id`) AS `AmountOfWorkers`, `information_date` AS `Date`, `information_work_id` FROM `information` GROUP BY `information_date` HAVING MONTH(`information_date`) = '$month'");
			
			$array_work_all = $this->db->result();

			if($array_work_all){
				for($i = 0; $i < count($array_work_all); $i++){
					$array_work_all[$i]['Date'] = date('d.m.y', strtotime($array_work_all[$i]['Date']));
				}
			}
			
			$this->db->query("SELECT ROUND(AVG(`percent`), 0) AS `percent`, ROUND(AVG(`kassa`), 0) AS 'kassa', ROUND(AVG(`tips`),0) AS 'tips' FROM (SELECT `information_date`, AVG(`information_percent`) AS 'percent', AVG(`information_kassa`) AS 'kassa', AVG(`information_tips`) AS 'tips' FROM `information` GROUP BY `information_date` HAVING MONTH(`information_date`) = '$month') AS `table`;");

			$AVG_month_work = $this->db->result();

			$this->db->query("SELECT COUNT(DISTINCT(`users_id`)) AS `col_users`, SUM(`information_percent`) AS `percent`, SUM(`information_kassa`) AS `kassa`, SUM(`information_tips`) AS `tips` FROM `information` WHERE MONTH(`information_date`) = '$month'");
			
			$work_month_all = $this->db->result();

			$data['title'] = 'Общая статистика';

			require_once "views/template/".$this->get_type()."/head.php";
			require_once "views/".$this->get_type()."/view_all.php";
			require_once "views/template/".$this->get_type()."/foot.php";
		}
	}	

