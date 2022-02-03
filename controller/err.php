<?php 

    class err extends CI_Head_controller{
        
        public function index(){
            echo 'по каким то причинам сайт не смог обработать ваш запрос, возможно, вы ввели не верный путь в адресной строке';
        }
    }