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
						<a class="nav-link " href="<?= site_url('index'); ?>">Job Vacancy</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="<?= site_url('index/company'); ?>">Company</a>
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



	<style>
		.jumbotron {
			background-color: #f4511e;
			color: #ffffff;
			padding: 100px 25px;
		}

		.bg-grey {
			background-color: #f6f6f6;
		}

		.container-fluid {
			padding: 60px 50px;
		}

		.logo {
			font-size: 200px;
			color: #f4511e;
		}

		.logo-small {
			font-size: 50px;
			color: #f4511e;
		}

		@media-screen and max-width(768px) {
			.col.sm.4 {
				text-align: center;
				margin: 25px 0px;
			}
		}
	</style>


	<div class="container mt-5">
		<div class="jumbotron text-center">
			<h1>Yup it's me</h1>
			<h2>I'm Adib</h2>
			<p>Student in Web Designing</p>
			<form class="form-inline">
				<div class="input-group">
					<input type="email" class="form-control" size="50" placeholder="Email Address" required>
					<div class="input-group-btn">
						<button class="btn btn-danger" type="button">Subscribe</button>
					</div>
				</div>
			</form>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-8">
					<h2>About Company</h2>
					<h4>Good</h4>
					<p>lala</p>
					<button class="btn btn-default btn-lg">Get in touch</button>
				</div>
				<div class="col-sm-4">
					<span class="glyphicon glyphicon-signal logo"></span>
				</div>
			</div>
		</div>

		<div class="container-fluid bg-grey">
			<div class="row">
				<div class="col-sm-4">
					<span class="glyphicon glyphicon-globe logo"> </span>
				</div>
				<div class="col-sm-8">
					<h2>Our Values</h2>
					<h4><strong>Mission:</strong> Our mission lorem ipsum....</h4>
					<p><strong>Vision:</strong> Our vision lorem ipsum...</p>
				</div>
			</div>
		</div>

		<div class="container-fluid text-center">
			<h2>Service</h2>
			<h4>What We Offer</h4>
			<br>

			<div class="row">
				<div class="col-sm-4">
					<span class="glyhicon glyphicon-off logo-small"></span>
					<h4>Power</h4>
					<p>Lorem ipsum dolor sit amen...</p>
				</div>

				<div class="col-sm-4">
					<span class="glyphicon glyphicon-heart logo-small"></span>
					<h4>Love</h4>
					<p>Lorem ipsum dolor sit amen...</p>
				</div>

				<div class="col-sm-4">
					<span class="glyphicon glyphicon-briefcase logo-small"></span>
					<h4>Job Done</h4>
					<p>Lorem ipsum dolor sit amen...</p>
				</div>
			</div>

			<br><br>

			<div class="row">
				<div class="col-sm-4">
					<span class="glyphicon glyphicon-leaf logo-small"></span>
					<h4>Green</h4>
					<p>Lorem ipsum dolor sit amen...</p>
				</div>

				<div class="col-sm-4">
					<span class="glyphicon glyphicon-certificate logo-small"></span>
					<h4>Certified</h4>
					<p>Lorem ipsum dolor sit amen...</p>
				</div>

				<div class="col-sm-4">
					<span class="glyphicon glyphicon-wrench logo-small"></span>
					<h4>Hard Work</h4>
					<p>Lorem ipsum dolor sit amen...</p>
				</div>
			</div>
		</div>

	</div>



	<footer class="footer bg-dark text-light text-center">
		<div class="container">
			<p>&copy; <?php echo date('Y'); ?> BrainProfiler. All rights reserved.</p>
		</div>
	</footer>

</body>

</html>