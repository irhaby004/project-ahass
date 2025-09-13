<?php
require_once "../../app/hasil.php";
$hasil = new App\Hasil();
$rows = $hasil->ranking();

error_reporting(0);
if (!empty($_GET['download'] == 'doc')) {
    header("Content-Type: application/vnd.ms-word");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-disposition: attachment;filename=" . date('d-m-Y') . "_laporan_hasil_akhir.doc");
}
if (!empty($_GET['download'] == 'xls')) {
    header("Content-Type: application/force-download");
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    header("content-disposition: attachment;filename=" . date('d-m-Y') . "_laporan_hasil_akhir.xls");
}
?>
<?php
$tgla = $user->tgl_bergabung;
$tglk = date('Y-m-d');
$bulan = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
);

$array1 = explode("-", $tgla);
$tahun = $array1[0];
$bulan1 = $array1[1];
$hari = $array1[2];
$bl1 = $bulan[$bulan1];
$tgl1 = $hari . ' ' . $bl1 . ' ' . $tahun;


$array2 = explode("-", $tglk);
$tahun2 = $array2[0];
$bulan2 = $array2[1];
$hari2 = $array2[2];
$bl2 = $bulan[$bulan2];
$tgl2 = $hari2 . ' ' . $bl2 . ' ' . $tahun2;
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <title> Bengkel Resmi - Cetak Hasil Akhir</title>
    <style>
        .login-form-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        th {
            text-align: center;
        }

        .hr1 {
            margin-left: auto;
            margin-top: 0;
            margin-bottom: 0;
            margin-right: auto;
            border: 2px solid black;
            width: 95%;
        }

        .hr2 {
            margin-left: auto;
            margin-top: 5px;
            margin-right: auto;
            border: 1px solid black;
            width: 95%;
        }

        body {
            background: rgba(0, 0, 0, 0.2);
        }

        .tanda-tangan {
            float: right;
            margin-top: 50px;
            position: relative;
            right: 10px;
        }

        page[size="A4"] {
            background: white;

            width: 21cm;
            /*
				height: 29.7cm; */
            display: block;
            margin: 0 auto;
            margin-bottom: 2.54cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
            padding-left: 1cm;
            padding-right: 1cm;
            padding-top: 0.5cm;
            padding-bottom: 1.5cm;
        }

        @media print {

            body,
            page[size="A4"] {
                margin: 0;
                box-shadow: 0;
                margin-bottom: 2.54cm;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <br />
        <div class="pull-left">
            Cetak Hasil Akhir [ Size : A4 ]
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-success btn-md" onclick="printDiv('printableArea')">
                <i class="fa fa-print"> </i> Print File
            </button>
        </div>
    </div>
    <br />
    <div id="printableArea">
        <page size="A4">
            <section class="content">
            <span class="login-form-title d-flex align-items-center" style="gap: 10px;">
                <img src="../../assets/img/log.png" style="width: 120px; height: auto;">
                <div style="width: 100%; overflow: hidden;">
                    <div style="float: right; text-align: right;">
                        <p style="margin: 0; font-weight: bold; font-size: 18px;">PELABUHAN PERIKANAN BELAWAN</p>
                        <p style="margin: 0; font-size: 16px;">GUDANG KURNIA LAUT</p>
                        <p style="margin: 0; font-size: 16px;">Jl. Pelabuhan Perikanan Gabion, Belawan I Medan Belawan Kota Medan</p>
                        <p style="margin: 0; font-size: 16px;">Kode Pos 20411</p>
                    </div>
                </div>
            </span>
                <div class="row">
                    <hr class="hr1">
                    <hr class="hr2">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <table class="table table-bordered table-striped table" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="60%">Nama</th>
                                            <th width="15%">Nilai Akhir</th>
                                            <th width="10%">Rangking</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align:center;">

                                        <?php
                                        $no = 1;

                                        foreach ($rows as $row) { ?>
                                            <tr>
                                                <td>
                                                    <center><?php echo $no; ?></center>
                                                </td>
                                                <td><?php echo $row['ahass']; ?></td>
                                                <td>
                                                    <center><?php echo round($row['nilai'], 4); ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $no; ?></center>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        }; ?>
                                    </tbody>
                                </table>
                                <div class="tanda-tangan">
                                    <p>Medan, <?=$tgl2;?></p>
                                    <p>PT. Indako Trading COY
                                        <br>
                                        <br>
                                    </p>
                                    <br>
                                    <br>
                                    <br>
                                    <p style="text-align:center;">
                                        DIREKTUR

                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
            </section>
        </page>
    </div>
</body>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

</html>