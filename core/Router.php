<?php

namespace Core;

class Router{

    public function __construct($routes){
        foreach ($routes as $route){

            $uri = $_SERVER['REQUEST_URI'];
            $pattern = $this->createPattern($route->url);

            if(preg_match($pattern, $uri, $params)){
                $params = $this->clearParams($params);
                $path = 'app\controllers\\'. ucfirst($route->controller) . 'Controller';
                if(class_exists($path)){
                    $action = ucfirst($route->action);
                    if(method_exists($path, $action)){
                        $controller = new $path;
                        return $controller->$action($params);
                    }
                    else{
                        echo 'метод не найден';
                        echo $action;
                    }
                }
                else{
                    echo 'Класс не найден' . '<br>';
                    echo $path;
                }
            }

        }
        return '404';
    } 

    public function createPattern($path){
        return '#^' . preg_replace('#/:([^/]+)#', '/?(?<$1>[^/]+)', $path) . '/?$#';
    }
    
    public function clearParams($params){
        $result = [];
        foreach($params as $key => $params){
            if(!is_int($key)){
                $result[$key] = $params;
            }
        }
        return $result;
    }
}