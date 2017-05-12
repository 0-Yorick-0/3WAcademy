<?php
namespace Projet\Models;

use System\Model;

use Projet\Models\User;

class Post extends Model{

    const TABLE = 'posts';

    protected $id;
    protected $title;
    protected $content;
    protected $author_id;
    protected $created_at;
    protected $drawing_src;
    //$author sera une proprieté de la classe User, qui correspondra à l'auteur du post
    protected $author;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor_id()
    {
        return $this->author_id;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthor_id($author_id)
    {
        $this->author_id= $author_id;
        return $this;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getDrawing_src()
    {
        return url('uploads/drawings/' . $this->drawing_src);
    }

    /**
     * @param mixed $drawing_src
     */
    public function setDrawing_src($drawing_src)
    {
        $this->drawing_src = $drawing_src;
        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getAllWithAuthor(){
        $posts = $this->db->query('SELECT p.*, u.name, u.email, u.birthday
                    FROM posts p
                    INNER JOIN users u
                    ON p.author_id = u.id
                    ORDER BY created_at DESC');

                
        foreach($posts as $key => $value){
            $datas = [
            'name' => $value['name'],
            'email' => $value['email'],
            'birthday' => $value['birthday']
            ];
            $user = new User($datas);
            //il est nécessaire de modifier le tableau originel et non pas son alias pour avoir un effet de bord
            $posts[$key]['author'] = new User($datas);
            unset($value['name']);
            unset($value['email']);
            unset($value['birthday']);
        }

        return $this->getCollection($posts);
    }

    public function isAuthor(){
        return isLogged() && $this->getAuthor_id() == $_SESSION['userId'];
    }
}
