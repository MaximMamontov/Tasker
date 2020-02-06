<?php


namespace application\core;
use application\core\View;

abstract class Controller
{

    public $route;
    public $view;

    public function __construct($route)    // при создании объекта любого класса-наследника вызывается коструктор, в который передан массив
                                           //Array
                                                    //(
                                                    //    [controller] => main
                                                    //    [action] => index
                                                    //)
    {
        //debug($route);                            // в свойство класса $route передаём этот массив
        $this->route=$route;
        $this->view = new View($route);             // в свойство класса $view передаём новый созданный объект класса View и передаём этому объекту массив $route для дальнейшего использования
    }
}