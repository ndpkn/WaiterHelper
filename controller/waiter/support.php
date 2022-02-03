<?php 
    
    class support extends CI_Head_controller
    {   

        public function index(){
            $data['title'] = 'Тех.Поддержка';

            $this->db->get('tickets');
            $this->db->where('users_id', '=', $this->get_id());
            $this->db->and('tickets_status', '=', 'Открыт');
            $result_tickets = $this->db->result();

            $this->db->get('tickets');
            $this->db->where('users_id', '=', $this->get_id());
            $this->db->and('tickets_status', '=', 'Закрыт');
            $result_tickets_close = $this->db->result();
            
            require_once "views/template/".$this->get_type()."/head.php";
            
            if($this->get_login() == 'Dmitry' || $this->get_login() == 'Ndpkn'){
                require_once "views/".$this->get_type()."/support.php";
            }
            else{
                require_once "views/development.php";
            }
            
            require_once "views/template/".$this->get_type()."/foot.php";
        }

        public function new(){
            if(isset($_POST['sub'])){
                $name = $_POST['name'];
                $text = $_POST['text'];

                $array_tickets = array(
                    'tickets_name' => $name,
                    'users_id' => $this->get_id(),
                    'tickets_status' => 'Открыт'
                );

                $array_message = array(
                    'tickets_id' => '',
                    'tickets_message_from' => $this->get_id(),
                    'tickets_message_to' => '24',
                    'tickets_message_image' => '',
                    'tickets_message_text' => $text
                );

                if (!empty($_FILES['image']['name'])){
                    $uploaddir = 'sources/imagesMessage/';

                    $image_name = $_FILES['image']['name'];
                    $image_type = $_FILES['image']['type'];
                    $image_tmp_name = $_FILES['image']['tmp_name'];
                    $image_error = $_FILES['image']['error'];
                    $image_size = $_FILES['image']['size'];

                    if($image_type != 'image/jpeg' && $image_type != 'image/png' && $image_type != 'image/jpg'){
                        $this->form->err[] = 'Неподходящий тип файла';
                    }

                    if(empty($this->form->err) && $image_error == 0){
                        $this->db->query("SELECT `tickets_message_id` FROM `tickets_message` ORDER BY `tickets_message_id` DESC LIMIT 1" );
                        $result = $this->db->result();
                        
                        $type_arr = explode('/', $image_type);
                        $type = $type_arr[1];

                        $number = $result[0]['tickets_message_id'] + 1;

                        $name = 'image_'.$number.'.'.$type;
                        
                        $path = $uploaddir.$name;

                        if(!move_uploaded_file($image_tmp_name, $path)){
                            $this->form->err[] = 'По каким-то причинам не удалось загрузить изображение на сервер';
                        }
                        
                        $array_message['tickets_message_image'] = $path;
                    }
                }

                if(empty($this->form->err)){
                    $this->db->insert('tickets', $array_tickets);
                    $this->db->exec();
                    
                    $this->db->query("SELECT `tickets_id` FROM `tickets` ORDER BY `tickets_id` DESC LIMIT 1");
                    $result = $this->db->result();
                    $tickets_id = $result[0]['tickets_id'];

                    $array_message['tickets_id'] = $tickets_id;
                    
                    $this->db->insert('tickets_message', $array_message);
                    $this->db->exec();

                    header('location: /support');
                }
            }
            $data['title'] = 'Создание вопроса';

            require_once "views/template/".$this->get_type()."/head.php";
            
            if($this->get_login() == 'Dmitry' || $this->get_login() == 'Ndpkn'){
                require_once "views/".$this->get_type()."/supportNew.php";
            }
            else{
                require_once "views/development.php";
            }
            
            require_once "views/template/".$this->get_type()."/foot.php";
        }
    }