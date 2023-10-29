<html>

<head>
	<link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
	<h1 class="mt-4">Management Job Vacancy</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		<li class="breadcrumb-item active">Management Job Vacancy</li>
	</ol>

	<table class="table table-hover table-striped table-borderless" id="pesertaTable">
		<thead>
			<tr>
				<th>Jabatan</th>
				<th>Deskripsi Pekerjaan</th>
				<th>Requirement</th>
				<th>Pendidikan</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($peserta as $ps) : ?>
				<tr>
					<td><?= $ps->jobv_title; ?></td>
					<td><?= $ps->jobv_desc; ?></td>
					<td>
						<?php
						$persyaratan = $ps->jobv_requirement;

						if (strpos($persyaratan, ',') !== false) {
							$persyaratan_array = explode(',', $persyaratan);

							foreach ($persyaratan_array as $item) {
								$item = trim($item);
						?>

								<span class="badge text-bg-secondary"><?= $item ?></span>
						<?php
							}
						} else {
							echo $persyaratan;
						}
						?>
					</td>
					<td>
						<?php
						$persyaratan = $ps->jobv_major;

						if (strpos($persyaratan, ',') !== false) {
							$persyaratan_array = explode(',', $persyaratan);

							foreach ($persyaratan_array as $item) {
								$item = trim($item);
						?>

								<span class="badge text-bg-secondary"><?= $item ?></span>
						<?php
							}
						} else {
							echo $persyaratan;
						}
						?>
					</td>
					<td>
						<?php
						if ($ps->jobv_status == 0) {
							echo "<span class='badge rounded-pill text-bg-danger'>Tidak Aktif</span>";
						} else if ($ps->jobv_status == 1) {
							echo "<span class='badge rounded-pill text-bg-success'>Aktif</span>";
						}
						?>
					</td>
					<td>
						<a href="<?= site_url('AdminDashboard/viewJobVacancy/' . $ps->jobv_id) ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

	<script>
		$(document).ready(function() {
			$('#pesertaTable').DataTable();
		});
	</script>
</body>

</html>