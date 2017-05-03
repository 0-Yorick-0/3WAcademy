<?php
class Perso{

    protected $name;
    protected $pv;
    protected $force;

    public function __construct($name, $pv, $force){
        $this->setName($name);
        $this->setPv($pv);
        $this->setForce($force);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        if (ctype_alnum($name)){
            $this->name = $name;
        }
    }

    /**
     * @return mixed
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * @param mixed $pv
     */
    public function setPv($pv)
    {
        if (is_int($pv)){
            $this->pv = $pv;
        }
    }

    /**
     * @return mixed
     */
    public function getForce()
    {
        return $this->force;
    }

    /**
     * @param mixed $force
     */
    public function setForce($force)
    {
        if (is_int($force)){
            $this->force = $force;
        }
    }

    public function frapper(Perso $perso){
        $degats = $this->getForce();

        $perso->pv -= $degats;

        if($perso->pv <= 0){
            throw new Exception('Le vainqueur est ' . $this->name . '.');
        }

        //on retourne l'objet pour pouvoir chaîner les méthodes
        return $this;
    }
}