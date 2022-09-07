<?php

namespace Core;

class Page{

    public $title;
    public $layout;
    public $view;
    public $data;

    public function __construct($title, $layout, $view, $data = []){
        $this->title = $title;
        $this->layout = $layout;
        $this->view = $view;
        $this->data = $data;
    }

    public function __get($property){
        return $this->$property;
    }

}