<?php

namespace Core;

abstract class Controller{

    protected function render($title, $layout, $view, $data = []){
        $page = new Page($title, $layout, $view, $data);
        return (new View)->render($page);
    }

}