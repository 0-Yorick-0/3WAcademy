<?php
class Rectangle extends Shape
{
  protected $height;
  protected $width;

  public function __construct($height ='', $width = ''){
    parent::__construct();
    $this->setSize($height, $width);
  }

  public function draw(SvgRenderer $renderer){
    //le paramètre Point $point est ici représenté par location, qui est défini lors de l'instanciation de la classe Rectangle
    $renderer->drawRectangle(
      $this->location,
      $this->color,
      $this->opacity,
      $this->width,
      $this->height
    );
  }

  public function setSize($height, $width){
    $this->height = $height;
    $this->width = $width;
  }
}
