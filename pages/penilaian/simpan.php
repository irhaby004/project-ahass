<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "../../app/Penilaian.php";
$alt = new App\Penilaian();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debug isi data POST
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    // Hapus exit kalau sudah yakin data masuk
    // exit();

    if (isset($_POST['id_penilaian']) && $_POST['id_penilaian'] !== '') {
        $alt->update($_POST['id_penilaian']);
    } else {
        $alt->create();
    }

    // Redirect setelah simpan berhasil
    header("Location: ../../penilaian.php");
    exit();
}