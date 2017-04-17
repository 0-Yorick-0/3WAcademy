<?php

class Program
{
    public function run(SvgRenderer $renderer)
    {
        /**
         * Ci-dessous L'initialisation d'un rectangle.
         */
        // Code ici...
        $blue_rect = new Rectangle(200, 130);
        $blue_rect->setColor('blue');
        $blue_rect->setLocation(50, 80);

        $white_rect = new Rectangle(200, 130);
        $white_rect->setColor('white');
        $white_rect->setLocation(180, 80);

        $red_rect = new Rectangle(200, 130);
        $red_rect->setColor('red');
        $red_rect->setLocation(310, 80);


        /**
         * Ci-dessous L'initialisation d'une ellipse.
         */
        // Code ici...
        $ellipse = new Ellipse(100, 50);
        $ellipse->setColor('grey');
        $ellipse->setLocation(250, 200);
        /**
         * Ci-dessous L'initialisation d'un carré.
         */
        // Code ici...
        $square = new Square(300);
        $square->setColor('yellow');
        $square->setLocation(500, 80);
        /**
         * Ci-dessous L'initialisation d'un cercle.
         */
        // Code ici...
        $circle = new Circle(50);
        $circle->setColor('black');
        $circle->setLocation(650, 240);
        /**
         * Ci-dessous L'initialisation d'un triangle.
         */
        // Code ici...
        $triangle = new Triangle([50, 200, 90, 250, 40, 260]);
        $triangle->setColor('green');
        //  Ajout des différents objets géométriques au moteur graphique.
        $renderer->addShape($blue_rect);
        $renderer->addShape($white_rect);
        $renderer->addShape($red_rect);
        $renderer->addShape($square);
        $renderer->addShape($circle);
        $renderer->addShape($triangle);
        $renderer->addShape($ellipse);
        //  Exécution du moteur graphique.
        $renderer->run();
    }
}
