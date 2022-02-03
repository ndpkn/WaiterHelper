<?php 

    class settings extends CI_Head_controller
    {

        public function index(){

            $data['title'] = 'Настройки';

            if(isset($_POST['reg'])){

                    $array_users = array(
                        'users_login' => $_POST['login'],
                        'users_name' => $_POST['name'],
                        'users_last_name' => $_POST['last_name']
                    );
                    
                    $array_settings = array(
                        'settings_percent' => $_POST['percent'],
                        'settings_tips' => $_POST['tips'],
                        'settings_taxi' => $_POST['taxi'],
                        'settings_rub' => $_POST['rub'],
                        'settings_other' => $_POST['other']
                    );
                    
                    if(isset($_POST['new_work']) && $_POST['new_work'] == 1){
                        $array_works = array(
                            'work_places_name' => $_POST['work'],
                            'work_places_adress' => $_POST['adress'],
                            'work_add_user_id' => $this->get_id()
                        );

                        $this->db->insert('work_places', $array_works);
                        $this->db->exec();
                    }

                    $this->db->get('work_places');
                    $this->db->where('work_places_name', '=', $_POST['work']);
                    $this->db->and('work_places_adress', '=', $_POST['adress']);
                    $arr_work_id = $this->db->result();

                    if($arr_work_id){
                        $new_id = $arr_work_id[0]['work_places_id'];

                        $array_id = array(
                            'work_place_id' => $new_id
                        );

                        $this->db->update('users_work', $array_users);
                        $this->db->where('users_id', '=', $this->get_id());
                        $this->db->exec();
                    }
                    else{
                        $err[] = 'Такого заведения нет';
                    }
                    
                    $this->db->get('email');
                    $this->db->where('users_id', '=', $this->get_id());
                    $array_res = $this->db->result();
    
                    if($_POST['email'] != $array_res[0]['email_adress']){
                        $array_email = array(
                            'email_adress' => $_POST['email'],
                            'email_confirmation' => 0
                        );

                        $this->db->update('email', $array_email);
                        $this->db->where('users_id', '=', $this->get_id());
                        $this->db->exec();
                    }
    
                    
                    
                    $this->db->update('users', $array_users);
                    $this->db->where('users_id', '=', $this->get_id());
                    $this->db->exec();
    
                    $this->db->update('settings', $array_settings);
                    $this->db->where('users_id', '=', $this->get_id());
                    $this->db->exec();
            }

            $this->db->get('users');
            $this->db->where('users_id', '=', $this->get_id());
            $result = $this->db->result();

            $this->db->get("work_places");
            $works_arr = $this->db->result();

            $this->db->get("work_places");
            $this->db->where('work_places_name', '=', $this->get_work());
            $works_adress = $this->db->result();

            if(!empty($this->get_work_id())){
                $this->db->get('work_places');
                $this->db->where('work_places_id', '=', $this->get_work_id());
                $user_work = $this->db->result();
            }
            
            $this->db->get('settings');
            $this->db->where('users_id', '=', $this->get_id());
            $result_settings = $this->db->result();

            $this->db->get('email');
            $this->db->where('users_id', '=', $this->get_id());
            $result_email = $this->db->result();

            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/".$this->get_type()."/settings.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }

        public function place(){
            if(isset($_POST['place'])){
                $this->db->query("SELECT DISTINCT(`work_places_name`) AS 'place' FROM `work_places`");
                $places = $this->db->result();
                
                for($i = 0; $i < count($places); $i++){
                    if($places[$i]['place'] == $_POST['place']){
                        $val = true;
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
