<?php

    class CI_DataBase{
        
        public $host;
        public $name;
        public $password;
        public $db_name;
        public $result;
        private $query_str;
        private $conn;

        function __construct($host, $name, $password, $db_name){
            
            $this->host = $host;
            $this->name = $name;
            $this->password = $password;
            $this->db_name = $db_name;

            $this->conn = new Mysqli($this->host, $this->name, $this->password, $this->db_name);
            $this->conn->set_charset("utf8");
            return $this->conn;
        }
	
	    //Формитрование строки на занесение в БД
        public function insert($table_name, $array){
            
            foreach ($array as $key => $val){
                $value[$key] = "'".$val."'";
            }
            
            $this->query_str = "INSERT INTO `$table_name` (".implode(', ', array_keys($value)).") VALUE (".implode(', ', array_values($value)).")";
        }

        public function query($str){
            $this->query_str = $str;
        }
	
	    //Выполнение запроса 
        public function exec(){
            $res = $this->conn->query($this->query_str);
            $this->query_str = '';
            if($res){
                return true;
            }
            else{
                return false;
            }
        }
	
	    //формирование строки на получение данных
        public function get($table_name){
            $this->query_str = "SELECT * FROM `{$table_name}`";
        }
        
	    //WHERE
        public function where($col, $sim, $val){
            $this->query_str .= " WHERE `{$col}` $sim '{$val}'";
        }
        
	    //AND
        public function and($col, $sim, $val){
            $this->query_str .= " AND {$col} $sim '{$val}'";
        }
	
	    //OR
        public function or($col, $sim, $val){
            $this->query_str .= " OR `{$col}` $sim '{$val}'";
        }

        public function order_by($col){
            $this->query_str .= " ORDER BY `{$col}`";
        }
	
	    //JOIN
        public function join($table_name, $val_1, $val_2){
            $this->query_str .= "JOIN `{$table_name}` ON '{$val_1}' = '{$val_2}'";
        }
	
	    //LEFT JOIN
        public function left_join($table_name, $val_1, $val_2){
            $this->query_str .= "LEFT JOIN `{$table_name}` ON '{$val_1}' = '{$val_2}'";
        }
	
	    //RIGHT JOIN
        public function right_join($table_name, $val_1, $val_2){
            $this->query_str .= "RIGHT JOIN `{$table_name}` ON '{$val_1}' = '{$val_2}'";
        }
	
	    //Получение ассоциативного  массива
        public function result(){
            $this->result = $this->conn->query($this->query_str);
            $this->query_str = '';
            
            if(mysqli_num_rows($this->result) != NULL){
                if(mysqli_num_rows($this->result) > 1){
                    $str = mysqli_fetch_assoc($this->result);
                    
                    while($str != null){
                        $array[] = $str; 
                        $str = mysqli_fetch_assoc($this->result);
                    }
                }else{
                    $array[0] = mysqli_fetch_assoc($this->result);
                }

                return $array;
            }
            else{
                return false;
            } 
        }
        
	    //DELETE
        public function delete($table_name){
            $this->query_str = "DELETE FROM `{$table_name}`";
        }
        
        //UPDATE
        public function update($table_name, $array){
            $str = '';
            $number = 1;
            foreach ($array as $key => $val){
                $array[$key] = "'".$val."'";
            }

            foreach($array as $key => $val){
                if($number != count($array)){
                    $str .= "`".$key."`".' = '.$val.', ';
                }
                else{
                    $str .= "`".$key."`".' = '.$val;
                }
                $number++;
            }
            $this->query_str = $this->query_str."UPDATE `$table_name` SET $str";
        }
    }