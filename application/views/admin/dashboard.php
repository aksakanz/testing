<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>
		<?php
		if ($title) {
			echo $title;
		} else {
			echo 'Page Not Found';
		}
		?>
	</title>
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png'); ?>">
	<link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet">
	<script src="<?= base_url('assets/fa/js/all.js') ?>"></script>
</head>

<body>
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<img src="<?= base_url('assets/img/logo.png'); ?>" alt="PT Infomedia Nusantara" style="max-width: 200px; height: auto;">
		<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
		<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
		</form>
		<!-- Navbar-->
		<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?= $this->session->userdata('nama'); ?></a>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="<?= site_url('auth/logout'); ?>">Logout</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<div class="sb-sidenav-menu-heading"></div>
						<a class="nav-link" href="<?= site_url('AdminDashboard/home'); ?>">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Dashboard
						</a>
						<div class="sb-sidenav-menu-heading">MANAGEMENT</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
							Peserta
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?= site_url('AdminDashboard/peserta'); ?>">Verifikasi Data</a>
								<a class="nav-link" href="<?= site_url('AdminDashboard/dbPeserta'); ?>">Database Peserta</a>
							</nav>
						</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#sesiKelas" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
							Sesi Kelas
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="sesiKelas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?= site_url('AdminDashboard/token'); ?>">Token</a>
								<a class="nav-link" href="<?= site_url('AdminDashboard/pesertaPass'); ?>">Hasil Psikotes</a>
							</nav>
						</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#sesiInterview" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="far fa-calendar"></i></div>
							Sesi Interview
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="sesiInterview" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?= site_url('AdminDashboard/createInterview'); ?>">Penjadwalan</a>
								<a class="nav-link" href="<?= site_url('AdminDashboard/interviewing'); ?>">Jadwal Interview</a>
							</nav>
						</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
							<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
							Bank Soal
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?= site_url('AdminDashboard/listSoal'); ?>">List Soal</a>
								<a class="nav-link" href="<?= site_url('AdminDashboard/managementSoal'); ?>">Management Soal</a>
							</nav>
						</div>

						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#jobVacancy" aria-expanded="false" aria-controls="collapsePages">
							<div class="sb-nav-link-icon"><i class="fas fa-suitcase"></i></div>
							Job Vacancy
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="jobVacancy" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?= site_url('AdminDashboard/addJobVacancy'); ?>">Tambah Lowongan</a>
								<a class="nav-link" href="<?= site_url('AdminDashboard/jobVacancy'); ?>">Management Lowongan</a>
							</nav>
						</div>

						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#userMan" aria-expanded="false" aria-controls="collapsePages">
							<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
							User
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="userMan" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?= site_url('AdminDashboard/addUser'); ?>">Tambah User</a>
								<a class="nav-link" href="<?= site_url('AdminDashboard/listUser'); ?>">Management User</a>
							</nav>
						</div>

						<a class="nav-link" href="<?= site_url('AdminDashboard/logUser'); ?>">
							<div class="sb-nav-link-icon"> <i class="fas fa-list"></i></i></div>
							Log User
						</a>
					</div>
				</div>
				<div class="sb-sidenav-footer">
					<div class="small">Logged in as:</div>
					Administrator
				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<?php $this->load->view($content); ?>
				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; BrainProfiler <?= date('Y'); ?></div>
						<div>

						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var currentUrl = window.location.href;

			var navLinks = document.querySelectorAll(".nav-link");

			navLinks.forEach(function(link) {
				var linkHref = link.getAttribute("href");
				if (currentUrl === linkHref) {
					link.classList.add("active");
				}
			});
		});
	</script>
</body>

</html>