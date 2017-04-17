<?php
function chargerClasse($classe){
  include $classe . '.class.php';
}

spl_autoload_register('chargerClasse');
