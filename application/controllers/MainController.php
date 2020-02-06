<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller  // этот класс расширяется от абстрактного класса Controller
{


     public function indexAction(){
         $vars = [
             'name' => 'Vasya',
             'age' => '88',
             'array' => [1, 2, 3],
         ];
         $this->view->render('MainPage', $vars);    //в классе Router мы нашли именно этот метод этого класса.
     }                                           // обращаемся к унаследованному свойству view, где создаётся объект класса View,
     public function sust(){                     // и вызываем метод render у класса View. В метод рендер передаём строку title, для определения
//         var_dump($_SERVER['REQUEST_URI']);    //хедера в дефолтнм слое
     }
}