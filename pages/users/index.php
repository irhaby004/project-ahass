<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Data Users</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Users</li>
			</ol>

			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i> Data Users
					<button style="float:right" class="btn btn-primary btn-add">
						<i class="fas fa-plus mr-1"></i> Tambah Data
					</button>
				</div>
				<div class="card-body">
					<table id="datatablesSimple" width="100%">
						<thead>
							<tr>
								<th style="text-align:center;vertical-align: middle;" width="7%">No</th>
								<th style="text-align:center;vertical-align: middle;">USERNAME</th>
								<th style="text-align:center;vertical-align: middle;">NAMA</th>
								<th style="text-align:center;vertical-align: middle;" width="15%">Aksi</th>
							</tr>
						</thead>
						<tbody style="text-align:center;">
							<?php $no = 1;
							foreach ($rows as $row) {; ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $row['username'] ?></td>
									<td><?= $row['nama'] ?></td>
									<td>
										<button class="btn btn-success btn-edit" data-id="<?= $row['id_login'] ?>"><i class="mdi mdi-lead-pencil mr-1"></i> Edit</button>
										<button class="btn btn-danger btn-hapus" data-id="<?= $row['id_login'] ?>" data-handler="users"><i class="mdi mdi-trash-can mr-1"></i>
											<form id="delete-form-<?= $row['id_login'] ?>-users" action="pages/users/delete.php?id=<?= $row['id_login'] ?>" method="POST" style="display: none;">
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
	<div class="modal fade" id="compose" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="formeditusers" action="" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Pengguna</label>
							<input type="text" required value="" class="form-control " name="nama">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" required value="" class="form-control " name="username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input required type="password" value="" class="form-control" name="pass" placeholder="Kosongkan Jika Tidak Diubah">
						</div>
						<div class="form-group">
							<label>Level</label>
							<select  name="level" class="form-control ">
								<option disabled value="Admin">Admin</option>
								<option value="User">User</option>
							</select>
						</div>
						<div class="form-group">
							<label>Alternatif</label>
							<select name="alternatif" class="form-control">
								<option value="0" selected disabled>--- Pilih Alternatif ---</option>
								<?php
								foreach ($alternatif as $rows) {
									echo '<option value="' . $rows['id'] . '">' . $rows['kode'] . ' - ' . $rows['ahass'] . '</option>';
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