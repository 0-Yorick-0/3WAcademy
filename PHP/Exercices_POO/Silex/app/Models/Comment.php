<?php

namespace Projet\Models;

use Projet\Traits\HasAuthor;

use System\Model;

use Projet\Models\User;

use Projet\Models\Post;

class Comment extends Model{

    use HasAuthor;

    const TABLE = 'comments';

    protected $id;
    protected $post_id;
    protected $content;
    protected $created_at;
    protected $updated_at;
    protected $post;

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
    public function getPost_id()
    {
        return $this->author_id;
    }

    /**
     * @param mixed $author_id
     */
    public function setPost_id($post_id)
    {
        $this->post_id= $post_id;
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

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    public function getPostCommentsWithAutor($post_id){
        
        $comments = $this->db->query('SELECT c.*, u.name, u.id
                    FROM comments c
                    INNER JOIN users u
                    ON c.author_id = u.id
                    WHERE post_id = ?
                    ORDER BY created_at DESC', [$post_id]);

                
        foreach($comments as $key => $value){
            $datas = [
                'name' => $value['name']
            ];
            $user = new User($datas);
            //il est nécessaire de modifier le tableau originel et non pas son alias pour avoir un effet de bord
            $comments[$key]['author'] = new User($datas);
            unset($value['name']);
        }
        //permet de récupérer un tableau d'objets plus facile à exploiter qu'un tableau à deux dimension renvoyé par fetchAll
        return $this->getCollection($comments);
    }

}