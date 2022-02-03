<?php 
    
    class schedule extends CI_Head_controller
    {   

        public function index(){
            $data['title'] = 'Генерация графика работы';

            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/development.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }
    }