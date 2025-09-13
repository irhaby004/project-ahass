<?php

namespace App;

use PDO;

class Subkriteria extends Koneksi
{

    public function __construct()
    {
        $call = new Koneksi();
        $this->db = $call->koneksi();
    }

    public function count()
    {
        $sql = "SELECT COUNT(id_sub) AS count FROM sub_kriteria";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }

    public function kriteria()
    {
        $sql = "SELECT * FROM kriteria";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }
    public function tampil($a)
    {
        $sql = "SELECT * FROM sub_kriteria INNER JOIN kategory ON sub_kriteria.id_kat = kategory.id_kategori WHERE id_kriteria = :id ORDER BY id_kategori ASC, nilai ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $a);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }

    public function tampilkrit()
    {
        $sql = "SELECT * FROM kriteria";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }

    public function hapus()
    {
        $sql = "SELECT * FROM sub_kriteria WHERE id_sub = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $_GET['id']);
        $stmt->execute();

        $sql = "DELETE FROM sub_kriteria WHERE id_sub = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $_GET['id']);
        $stmt->execute();
        header("location: subkriteria.php");
    }

    public function update()
    {
        $sql = "SELECT * FROM sub_kriteria WHERE id_sub = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $_GET['id']);
        $stmt->execute();

        $sql = "UPDATE sub_kriteria SET keterangan = :keterangan ,nilai = :nilai, id_kriteria = :kode, id_kat = :kat WHERE id_sub = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $_GET['id']);
        $stmt->bindparam(":kode", $_POST['kriteria']);
        $stmt->bindparam(":keterangan", $_POST['keterangan']);
        $stmt->bindparam(":nilai", $_POST['nilai']);
        $stmt->bindparam(":kat", $_POST['kategori']);
        $stmt->execute();
    }

    public function simpan()
    {
        $sql = "INSERT INTO sub_kriteria VALUES ('', :keterangan, :nilai,:kode,:kat)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":kode", $_POST['kriteria']);
        $stmt->bindparam(":keterangan", $_POST['keterangan']);
        $stmt->bindparam(":keterangan", $_POST['keterangan']);
        $stmt->bindparam(":nilai", $_POST['nilai']);
        $stmt->bindparam(":kat", $_POST['kategori']);
        $stmt->execute();
        header("location: subkriteria.php");
    }

    public function get_json($val)
    {
        $sql = "SELECT * FROM sub_kriteria WHERE id_sub=:id limit 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $val);
        $stmt->execute();
        //$data['data'] = array();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($data);
    }
}
