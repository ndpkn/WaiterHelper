<?php

    class model_registration extends CI_Head_controller
    {
        
        public $login;
        public $password;
        public $password_repeat;
        public $name;
        public $last_name;
        public $type;
        public $hash;

        public $work;
        public $work_adress;

        public $err;

        public function examination(){
            $this->login = $_POST['login'];
            $this->password = $_POST['password'];
            $this->password_repeat = $_POST['password_repeat'];
            $this->name = $_POST['name'];
            $this->last_name = $_POST['last_name'];
            $this->type = $_POST['position'];

            $this->work = $_POST['work_place'];
            $this->work_adress = $_POST['adress'];

            $login_html = htmlspecialchars($this->login);
            $password_html = htmlspecialchars($this->password);
            $name_html = htmlspecialchars($this->name);
            $last_name_html = htmlspecialchars($this->last_name);

            $this->form->rules($this->login, 'required, min_length=3', 'Логин');
            $this->form->rules($this->password, 'required, min_length=3', 'Пароль');
            $this->form->rules($this->password_repeat, 'required, min_length=3', 'Повтор пароля');
            $this->form->rules($this->name, 'required, min_length=3', 'Имя');
            $this->form->rules($this->last_name, 'required, min_length=3', 'Фамилия');
            $this->form->rules($this->work, 'required', 'Фамилия');
            $this->form->rules($this->work_adress, 'required', 'Фамилия');

            //Проверка на ввод html символов
            if($login_html != $this->login || $password_html != $this->password || $name_html != $this->name || $last_name_html != $this->last_name){
                $this->form->err[] = 'Уберите лишние символы'; 
            }
            
            //Проврека на совпадение паролей
            if ($this->password != $this->password_repeat){
                $this->form->err[] = 'Пароли не совпадают';
            }
            
            //Проверка на существование логина
            $this->db->get("users");
            $this->db->where('users_login', '=', $this->login);
            $rows = $this->db->result();

            if($rows){
                $this->form->err[] = 'Такой логин уже существует';
            }

            if($this->type != 'waiter' && $this->type != 'bartender'){
                $this->form->err[] = 'Необходимо выбрать должность';
            }

            if(empty($this->form->err)){
                return true;
            }
            else {
                return $this->form->err;
            }
        }

        public function users_reg(){
            $this->login = $_POST['login'];
            $this->password = $_POST['password'];
            $this->password_repeat = $_POST['password_repeat'];
            $this->name = $_POST['name'];
            $this->last_name = $_POST['last_name'];
            $this->type = $_POST['position'];
            $this->hash = md5(md5($this->password.date('Y-m-d H:i:s')));
            
            $array = array(
                'users_login' => $this->login,
                'users_password_hash' => md5(md5($this->password)),
                'users_name' => $this->name,
                'users_last_name' => $this->last_name,
                'users_type' => $this->type,
                'users_hash' => $this->hash
            );

            $this->db->insert('users', $array);
            $this->db->exec();

            $this->db->get('users');
			$this->db->where('users_login', '=', $this->login);
			$result = $this->db->result();
            
            $users_id = $result[0]['users_id'];
           
            $array_settings = array(
                'users_id' => $users_id,
                'settings_percent' => 5,
                'settings_tips' => 'on',
                'settings_taxi' => 'on',
                'settings_rub' => 'on',
                'settings_other' => 'on'
            );

            $this->db->insert('settings', $array_settings);
            $this->db->exec();
            
            $array = array(
                'users_id' => $users_id,
                'email_adress' => $_POST['email'],
                'email_hash' => NULL,
                'email_hash_time' => NULL
            );

            $this->db->insert('email', $array);
            $this->db->exec();
            
            if(isset($_POST['check_place']) && $_POST['check_place'] == 1){
                $array_works = array(
                    'work_places_name' => $_POST['work_place'],
                    'work_places_adress' => $_POST['adress'],
                    'work_add_user_id' => $users_id
                );

                $this->db->insert('work_places', $array_works);
                $this->db->exec();
            }
            
            $this->db->get('work_places');
            $this->db->where('work_places_name', '=', $_POST['work_place']);
            $this->db->and('work_places_adress', '=', $_POST['adress']);
            $arr_work_id = $this->db->result();

            if($arr_work_id){
                $new_id = $arr_work_id[0]['work_places_id'];

                $array = array(
                    'users_id' => $users_id,
                    'work_place_id' => $new_id
                );

                $this->db->insert('users_work', $array);
                $this->db->exec();
            }

            $this->db->query("UPDATE `notifications` SET `notifications_to` = IF(IFNULL(`notifications_to`, 'not_null') <> 'not_null', CONCAT(`notifications_to`, ', {$users_id}'), '{$users_id}') WHERE `notifications_reg` = '1'");
            $this->db->exec();
            
            setcookie("adgjl13579", $this->hash, time()+3600*24*30);
        }
    }

?>
