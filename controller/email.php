<?php 

    class email extends CI_Head_controller
    {
        public $to;
        public $from;
        public $subject;
        public $message;


        //Метод восстановления пароля
        public function index(){
            
            if(isset($_POST['email'])){
                
                $date = date('Y-m-d H-i-s');
                $hash = md5(md5(date($date)));
                
                $array = array(
                    'email_hash' => $hash,
                    'email_hash_time' =>$date
                );

                $this->db->update('email', $array);
                $this->db->where('email_adress', '=', $_POST['email']);
                $res = $this->db->exec();

                if (!$res){
                    $err = 'Почта введена не верно';
                }else{
                    $this->db->get('email');
                    $this->db->where('email_adress', '=', $_POST['email']);
                    $array = $this->db->result();
                    $to = $array[0]['email_adress'];
                    $subject = 'Восстановление пароля';
                    $message = "Для восстановления пароля перейдите по ссылке https://waiter-helper.ru/email/hash?$hash";
                    
                    if($to != ''){
                        if(mail($to, $subject, $message)){
                            echo 'Сообщение отправлено';
                        }
                        else{
                            echo 'Ошибка отправки сообщения';
                        }
                    }
                    else{
                        echo 'Необходимо указать почту';
                    }
                    
                }
            }

            require_once "views/email/mail.php";
        }

        //Изменение пароля
        public function hash(){
            if(!isset($_POST['pass'])){
                $str_link = mb_substr($_SERVER['REQUEST_URI'], 7);
                $array = explode('=', $str_link);

                $hash = mb_substr($array[0], 5);

                $this->db->get('email');
                $this->db->where('email_hash', '=', $hash);
                $result = $this->db->result();
                
                if($result){
                    require_once "views/email/new_pass.php";
                }
                else{
                    echo 'Ссылка не работает';
                }
            }
            else{
                if($_POST['pass'] == $_POST['repeat_pass']){
                    $user_id = $_POST['user_id'];

                    $array = array(
                        'users_password_hash' => md5(md5($_POST['pass'])),
                        'users_hash' => NULL
                    );

                    $this->db->update('users', $array);
                    $this->db->where('users_id', '=', $user_id);
                    $res = $this->db->exec();

                    $val = 'Пароль успешно изменен';
                    require_once "views/email/success.php";
                }
                else {
                    $err = 'Пароли не совпадают';
                    require_once "views/email/new_pass.php";
                }
            }
            
        }

        //Подтверждение почты
        public function mail(){
            $date = date('Y-m-d H-i-s');
            $hash = md5(md5(date($date)));

            $array = array(
                'email_hash' => $hash,
                'email_hash_time' =>$date
            );
            $this->db->update('email', $array);
            $this->db->where('users_id', '=', $this->get_id());
            $this->db->exec();

            $this->db->get('email');
            $this->db->where('users_id', '=', $this->get_id());
            $array = $this->db->result();
            $to = $array[0]['email_adress'];
            $subject = 'Подтверждение почты';
            $message = "Для подтверждения почты перейдите по ссылке https://waiter-helper.ru/email/confirmation?$hash";
            
            if($to == ''){
                if(mail($to, $subject, $message)){
                    echo json_encode('Сообщение отправлено');
                }
                else{
                    echo json_encode('Ошибка отправки сообщения');
                }
            }
            else{
                echo 'Необходимо указать почту';
            }
            
        }
        
        //Подтверждение почты по ссылке
        public function confirmation(){
            $str_link = mb_substr($_SERVER['REQUEST_URI'], 7);
            $array = explode('=', $str_link);

            $hash = mb_substr($array[0], 13);
                
            $this->db->get('email');
            $this->db->where('email_hash', '=', $hash);
            $array = $this->db->result();
                
            if($array){
                $array_email['email_confirmation'] = 1;
                $this->db->update('email', $array_email);
                $this->db->where('users_id', '=', $array['users_id']);
                $this->db->exec();

                header('location: /');
            }
            else{
                echo 'Ссылка не работает, попробуйте еще раз';
            }
        }
    }
