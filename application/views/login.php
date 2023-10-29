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
		<section class="vh-100">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 text-black">

						<div class="px-5 ms-xl-4">
							<span class="h1 fw-bold mb-0"> <img src="<?= base_url('assets/img/logo.png'); ?>" alt="PT Infomedia Nusantara" style="max-width: 100px; height: auto;"> <!-- Adjust the max-width to control the size -->
							</span>
						</div>

						<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

							<form action="<?= site_url('Auth/login'); ?>" method="post" style="width: 23rem;">
								<?php
								if ($this->session->flashdata('msg')) {
									echo "<div class='alert alert-danger' role='alert'>" . $this->session->flashdata('msg') . "</div>";
								}
								?>


								<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

								<div class="form-outline mb-4">
									<input type="email" id="form2Example18" class="form-control form-control-lg" name="email">
									<label class="form-label" for="form2Example18">Email</label>
								</div>

								<div class="form-outline mb-4">
									<input type="password" id="form2Example28" class="form-control form-control-lg" name="password">
									<label class="form-label" for="form2Example28">Password</label>
								</div>

								<div class="pt-1 mb-4">
									<button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
								</div>

								<p class="small mb-5 pb-lg-2"><a class="text-muted" href="<?= site_url('Index/forget'); ?>">Lupa password?</a></p>

							</form>

						</div>

					</div>
					<div class="col-sm-6 px-0 d-none d-sm-block">
						<img src="<?= base_url('assets/img/loginImg.jpg'); ?>" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: right;">
					</div>
				</div>
			</div>
		</section>
	</div>

	<br>

	<footer class="footer bg-dark text-light text-center">
		<div class="container">
			<p>&copy; <?php echo date('Y'); ?> BrainProfiler. All rights reserved.</p>
		</div>
	</footer>

</body>

</html>



</body>

</html>