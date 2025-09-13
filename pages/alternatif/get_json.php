<?php 
      require_once "../../app/Alternatif.php";
     
      $alt = new App\Alternatif();
      $rows = $alt->get_json($_GET['id']);
      echo $rows;
  ?>