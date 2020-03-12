<?php


namespace application\controllers;


use application\core\Controller;
use SimpleXMLElement;

class HelloController extends Controller
{

    public function sayAction()
    {


        for ($i = 1; $i <= 7; $i++) {
            $data = file_get_contents('http://www.nbrb.by/API/ExRates/Rates?onDate=2020-2-' . $i . '&Periodicity=0');
            $decoded = json_decode($data);
            $this->model->getCurrency($decoded);
        }


        $this->view->render('SayPage');

    }
}