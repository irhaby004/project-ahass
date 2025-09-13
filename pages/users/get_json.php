<?php 
      require_once "../../app/Users.php";
     
      $alt = new App\Users();
      $rows = $alt->get_json($_GET['id']);
      echo $rows;
  ?>