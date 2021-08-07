<?php 
    class App{
        protected $controller = 'store';
        protected $action = 'store';
        protected $params = [];

        public function __construct(){
            //Tach dia chi thanh mang
            $url = explode('/',trim($this->getURL()));

            //Xu ly controller
            $this->controller = file_exists("mvc/controller/".$url[0].".php") ?  $url[0] : $this->controller;
            require_once("mvc/controller/".$this->controller.".php");

            //Xu ly action
            if(!empty($url[1])){
                $this->action =  method_exists("controller".$this->controller,$url[1]) ? $url[1] : $this->action;
            }
            $Class = "controller".$this->controller;
            $Control = new $Class;

            //Xu li params
            unset($url[0]);
            unset($url[1]);
            $this->params = $url ? array_values($url) : [];

            //Goi phuong thuc
            call_user_func_array([$Control, $this->action], $this->params);
        }

        public function getURL(){
            return isset($_GET['url']) ? $_GET['url'] : '';
        }
    }
?>