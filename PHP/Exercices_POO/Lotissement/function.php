<?php

  function loadClass($class){
    require "$class.class.php";
  }

  function loadTrait($trait){
    require "$trait.trait.php";
  }

  spl_autoload_register('loadClass');
  spl_autoload_register('loadTrait');
