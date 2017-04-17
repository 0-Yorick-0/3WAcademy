<?php
//inclusion d'un autoload
include 'function.php';

// // inclusion de la class qui permet de gérer la forme géométrique.
// include 'Shape.class.php';
// // inclusion de la class permettant de gérer les points qui permettront de tracer une forme
// include 'Point.class.php';
// // Inclusion des classes représentant les formes (rectangle cercle etc....)
// include 'Rectangle.class.php';
// include 'Square.class.php';
// include 'Circle.class.php';
// include 'SvgRenderer.class.php';
// include 'Program.class.php';

/**************************************************************************************************
 *******************************               CODE PRINCIPAL
 **************************************************************************************************/
$program  = new Program();      //  ->  Instance du programme
$renderer = new SvgRenderer();  //  ->  Instance du moteur SVG
$program->run($renderer);       //  ->  Exécution du programme


include 'index.phtml';          //  ->  Inclusion du fichier PHTML !!
