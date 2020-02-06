<?php

namespace application\core;

class Router
{

    protected $routes = [];
    protected $params = [];

        function __construct()
        {
           $arr = require 'application/config/routes.php';  //забираем массив данных из файла routes.php
           foreach ($arr as $key => $val) {                 //присваиваем ключу значение и каждую итерацию передаём в метод add
              // var_dump($val);                            // на первой итерации $key = "TaskSpurIT/index.php"
                                                            // $val = array(2) { ["controller"]=> string(4) "main" ["action"]=> string(5) "index" }
               $this->add($key, $val);
           }
        }

        public function add($route, $params){               // метод принимает в $route значение $key, в $params значение $val из конструктора
            $route = '#^' . $route . '$#';                  // к строке $route ддобавляем символы регулярного выражения
            $this->routes[$route] = $params;                // заполняем свойство класса $routes[], задавая имя ключа строкой $route = "#^TaskSpurIT/index.php$#" и значение этого ключа $params = array(2) { ["controller"]=> string(4) "main" ["action"]=> string(5) "index" }
//            echo '<pre>' . print_r($this->routes, 1) . '</pre>';
//            echo '<br>';
//            print_r($route);
//            echo '<br>';
//            echo '<hr>';
        }

        public function match()
        {
            $url = trim($_SERVER['REQUEST_URI'], '/'); //Берём у суперглобального массива значение нашего местонахождения и вырезаем первый слэщ, чтобы можно было найти этот путь среди свойства класса $routes[], присваиваем эту строку $url
//            var_dump($_SERVER['REQUEST_URI']);
//            echo '<br>';
            foreach ($this->routes as $route => $params) {    //перебраем циклом массив класса $routes[], в случае если найдено совпадение
                if (preg_match($route, $url, $matches)) {  // $url, где мы находимся со значением $route, то записываем в свойство
                    $this->params = $params;                  // класса $params[] значение ключа $params из свойства $routes[]
       //           var_dump($this->routes);                  // и возвращаем тру, чтобы задействовать метод run
                    return true;
                }
            }
            return false;
        }

        public function run(){                                // если метод match вернул тру. то запишем в $path путь до контроллера, вставиа
            if ($this->match()){                              // значение  из свойства класса $params c ключом ['controller'](название контоллера),заранее сделав первую букву в верхнем регистре, и получим полный путь до нужного контроллера
                $path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
                if(class_exists($path)){                          //если мы нашли нужный класс-контроллер по этому пути,
                    $action = $this->params['action'].'Action';   //то ищем метод в этом контроллере, такой как нам передан значением в свойстве класса $params под ключом ['action']
                    if(method_exists($path, $action)){            //если метод существует (с путём до класса $path и методом в этом классе $action),
                        $controller = new $path($this->params);   //то создаём объект этого контроллера, достучавшись до него абсолютным путём
                        $controller->$action();                   //и вызываем метод, который совпал тремя строчками выше
                    }else {
                        echo $action . '<b>Action not found</b>'; // если не нашли совпадение по методу
                    }
                } else {
                    echo $path . ' <b>not found controller</b>'; // если не нашли контроллер по заданному пути
                    var_dump($path);
                }
            } else{
                echo 'Path not found';                          // если не нашли такого пути (метод match передал false)
            }
        }

}

//Как только нашли нужный контроллер и метод, создаём его объект, вызываем метод.Перейдём в MainController