<?php

namespace Core;

use Core\View;

class Controller {

    public $view;

    public function __construct(){
        $this->view = new View;
    }

    protected function render($title, $layout, $view, $data = []){
        return new Page($title, $layout, $view, $data);
    }

}