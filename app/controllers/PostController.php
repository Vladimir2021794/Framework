<?php

namespace App\Controllers;

use Core\Controller;
use Core\DB;
use App\Models\Post;

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
        $static = Post::getAll('posts');
        $data = [
            'posts' => $static
        ];

        $this->render('newtitle', 'layout', 'index', $data);
    }
}