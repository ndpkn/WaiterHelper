<?php

    class ip extends CI_Head_controller
    {   

        public function index(){
            
            $keys = [
                'HTTP_CLIENT_IP',
                'HTTP_X_FORWADED_FOR',
                'REMOTE_ADDR'
            ];

            foreach ($keys as $key){
                if(!empty($_SERVER[$key])){
                    $ip = trim(end(explode(',', $_SERVER[$key])));
                    if (filter_var($ip, FILTER_VALIDATE_IP)){
                        
                        $isp = file_get_contents("https://api.iplocation.net/?ip=".$ip);
                        $isp = json_decode($isp, true);

                        echo "ip: ".$isp['ip']."<br>";
                        echo "ip_number: ".$isp['ip_number']."<br>";
                        echo "ip_version: ".$isp['ip_version']."<br>";
                        echo "country_name: ".$isp['country_name']."<br>";
                        echo "country_code2: ".$isp['country_code2']."<br>";
                        echo "isp (Провайдер): ".$isp['isp']."<br>";
                        echo "response_code: ".$isp['response_code']."<br>";
                        echo "response_message: ".$isp['response_message']."<br>";
                    }
                }
            }
        }
    }