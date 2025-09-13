<?php 
      require_once "../../app/Kriteria.php";
     
      $alt = new App\Kriteria();
      $rows = $alt->get_json($_GET['id']);
      echo $rows;
  ?>