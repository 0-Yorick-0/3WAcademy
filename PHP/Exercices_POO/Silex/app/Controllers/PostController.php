<?php
namespace Projet\Controllers;

use Projet\Models\Post;

use Projet\Models\User;

use Projet\Models\Comment;

class PostController extends \System\Controller{

    protected $post;

    public function __construct(){
        parent::__construct();
        $this->post = new Post;
    }

    public function show($id){

        $post = $this->post->getOneFromAuthor($id);

        $comments = (new Comment)->getPostCommentsWithAutor($post->getId());

        $title = $post->getTitle();

        $datas = compact('title', 'post', 'comments');

        return $this->view('post/post', $datas);
    }

    public function create(){

        $title = 'Drawer';

        $post = $this->post;

        $datas = compact('title', 'post');

        if(!empty($_POST)){

            checkCsrf();

            $post->hydrate($_POST);

            $post->setAuthor_id($_SESSION['userId']);

            $fileName = randString(20).'.png'; // La fonction randString est dans le fichier app/helpers.php

            $this->saveDrawing($_POST['drawing'], $fileName);

            $post->setDrawing_src($fileName);

            $post->create();

            redirect('pages/home');
        }

        return $this->view('post/form', $datas);
    }

    public function destroy($id){

        $post = $this->post->find($id);

        if ($post->isAuthor()) {
            $post->delete();
            $fileName = $post->getDrawing_src(true);
            unlink(__DIR__.'/../../uploads/drawings/'.$fileName);
            redirect('pages/home');
        }
    }

    public function update($id){

        $title = 'Modifier le dessin';

        $post = $this->post->find($id);

        $datas = compact('title', 'post');

        if(!empty($_POST)){

            checkCsrf();

            unset($_POST['drawing_src']);

            $post->hydrate($_POST);

            $post->setAuthor_id($_SESSION['userId']);

            $fileName = $post->getDrawing_src(true); // La fonction randString est dans le fichier app/helpers.php

            $this->saveDrawing($_POST['drawing'], $fileName);

            $post->setDrawing_src($fileName);

            $post->update();

            redirect('pages/home'); 
        }

        return $this->view('post/form', $datas);
    }

    public function saveDrawing($img, $fileName){

        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        // sauvegarde dans le dossier uploads/drawings/
        file_put_contents(__DIR__.'/../../uploads/drawings/'.$fileName, $fileData);
    
    }
}