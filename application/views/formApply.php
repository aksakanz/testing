<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Career PT Infomedia Nusantara</title>
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png'); ?>">
	<link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/index.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/fa/css/all.min.css') ?>" rel="stylesheet">
	<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>


</head>

<body>
	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		/* Firefox */
		input[type=number] {
			-moz-appearance: textfield;
		}
	</style>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="<?= site_url('index'); ?>">
				<img src="<?= base_url('assets/img/logo.png'); ?>" alt="PT Infomedia Nusantara" style="max-width: 100px; height: auto;"> <!-- Adjust the max-width to control the size -->
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link active" href="<?= site_url('index'); ?>">Job Vacancy</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('index/company'); ?>">Company</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('index/contact'); ?>">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('index/login'); ?>">Masuk</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>




	<div class="container mt-5">
		<div class="alert alert-warning" role="alert">

			<strong> PERHATIAN <i class="fa-solid fa-exclamation"></i></strong>
			Seleksi penerimaan karyawan PT Infomedia Nusantara tidak dipungut biaya apapun selama proses rekrutmen berlangsung.
		</div>
		<center>
			<h1>Internship Registration Form</h1>
		</center>

		<br>

		<div class="container">
			<div class="p-3 mb-2 bg-light text-dark">
				<form action="<?= base_url() . 'index/apply'; ?>" method="post" enctype="multipart/form-data">
					<?php foreach ($jobvDetail as $job) { ?>
						<div class="row">
							<?php
							$min = pow(10, 7);
							$max = pow(10, 8) - 1;
							$randomNumber = rand($min, $max);
							$randomNumber = str_pad($randomNumber, 8, '0', STR_PAD_LEFT);
							?>
							<input type="hidden" name="date" value="<?= date('d M y'); ?>">
							<input type="hidden" name="userid" value="<?= $randomNumber; ?>">
							<div class="col-md-2">
								<label for="melamar">Melamar <span class="text-danger">*</span></label>
							</div>
							<div class="col-md-9">
								<input type="text" id="melamar" name="job_title" class="form-control" value="<?= $job->jobv_title; ?>" readonly>
							</div>
						</div>
					<?php } ?>
					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="ktp">Nomor KTP <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<input type="number" id="ktp" name="nik" class="form-control" require>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<input type="text" id="nama" name="nama" class="form-control" require>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="jk">Jenis Kelamin <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<center>
								<input class="form-check-input" type="radio" name="gender" id="laki" value="Laki-laki">
								<label class="form-check-label" for="laki">
									Laki-laki
								</label>
								<input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan">
								<label class="form-check-label" for="perempuan">
									Perempuan
								</label>
							</center>
						</div>
					</div>

					<br>


					<div class="row">
						<div class="col-md-2">
							<label for="tlp">Nomor Telephon/Whatsapp Aktif <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<input type="number" id="tlp" name="tlp" class="form-control" require>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="email">E-mail (Gmail) <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<input type="email" id="email" name="email" class="form-control" require>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="tl">Tanggal Lahir Sesuai KTP <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<input type="date" id="tl" name="tgl_lhr" class="form-control" require>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="alamat">Alamat KTP <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-2">
							<input type="text" id="alamat" name="ktp_provinsi" class="form-control" require placeholder="Provinsi">
						</div>
						<div class="col-md-2">
							<input type="text" id="alamat" name="ktp_kota" class="form-control" require placeholder="Kota / Kabupaten">
						</div>
						<div class="col-md-2">
							<input type="text" id="alamat" name="ktp_kecamatan" class="form-control" require placeholder="Kecamatan">
						</div>
						<div class="col-md-2">
							<input type="text" id="alamat" name="ktp_kelurahan" class="form-control" require placeholder="Kelurahan">
						</div>
						<div class="col-md-2">
							<textarea id="alamat" class="form-control" placeholder="Alamat Jalan" name="ktp_alamat_jalan"></textarea>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="alamat">Alamat Domisili <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-2">
							<input type="text" id="alamat" name="dom_provinsi" class="form-control" require placeholder="Provinsi">
						</div>
						<div class="col-md-2">
							<input type="text" id="alamat" name="dom_kota" class="form-control" require placeholder="Kota / Kabupaten">
						</div>
						<div class="col-md-2">
							<input type="text" id="alamat" name="dom_kecamatan" class="form-control" require placeholder="Kecamatan">
						</div>
						<div class="col-md-2">
							<input type="text" id="alamat" name="dom_kelurahan" class="form-control" require placeholder="Kelurahan">
						</div>
						<div class="col-md-2">
							<textarea id="alamat" class="form-control" placeholder="Alamat Jalan" name="dom_alamat_jalan"></textarea>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="tl">Agama <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<select class="form-select" aria-label="Default select example" name="agama">
								<option selected>Pilih Data Agama</option>
								<option value="Budha">Budha</option>
								<option value="Hindu">Hindu</option>
								<option value="Islam">Islam</option>
								<option value="Katolik">Katolik</option>
								<option value="Kristen">Kristen</option>
								<option value="Kong Hu Cu">Kong Hu Cu</option>
							</select>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="jk">Status Marital <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<center>
								<input class="form-check-input" type="radio" name="s_marital" id="bm" value="Belum Menikah">
								<label class="form-check-label" for="bm">
									Belum Menikah
								</label>
								<input class="form-check-input" type="radio" name="s_marital" id="m" value="Sudah Menikah">
								<label class="form-check-label" for="sm">
									Sudah Menikah
								</label>
							</center>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="tl">Pendidikan Terakhir <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<select class="form-select" aria-label="Default select example" name="last_major">
								<option selected>Pendidikan Terakhir</option>
								<option value="SMA / SMK">SMA/SMK</option>
								<option value="D4">D4</option>
								<option value="S1">S1</option>
								<option value="S2">S2</option>
								<option value="S3">S3</option>
								<option value="Double Degree">Double Degree</option>
							</select>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="unv">Institusi Pendidikan / Universitas <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<input type="text" id="unv" name="institusi" class="form-control" require>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="tl">IPK Terakhir <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<select class="form-select" aria-label="Default select example" name="last_ipk">
								<option selected>Pilih Range IPK</option>
								<option value="< 2.75">
									< 2.75</option>
								<option value="2.75 - 2.99">2.75 - 2.99</option>
								<option value="3.00 - 3.24">3.00 - 3.24</option>
								<option value="3.25 - 3.49">3.25 - 3.49</option>
								<option value="3.50 - 3.74">3.50 - 3.74</option>
								<option value="3.75 - 4.00">3.75 - 4.00</option>
							</select>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="tk">Tahun Kelulusan <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<input type="number" id="tk" name="tahun_lulus" class="form-control" require>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="kk">Keahlian Khusus <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<textarea id="kk" name="keahlian" require class="form-control"></textarea>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="pk">Pengalaman Kerja / Magang Terakhir</label>
						</div>
						<div class="col-md-2">
							<select class="form-select" aria-label="Default select example" name="last_job">
								<option>Jenis Pekerjaan</option>
								<option value="Part Time">Fresh Graduated</option>
								<option value="Part Time">Part Time</option>
								<option value="Full Time">Full Time</option>
								<option value="Internship / Magang">Internship / Magang</option>
							</select>
						</div>
						<div class="col-md-2">
							<input type="text" id="pk" name="inst_name" class="form-control" placeholder="Nama Instansi">
						</div>
						<div class="col-md-2">
							<input type="text" id="pk" name="last_pos" class="form-control" placeholder="Posisi / Jabatan">
						</div>
						<div class="col-md-2">
							<label for="pk">Dari Tahun</label>
							<input type="date" id="pk" name="from_year" class="form-control" placeholder="Dari Tahun">
							<label for="pk">Hingga Tahun</label>
							<input type="date" id="pk" name="to_year" class="form-control" placeholder="Hingga Tahun">
						</div>
						<div class="col-md-2">
							<input type="number" id="pk" name="gaji" class="form-control" placeholder="Gaji">
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="pp">Pas Foto <span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<input type="file" name="foto" class="form-control">
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-2">
							<label for="pw">Password<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-9">
							<input type="password" name="password" id="password" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-9">
							<input type="checkbox" id="showPassword"> Tampilkan Password
						</div>
					</div>


					<br>
					<hr>
					<center>
						<input type="submit" class="btn btn-primary" value="Apply">
					</center>
				</form>


			</div>
		</div>
	</div>



	<footer class="footer bg-dark text-light text-center">
		<div class="container">
			<p>&copy; <?php echo date('Y'); ?> BrainProfiler. All rights reserved.</p>
		</div>
	</footer>

	<script>
		const showPasswordCheckbox = document.getElementById('showPassword');
		const passwordInput = document.getElementById('password');

		showPasswordCheckbox.addEventListener('change', function() {
			if (showPasswordCheckbox.checked) {
				passwordInput.type = 'text';
			} else {
				passwordInput.type = 'password';
			}
		});
	</script>


</body>

</html>