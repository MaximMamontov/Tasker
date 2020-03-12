<?php


namespace application\core;


class View
{

    public $path;
    public $route;
    public $layout = 'default'; //стандартный слой для каждой страницы


    public function __construct($route)
    {

        $this->route=$route;   //переданный из абстрактного класса $route заносим в значение свойства $route уже данного класса
        $this->path = $route['controller'] . '/' . $route['action']; // создаём и записываем в свойство $path путь, созданный из
        //debug($this->path);  //(main/index)                          // значений ключей массива $route
    }

    public function render($title, $vars = [])
    {
            extract($vars);
            if(file_exists('application/views/'.$this->path.'.php')) {
                ob_start();
                require 'application/views/' . $this->path . '.php';
                $content = ob_get_clean();
                require 'application/views/layouts/' . $this->layout. '.php';
            }else {
                echo '<b>View not found: </b>' . 'application/views/' . $this->path . '.php';
            }
    }

    public static function errorCode($code){
        http_response_code($code);
        require 'application/views/errors/' . $code . '.php';
        exit();
    }

    public function redirect($url){
         header('location: '.$url);
         exit();
    }

    public function message($status, $message){
        exit(json_encode(['status'=>$status, 'message'=>$message]));
    }
    public function location($url){
        exit(json_encode(['url'=>$url]));
    }
}