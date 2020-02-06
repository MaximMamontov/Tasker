<?php


namespace application\controllers;


use application\core\Controller;

class PlashkiController extends Controller
{
    public function getthemAction(){
        $this->view->render('Plaski');
    }
}