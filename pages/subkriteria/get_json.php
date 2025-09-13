<?php 
      require_once "../../app/Kriteria.php";
      require_once "../../app/Subkriteria.php";
     
      $alt = new App\Subkriteria();
      $rows = $alt->get_json($_GET['id']);
      echo $rows;
  ?>