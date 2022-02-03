<?php

    class CI_FormValidation
    {
        public $err;
        public $result = true;

        private $name;
        private $value;

        private $min_val = false;
        private $max_val = false;
        private $required = false;
        private $number = false;
        private $string = false;
        private $not_null = false;
        private $min_length = false;

        private function validation(){

            if ($this->min_val !== false && $this->value < $this->min_val && !empty($this->value)){
                $this->err[] = "Значение '$this->value' поля '$this->name' меньше минимального значения $this->min_val";
                $this->result = false;
            }

            if ($this->max_val !== false && $this->value > $this->max_val && !empty($this->value)){
                $this->err[] = "Значение '$this->value' поля '$this->name' больше максимального значения $this->max_val";
                $this->result = false;
            }

            if ($this->required !== false && $this->value == ''){
                $this->err[] = "Значение поля '$this->name' обязательно для заполнения";
                $this->result = false;
            }

            if ($this->number !== false && !is_numeric($this->value)){
                $this->err[] = "Значение поля '$this->name' должно быть числом";
                $this->result = false;
            }

            if ($this->string !== false && !is_string($this->value)){
                $this->err[] = "Значение поля '$this->name' должно быть строкой";
                $this->result = false;
            }

            if ($this->not_null !== false && $this->value == 0 && $this->value !== ''){
                $this->err[] = "Значение поля '$this->name' не должно быть равно 0";
                $this->result = false;
            }

            if ($this->min_length !== false && strlen($this->value) < $this->min_length && $this->value !== ''){
                $this->err[] = "Количество символов поля '$this->name' не должно быть меньше $this->min_length";
                $this->result = false;
            }

            $this->min_val = false;
            $this->max_val = false;
            $this->required = false;
            $this->number = false;
            $this->string = false;
            $this->not_null = false;
            $this->min_length = false;
        }
        
        public function rules($val, $rules, $name){
            $this->value = $val;
            $this->name = $name;
            $array = explode(',', $rules);

            for ($i = 0; $i < count($array); $i++){
                if ($array[$i] == 'number'){
                    $this->number = true;
                }elseif (strpos($array[$i], 'required') !== false){
                    $this->required = true;
                }elseif ($array[$i] == 'string'){
                    $this->string = true;
                }elseif (strpos($array[$i], 'min_val') !== false){
                    $arr_val = explode('=', $array[$i]);
                    $this->min_val = $arr_val[1];
                }elseif (strpos($array[$i], 'max_val') !== false){
                    $arr_val = explode('=', $array[$i]);
                    $this->max_val = $arr_val[1];
                }elseif (strpos($array[$i], 'not_null') !== false){
                    $this->not_null = true;
                }elseif (strpos($array[$i], 'min_length') !== false){
                    $arr_val = explode('=', $array[$i]);
                    $this->min_length = $arr_val[1];
                }
            }

            $this->validation();
        }
    }