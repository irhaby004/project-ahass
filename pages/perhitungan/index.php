<style>
    .dropbtnbaru {
        background-color: #3498DB;
        width: 100%;
        color: white;
        padding: 8px;
        font-size: 15px;
        text-align: left;
        border: 0px;
        cursor: pointer;
    }

    .dropdownbaru {
        width: 100%;
        display: inline-block;
        margin-bottom: 1%;

    }

    td,
    th {
        text-align: center;
    }

    .dropdown-content {
        display: none;
        border: 1px solid #c3bebe85;
        z-index: 1;
    }

    .show {
        display: block;
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1>Data Perhitungan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Perhitungan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i> Perhitungan AHP
                </div>
                <div class="card-body">

                    <div class="">
                        <!-- AHP 1-->
                        <div class="dropdownbaru">
                            <button onclick="ahp1()" class="dropbtnbaru">
                                Matriks Perbandingan Kriteria </button>
                            <div id="ahp1" class="dropdown-content">
                                <div>
                                    <table class="table table-bordered table-striped table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="15%">Kriteria</th>
                                                <th width="15%">Permintaan Pasar</th>
                                                <th width="15%">Harga Jual</th>
                                                <th width="15%">Volume Penjualan</th>
                                                <th width="16%">Target Penjualan</th>
                                                <th width="15%">Omset Penjualan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Permintaan Pasar</b></td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>3</td>
                                                <td>5</td>
                                                <td>7</td>
                                            </tr>
                                            <tr>
                                                <td><b>Harga Jual</b></td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>3</td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td><b>Volume Penjualan</b></td>
                                                <td>0,333</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td><b>Target Penjualan</b></td>
                                                <td>0,2</td>
                                                <td>0,333</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td><b>Omset Penjualan</b></td>
                                                <td>0,143</td>
                                                <td>0,2</td>
                                                <td>0,2</td>
                                                <td>0,2</td>
                                                <td>1</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th width="15%">Jumlah</th>
                                                <th width="15%">2,676</th>
                                                <th width="15%">3,533</th>
                                                <th width="15%">6,2</th>
                                                <th width="15%">10,2</th>
                                                <th width="20%">23,000</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- AHP 2-->
                        <div class="dropdownbaru">
                            <button onclick="ahp2()" class="dropbtnbaru">
                                Matriks Bobot Prioritas Kriteria </button>
                            <div id="ahp2" class="dropdown-content">
                                <div>
                                    <table class="table table-bordered table-striped table" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="14%">Kriteria</th>
                                                <th width="14%">Permintaan Pasar</th>
                                                <th width="14%">Harga Jual</th>
                                                <th width="14%">Volume Penjualan</th>
                                                <th width="14%">Target Penjualan</th>
                                                <th width="10%">Omset Penjualan</th>
                                                <th width="10%">Total</th>
                                                <th width="14%">Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Permintaan Pasar</b></td>
                                                <td>0,373</td>
                                                <td>0,283</td>
                                                <td>0,483</td>
                                                <td>0,490</td>
                                                <td>0,304</td>
                                                <td>1,993</td>
                                                <td><b>0,386</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Harga Jual</b></td>
                                                <td>0,373</td>
                                                <td>0,283</td>
                                                <td>0,161</td>
                                                <td>0,294</td>
                                                <td>0,217</td>
                                                <td>1,328</td>
                                                <td><b>0,265</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Volume Penjualan</b></td>
                                                <td>0,142</td>
                                                <td>0,283</td>
                                                <td>0,161</td>
                                                <td>0,098</td>
                                                <td>0,217</td>
                                                <td>0,883</td>
                                                <td><b>0,176</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Target Penjualan</b></td>
                                                <td>0,074</td>
                                                <td>0,094</td>
                                                <td>0,161</td>
                                                <td>0,098</td>
                                                <td>0,217</td>
                                                <td>0,644</td>
                                                <td><b>0,128</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Omset Penjualan</b></td>
                                                <td>0,053</td>
                                                <td>0,056</td>
                                                <td>0,032</td>
                                                <td>0,019</td>
                                                <td>0,043</td>
                                                <td>0,203</td>
                                                <td><b>0,040</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.AHP 2 -->
                        <!-- AHP 3-->
                        <div class="dropdownbaru">
                            <button onclick="ahp3()" class="dropbtnbaru">
                                Konsistensi Kriteria </button>
                            <div id="ahp3" class="dropdown-content">
                                <div>
                                    <table class="table table-bordered table-striped table" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="5%"><b>Ordo Matriks</b></td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>13</td>
                                                <td>14</td>
                                                <td>15</td>
                                            </tr>
                                            <tr>
                                                <td width="5%"><b>Ratio Index</b></td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0.58</td>
                                                <td>0.9</td>
                                                <td>1.12</td>
                                                <td>1.24</td>
                                                <td>1.32</td>
                                                <td>1.41</td>
                                                <td>1.46</td>
                                                <td>1.49</td>
                                                <td>1.51</td>
                                                <td>1.48</td>
                                                <td>1.56</td>
                                                <td>1.57</td>
                                                <td>1.59</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p style="margin:10px;">
                                        <b>
                                            Consistency Index : 0.063
                                        </b>
                                    </p>
                                    <p style="margin:10px;">
                                        <b>
                                            Ratio Index : 1.12
                                        </b>
                                    </p>
                                    <p style="margin:10px;">
                                        <b>
                                            Consistency Ratio : 0.05 (Konsisten)
                                        </b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.AHP 3 -->
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i> Perhitungan Promethee
                </div>
                <div class="card-body">
                    <div class="">
                        <!-- promthee 1-->
                        <div class="dropdownbaru">
                            <button onclick="thee1()" class="dropbtnbaru">
                                Menghitung Derajat Prefensi (d)</button>
                            <div id="thee1" class="dropdown-content">
                                <div class="card-body">
                                    <table id="theedata1" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;" width="10%">No</th>
                                                <th style="text-align:center;">Nilai (d)</th>
                                                <th style="text-align:center;">Permintaan Pasar</th>
                                                <th style="text-align:center;">Harga Jual</th>
                                                <th style="text-align:center;">Volume Penjualan</th>
                                                <th style="text-align:center;">Target Penjualan</th>
                                                <th style="text-align:center;">Omset Penjualan</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align:center;">
                                            <?php $no = 1;
                                            foreach ($thee1 as $row) {; ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $row[6] ?></td>
                                                    <td><?= $row[1] ?></td>
                                                    <td><?= $row[2] ?></td>
                                                    <td><?= $row[3] ?></td>
                                                    <td><?= $row[4] ?></td>
                                                    <td><?= $row[5] ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.promthee 1 -->
                        <!-- promthee 2-->
                        <div class="dropdownbaru">
                            <button onclick="thee2()" class="dropbtnbaru">
                                Menghitung H(d)</button>
                            <div id="thee2" class="dropdown-content">
                                <div class="card-body">
                                    <table id="theedata2" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;" width="10%">No</th>
                                                <th style="text-align:center;">Nilai H(d)</th>
                                                <th style="text-align:center;">Permintaan Pasar</th>
                                                <th style="text-align:center;">Harga Jual</th>
                                                <th style="text-align:center;">Volume Penjualan</th>
                                                <th style="text-align:center;">Target Penjualan</th>
                                                <th style="text-align:center;">Omset Penjualan</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align:center;">
                                            <?php $no = 1;
                                            foreach ($thee2 as $row) {; ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $row[6] ?></td>
                                                    <td><?= $row[7] ?></td>
                                                    <td><?= $row[8] ?></td>
                                                    <td><?= $row[9] ?></td>
                                                    <td><?= $row[10] ?></td>
                                                    <td><?= $row[11] ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.promthee 2 -->
                        <!-- promthee 3-->
                        <div class="dropdownbaru">
                            <button onclick="thee3()" class="dropbtnbaru">
                                Menghitung Index Preferensi</button>
                            <div id="thee3" class="dropdown-content">
                                <div class="card-body">
                                    <table id="theedata3" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;" width="10%">No</th>
                                                <th style="text-align:center;">Index</th>
                                                <th style="text-align:center;">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align:center;">
                                            <?php $no = 1;
                                            foreach ($thee3 as $row) {; ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $row[6] ?></td>
                                                    <td><?= round($row[7],3) ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.promthee 3 -->
                        <!-- promthee 4-->
                        <div class="dropdownbaru">
                            <button onclick="thee4()" class="dropbtnbaru">
                                Menghitung Leaving Flow (LF) </button>
                            <div id="thee4" class="dropdown-content">
                                <div class="card-body">
                                    <table id="theedata4" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;" width="10%">No</th>
                                                <th style="text-align:center;">Alternatif</th>
                                                <th style="text-align:center;">LF</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align:center;">
                                            <?php $no = 1;
                                            foreach ($thee4 as $row) {; ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td>A<?= $row['id'] ?></td>
                                                    <td><?= round($row['LF'],3) ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.promthee 4 -->
                        <!-- promthee 5-->
                        <div class="dropdownbaru">
                            <button onclick="thee5()" class="dropbtnbaru">
                                Menghitung Entering Flow (EF) </button>
                            <div id="thee5" class="dropdown-content">
                                <div class="card-body">
                                    <table id="theedata5" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;" width="10%">No</th>
                                                <th style="text-align:center;">Alternatif</th>
                                                <th style="text-align:center;">EF</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align:center;">
                                            <?php $no = 1;
                                            foreach ($thee5 as $row) {; ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td>A<?= $row['id'] ?></td>
                                                    <td><?= round($row['EF'],3) ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.promthee 5 -->
                        <!-- promthee 6-->
                        <div class="dropdownbaru">
                            <button onclick="thee6()" class="dropbtnbaru">
                                Menghitung Net Flow (NF) </button>
                            <div id="thee6" class="dropdown-content">
                                <div class="card-body">
                                    <table id="theedata6" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;" width="10%">No</th>
                                                <th style="text-align:center;">Alternatif</th>
                                                <th style="text-align:center;">NF</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align:center;">
                                            <?php $no = 1;
                                            foreach ($thee6 as $row) {; ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td>A<?= $row['id_alternatif'] ?></td>
                                                    <td><?= $row['nilai'] ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.promthee 5 -->
                    </div>
                </div>
            </div>

            <div style="height: 100vh"></div>
            <div class="card mb-4">
                <div class="card-body">When scrolling, the navigation stays at the thee of the page. This is the end of the static navigation demo.</div>
            </div>
        </div>
    </main>