<!DOCTYPE html>
<html>
<?php 
      
      require_once "app/Hasil.php";

      $hasil = new App\Hasil();
      //$set1 = $hasil->hitung(1);
      //$alt = $hasil->nullEF(38);
      $hasil->hapus();
      //$alt = $hasil->EF(1);
      $alt = $hasil->hasil();
      //$alt = $hasil->LF();
      //print_r($alt);
      
      $rows = $hasil->ranking();

      $page = 'hasil';
      include "header.php";
      include "sidebar.php"; 
      // content
      include "pages/hasil/index.php";
      include "footer.php";
      
  ?>
</html>
