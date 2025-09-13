<?php
    require_once "../../app/Kriteria.php";
    require_once "../../app/Subkriteria.php";
    if(isset($_GET['id'])){
    $alt = new App\Subkriteria();
    $rows = $alt->hapus($_GET['id']);
    header("location: ../../Subkriteria.php");
    }
 ?>