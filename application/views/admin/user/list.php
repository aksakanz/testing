<html>

<head>
	<link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
	<h1 class="mt-4">List User Admin</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active"><a href="">Dashboard</a></li>
		<li class="breadcrumb-item active">List User Admin</li>
	</ol>

	<table class="table table-hover table-striped table-borderless" id="pesertaTable">
		<thead>
			<tr>
				<th>NIK</th>
				<th>Nama</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Role</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $ps) : ?>
				<tr>
					<td><?= $ps->nik; ?></td>
					<td><?= $ps->nama; ?></td>
					<td><?= $ps->gender; ?></td>
					<td><?= $ps->email; ?></td>
					<td>
						<?php
						if ($ps->role == 2) {
							echo "<b>Administrator</b>";
						}
						?>
					</td>
					<td> <a href="<?= site_url('AdminDashboard/viewListUser/' . $ps->userid) ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
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