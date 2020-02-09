<?php
spl_autoload_register(function ($class){
    $path = str_replace('\\', '/', $class . '.php');
    if (file_exists($path) && is_readable($path)){
        require $path;
    }
});