<?php
    class auto extends CI_Head_controller{
        public $login;
        public $password;
        public $hash;

        public function examination(){
            $this->login = $_POST['login'];
            $this->password = $_POST['password'];

            $this->db->get('users');
            $this->db->where('users_login', '=', $this->login);
            $result = $this->db->result();
            $password_hash = $result[0]['users_password_hash'];

            if($result != false && $result != NULL){
                if(md5(md5($this->password)) == $password_hash){
                    return true;
                }
                else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function autorization(){
            $this->db->get('users');
            $this->db->where('users_login', '=', $this->login);
            $result_users = $this->db->result();
            if($result_users[0]['users_hash'] != NULL){
                $this->hash = $result_users[0]['users_hash'];
            }
            else{
                $this->hash = md5(md5($this->password.date('Y-m-d H:i:s')));
                $array = array(
                    "users_hash" => $this->hash
                );
                
                $this->db->update('users', $array);
                $this->db->where('users_login', '=', $this->login);
                $this->db->exec();
            }
        
            setcookie('adgjl13579', $this->hash, time()+3600*24*30);
        }
    }
?>