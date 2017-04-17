<?php
class Triangle extends Shape
{
  private $location1;
  private $location2;
  private $points = [];

  public function __construct(array $coordonnees){
    parent::__construct();
    $this->location1 = new Point;
    $this->location2 = new Point;
    $this->setPoints($coordonnees);
  }

  public function setPoints(array $coordonnees){
    $this->setLocation($coordonnees[0], $coordonnees[1]);
    $this->setLocation1($coordonnees[2], $coordonnees[3]);
    $this->setLocation2($coordonnees[4], $coordonnees[5]);
    //on remplit la propriété $points avec les points ainsi crées
    $this->points = [$this->location, $this->location1, $this->location2];
  }

  public function setLocation1($x, $y){
    $this->location1->moveTo($x, $y);
  }

  public function setLocation2($x, $y){
    $this->location2->moveTo($x, $y);
  }

  public function draw(SvgRenderer $renderer){
    $renderer->drawTriangle(
      $this->points,
      $this->color,
      $this->opacity
    );
  }
}
