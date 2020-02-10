<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{


    public function indexAction()
    {
        $result = $this->model->getNews();
        $comments = $this->model->getComments();
        $vars = [
            'news' => $result,
            'comments' => $comments,
        ];
        if (!empty($_POST['changeStatus'])) {
            $id = $_POST['changeID'];
            $this->model->changeStatus($id);
        }
        if (!empty($_POST['deleteline'])) {
            $id = $_POST['deleteline'];
            $this->model->deleteTasks($id);
        }
        if (!empty($_POST['status'])) {
            $this->model->addTask();
        }
        if (!empty($_POST['comment'])) {
            $this->model->addComment();
        }
        $this->view->render('MainPage', $vars);
    }
}