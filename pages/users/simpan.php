
<?php
    require_once "../../app/Users.php";
    if(isset($_GET['id'])){
        $alt = new App\Users();
        $alt->update();
    }else{
        $alt = new App\Users();
        $alt->simpan();
    }
    header("location: ../../Users.php");
 ?>