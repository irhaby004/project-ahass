<?php

namespace App;
use PDO;
require_once "Koneksi.php";

class Kriteria extends Koneksi{

    public function __construct()
    {
        $call = new Koneksi();
        $this->db = $call->koneksi();
    }

    public function count()
    {
        $sql = "SELECT COUNT(id_kriteria) AS count FROM kriteria"; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    
        $data = [];
        while ($rows = $stmt->fetch()) {
        $data[] = $rows;
        }
       
    return $data;
    }

    public function tampil()
    {
    $sql = "SELECT * FROM kriteria ORDER BY kriteria ASC"; 
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
    $sql = "SELECT * FROM kriteria WHERE id_kriteria = :id"; 
    $stmt = $this->db->prepare($sql);
    $stmt->bindparam(":id", $_GET['id']);
    $stmt->execute();

        $sql = "DELETE FROM kriteria WHERE id_kriteria = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $_GET['id']);
        $stmt->execute();
        header("location: kriteria.php");

    }

    public function update()
    {
	$sql = "SELECT * FROM kriteria WHERE id_kriteria = :id"; 
	$stmt = $this->db->prepare($sql);
	$stmt->bindparam(":id", $_GET['id']);
	$stmt->execute();
   
	   $sql = "UPDATE kriteria SET kriteria = :kode, keterangan = :keterangan, bobot = :bobot  WHERE id_kriteria = :id";
	   $stmt = $this->db->prepare($sql);
	   $stmt -> bindParam(":id", $_GET['id']);
	   $stmt -> bindParam(":kode", $_POST['kriteria']);
	   $stmt -> bindParam(":bobot", $_POST['bobot']);
	   $stmt -> bindParam(":keterangan", $_POST['keterangan']);
	   $stmt->execute();
    }

    public function tambah()
    {
        $sql = "INSERT INTO kriteria VALUES ('',:kode,  :keterangan, :bobot, :jenis)";
        $stmt = $this->db->prepare($sql); 
        $stmt->bindparam(":kode", $_POST['kode']);
        $stmt->bindparam(":keterangan", $_POST['keterangan']);
        $stmt->bindparam(":bobot", $_POST['bobot']);
        $stmt->bindparam(":jenis", $_POST['jenis']);
        $stmt->execute();
        header("location: kriteria.php");

    }

    public function simpan()
    {
        $sql = "INSERT INTO kriteria VALUES ('', :kriteria, :keterangan,:bobot)";
        $stmt = $this->db->prepare($sql); 
        $stmt->bindparam(":kriteria", $_POST['kriteria']);
        $stmt->bindparam(":keterangan", $_POST['keterangan']);
        $stmt->bindparam(":bobot", $_POST['bobot']);
        $stmt->execute();
        header("location: kriteria.php");
    }

    public function get_json($val)
    {
        $sql = "SELECT * FROM kriteria WHERE id_kriteria=:id limit 1"; 
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $val);
        $stmt->execute();
        //$data['data'] = array();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        return json_encode($data);
    }
    
    public function get_category()
    {
        $sql = "SELECT * FROM kategory ORDER BY nama ASC"; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }
}
