<?php

namespace Projet\Controllers;

use Projet\Models\Post;

use Projet\Models\User;

use Projet\Models\Comment;

class CommentController extends \System\Controller{

    protected $post;

    public function __construct(){
        parent::__construct();
        $this->post = new Post;
    }

    public function create($id){
        
        checkCsrf();

        $comment = new Comment;

        $comment->setAuthor_id($_SESSION['userId'])
                ->setContent($_POST['content'])
                ->setPost_id($id)
                ->create();

        redirect('post/'. $id);
    }

}