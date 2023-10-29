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
		<div class="alert alert-warning" role="alert">

			<strong> PERHATIAN <i class="fa-solid fa-exclamation"></i></strong>
			Seleksi penerimaan karyawan PT Infomedia Nusantara tidak dipungut biaya apapun selama proses rekrutmen berlangsung.
		</div>
		<center>
			<h1>Lowongan Pekerjaan Yang Tersedia</h1>
			<h6>Penempatan departemen disesuaikan dengan hasil tes</h6>
		</center>

		<br>

		<div class="container">
			<?php foreach ($items as $item) : ?>
				<?php if ($item->jobv_status == 1) : // Cek status pekerjaan 
				?>
					<div class="p-3 mb-2 bg-light text-dark">
						<h4><?= $item->jobv_title; ?></h4>
						<p><?= $item->jobv_desc; ?></p>
						<div class="row">
							<div class="col-md-2">
								<p class="text-info">Requirements</p>
							</div>
							<div class="col-md-8">
								<?php foreach ($item->jobv_requirement as $requirement) : ?>
									<span class="badge rounded-pill text-bg-secondary"><?= $requirement; ?></span>
								<?php endforeach; ?>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-2">
								<p class="text-info">Majors</p>
							</div>
							<div class="col-md-8">
								<?php foreach ($item->jobv_major as $major) : ?>
									<span class="badge rounded-pill text-bg-secondary"><?= $major; ?></span>
								<?php endforeach; ?>
							</div>
						</div><br>
						<center>
							<a href="<?= site_url('index/applyJob/' . $item->jobv_id); ?>" class="btn btn-primary">Apply</a>
						</center>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div><br>



	</div>



	<footer class="footer bg-dark text-light text-center">
		<div class="container">
			<p>&copy; <?php echo date('Y'); ?> BrainProfiler. All rights reserved.</p>
		</div>
	</footer>

</body>

</html>