<?php


namespace application\controllers;


use application\core\Controller;

class HelloController extends Controller
{

    public function sayAction()
    {
        $this->view->render('SayPage');

    }
}