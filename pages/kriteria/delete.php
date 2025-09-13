<?php

    require_once "../../app/Kriteria.php";
    if(isset($_GET['id'])){
    $alt = new App\Kriteria();
    $rows = $alt->hapus($_GET['id_kriteria']);
    header("location: ../../Kriteria.php");
    }
 ?>