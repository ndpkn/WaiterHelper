<?php 
    
    class notifications extends CI_Head_controller
    {   

        public function index(){
            $this->db->query("SELECT `notifications_id`, `notifications_subject`, `notifications_text` FROM `notifications` WHERE (`notifications_to` = '{$this->get_id()}' OR `notifications_to` LIKE '{$this->get_id()},%' OR `notifications_to` LIKE '%, {$this->get_id()}' OR `notifications_to` LIKE '%, {$this->get_id()},%') AND ((`notifications_read` <> '{$this->get_id()}') AND (`notifications_read` NOT LIKE '{$this->get_id()},%') AND (`notifications_read` NOT LIKE '%,{$this->get_id()}') AND (`notifications_read` NOT LIKE '%,$this->get_id,%') OR `notifications_read` IS NULL)");
            $result = $this->db->result();
            
            $data['title'] = 'Уведомления';

            require_once "views/template/".$this->get_type()."/head.php";
            
            if($this->get_login() == 'Dmitry' || $this->get_login() == 'Ndpkn'){
                require_once "views/".$this->get_type()."/notifications.php";
            }  
            else{
                require_once "views/development.php";
            }

            require_once "views/template/".$this->get_type()."/foot.php";
        }

        public function read(){
            $str_link = $_SERVER['REQUEST_URI'];
            $str_arr = explode('=', $str_link);
            
            $notifications_id = $str_arr[1];
            $users_id = $this->get_id();

            $this->db->query("UPDATE `notifications` SET `notifications_read` = IF(IFNULL(`notifications_read`, 'not_null') <> 'not_null', CONCAT(`notifications_read`, ',{$this->get_id()}'), '{$this->get_id()}') WHERE `notifications_id` = '{$notifications_id}'");
            $this->db->exec();

            header('location: /notifications');
        }
        
        public function readAll(){
            $this->db->query("UPDATE `notifications` SET `notifications_read` = IF(IFNULL(`notifications_read`, 'not_null') <> 'not_null', CONCAT(`notifications_read`, ',{$this->get_id()}'), '{$this->get_id()}') WHERE (`notifications_to` = '{$this->get_id()}' OR `notifications_to` LIKE '{$this->get_id()},%' OR `notifications_to` LIKE '%, {$this->get_id()}' OR `notifications_to` LIKE '%, {$this->get_id()},%') AND ((`notifications_read` <> '{$this->get_id()}') AND (`notifications_read` NOT LIKE '{$this->get_id()},%') AND (`notifications_read` NOT LIKE '%,{$this->get_id()}') AND (`notifications_read` NOT LIKE '%,{$this->get_id()},%') OR `notifications_read` IS NULL)");
            $this->db->exec();

            header('location: /notifications');
        }

        public function last(){
            $this->db->query("SELECT `notifications_subject`, `notifications_text` FROM `notifications` WHERE (`notifications_to` = '{$this->get_id()}' OR `notifications_to` LIKE '{$this->get_id()},%' OR `notifications_to` LIKE '%, {$this->get_id()}' OR `notifications_to` LIKE '%, {$this->get_id()},%') AND ((`notifications_read` = '{$this->get_id()}') OR (`notifications_read` LIKE '{$this->get_id()},%') OR (`notifications_read` LIKE '%,{$this->get_id()}') OR (`notifications_read` LIKE '%,$this->get_id,%') AND `notifications_read` IS NOT NULL)");
            $result = $this->db->result();
            
            require_once "views/template/".$this->get_type()."/head.php";
            
            if($this->get_login() == 'Dmitry' || $this->get_login() == 'Ndpkn'){
                require_once "views/".$this->get_type()."/notifications_last.php";
            }  
            else{
                require_once "views/development.php";
            }

            require_once "views/template/".$this->get_type()."/foot.php";
        }
    }