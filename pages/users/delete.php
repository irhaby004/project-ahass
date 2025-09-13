<?php
    require_once "../../app/Users.php";
    if(isset($_GET['id'])){
    $alt = new App\Users();
    $rows = $alt->hapus($_GET['id']);
    header("location: ../../Users.php");
    }
 ?>