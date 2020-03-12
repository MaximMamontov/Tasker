<?php


namespace application\models;


use application\core\Model;

class Hello extends Model
{
    public function getXML($array){
        debug($array);
    }

    public function getCurrency($array){
        debug($array);
    }
}