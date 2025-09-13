<!-- <?php
session_start();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
require_once "app/Penilaian.php";

$penilaian = new App\Penilaian();
$rows = $penilaian->tampil();
?> -->

<style>
    tr > th {
        text-align: center;
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Penilaian Alternatif</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Penilaian</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i> Data Penilaian Alternatif
                    <?php 
                    // Tampilkan tombol Tambah Data hanya untuk user
                    if ($_SESSION['status'] === 'User') { ?>
                        <button style="float:right" class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="fas fa-plus mr-1"></i> Tambah Data
                        </button>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <!-- Bungkus tabel dengan row, col-12, dan .table-responsive -->
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="7%">No</th>
                                            <th rowspan="2" width="10%">Kode</th>
                                            <th rowspan="2" width="20%">PEMASARAN IKAN</th>
                                            <th rowspan="2">Permintaan Pasar</th>
                                            <th rowspan="2">Harga Jual</th>
                                            <th rowspan="2">Volume Penjualan</th>
                                            <th rowspan="2">Target Penjualan</th>
                                            <th rowspan="2">Omset Penjualan</th>
                                            <th rowspan="2" width="">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align:center;">
                                        <?php $no = 1; ?>
                                        <?php foreach ($rows as $row) { ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $row['kode'] ?></td>
                                                <td><?= $row['ahass'] ?></td>
                                                <td>
    									            <?= ($row['c1'] == 1) ? 'Tercapai' : 'Tidak Tercapai' ?>
									            </td>
                                                <td><?= $row['c2'] ?></td>
                                                <td><?= $row['c3'] ?></td>
                                                <td><?= $row['c4'] ?></td>
                                                <td><?= $row['c5'] ?></td>
                                                <td>
                                                    <!-- Tombol edit untuk kedua level -->
                                                    <button class="btn btn-success btn-edit" data-id="<?= $row['id_penilaian'] ?>" data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <i class="mdi mdi-lead-pencil mr-1"></i> Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-responsive -->
                        </div> <!-- /.col-12 -->
                    </div> <!-- /.row -->
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Tambah Data -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="addModalLabel" class="modal-title">Tambah Data Penilaian Alternatif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAdd" action="pages/penilaian/simpan.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_alternatif" value="<?= $_SESSION['id_alternatif'] ?>">
                    <div class="form-group">
                        <label>Kode</label>
                        <input readonly name="kode" type="text" id="addKode" class="form-control" value="<?= $_SESSION['kode'] ?>">
                    </div>
                    <div class="form-group">
                        <label>PEMASARAN IKAN</label>
                        <input readonly name="ahass" type="text" id="addAhass" class="form-control" value="<?= $_SESSION['ahass'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Permintaan Pasar</label>
                        <select name="c1" class="form-control" required>
                            <option value="" disabled selected>-- Pilih Status --</option>
                            <option value="1">Tercapai</option>
                            <option value="2">Tidak Tercapai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input name="c2" type="number" class="form-control" placeholder="Masukkan Harga Jual" required>
                    </div>
                    <div class="form-group">
                        <label>Volume Penjualan</label>
                        <input name="c3" type="number" class="form-control" placeholder="Masukkan Volume Penjualan" required>
                    </div>
                    <div class="form-group">
                        <label>Target Penjualan</label>
                        <input name="c4" type="number" class="form-control" placeholder="Masukkan Target Penjualan" required>
                    </div>
                    <div class="form-group">
                        <label>Omset Penjualan</label>
                        <input name="c5" type="number" class="form-control" placeholder="Masukkan Omset Penjualan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-pill">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="editModalLabel" class="modal-title">Edit Data Penilaian Alternatif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" action="pages/penilaian/simpan.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_penilaian" id="editIdPenilaian">
                    <input type="hidden" name="id_alternatif" id="editIdAlternatif">
                    <div class="form-group">
                        <label>Kode</label>
                        <input readonly name="kode" type="text" id="editKode" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PEMASARAN IKAN</label>
                        <input readonly name="ahass" type="text" id="editAhass" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Permintaan Pasar</label>
                        <select name="c1" class="form-control" required>
                            <option value="" disabled>-- Pilih Status --</option>
                            <option value="1">Tercapai</option>
                            <option value="2">Tidak Tercapai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input name="c2" type="number" id="editC2" class="form-control" placeholder="Ubah Harga Jual" required>
                    </div>
                    <div class="form-group">
                        <label>Volume Penjualan</label>
                        <input name="c3" type="number" id="editC3" class="form-control" placeholder="Ubah Volume Penjualan" required>
                    </div>
                    <div class="form-group">
                        <label>Target Penjualan</label>
                        <input name="c4" type="number" id="editC4" class="form-control" placeholder="Ubah Target Penjualan" required>
                    </div>
                    <div class="form-group">
                        <label>Omset Penjualan</label>
                        <input name="c5" type="number" id="editC5" class="form-control" placeholder="Ubah Omset Penjualan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-pill">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll('.btn-edit');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Ambil data dari server (get_json.php?id=...)
            fetch("pages/penilaian/get_json.php?id=" + id)
                .then(response => response.json())
                .then(data => {
                    // Ambil hanya 1 data
                    const item = data[0];

                    // Isi form edit
                    document.getElementById('editIdPenilaian').value = item.id_penilaian;
                    document.getElementById('editIdAlternatif').value = item.id_alternatif; // <-- ini ditambahkan
                    document.getElementById('editKode').value = item.kode;
                    document.getElementById('editAhass').value = item.ahass;

                    document.querySelector('#formEdit select[name="c1"]').value = item.c1;
                    document.getElementById('editC2').value = item.c2;
                    document.getElementById('editC3').value = item.c3;
                    document.getElementById('editC4').value = item.c4;
                    document.getElementById('editC5').value = item.c5;
                })
                .catch(error => {
                    alert("Gagal memuat data untuk edit.");
                    console.error("Error:", error);
                });
        });
    });
});
// document.addEventListener("DOMContentLoaded", function () {
//     // Tangkap form edit
//     const formEdit = document.getElementById('formEdit');

//     // Saat form submit
//     formEdit.addEventListener('submit', function (e) {
//         e.preventDefault(); // Stop dulu submit agar bisa kita lihat datanya

//         // Ambil data dari form
//         const formData = new FormData(formEdit);
//         const data = {};
//         formData.forEach((value, key) => {
//             data[key] = value;
//         });

//         // Tampilkan ke console
//         console.log("🔍 Data yang akan dikirim:");
//         console.log(data);

//         // Jika sudah benar, kamu bisa lanjut submit manual
//         // e.target.submit(); // ← Aktifkan ini kalau ingin langsung kirim
//     });
// });
</script>
