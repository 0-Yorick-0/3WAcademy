<?php
class Square extends Rectangle
{

  public function __construct($height){
    parent::__construct();
    $this->setSize($height, $height);
  }

}
