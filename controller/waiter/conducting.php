<?php 
    
    class conducting extends CI_Head_controller
    {   

        public function index(){
            $data['title'] = 'Оценка заведения';

            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/development.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }

        public function info(){
            $data['title'] = 'Информация о заведениях';

            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/development.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }
    }