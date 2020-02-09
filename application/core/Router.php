<?php

namespace application\core;
use application\core\View;
class Router
{
    protected $routes = [];
    protected $params = [];

    function __construct()
    {
        $this->routes = require 'application/config/routes.php';
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/'); //Берём у суперглобального массива значение нашего местонахождения и вырезаем первый слэщ, чтобы можно было найти этот путь среди свойства класса $routes[], присваиваем эту строку $url
//            var_dump($_SERVER['REQUEST_URI']);
//            echo '<br>';
        foreach ($this->routes as $route => $params) {    //перебраем циклом массив класса $routes[], в случае если найдено совпадение
            if (preg_match('#^' . $route . '$#', $url, $matches)) {  // $url, где мы находимся со значением $route, то записываем в свойство
                $this->params = $params;                  // класса $params[] значение ключа $params из свойства $routes[]
                //           var_dump($this->routes);                  // и возвращаем тру, чтобы задействовать метод run
                return true;
            }
        }
        return false;
    }

    public function run()
    {                                // если метод match вернул тру. то запишем в $path путь до контроллера, вставиа
        if ($this->match()) {                              // значение  из свойства класса $params c ключом ['controller'](название контоллера),заранее сделав первую букву в верхнем регистре, и получим полный путь до нужного контроллера
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {                          //если мы нашли нужный класс-контроллер по этому пути,
                $action = $this->params['action'] . 'Action';   //то ищем метод в этом контроллере, такой как нам передан значением в свойстве класса $params под ключом ['action']
                if (method_exists($path, $action)) {

                    //если метод существует (с путём до класса $path и методом в этом классе $action),
                    $controller = new $path($this->params);   //то создаём объект этого контроллера, достучавшись до него абсолютным путём
                    $controller->$action();                   //и вызываем метод, который совпал тремя строчками выше
                } else {
                    View::errorCode(404) ; // если не нашли совпадение по методу
                }
            } else {
                View::errorCode(404); // если не нашли контроллер по заданному пути
                var_dump($path);
            }
        } else {
            View::errorCode(404);                          // если не нашли такого пути (метод match передал false)
        }
    }

}

//Как только нашли нужный контроллер и метод, создаём его объект, вызываем метод.Перейдём в MainController