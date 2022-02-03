<?php 

    class modules_day extends CI_Head_controller{
        private $act;
        private $percent;
		private $tips;
		private $taxi;
		private $other;
        private $date;

        public $error;

        public function examination($users_id){
            $this->percent = $_POST['percent'];
            $this->tips = $_POST['tips'] != '' ? $_POST['tips'] : 0;
            $this->taxi = $_POST['taxi'] != '' ? $_POST['taxi'] : 0;
            $this->other = $_POST['other'] != '' ? $_POST['other'] : 0;
            $this->date = $_POST['date'];
            $this->act = $_POST['act'];

            $this->form->rules($this->percent, 'required, not_null, number', 'Зарплата');
            $this->form->rules($this->tips, 'number', 'Чаевые');
            $this->form->rules($this->taxi, 'number', 'Такси');
            $this->form->rules($this->other, 'number', 'Прочие расходы');

            if($this->get_work_id() == ''){
                $this->form->err[] = 'Для внесения данных необходимо указать место работы';
            }

            if(strtotime($this->date) > strtotime(date('Y-m-d'))){
                $this->form->err[] = 'некорректный ввод даты (нельзя внести данные за будущие дни)';
            }
            elseif(strtotime($this->date) == strtotime(date('Y-m-d'))){
                if(date('H') < 15){
                    $this->form->err[] = 'Данные за сегодняшний день можно ввести только после 15 часа';
                }
            }

            if($this->form->result && empty($this->form->err)){
                $array = array(
                    'users_id' => $this->get_id(),
                    'information_percent' => $this->percent,
                    'information_tips' => $this->tips,
                    'information_taxi' => $this->taxi,
                    'information_other' => $this->other,
                    'information_date' => $this->date,
                    'information_work_id' => $this->get_work_id()
                );
    
                
                $date = $this->date;
    
                if ($this->act == 'insert' && isset($_POST['sub'])){
                    $this->db->insert('information', $array);
                    $this->db->exec();
                    header('location: /my');
                    exit;
                }elseif($this->act == 'update' && isset($_POST['sub'])) {
                    $this->db->update('information', $array);
                    $this->db->where('users_id', '=', $this->get_id());
                    $this->db->and('information_date', '=', $date);
                    $this->db->exec();
                    header('location: /my');
                    exit;
                }
                elseif(isset($_POST['delete'])){
                    $this->db->delete('information');
                    $this->db->where('users_id', '=', $this->get_id());
                    $this->db->and('information_date', '=', $date);
                    $this->db->exec();
                }
            }
            
        }
    }

?>