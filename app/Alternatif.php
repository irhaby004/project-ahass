<?php

namespace App;
use PDO;
require_once "Koneksi.php";

class Alternatif extends Koneksi{

   
    public function __construct()
    {
        $call = new Koneksi();
        $this->db = $call->koneksi();
    }

    

    public function tampil()
    {
    $sql = "SELECT * FROM alternatif INNER JOIN kategory ON alternatif.id_kategori = kategory.id_kategori"; 
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($rows = $stmt->fetch()) {
    $data[] = $rows;
    }
    return $data;
    }
    
    public function hapus($val)
    {
    $sql = "SELECT * FROM alternatif WHERE id = :id"; 
    $stmt = $this->db->prepare($sql);
    $stmt->bindparam(":id", $val);
    $stmt->execute();

        $sql = "DELETE FROM alternatif WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $val);
        $stmt->execute();

    }

    public function update()
    {
	$sql = "SELECT * FROM alternatif WHERE id = :id"; 
	$stmt = $this->db->prepare($sql);
	$stmt->bindparam(":id", $_GET['id']);
	$stmt->execute();
	   $sql = "UPDATE alternatif SET kode = :kode, ahass = :ahass, t1 = :t1, t2 = :t2, t3 = :t3, t5 = :t5, id_kategori = :kategori  WHERE id = :id";
	   $stmt = $this->db->prepare($sql);
	   $stmt -> bindParam(":id", $_GET['id']);
	   $stmt -> bindParam(":kode", $_POST['kode']);
	   $stmt -> bindParam(":ahass", $_POST['ahass']);
	   $stmt -> bindParam(":t1", $_POST['t1']);
	   $stmt -> bindParam(":t2", $_POST['t2']);
	   $stmt -> bindParam(":t3", $_POST['t3']);
	   $stmt -> bindParam(":t5", $_POST['t5']);
	   $stmt -> bindParam(":kategori", $_POST['kategori']);
	   $stmt->execute();
    }

    public function tambah()
    {
        $sql = "INSERT INTO alternatif VALUES ('',:nama,  :no_kk, :c1, :c2, :c3, :c4, :c5)";
        $stmt = $this->db->prepare($sql); 
        $stmt->bindparam(":nama", $_POST['kode']);
        $stmt->bindparam(":keterangan", $_POST['keterangan']);
        $stmt->bindparam(":bobot", $_POST['bobot']);
        $stmt->bindparam(":jenis", $_POST['jenis']);
        $stmt->execute();
        header("location: kriteria.php");

    }

    public function simpan()
    {
        $sql = "INSERT INTO alternatif 
                (kode, ahass, t1, t2, t3, t5, id_kategori)
                VALUES 
                (:kode, :ahass, :t1, :t2, :t3, :t5, :id_kategori)";
        
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":kode", $_POST['kode']);
        $stmt->bindParam(":ahass", $_POST['ahass']);
        $stmt->bindParam(":t1", $_POST['t1']);  // Permintaan Pasar
        $stmt->bindParam(":t2", $_POST['t2']);  // Harga Jual
        $stmt->bindParam(":t3", $_POST['t3']);  // Target SA Semester Lalu
        $stmt->bindParam(":t5", $_POST['t5']);  // Target Omset
        $stmt->bindParam(":id_kategori", $_POST['kat']); // Kategori

        $stmt->execute();
    }


    public function get_json($val)
    {
        $sql = "SELECT * FROM alternatif WHERE id=:id limit 1"; 
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
    public function getById($id)
{
    $sql = "SELECT * FROM alternatif WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}

?>