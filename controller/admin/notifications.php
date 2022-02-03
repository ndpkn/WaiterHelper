<?php 
    
    class notifications extends CI_Head_controller
    {   
        private $notifications_reg;
        private $users_id;
        private $notifications_to;
        private $notifications_text;
        private $notifications_subject;

        public function index(){
            $this->db->get('notifications');
            $notifications = $this->db->result();

            $data['title'] = 'Уведомления';

            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/".$this->get_type()."/notifications.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }

        public function add(){
            if(isset($_POST['sub'])){
                $this->form->rules($_POST['new_reg'], 'required, min_val=0, max_val=1', 'Отправлять новым пользователям или нет');
                $this->form->rules($_POST['subject'], 'required, min_length=5', 'Тема сообщения');
                $this->form->rules($_POST['text'], 'required, min_length=10', 'Текст');
                $this->form->rules($_POST['to'], 'required', 'Кому');

                if(empty($this->form->err)){
                    if($_POST['to'][0] == 'All'){
                        $this->db->query("SELECT `users_id` FROM `users`");
                        $users = $this->db->result();
                        
                        $this->notifications_to = '';
                        for ($i = 0; $i < count($users); $i++){
                            if($i == 0){
                                $this->notifications_to = $users[$i]['users_id'];
                            }
                            else{
                                $this->notifications_to = $this->notifications_to.', '.$users[$i]['users_id'];
                            }
                        }
                    }
                    else{
                        for($i = 0; $i < count($_POST['to']); $i++){
                            if($i == 0){
                                $this->notifications_to = $_POST['to'][$i];
                            }
                            else{
                                $this->notifications_to = $this->notifications_to.', '.$_POST['to'][$i];
                            }
                        }
                    }
                }

                if($this->form->result){
                    $this->notifications_reg = $_POST['new_reg'];
                    $this->users_id = $this->get_id();
                    $this->notifications_text = $_POST['text'];
                    $this->notifications_subject = $_POST['subject'];

                    $array = array(
                        'notifications_reg' => $this->notifications_reg,
                        'users_id' => $this->users_id,
                        'notifications_to' => $this->notifications_to,
                        'notifications_subject' => $this->notifications_subject,
                        'notifications_text' => $this->notifications_text
                    );

                    $this->db->insert('notifications', $array);
                    $this->db->exec();

                    header('location: /notifications');
                    exit;
                }
            }
            $data['title'] = 'Создание уведомления';

            $this->db->query("SELECT `users_id`, `users_name`, `users_last_name` FROM `users` WHERE `users_type` <> 'admin' ORDER BY `users_name` ASC");
            $arr_users = $this->db->result();
            
            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/".$this->get_type()."/notifications_form.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }

        public function delete(){
            $str_link = $_SERVER['REQUEST_URI'];
			$arr_get = explode("=", $str_link);
			
			$id = $arr_get[1];

            $this->db->delete('notifications');
            $this->db->where('notifications_id', '=', $id);
            $this->db->exec();

            header('location: /notifications');
        }

        public function editing(){
            if(isset($_POST['editing'])){
                $this->form->rules($_POST['new_reg'], 'required, min_val=0, max_val=1', 'Отправлять новым пользователям или нет');
                $this->form->rules($_POST['subject'], 'required, min_length=5', 'Тема сообщения');
                $this->form->rules($_POST['text'], 'required, min_length=10', 'Текст');
                $this->form->rules($_POST['to'], 'required', 'Кому');

                if(empty($this->form->err)){
                    if($_POST['to'][0] == 'All'){
                        $this->db->query("SELECT `users_id` FROM `users`");
                        $users = $this->db->result();
                        
                        $this->notifications_to = '';
                        for ($i = 0; $i < count($users); $i++){
                            if($i == 0){
                                $this->notifications_to = $users[$i]['users_id'];
                            }
                            else{
                                $this->notifications_to = $this->notifications_to.', '.$users[$i]['users_id'];
                            }
                        }
                    }
                    else{
                        for($i = 0; $i < count($_POST['to']); $i++){
                            if($i == 0){
                                $this->notifications_to = $_POST['to'][$i];
                            }
                            else{
                                $this->notifications_to = $this->notifications_to.', '.$_POST['to'][$i];
                            }
                        }
                    }
                }

                if($this->form->result){
                    $this->notifications_reg = $_POST['new_reg'];
                    $this->users_id = $this->get_id();
                    $this->notifications_text = $_POST['text'];
                    $this->notifications_subject = $_POST['subject'];

                    $array = array(
                        'notifications_reg' => $this->notifications_reg,
                        'users_id' => $this->users_id,
                        'notifications_to' => $this->notifications_to,
                        'notifications_subject' => $this->notifications_subject,
                        'notifications_text' => $this->notifications_text
                    );

                    $str_link = $_SERVER['REQUEST_URI'];
                    $arr_get = explode("=", $str_link);
                    
                    $id = $arr_get[1];

                    $this->db->update('notifications', $array);
                    $this->db->where('notifications_id', '=', $id);
                    $this->db->exec();

                    header('location: /notifications');
                    exit;
                }
            }
            $str_link = $_SERVER['REQUEST_URI'];
			$arr_get = explode("=", $str_link);
			
			$id = $arr_get[1];

            $this->db->get('notifications');
            $this->db->where('notifications_id', '=', $id);
            $notificationas = $this->db->result();

            $arr_to = explode(',', $notificationas[0]['notifications_to']);

            $this->db->query("SELECT `users_id`, `users_name`, `users_last_name` FROM `users` WHERE `users_type` <> 'admin' ORDER BY `users_name` ASC");
            $arr_users = $this->db->result();

            $data['title'] = 'Редактирование уведомления';

            require_once "views/template/".$this->get_type()."/head.php";
            require_once "views/".$this->get_type()."/notifications_editing.php";
            require_once "views/template/".$this->get_type()."/foot.php";
        }
    }