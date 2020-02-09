<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Main;

class MainController extends Controller  // этот класс расширяется от абстрактного класса Controller
{


     public function indexAction(){
        $result = $this->model->getNews();
        $vars = [
          'news'=>$result,
        ];
        if (!empty($_POST['changeStatus'])){
            $id = $_POST['changeID'];
            $this->model->changeStatus($id);
        }
        if (!empty($_POST['deleteline'])){
            $id = $_POST['deleteline'];
            $this->model->deleteTasks($id);
        }
         if(!empty($_POST['status'])){
             $this->model->addTask();
         }
         if(!empty($_POST['comment'])){
             $this->model->addComment();
         }
         $this->view->render('MainPage', $vars);    //в классе Router мы нашли именно этот метод этого класса.
     }                                           // обращаемся к унаследованному свойству view, где создаётся объект класса View,
                                                 // и вызываем метод render у класса View. В метод рендер передаём строку title, для определения
                                                //хедера в дефолтнм слое

}