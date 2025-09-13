<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Data Alternatif</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Alternatif</li>
			</ol>

			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i> Data Alternatif
					<button style="float:right" class="btn btn-primary btn-add">
						<i class="fas fa-plus mr-1"></i> Tambah Data
					</button>
				</div>
				<div class="card-body">
					<table id="datatablesSimple" width="100%">
						<thead>
							<tr>
								<th style="text-align:center;vertical-align: middle;" width="7%">No</th>
								<th style="text-align:center;vertical-align: middle;">KODE</th>
								<th style="text-align:center;vertical-align: middle;">Nama Boat</th>
								<th style="text-align:center;vertical-align: middle;">Target Pasar</th>
								<th style="text-align:center;vertical-align: middle;">Target Harga </th>
								<th style="text-align:center;vertical-align: middle;">Volume Penjualan Semester Lalu</th>
								<th style="text-align:center;vertical-align: middle;">Target Omset</th>
								<th style="text-align:center;vertical-align: middle;">Kategori</th>
								<th style="text-align:center;vertical-align: middle;" width="15%">Aksi</th>
							</tr>
						</thead>
						<tbody style="text-align:center;">
							<?php $no = 1;
							foreach ($rows as $row) {; ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $row['kode'] ?></td>
									<td><?= $row['ahass'] ?></td>
									<td>
    									<?= ($row['t1'] == 1) ? 'Tercapai' : 'Tidak Tercapai' ?>
									</td>
									<td><?= $row['t2'] ?></td>
									<td><?= $row['t3'] ?></td>
									<td><?= $row['t5'] ?></td>
									<td><?= $row['detail'] ?></td>
									<td>
										<button class="btn btn-success btn-edit" data-id="<?= $row['id'] ?>"><i class="mdi mdi-lead-pencil mr-1"></i> Edit</button>
										<button class="btn btn-danger btn-hapus" data-id="<?= $row['id'] ?>" data-handler="alternatif"><i class="mdi mdi-trash-can mr-1"></i>
											<form id="delete-form-<?= $row['id'] ?>-alternatif" action="pages/alternatif/delete.php?id=<?= $row['id'] ?>" method="POST" style="display: none;">
											</form>
											Hapus
										</button>
									</td>
								</tr>
							<?php $no++;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
			<div style="height: 100vh"></div>
			<div class="card mb-4">
				
		</div>
	</main>


	<!-- Form Modal -->
	<div class="modal fade" id="compose" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="formalternatif" action="" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label>Kode Boat</label>
							<input name="kode" type="text" class="form-control" placeholder="Enter Kode Bengkel Resmi">
						</div>
						<div class="form-group">
							<label>Nama Boat</label>
							<input name="ahass" type="text" class="form-control" placeholder="Enter Bengkel Resmi">
						</div>
						<div class="form-group">
    						<label>Permintaan Pasar</label>
    						<select name="t1" class="form-control">
        							<option value="" disabled selected>-- Pilih Status --</option>
        							<option value="1">Tercapai</option>
        							<option value="2">Tidak Tercapai</option>
    						</select>
						</div>
						<div class="form-group">
							<label>Harga Jual</label>
							<input name="t2" type="number" class="form-control" placeholder="Enter Harga Jual">
						</div>
						<div class="form-group">
							<label>Target SA Semester Lalu</label>
							<input name="t3" type="number" class="form-control" placeholder="Enter Target SA">
						</div>
						<div class="form-group">
							<label>Target Omset</label>
							<input name="t5" type="number" class="form-control" placeholder="Enter Target Omset">
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<select name="kat" class="form-control">
								<option value="0" selected disabled>--- Pilih Kategori ---</option>
								<?php
								foreach ($kategory as $rows) {
									echo '<option value="' . $rows['id_kategori'] . '">' . $rows['nama'] . ' - ' . $rows['detail'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-pill" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary btn-pill btn-simpan">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Form Modal -->
	<div class="modal fade" id="editalternatif" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="formeditalternatif" action="" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label>Kode Boat</label>
							<input name="kode" type="text" class="form-control" placeholder="Enter Kode">
						</div>
						<div class="form-group">
							<label>Nama Boat</label>
							<input name="ahass" type="text" class="form-control" placeholder="Enter AHASS">
						</div>
						<div class="form-group">
    						<label>Permintaan Pasar</label>
    						<select name="t1" class="form-control">
        							<option value="" disabled selected>-- Pilih Status --</option>
        							<option value="1">Tercapai</option>
        							<option value="2">Tidak Tercapai</option>
    						</select>
						</div>
						<div class="form-group">
							<label>Harga Jual</label>
							<input name="t2" type="number" class="form-control" placeholder="Enter Data">
						</div>
						<div class="form-group">
							<label>Target SA Semester Lalu</label>
							<input name="t3" type="number" class="form-control" placeholder="Enter Data">
						</div>
						<div class="form-group">
							<label>Target Omset</label>
							<input name="t5" type="number" class="form-control" placeholder="Enter Data">
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<select name="kategori" class="form-control">
								<option value="0" selected disabled>--- Pilih Kategori ---</option>
								<?php
								foreach ($kategory as $rows) {
									echo '<option value="' . $rows['id_kategori'] . '">' . $rows['nama'] . ' - ' . $rows['detail'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-pill" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary btn-pill btn-update">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>