<html>

<head></head>

<body>
	<h1 class="mt-4">Detail Data User</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item "><a href="">Dashboard</a></li>
		<li class="breadcrumb-item active">Detail User Admin</li>
	</ol>

	<div class="container">
		<?php foreach ($peserta as $ps) : ?>
			<form method="post" action="<?= base_url('AdminDashboard/updateUser') ?>" enctype="multipart/form-data">
				<center>
					<img src="<?= base_url('assets/img/profile/' . $ps->foto); ?>" alt="Profile Image" class="img-thumbnail rounded-circle" width="100" height="100">
				</center>
				<br>
				<br>
				<div class="row">

					<div class="col-3">
						<p>Foto Profile</p>
					</div>
					<div class="col-8">
						<input type="file" name="foto" class="form-control">
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-3">
						<p>NIK</p>
					</div>
					<div class="col-8">

						<input type="hidden" name="userid" value="<?= $ps->userid; ?>">
						<input type="number" name="nik" value="<?= $ps->nik; ?>" class="form-control">
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-3">
						<p>Nama</p>
					</div>
					<div class="col-8">
						<input type="text" name="nama" value="<?= $ps->nama; ?>" class="form-control">
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-3">
						<p>Gender</p>
					</div>
					<div class="col-8">
						<input class="form-check-input" type="radio" name="gender" id="laki" value="Laki-laki" <?php if ($ps->gender == "Laki-laki") {
																													echo "checked";
																												} ?>>
						<label class="form-check-label" for="laki">
							Laki-laki
						</label>
						<input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" <?php if ($ps->gender == "Perempuan") {
																														echo "checked";
																													} ?>>
						<label class="form-check-label" for="perempuan">
							Perempuan
						</label>
					</div>

				</div>
				<br>

				<div class="row">
					<div class="col-3">
						<p>Email</p>
					</div>
					<div class="col-8">
						<input type="email" name="email" class="form-control" value="<?= $ps->email; ?>">
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-3">
						<p>Password</p>
					</div>
					<div class="col-4">
						<input type="password" name="password" id="password" class="form-control" value="<?= $ps->password; ?>">
					</div>
					<div class="col-2">
						<input type="checkbox" id="lihatPassword"> Lihat Password
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-3">
						<p>Role</p>
					</div>
					<div class="col-8">
						<input type="hidden" class="form-control">
						<input type="text" class="form-control" value="Administrator" disabled>
					</div>
				</div>
				<br>
				<hr>
				<center>
					<a href="<?= site_url('AdminDashboard/delAdmin'); ?>" class="btn btn-danger">HAPUS DATA</a>
					<input type="submit" class="btn btn-primary" value="SIMPAN PERUBAHAN" </center><br><br>
			</form>
	</div>
<?php endforeach ?>

<script>
	document.getElementById('lihatPassword').addEventListener('change', function() {
		var password = document.getElementById('password');
		if (this.checked) {
			password.type = 'text';
		} else {
			password.type = 'password';
		}
	});
</script>
</body>

</html>
</body>

</html>