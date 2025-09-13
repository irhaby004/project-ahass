<?php

namespace App;

use PDO;

require_once "Koneksi.php";

class Hasil extends Koneksi
{

    public function __construct() //1
    {
        $call = new Koneksi();
        $this->db = $call->koneksi();
    }

    public function countalt() //2
    {
        $sql = "SELECT COUNT(DISTINCT id_alternatif) AS count FROM penilaian";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetch();
        return $data;
    }

    public function count() //3
    {
        $sql = "SELECT MAX(id_alternatif) AS count FROM penilaian";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }

    public function spk($id) //4
    {
        $sql = "SELECT 
                    p.c1, p.c2, p.c3, p.c4, p.c5, 
                    a.t1, a.t2, a.t3, a.t5, 
                    a.ahass, a.id, 
                    k.nama
                FROM penilaian p 
                INNER JOIN alternatif a ON p.id_alternatif = a.id 
                INNER JOIN kategory k ON a.id_kategori = k.id_kategori
                WHERE p.id_alternatif = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }

    public function max() //5
    {
        $sql = "SELECT MAX(nilai) AS MAX FROM hasil";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        while ($rows = $stmt->fetch()) {
            $data = $rows;
        }
        return $data;
    }

    public function rank() //6
    {
        $sql = "SELECT * FROM `hasil`, alternatif WHERE hasil.id_alternatif=alternatif.id ORDER BY nilai DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while ($rows = $stmt->fetch()) {
            $data = $rows;
        }
        return $data;
    }

    public function min() //7
    {
        $sql = "SELECT MIN(nilai) AS MIN FROM hasil";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        while ($rows = $stmt->fetch()) {
            $data = $rows;
        }
        return $data;
    }

    public function get_bobot() //8
    {
        $sql = "SELECT bobot FROM kriteria ORDER BY `id_kriteria` ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $out = array();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        $out[] = 'null';
        foreach ($data as $rows) {
            $out[] = $rows[0];
        }
        return $out;
    }

    public function MMULT($array1 = array(), $val = 0) //9
    {
        $hasil = new Hasil();
        $bobot = $hasil->get_bobot();
        $data2 = array();
        $data = 0;

        $jml_kriteria = count($bobot) - 1;

        for ($i = 1; $i <= $jml_kriteria; $i++) {
            $nilai = isset($array1[$i]) ? $array1[$i] : 0;
            $nilai = ($nilai > 0) ? 1 : 0;

            $newdata = $nilai * $bobot[$i];
            $data2[] = $newdata;
            $data += $newdata;
        }

        return ($val == 0) ? $data : $bobot;
    }

    public function hitung($val = 0)
    {
        $no1 = 1;
        $data = array(array());
        $arraykey = 0;
        $Hasil = new Hasil();
        $a = $Hasil->count();

        foreach ($a as $row) {
            $b = $row['count'];
        }

        do {
            $hasil = new Hasil();
            $roww = $hasil->spk($no1);
            if ($roww == NULL) {
                goto skip;
            }
            foreach ($roww as $rows) {
                // Selection
                $unit = $rows['c1'];
                $mekanik = $rows['c2'];
                $sales = $rows['c3'];
                $event = $rows['c4'];
                $buka_ue = $rows['c5'];
                $alternatif = $rows['id'];
                $altname = $rows['ahass'];

                // Ganti target 0 jadi 1 untuk hindari division by zero
                $t1 = $rows['t1'] == 0 ? 1 : $rows['t1'];
                $t3 = $rows['t3'] == 0 ? 1 : $rows['t3'];
                $t5 = $rows['t5'] == 0 ? 1 : $rows['t5'];

                $target3 = round((($sales - $t3) / $t3) * 100, 0);
                $target2 = $mekanik - $rows['t2'];

                $persen_unit = round(($unit / $t1) * 100, 0);
                if ($persen_unit > 105) {
                    $nilai1 = 8;
                    $fault1 = 40;
                } elseif ($persen_unit > 100) {
                    $nilai1 = 7;
                    $fault1 = 30;
                } elseif ($persen_unit > 95) {
                    $nilai1 = 6;
                    $fault1 = 20;
                } elseif ($persen_unit > 90) {
                    $nilai1 = 5;
                    $fault1 = 15;
                } elseif ($persen_unit > 85) {
                    $nilai1 = 4;
                    $fault1 = 10;
                } elseif ($persen_unit > 80) {
                    $nilai1 = 3;
                    $fault1 = 5;
                } elseif ($persen_unit > 70) {
                    $nilai1 = 2;
                    $fault1 = 0;
                } else {
                    $nilai1 = 1;
                    $fault1 = -10;
                }

                if ($target2 >= 2) {
                    $nilai2 = 5;
                    $fault2 = 30;
                } elseif ($target2 == 1) {
                    $nilai2 = 4;
                    $fault2 = 25;
                } elseif ($target2 == 0) {
                    $nilai2 = 3;
                    $fault2 = 20;
                } elseif ($target2 == -1) {
                    $nilai2 = 2;
                    $fault2 = 0;
                } else {
                    $nilai2 = 1;
                    $fault2 = -10;
                }

                if ($rows['nama'] == 'A') {
                    if ($target3 >= 13) {
                        $nilai3 = 5;
                        $fault3 = 25;
                    } elseif ($target3 >= 10) {
                        $nilai3 = 4;
                        $fault3 = 20;
                    } elseif ($target3 >= 7) {
                        $nilai3 = 3;
                        $fault3 = 15;
                    } elseif ($target3 >= 4) {
                        $nilai3 = 2;
                        $fault3 = 10;
                    } elseif ($target3 >= 1) {
                        $nilai3 = 1;
                        $fault3 = 5;
                    } else {
                        $nilai3 = 0;
                        $fault3 = 0;
                    }
                } elseif ($rows['nama'] == 'B') {
                    if ($target3 >= 17) {
                        $nilai3 = 5;
                        $fault3 = 25;
                    } elseif ($target3 >= 13) {
                        $nilai3 = 4;
                        $fault3 = 20;
                    } elseif ($target3 >= 9) {
                        $nilai3 = 3;
                        $fault3 = 15;
                    } elseif ($target3 >= 7) {
                        $nilai3 = 2;
                        $fault3 = 10;
                    } elseif ($target3 >= 1) {
                        $nilai3 = 1;
                        $fault3 = 5;
                    } else {
                        $nilai3 = 0;
                        $fault3 = 0;
                    }
                } else {
                    if ($target3 >= 25) {
                        $nilai3 = 5;
                        $fault3 = 25;
                    } elseif ($target3 >= 19) {
                        $nilai3 = 4;
                        $fault3 = 20;
                    } elseif ($target3 >= 13) {
                        $nilai3 = 3;
                        $fault3 = 15;
                    } elseif ($target3 >= 7) {
                        $nilai3 = 2;
                        $fault3 = 10;
                    } elseif ($target3 >= 1) {
                        $nilai3 = 1;
                        $fault3 = 5;
                    } else {
                        $nilai3 = 0;
                        $fault3 = 0;
                    }
                }

                if ($event > 10) {
                    $nilai4 = 3;
                    $fault4 = 20;
                } elseif ($event > 1) {
                    $nilai4 = 2;
                    $fault4 = 10;
                } else {
                    $nilai4 = 1;
                    $fault4 = 0;
                }

                if ($buka_ue >= $t5 + 3) {
                    $nilai5 = 5;
                    $fault5 = 15;
                } elseif ($buka_ue >= $t5 + 2) {
                    $nilai5 = 4;
                    $fault5 = 10;
                } elseif ($buka_ue >= $t5) {
                    $nilai5 = 3;
                    $fault5 = 5;
                } elseif ($buka_ue == $t5 - 1) {
                    $nilai5 = 2;
                    $fault5 = 0;
                } else {
                    $nilai5 = 1;
                    $fault5 = -5;
                }
            }

            if ($nilai1 == NULL) {
                goto skip;
            }

            $data[$arraykey][0] = $altname;
            if ($val == 0) {
                for ($i = 1; $i <= 5; $i++) {
                    $data[$arraykey][$i] = ${'nilai' . $i};
                }
            } else {
                for ($i = 1; $i <= 5; $i++) {
                    $data[$arraykey][$i] = ${'fault' . $i};
                }
            }
            $data[$arraykey][6] = $alternatif;
            $data[$arraykey][7] = 'A' . $alternatif;

            $arraykey++;
            skip:
            $nilai1 = null;
            $no1++;
        } while ($no1 <= $b);

        return $data;
    }

    public function derajat($val = array())
    {
        //Derajat Preferensi
        $data = array(array());
        $data2 = array(array());
        $arraykey = 0;
        $hasil = new Hasil();
        $derajat = $hasil->hitung(1);
        if ($val) {
            foreach ($derajat as $set1) {
                foreach ($derajat as $set2) {
                    if ($set1[6] != $val[6]) {
                        goto skip;
                    } else {
                        $data2[$arraykey]['id'] = $set1[6];
                        $data2[$arraykey][6] = 'A' . $set1[6] . 'xA' . $set2[6];
                        if ($set1[6] >= $set2[6]) {
                            for ($i = 1; $i <= 5; $i++) {
                                $data2[$arraykey][$i] = $set1[$i] - $set2[$i];
                            }
                        } else {
                            for ($i = 1; $i <= 5; $i++) {
                                $data2[$arraykey][$i] = $set2[$i] - $set1[$i];
                            }
                        }
                    }
                    $arraykey++;
                    skip:
                }
            }
        } else {
            $arraykey = 0;
            foreach ($derajat as $set1) {
                foreach ($derajat as $set2) {
                    if ($set1[6] == $set2[6]) {
                        goto skip2;
                    } else {
                        $data[$arraykey]['id'] = $set1[6];
                        $data[$arraykey][6] = 'A' . $set1[6] . 'xA' . $set2[6];
                        for ($i = 1; $i <= 5; $i++) {
                            $data[$arraykey][$i] = $set1[$i] - $set2[$i];
                        }
                    }
                    $arraykey++;
                    skip2:
                }
            }
        }

        if ($val) {
            return $data2;
        } else {
            return $data;
        }
    }

    public function preferensi($val = array())
    {
        //Index Preferensi
        $data = array(array());
        $data2 = array(array());
        $arraykey = 0;
        $hasil = new Hasil();
        if ($val) {
            $derajat2 = $hasil->derajat($val);
            foreach ($derajat2 as $set1) {
                $data2[$arraykey]['id'] = $set1['id'];
                $data2[$arraykey][6] = $set1[6];
                $mmult = $hasil->MMULT($set1);
                $data2[$arraykey][] = $mmult;
                $arraykey++;
            }
        } else {
            $derajat = $hasil->derajat();
            $arraykey = 0;
            foreach ($derajat as $set1) {
                $data[$arraykey]['id'] = $set1['id'];
                $data[$arraykey][6] = $set1[6];
                $mmult = $hasil->MMULT($set1);
                $data[$arraykey][] = $mmult;
                $arraykey++;
            }
        }


        if ($val) {
            return $data2;
        } else {
            return $data;
        }
    }

    public function nullLF($id)
    {
        $hasil = new Hasil();
        $data = array(array());
        $out = array();
        $arraykey = 0;
        $derajat = $hasil->hitung(1);

        foreach ($derajat as $set1) {
            if ($set1[6] != $id) {
                goto skip2;
            }
            foreach ($derajat as $set2) {
                $data[$arraykey]['id'] = $set1[6];
                $data[$arraykey][6] = 'A' . $set1[6] . 'xA' . $set2[6];
                for ($i = 1; $i <= 5; $i++) {
                    $data[$arraykey][$i] = $set1[$i] - $set2[$i];
                }
                $arraykey++;
            }

            skip2:
        }

        $set1 = array();
        foreach ($data as $rows) {
            for ($j = 1; $j <= 5; $j++) {
                $set1[$j] = $rows[$j];
            }
            $mmult = $hasil->MMULT($set1);
            $out[] = $mmult;
        }

        return $out;
    }

    public function LF($val = 0)
    {
        /*
        $data = array(array());
        $arraykey = 0;
        $hasil = new Hasil();
        $count = $hasil->countalt();
        $set1 = $hasil->hitung(1);
        $countalt = $count[0] - 1;
        for($i=0;$i<=$countalt;$i++)
        {
            $data[$arraykey]['id'] = $set1[$i][6];
            $data[$arraykey]['ahass'] = $set1[$i][0];
            $data[$arraykey]['jumlah'] = 0;
            $ip = $hasil->preferensi($set1[$i]);
            foreach($ip as $index)
            {
                $data[$arraykey]['jumlah'] = $data[$arraykey]['jumlah'] + $index[7]; 
            }
            $data[$arraykey]['LF'] = $data[$arraykey]['jumlah']/($countalt);
            $arraykey++;
        }
        return $data;
        */
        //For Lock Alternatif
        $hasil = new Hasil();
        $count = $hasil->countalt();
        $countalt = $count[0] - 1;

        //For Get Derajat
        $data = array();
        $data1 = array();
        $hitung = $hasil->hitung(1);

        for ($i = 0; $i <= $countalt; $i++) {
            $raw = $hasil->nullLF($hitung[$i][6]);
            $raw['id'] = $hitung[$i][6];
            $raw['ahass'] = $hitung[$i][0];
            $data[] = $raw;
        }
        $arraykey = 0;
        foreach ($data as $row) {
            $data1[$arraykey]['id'] = $row['id'];
            $data1[$arraykey]['ahass'] = $row['ahass'];
            unset($row['id']);
            unset($row['ahass']);
            $data1[$arraykey]['jumlah'] = array_sum($row);
            $data1[$arraykey]['LF'] = array_sum($row) / $countalt;
            $arraykey++;
        }
        if ($val == 0) {
            return $data;
        } else {
            return $data1;
        }
    }

    public function nullEF($id)
    {
        $hasil = new Hasil();
        $data = array(array());
        $out = array();
        $arraykey = 0;
        $derajat = $hasil->hitung(1);

        foreach ($derajat as $set1) {
            foreach ($derajat as $set2) {
                if ($set2[6] == $id) {
                    $data[$arraykey]['id'] = $set1[6];
                    $data[$arraykey][6] = 'A' . $set1[6] . 'xA' . $set2[6];
                    for ($i = 1; $i <= 5; $i++) {
                        $data[$arraykey][$i] = $set1[$i] - $set2[$i];
                    }
                } else {
                    goto skip2;
                }

                /*
                if ($set1[6] == $set2[6]) {
                    goto skip2;
                } elseif ($set2[6] == $id) {
                    $data[$arraykey]['id'] = $set1[6];
                    $data[$arraykey][6] = 'A' . $set1[6] . 'xA' . $set2[6];
                    for ($i = 1; $i <= 5; $i++) {
                        $data[$arraykey][$i] = $set1[$i] - $set2[$i];
                    }
                    $arraykey++;
                }
                */
                skip2:
            }
            $arraykey++;
        }

        $set1 = array();
        foreach ($data as $rows) {
            for ($j = 1; $j <= 5; $j++) {
                $set1[$j] = $rows[$j];
            }
            $mmult = $hasil->MMULT($set1);
            $out[] = $mmult;
        }

        return $out;
    }

    public function EF($val = 0)
    {
        //For Lock Alternatif
        $hasil = new Hasil();
        $count = $hasil->countalt();
        $countalt = $count[0] - 1;

        //For Get Derajat
        $data = array();
        $data1 = array();
        $hitung = $hasil->hitung(1);

        for ($i = 0; $i <= $countalt; $i++) {
            $raw = $hasil->nullEF($hitung[$i][6]);
            $raw['id'] = $hitung[$i][6];
            $raw['ahass'] = $hitung[$i][0];
            $data[] = $raw;
        }
        $arraykey = 0;
        foreach ($data as $row) {
            $data1[$arraykey]['id'] = $row['id'];
            $data1[$arraykey]['ahass'] = $row['ahass'];
            unset($row['id']);
            unset($row['ahass']);
            $data1[$arraykey]['jumlah'] = array_sum($row);
            $data1[$arraykey]['EF'] = array_sum($row) / $countalt;
            $arraykey++;
        }
        if ($val == 0) {
            return $data;
        } else {
            return $data1;
        }
    }

    public function hasil()
    {
        $hasil = new Hasil();
        $EF = $hasil->EF(1);
        $LF = $hasil->LF(1);
        $count = $hasil->countalt();
        $countalt = $count[0] - 1;
        $data = array();

        for ($i = 0; $i <= $countalt; $i++) {
            $prep = $LF[$i]['LF'] - $EF[$i]['EF'];
            $alt = $EF[$i]['id'];
            $value = round($prep, 3);
            //Execute
            $sql = "INSERT INTO hasil (id_alternatif, nilai) VALUES (:alternatif, :nilai)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":alternatif", $alt);
            $stmt->bindparam(":nilai", $value);
            $stmt->execute();

            $data[] = $prep;
        }

        return $data;
    }

    public function tampil()
    {
        $sql = "SELECT * FROM `hasil`, alternatif WHERE hasil.id_alternatif = alternatif.id ORDER BY hasil.id_alternatif ASC;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }

    public function ranking()
    {
        $sql = "SELECT * FROM `hasil`, alternatif WHERE hasil.id_alternatif = alternatif.id  ORDER BY hasil.nilai DESC;";
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
        $sql = "DELETE FROM hasil ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function getMMULT($val = array())
    {
        //Index Preferensi
        $data = array(array());
        $data2 = array(array());
        $arraykey = 0;
        $hasil = new Hasil();
        $derajat = $hasil->derajat();
        if ($val) {
            $derajat2 = $hasil->derajat($val);
            foreach ($derajat2 as $set1) {
                $data2[$arraykey]['id'] = $set1['id'];
                $data2[$arraykey][6] = $set1[6];
                for ($i = 1; $i <= 5; $i++) {
                    if ($set1[$i] > 0) {
                        $set1[$i] = 1;
                    } else {
                        $set1[$i] = 0;
                    }
                    $data2[$arraykey][] = $set1[$i];
                }
                $arraykey++;
            }
        } else {
            $arraykey = 0;
            foreach ($derajat as $set1) {
                $data[$arraykey]['id'] = $set1['id'];
                $data[$arraykey][6] = $set1[6];
                for ($i = 1; $i <= 5; $i++) {
                    if ($set1[$i] > 0) {
                        $set1[$i] = 1;
                    } else {
                        $set1[$i] = 0;
                    }
                    $mmult = $hasil->MMULT($set1);
                    $data[$arraykey][] = $set1[$i];
                }
                $arraykey++;
            }
        }


        if ($val) {
            return $data2;
        } else {
            return $data;
        }
    }

    public function NF()
    {
        $sql = "SELECT * FROM `hasil`, alternatif WHERE hasil.id_alternatif = alternatif.id  ORDER BY hasil.id_alternatif ASC;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }
        return $data;
    }
}
