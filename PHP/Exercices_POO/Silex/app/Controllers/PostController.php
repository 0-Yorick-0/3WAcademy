<?php
namespace Projet\Controllers;

use Projet\Models\Post;

use Projet\Models\User;

class PostController {

    protected $post;

    public function __construct(){
        $this->post = new Post;
    }

    public function create(){

        $title = 'Drawer';

        $datas = compact('title');

        if(!empty($_POST)){

            $this->post->hydrate($_POST);

            $this->post->setAuthor_id($_SESSION['userId']);

            $img = $_POST['drawing'];
		
            $fileName = randString(20).'.png'; // La fonction randString est dans le fichier app/helpers.php
            
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $fileData = base64_decode($img);
            // sauvegarde dans le dossier uploads/drawings/
            file_put_contents(__DIR__.'/../../uploads/drawings/'.$fileName, $fileData);

            $this->post->setDrawing_src($fileName);

            $this->post->create();

            redirect('pages/home');
        }

        return view('post/form', $datas);
    }

    public function destroy($id){

        $post = $this->post->find($id);

        if ($post->isAuthor()) {
            $post->delete();
            redirect('pages/home');
        }
    }
}