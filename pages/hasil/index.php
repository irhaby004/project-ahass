<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Data Hasil Ranking</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Hasil</li>
			</ol>

			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i> Data Ranking
					<a href="pages/hasil/print.php" style="float:right" class="btn btn-danger btn-print">
						<i class="fas fa-print mr-1"></i> Cetak Data
					</a>
				</div>
				<div class="card-body">
					<table id="datatablesSimple" width="100%">
						<thead>
							<tr>
								<th style="text-align:center;" width="7%">No</th>
								<th style="text-align:center;" width="20%">Kode</th>
								<th style="text-align:center;" width="50%">Nama</th>
								<th style="text-align:center;" width="">Net Flow</th>
								<th style="text-align:center;" width="">Rangking</th>
							</tr>
						</thead>
						<tbody style="text-align:center;">
							<?php $no = 1;
							foreach ($rows as $row) {; ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $row['kode'] ?></td>
									<td><?= $row['ahass'] ?></td>
									<td><?= $row['nilai'] ?></td>
									<td><?= $no ?></td>
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