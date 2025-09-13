
<?php
    require_once "../../app/Kriteria.php";
    require_once "../../app/Subkriteria.php";
    if(isset($_GET['id'])){
        $alt = new App\Subkriteria();
        $alt->update();
    }else{
        $alt = new App\Subkriteria();
        $alt->simpan();
    }
    header("location: ../../subkriteria.php");
 ?>