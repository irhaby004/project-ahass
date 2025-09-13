<?php

namespace App;
use PDO;
class Koneksi{

    function Koneksi()
    {
        $db = new PDO("mysql:host=localhost;dbname=ahass","root", "");
        return $db;
    } 
}
?>