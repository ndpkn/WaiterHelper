<?php

class CI_Head_controller
{
    private $user_id;
    private $user_login;
    private $user_type;
    private $user_name;
    private $user_last_name;
    private $user_hash;

    private $work_id;
    private $work_place;
    private $work_adress;

    public $db;
    public $form;  

    public $home_adress;
    public $array_month;

    public function __construct(){
        $this->db = new CI_DataBase($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['db_name']);
        $this->form = new CI_FormValidation();

        $this->home_adress = $GLOBALS['home_adress'];
        $this->array_month = $GLOBALS['months'];

        if(isset($_COOKIE['adgjl13579'])){
            $this->user_hash = $_COOKIE['adgjl13579'];
        
            $this->db->get('users');
            $this->db->where('users_hash', '=', $this->user_hash);
            $this->result = $this->db->result();

            $this->db->get('users_work');
            $this->db->where('users_id', '=', $this->result[0]['users_id']);
            $user_work = $this->db->result();
            
            $this->db->get('work_places');
            $this->db->where('work_places_id', '=', $user_work[0]['work_place_id']);
            $work_info = $this->db->result();
            
            $this->user_id = $this->result[0]['users_id'];
            $this->user_login = $this->result[0]['users_login'];
            $this->user_type = $this->result[0]['users_type'];
            $this->user_name = $this->result[0]['users_name'];
            $this->user_last_name = $this->result[0]['users_last_name'];
            $this->user_hash = $this->result[0]['users_hash'];
        
            $this->work_id = $user_work[0]['work_place_id'];
            $this->work_place = $work_info[0]['work_places_name'];
            $this->work_adress = $work_info[0]['work_places_adress'];
        }
    }

    public function get_id(){
        return $this->user_id;
    }

    public function get_login(){
        return $this->user_login;
    }

    public function get_type(){
        return $this->user_type;
    }

    public function get_name(){
        return $this->user_name;
    }

    public function get_last_name(){
        return $this->user_last_name;
    }

    public function get_hash(){
        return $this->user_hash;
    }

    public function get_work_id(){
        return $this->work_id;
    }

    public function get_work(){
        return $this->work_place;
    }

    public function get_work_adress(){
        return $this->work_adress;
    }
}

