<?php
class Circle extends Ellipse
{

  public function __construct($radius){
    parent::__construct();
    $this->setRadius($radius, $radius);
  }
}
