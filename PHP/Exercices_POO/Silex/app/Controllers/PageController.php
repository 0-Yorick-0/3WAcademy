<?php
// app/Controllers/PageController.php

namespace Projet\Controllers;

class PageController {

  // @get index.php/page/{slug}
  public function show($slug){

    $template = 'pages/' . $slug;

    include(__DIR__.'/../../ressources/views/layout.phtml');

    return ""; // Cette ligne de code sera remplacé ultérieurement et ne sert que de test.

  }

}
