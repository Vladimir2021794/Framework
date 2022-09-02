<?php

namespace Core;

class View{

    public $path;
    public $title;
    public $layout = 'default';

    public function render($path, $title, $layout,){
        $path = 'app/views/' . $path . '.php';
        if(file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            if(!empty($layout)){
                $this->layout = $layout;
            }
            require 'app/views/layouts/' . $this->layout . '.php';
        }
        else{
            echo 'Представление ' . $path . ' не найдено';
        }
    }
}