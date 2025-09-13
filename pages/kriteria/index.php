<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Data Kriteria</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Kriteria</li>
			</ol>

			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i> Data Kriteria
					<button style="float:right" class="btn btn-primary btn-add">
						<i class="fas fa-plus mr-1"></i> Tambah Data
					</button>
				</div>
				<div class="card-body">
					<table id="datatablesSimple">
						<thead>
							<tr>
								<th width="7%">No</th>
								<th width="10%">Kode Kriteria</th>
								<th width="40%">Keterangan</th>
								<th width="">Aksi</th>
							</tr>
						</thead>
						<tbody style="text-align:center;">
							<?php $no = 1;
							foreach ($rows as $row) {; ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $row['kriteria'] ?></td>
									<td><?= $row['keterangan'] ?></td>
									<td>
										<button class="btn btn-success btn-edit" data-id="<?= $row['id_kriteria'] ?>"><i class="mdi mdi-lead-pencil mr-1"></i> Edit</button>
										<button class="btn btn-danger btn-hapus" data-id="<?= $row['id_kriteria'] ?>" data-handler="kriteria"><i class="mdi mdi-trash-can mr-1"></i>
											<form id="delete-form-<?= $row['id_kriteria'] ?>-kriteria" action="pages/kriteria/delete.php?id=<?= $row['id_kriteria'] ?>" method="POST" style="display: none;">
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
				<div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
			</div>
		</div>
	</main>

	<!-- Form Modal -->
	<div class="modal fade" id="kriteriamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Kriteria</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="modalformkriteria" action="" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label>Kode Kriteria</label>
							<input name="kriteria" type="text" class="form-control" placeholder="Enter Nama">
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input name="keterangan" type="text" class="form-control" placeholder="Keterangan">
						</div>
						<div class="form-group" hidden>
							<label>Bobot</label>
							<input name="bobot" type="number" step="0.01" class="form-control" value="0.01" placeholder="Nilai Bobot">
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