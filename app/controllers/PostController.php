<?php

namespace App\Controllers;

use Core\Controller;
use Core\DB;

class PostController extends Controller{

    public function index(){
        // var_dump($params);
        $query = "SELECT * FROM posts";
        $link = mysqli_connect('localhost', 'root', 'root', 'blog');
        $result = mysqli_query($link, $query);
        $posts = mysqli_fetch_all($result);
        return $this->view->render('index','Тестовый тайтл', 'default');
    }

    public function showPost(){
        
    }
}