<div id="layoutSidenav_content">
	<main>


		<div class="container-fluid px-4">
			<h1 class="mt-4">Data Subkriteria</h1>
			<button style="float:right" class="btn btn-primary btn-add ">
					<i class="fas fa-plus md-9"></i> Tambah Data
					</button>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Sub Kriteria</li>
			</ol>
			
			<?php foreach ($filter as $f) {; ?>
				<div class="card mb-4">
					<div class="card-header" style="font-size: x-large;">
						<i class="fas fa-table me-1"></i>
						<?= $f['keterangan'] . ' (' . $f['kriteria'] . ')' ?>
						<!-- <button style="float:right" class="btn btn-primary btn-add">
							<i class="fas fa-plus mr-1"></i> Tambah Data
						</button> -->
					</div>
					<div class="card-body">
						<table id="example<?= $f['id_kriteria'] ?>" class="table" width="100%">
							<thead>
								<tr>
									<th width="7%" style="text-align:center;">No</th>
									<?php
									if ($f['kriteria'] == "C3") {
										echo '<th width="20%" style="text-align:center;">Kategori</th>
												 <th width="30%" style="text-align:center;">Keterangan</th>';
									} else {
										echo '<th style="text-align:center;" width="50%">Keterangan</th>';
									}
									?>
									<th width="" style="text-align:center;">Nilai</th>
									<th width="" style="text-align:center;">Aksi</th>
								</tr>
							</thead>
							<tbody style="text-align:center;">
								<?php $rows = $sub->tampil($f['id_kriteria']);
								$no = 1;
								if ($f['kriteria'] == "C3") {

									foreach ($rows as $row) { ?>
										<tr>
											<td><?= $no ?></td>
											<?php
											if ($no == 1) {
												echo '<td rowspan="5" style="vertical-align:middle;">' . $row['detail'] . '</td>';
											}
											?>
											<td><?= $row['keterangan'] ?></td>
											<td><?= $row['nilai'] ?></td>
											<td>
												<button class="btn btn-success btn-edit" data-id="<?= $row['id_sub'] ?>"><i class="mdi mdi-lead-pencil mr-1"></i> Edit</button>
												<button class="btn btn-danger btn-hapus" data-id="<?= $row['id_sub'] ?>" data-handler="subkriteria"><i class="mdi mdi-trash-can mr-1"></i>
													<form id="delete-form-<?= $row['id_sub'] ?>-subkriteria" action="pages/subkriteria/delete.php?id=<?= $row['id_sub'] ?>" method="POST" style="display: none;">
													</form>
													Hapus
												</button>
											</td>
										</tr>
										<?php $no++;
										if ($no > 5) {
											$no = 1;
										}
									}
								} else {
									foreach ($rows as $row) {; ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $row['keterangan'] ?></td>
											<td><?= $row['nilai'] ?></td>
											<td>
												<button class="btn btn-success btn-edit" data-id="<?= $row['id_sub'] ?>"><i class="mdi mdi-lead-pencil mr-1"></i> Edit</button>
												<button class="btn btn-danger btn-hapus" data-id="<?= $row['id_sub'] ?>" data-handler="subkriteria"><i class="mdi mdi-trash-can mr-1"></i>
													<form id="delete-form-<?= $row['id_sub'] ?>-subkriteria" action="pages/subkriteria/delete.php?id=<?= $row['id_sub'] ?>" method="POST" style="display: none;">
													</form>
													Hapus
												</button>
											</td>
										</tr>
								<?php $no++;
									}
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php } ?>
		</div>
	</main>


	<!-- Form Modal -->
	<div class="modal fade" id="submodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Sub Kriteria</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="modalformsub" action="" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label>Kode Kriteria</label>
							<select name="kriteria" class="form-control" id="kriteria" onchange="changeval();">
								<option selected disabled value="0">--- Pilih Kriteria --- </option>
								<?= $data ?>
							</select>
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input name="keterangan" type="text" class="form-control" placeholder="Keterangan">
						</div>
						<div class="form-group">
							<label>Nilai</label>
							<input name="nilai" type="number" class="form-control" placeholder="Nilai">
						</div>
						<div class="form-group" id="cat">
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
						<button type="button" class="btn btn-primary btn-pill btn-simpan">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>