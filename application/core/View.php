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
           // debug($vars);
            extract($vars);
            if(file_exists('application/views/'.$this->path.'.php')) {  // проверяем на существование вьюшки по пути, созданному при создании объекта этого класса в конструкторе ($path)
                ob_start();
                require 'application/views/' . $this->path . '.php'; //подключаем и запускаем найденую вьюшку (main/index) где main папка index файл
                $content = ob_get_clean();
                require 'application/views/layouts/' . $this->layout. '.php';           //подключаем и выполняем стандартный слой
            }else {
                echo '<b>View not found: </b>' . 'application/views/' . $this->path . '.php';  // ошибка если не нашли вьюшку по такому пути
            }
    }
}