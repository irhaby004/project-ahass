
<?php
    
    require_once "../../app/Kriteria.php";
    if(isset($_GET['id'])){
        $alt = new App\Kriteria();
        $alt->update();
    }else{
        $alt = new App\Kriteria();
        $alt->simpan();
    }
    header("location: ../../Kriteria.php");
 ?>