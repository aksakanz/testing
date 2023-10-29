<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <link href="<?= base_url('assets/css/index.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/fa/css/all.min.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>


</head>

<body>

    <?php if ($this->session->userdata('role') === '1') : ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?= site_url('UserDashboard/home'); ?>">
                    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="PT Infomedia Nusantara" style="max-width: 100px; height: auto;"> <!-- Adjust the max-width to control the size -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="<?= site_url('UserDashboard/home'); ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('UserDashboard/scores'); ?>">Hasil Tes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('UserDashboard/profile'); ?>">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('auth/logout'); ?>">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <?php endif; ?>
    <?php if ($this->session->flashdata('alert')) : ?>
        <div class="alert alert-success">
            Selamat datang, <b><?= $this->session->userdata('nama'); ?></b>
            <?php echo $this->session->flashdata('alert'); ?>
        </div>
    <?php endif; ?>

    <div class="container mt-5">
        <?php $this->load->view($content); ?>
    </div>

    <footer class="footer bg-dark text-light text-center">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> BrainProfiler. All rights reserved.</p>
        </div>
    </footer>
    <script>
        var currentUrl = window.location.href;
        var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        for (var i = 0; i < navLinks.length; i++) {
            var href = navLinks[i].getAttribute('href');
            if (currentUrl.indexOf(href) !== -1) {
                navLinks[i].classList.add('active');
            }
        }
    </script>

</body>

</html>