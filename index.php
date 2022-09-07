<?php

use Core\Router;

spl_autoload_register(function($class){
    $root = $_SERVER['DOCUMENT_ROOT'];
    $filename = $root . '/' . str_replace('\\', '/' , $class) . '.php';
    require($filename);
});

$routes = require $_SERVER['DOCUMENT_ROOT'] . '/config/routes.php';

$router = new Router($routes);