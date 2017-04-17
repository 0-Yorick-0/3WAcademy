<?php

trait getAndShowInfos
{
  public function getInfos(){
    $infos = array();
    foreach ($this as $key => $value) {
      $infos[$key] = $value;
    }
    return $infos;
  }

  public function showInfos($title, array $infos){

  }
}
?>
