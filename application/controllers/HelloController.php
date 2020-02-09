<?php


namespace application\controllers;


use application\core\Controller;

class HelloController extends Controller
{

    public function sayAction()
    {
//        if(!empty($_POST)){
//            //$this->view->message($_POST['name'], $_POST['description']);
//            $this->model->addTask();
//        }
        $this->view->render('SayPage');

    }
}