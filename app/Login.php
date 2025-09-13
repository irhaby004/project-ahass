<?php

namespace App;

use PDO;

require_once "Koneksi.php";
class Login extends Koneksi
{


    public function __construct()
    {
        $call = new Koneksi();
        $this->db = $call->koneksi();
    }

    public function login()
{
    $sql = "SELECT * FROM tbl_login WHERE username = :user_nama AND password = md5(:user_pass)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindparam(":user_nama", $_POST['user']);
    $stmt->bindparam(":user_pass", $_POST['pass']);
    $stmt->execute();
    $login = $stmt->fetch();

    if ($stmt->rowcount() == 0) {
        echo '<script>alert("Login Gagal, Periksa Kembali Username dan Password");
            window.location.href = "login.php"</script>';
    } else {
        session_start();
        $_SESSION["ID"] = $login['id_login'];
        $_SESSION["nama"] = $login['username'];
        $_SESSION["namapengguna"] = $login['nama'];
        $_SESSION["status"] = $login['level'];
        $_SESSION["id_alternatif"] = $login['id_alternatif'];

        // Ambil kode dan ahass dari tabel alternatif
        require_once "app/Alternatif.php"; // pastikan path ini benar dari tempat file login kamu dipanggil
        $alt = new \App\Alternatif();
        $altData = $alt->getById($login['id_alternatif']);
        if ($altData) {
            $_SESSION['kode'] = $altData['kode'];
            $_SESSION['ahass'] = $altData['ahass'];
        }

        header("location: index.php");
    }
}

    public function logout()
    {
        session_destroy();
        header("location: login.php");
        exit;
    }
}
