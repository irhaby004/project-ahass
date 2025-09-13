<?php

    require_once "../../app/Alternatif.php";
    if(isset($_GET['id'])){
    $alt = new App\Alternatif();
    $rows = $alt->hapus($_GET['id']);
    header("location: ../../Alternatif.php");
    }
 ?>