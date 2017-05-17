<?php
// app/Controllers/PageController.php

namespace Projet\Controllers;

use Projet\Models\Post;

class PageController extends \System\Controller{

      protected $post;

      public function __construct(){
        //conserve le constructeur du parent, et évite son écrasement
        parent::__construct();
        $this->post = new Post;
      }

      public function index(){

        $title = 'Home';

        $posts = $this->post->getAllWithAuthor();

        $lastPosts = $this->post->getLast(10);

        $lastDrawings = [];


        foreach ($lastPosts as $post) {
          $lastDrawings[] = $post->getDrawing_src();
        }

        $datas = compact('title', 'posts', 'lastDrawings');

        return $this->view('pages/home', $datas);
      }

}
