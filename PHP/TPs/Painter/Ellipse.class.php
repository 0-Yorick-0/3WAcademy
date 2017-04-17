<?php
class Ellipse extends Shape
{
  private $xRadius;
  private $yRadius;

  public function __construct($xradius ='', $yradius =''){
    parent::__construct();
    $this->setRadius($xradius, $yradius);
  }

  public function setRadius($xradius, $yradius){
    $this->xRadius = $xradius;
    $this->yRadius = $yradius;
  }

  public function draw(SvgRenderer $renderer){
    $renderer->drawEllipse(
      $this->location,
      $this->color,
      $this->opacity,
      $this->xRadius,
      $this->yRadius
    );
  }
}
