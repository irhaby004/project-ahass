<?php

namespace App;

use PDO;

require_once "Koneksi.php";

class Users extends Koneksi
{


    public function __construct()
    {
        $call = new Koneksi();
        $this->db = $call->koneksi();
    }


    public function tampil()
    {
        $sql = "SELECT * FROM tbl_login";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }

    public function tampil_logs($start = 0, $end = 0)
    {
        if ($start and $end) {
            $sql = "SELECT * FROM logs WHERE DATE(tanggal) >= :start AND DATE(tanggal) <=:end ORDER BY tanggal DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":start", $start);
            $stmt->bindparam(":end", $end);
            $stmt->execute();

            $data = [];
            while ($rows = $stmt->fetch()) {
                $data[] = $rows;
            }
            return $data;
        } else {
            $sql = "SELECT * FROM logs ORDER BY tanggal DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $data = [];
            while ($rows = $stmt->fetch()) {
                $data[] = $rows;
            }
            return $data;
        }
    }

    public function logs($a)
    {
        if ($_GET['id'] == TRUE) {
            $sql = "SELECT * From tbl_login WHERE id_login = :id";
            //query mencari datanya
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":id", $_GET['id_login']); //statement bisa diganti apa aja
            $stmt->execute();
            $login = $stmt->fetch();
            if ($stmt->rowcount() == 0) {
                echo '<script>alert("Failed");</script>'; //tidak ada datanya
            } else {
                $sql = "INSERT INTO logs (id_log, keterangan, id_login) VALUES ('',:user :txt, :id_login)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":txt", $a);
                $stmt->bindparam(":id_login", $login['id_login']);
                $stmt->bindparam(":user", $login['username']);
                $stmt->execute();
            }
        } else {
            $sql = "INSERT INTO logs (id_log, keterangan, id_login) VALUES ('',:user :txt :kode , :id_login)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":kode", $_POST['kode']);
            $stmt->bindparam(":txt", $a);
            $stmt->bindparam(":id_login", $_POST['id_login']);
            $stmt->bindparam(":user", $_POST['user']);
            $stmt->execute();
        }
    }
    public function hapus()
    {
        $sql = "SELECT * FROM tbl_login WHERE id_login = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $_GET['id']);
        $stmt->execute();

        $sql = "DELETE FROM tbl_login WHERE id_login = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $_GET['id']);
        $stmt->execute();
        header("location: user.php");
    }

    public function update()
    {
        $sql = "SELECT * FROM tbl_login WHERE id_login=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $_GET['id']);
        $stmt->execute();

        //CEK FIELD PASSWORD TIDAK NULL
        if ($_POST['pass'] == NULL) {
            $sql = "UPDATE tbl_login SET nama=:nama, username=:username, id_alternatif=:alternatif WHERE id_login = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $_GET['id']);
            $stmt->bindParam(":username", $_POST['username']);
            $stmt->bindParam(":nama", $_POST['nama']);
            $stmt->bindparam(":alternatif", $_POST['alternatif']);
            $stmt->execute();
        } else {
            $sql = "UPDATE tbl_login SET nama=:nama, username=:username, password = md5(:password), id_alternatif=:alternatif WHERE id_login = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $_GET['id']);
            $stmt->bindParam(":username", $_POST['username']);
            $stmt->bindParam(":password", $_POST['pass']);
            $stmt->bindParam(":nama", $_POST['nama']);
            $stmt->bindparam(":alternatif", $_POST['alternatif']);
            $stmt->execute();
        }
    }

    public function simpan()
{
    // Debug: Tampilkan data POST
    // var_dump($_POST);
    // Hapus exit jika sudah yakin data benar
    // exit;

    $sql = "INSERT INTO tbl_login (username, nama, password, level, id_alternatif)
            VALUES (:username, :nama, md5(:pass), :level, :alternatif)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":username", $_POST['username']);
    $stmt->bindParam(":nama", $_POST['nama']);
    $stmt->bindParam(":pass", $_POST['pass']);
    $stmt->bindParam(":level", $_POST['level']);
    $stmt->bindParam(":alternatif", $_POST['alternatif']);
    $stmt->execute();
    header("location: user.php");
}

    public function get_json($val)
    {
        $sql = "SELECT * FROM tbl_login WHERE id_login=:id limit 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $val);
        $stmt->execute();
        //$data['data'] = array();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($data);
    }

    public function get_alternatif()
    {
        $sql = "SELECT * FROM alternatif ORDER BY ahass ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }
}
