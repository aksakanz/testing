<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Selamat datang di PT Four Best Synergy</title>
	<link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/index.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/fa/css/all.min.css') ?>" rel="stylesheet">
	<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>


</head>

<body>
	<form action="<?= site_url('auth/login'); ?>" method="post">
		<section class="vh-100" style="background-color: #508bfc;">
			<div class="alert alert-secondary">
				untuk absensi karyawan <a href="<?= site_url('Index/Presence'); ?>">Klik disini</a>
			</div>
			<div class="container py-5 h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col-12 col-md-8 col-lg-6 col-xl-5">
						<div class="card shadow-2-strong" style="border-radius: 1rem;">
							<div class="card-body p-5 text-center">
								<?php
								if ($this->session->flashdata('msg')) {
									echo "<div class='alert alert-danger' role='alert'>" . $this->session->flashdata('msg') . "</div>";
								}
								?>
								<h3 class="mb-5">Sign in</h3>

								<div class="form-outline mb-4">
									<input type="username" id="typeEmailX-2" class="form-control form-control-lg" name="username" />
									<label class="form-label" for="typeEmailX-2">Username</label>
								</div>

								<div class="form-outline mb-4">
									<input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" />
									<label class="form-label" for="typePasswordX-2">Password</label>
								</div>

								<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</form>


	<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

</body>

</html>