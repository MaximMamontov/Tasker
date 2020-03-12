<?php

namespace application\controllers;

use application\core\Controller;

//use application\Repository\TaskRepository;

/**
 * Class PlashkiController
 * @package application\controllers
 */
class PlashkiController extends Controller
{

    public function getthemAction()
    {
        $this->view->render('Plaski');
    }
}