<?php

namespace Core;

class Route{

    public $url;
    public $controller;
    public $action;

    public function __construct($url, $controller,$action){
        $this->url = $url;
        $this->controller = $controller;
        $this->action = $action;
    }

}