<?php
namespace Projet\Models;

use Projet\Traits\HasAuthor;

use System\Model;

use Projet\Models\User;

class Post extends Model{

    use HasAuthor;

    const TABLE = 'posts';

    protected $id;
    protected $title;
    protected $content;
    protected $created_at;
    protected $updated_at;
    protected $drawing_src;
    //$author sera une proprieté de la classe User, qui correspondra à l'auteur du post

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
    public function getDrawing_src($filename = false)
    {   //on renverra soit le nom brut du fichier, soit son adresse complète
        if($filename){
            return $this->drawing_src;
        }// on ajoute la date de maj, afin d'éviter des souci avec la mise en cache, qui peut ne pas faire la maj d'affichage'
        return url('uploads/drawings/' . $this->drawing_src.'?update='. $this->updated_at);
    }

    /**
     * @param mixed $drawing_src
     */
    public function setDrawing_src($drawing_src)
    {
        $this->drawing_src = $drawing_src;
        return $this;
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
        //permet de récupérer un tableau d'objets plus facile à exploiter qu'un tableau à deux dimension renvoyé par fetchAll
        return $this->getCollection($posts);
    }

    public function getOneFromAuthor($id){

        $req = $this->db->queryOne('SELECT p.*, u.name, u.email, u.birthday
                                FROM posts p
                                INNER JOIN users u
                                ON p.author_id = u.id
                                WHERE p.id = ?', [$id]);


        $datas = [
            'name' => $req['name'],
            'email' => $req['email'],
            'birthday' => $req['birthday']
            ];

        $req['author'] = new User($datas);

        

        return $this->getInstance($req);
    }

    public function getAllFromAuthor($id){
        $posts = $this->db->query('SELECT *
                    FROM posts 
                    WHERE author_id = ?
                    ORDER BY created_at DESC', [$id]);

        return $this->getCollection($posts);
        
    }

}
