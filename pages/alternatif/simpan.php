
<?php
    
    require_once "../../app/Alternatif.php";
    if(isset($_GET['id'])){
        $alt = new App\Alternatif();
        $alt->update();
    }else{
        $alt = new App\Alternatif();
        $alt->simpan();
    }
    header("location: ../../Alternatif.php");
 ?>