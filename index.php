<!DOCTYPE html>
<html>
<?php 
     require_once "app/Hasil.php";
     
      $page = "dashboard";
      $alternatif = new App\Hasil();
      $a = $alternatif->countalt();
      $hasil = new App\Hasil();
      $b = $hasil->max();
      $c = $hasil->min();
      $d = $hasil->rank();
      include "header.php";
      include "sidebar.php"; 
      // content
      include "content.php";
      include "footer.php";
  ?>
</html>
