<!DOCTYPE html>
<html>
<?php 
      
      require_once "app/Hasil.php";

      $hasil = new App\Hasil();
      //$alt = $hasil->hitung(1);
      //$alt = $hasil->get_bobot();
      //$point = $hasil->hitung(1);
      //$alt = $hasil->getMMULT();
      //$alt = $hasil->nullEF(35);
      $alt = $hasil->EF(1);
      //$alt = $hasil->LF(1);
      //$alt = $hasil->preferensi();
      //$alt = $hasil->MMULT($val[14],1);
      //$alt = $hasil->getMMULT($point[15]);
      //$alt = $hasil->rank();
      print_r($alt);
      
  ?>
</html>
