<html>

<head></head>

<body>
	<h1 class="mt-4">Tambah Data User</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item "><a href="">Dashboard</a></li>
		<li class="breadcrumb-item active">List User Admin</li>
	</ol>

	<div class="container">
		<?php
		$message = $this->session->flashdata('message');

		if (!empty($message)) {
			echo '<div class="alert alert-success">' . $message . '</div>';
		}
		?>
		<br>

		<form method="post" action="<?= base_url('AdminDashboard/postUser') ?>" enctype="multipart/form-data">
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
					<?php
					$min = pow(10, 7);
					$max = pow(10, 8) - 1;
					$randomNumber = rand($min, $max);
					$randomNumber = str_pad($randomNumber, 8, '0', STR_PAD_LEFT);
					?>
					<input type="hidden" name="userid" value="<?= $randomNumber; ?>">
					<input type="number" name="nik" class="form-control">
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-3">
					<p>Nama</p>
				</div>
				<div class="col-8">
					<input type="text" name="nama" class="form-control">
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-3">
					<p>Gender</p>
				</div>
				<div class="col-8">
					<input class="form-check-input" type="radio" name="gender" id="laki" value="Laki-laki">
					<label class="form-check-label" for="laki">
						Laki-laki
					</label>
					<input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan">
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
					<input type="email" name="email" class="form-control">
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-3">
					<p>Password</p>
				</div>
				<div class="col-4">
					<input type="password" name="password" id="password" class="form-control">
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
					<input type="hidden" name="role" class="form-control" value="2">
					<input type="text" class="form-control" value="Administrator" disabled>
				</div>
			</div>
			<br>
			<hr>
			<center>
				<input type="reset" class="btn btn-danger" value="RESET">
				<input type="submit" class="btn btn-primary" value="SIMPAN" </center><br><br>
		</form>
	</div>

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