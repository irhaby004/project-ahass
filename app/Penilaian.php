<?php

namespace App;

use PDO;
require_once "Koneksi.php";

class Penilaian extends Koneksi
{
    private $db; // ✅ Hindari dynamic property

    public function __construct()
    {
        $call = new Koneksi();
        $this->db = $call->koneksi(); // pastikan koneksi() mengembalikan objek PDO
    }

    
public function create()
{
    $sql = "INSERT INTO penilaian (id_alternatif, kode, ahass, c1, c2, c3, c4, c5)
            VALUES (:id_alternatif, :kode, :ahass, :c1, :c2, :c3, :c4, :c5)";
    
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id_alternatif', $_POST['id_alternatif']);
    $stmt->bindParam(':kode', $_POST['kode']);
    $stmt->bindParam(':ahass', $_POST['ahass']);
    $stmt->bindParam(':c1', $_POST['c1']);
    $stmt->bindParam(':c2', $_POST['c2']);
    $stmt->bindParam(':c3', $_POST['c3']);
    $stmt->bindParam(':c4', $_POST['c4']);
    $stmt->bindParam(':c5', $_POST['c5']);
    
    $stmt->execute();
}


    public function update($id)
{
    $sql = "UPDATE penilaian SET 
                id_alternatif = :id_alternatif,
                c1 = :c1,
                c2 = :c2,
                c3 = :c3,
                c4 = :c4,
                c5 = :c5
            WHERE id_penilaian = :id_penilaian";

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":id_penilaian", $id);
    $stmt->bindParam(":id_alternatif", $_POST['id_alternatif']);
    $stmt->bindParam(":c1", $_POST['c1']);
    $stmt->bindParam(":c2", $_POST['c2']);
    $stmt->bindParam(":c3", $_POST['c3']);
    $stmt->bindParam(":c4", $_POST['c4']);
    $stmt->bindParam(":c5", $_POST['c5']);
    $stmt->execute();
}


//     public function tampil()
// {
//     $status = $_SESSION['status'] ?? null;
//     $idAlternatif = $_SESSION['id_alternatif'] ?? null;

//     // Jika User → tampilkan data sesuai id_alternatif
//     if ($status === 'User' && $idAlternatif) {
//         $sql = "SELECT * FROM penilaian 
//                 INNER JOIN alternatif ON penilaian.id_alternatif = alternatif.id 
//                 WHERE penilaian.id_alternatif = :id_alternatif";
//         $stmt = $this->db->prepare($sql);
//         $stmt->bindParam(':id_alternatif', $idAlternatif);
//     } 
//     // Jika Admin → tampilkan semua data
//     else {
//         $sql = "SELECT * FROM penilaian 
//                 INNER JOIN alternatif ON penilaian.id_alternatif = alternatif.id";
//         $stmt = $this->db->prepare($sql);
//     }

//     $stmt->execute();

//     $data = [];
//     while ($row = $stmt->fetch()) {
//         $data[] = $row;
//     }

//     return $data;
// }
public function tampil()
{
    $status = $_SESSION['status'] ?? null;
    $idAlternatif = $_SESSION['id_alternatif'] ?? null;

    if ($status === 'User' && $idAlternatif) {
        // USER → Join alternatif untuk ambil nama
        $sql = "SELECT 
                    penilaian.id_penilaian,
                    penilaian.id_alternatif,
                    penilaian.c1,
                    penilaian.c2,
                    penilaian.c3,
                    penilaian.c4,
                    penilaian.c5,
                    alternatif.kode,
                    alternatif.ahass
                FROM penilaian 
                INNER JOIN alternatif ON penilaian.id_alternatif = alternatif.id
                WHERE penilaian.id_alternatif = :id_alternatif";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_alternatif', $idAlternatif);
    } else {
        // ADMIN → Ambil dari penilaian saja, TIDAK join alternatif
        $sql = "SELECT * FROM penilaian";
        $stmt = $this->db->prepare($sql);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



// public function tampil()
//     {
//         $sql = "SELECT * FROM alternatif";
//         $stmt = $this->db->prepare($sql);
//         $stmt->execute();

//         $data = [];
//         while ($rows = $stmt->fetch()) {
//             $data[] = $rows;
//         }
//         return $data;
//     }

    public function get_tampil()
    {
        $sql = "SELECT * FROM alternatif WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $_SESSION['id_alternatif']);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }

    public function get_json($id)
{
   $sql = "SELECT p.id_penilaian AS id_penilaian, a.id AS id_alternatif, a.kode, a.ahass, p.c1, p.c2, p.c3, p.c4, p.c5
        FROM penilaian p 
        JOIN alternatif a ON a.id = p.id_alternatif 
        WHERE p.id_penilaian = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}   


public function getById($id)
{
    $stmt = $this->db->prepare("SELECT * FROM alternatif WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}



}

?>
