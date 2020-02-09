<?php


namespace application\core;
use application\core\View;

abstract class Controller
{

    protected $route;
    public $view;

    public function __construct($route)    // при создании объекта любого класса-наследника вызывается коструктор, в который передан массив

    {
                                                   // в свойство класса $route передаём этот массив
        $this->route=$route;
       // $this->checkAcl();
        $this->view = new View($route);             // в свойство класса $view передаём новый созданный объект класса View и передаём этому объекту массив $route для дальнейшего использования
        //debug($route['controller']);
        //debug($this->loadModel($route['controller']));
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

//    public function checkAcl(){
//        $acl = require 'application/acl/'.$this->route['controller']. '.php';
//        debug($acl);
//    }
}