<?php

namespace Projet\Controllers;

use Projet\Models\Post;

use Projet\Models\Comment;

class CommentController extends \System\Controller{

    protected $post;
    protected $comment;

    public function __construct(){
        parent::__construct();
        $this->post = new Post;
        $this->comment = new Comment;
    }

    public function create($id){
        
        checkCsrf();

        $comment = new Comment;

        $comment->setAuthor_id($_SESSION['userId'])
                ->hydrate($_POST)
                ->setPost_id($id)
                ->create($_POST['rating']);

        redirect('post/'. $id);
    }

    public function destroy($id){

        $comment = $this->comment->find($id);

        if ($comment->isAuthor()) {
            $comment->delete();
            redirect('post/' . $comment->getPost_id());
        }
    }

}