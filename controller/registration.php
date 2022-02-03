<?php

    class registration extends CI_Head_controller{

        public function index(){
        
            if(isset($_POST['login'])){
            
                require_once "modules/registration.php";
               
                $user = new model_registration();

                $val = $user->examination();
            
                if($val === true){
                    $user->users_reg();

                    header('location: /info');
                }
            }

            $this->db->query("SELECT DISTINCT(`work_places_name`) AS 'place' FROM `work_places`");
            $places = $this->db->result();
            
            $data['title'] = 'Регистрация';

            $page = 'reg';
            
            require_once "views/template/waiter/head.php";
            require_once "views/reg.php";
            require_once "views/template/waiter/foot.php";
        }

        public function place(){
            if(isset($_POST['place'])){
                $this->db->query("SELECT DISTINCT(`work_places_name`) AS 'place' FROM `work_places`");
                $places = $this->db->result();
                
                if($places){
                    for($i = 0; $i < count($places); $i++){
                        if($places[$i]['place'] == $_POST['place']){
                            $val = true;
                        }
                    }
                }
                
                if($val){
                    $this->db->query("SELECT DISTINCT(`work_places_adress`) FROM `work_places` WHERE `work_places_name` = '{$_POST['place']}'");
                    $adress = $this->db->result();

                    echo json_encode($adress);
                }
            }
            
        }
    }
    	
?>
