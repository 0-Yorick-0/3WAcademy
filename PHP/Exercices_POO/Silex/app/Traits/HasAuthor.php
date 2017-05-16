<?php

namespace Projet\Traits;


trait HasAuthor{

    protected $author;
    protected $author_id;

    public function getAuthor(){
        return $this->author;
    }

    public function setAuthor($author){
        $this->author = $author;

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

    public function isAuthor(){
        return isLogged() && $this->getAuthor_id() == $_SESSION['userId'];
    }

}

