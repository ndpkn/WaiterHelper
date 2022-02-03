<?php

    class info extends CI_Head_controller
    {  
        public $info_users;

        public function index(){
            $this->db->query("SELECT `users_name` AS 'name', `users_last_name` AS 'last_name', `users_date_reg` AS 'date_reg', `work_places_name` AS 'work_place', `work_places_adress` AS 'work_adress' FROM `users` INNER JOIN `users_work` USING(`users_id`) INNER JOIN `work_places` ON `work_places_id` = `work_place_id` WHERE `users_type` = 'user' GROUP BY `date_reg` ASC");
            $this->info_users = $this->db->result();

            $data['title'] = 'Информация о пользователях';

            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/".$this->get_type()."/info.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }

        public function data(){

            $data['title'] = 'Информация о новых данных';

            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/development.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }

        public function conducting(){

            $data['title'] = 'Информация о заведениях';

            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/development.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }
    }