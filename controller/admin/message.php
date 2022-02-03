<?php 
    
    class message extends CI_Head_controller
    {   

        public function index(){
            $data['title'] = 'Сообщения в тех.поддержку';

            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/development.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }
    }