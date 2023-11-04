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
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/fa/js/all.js') ?>"></script>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
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
                        <a class="nav-link" href="<?= site_url('Dashboard/index'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="<?= site_url('Dashboard/MasterPegawai'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                            Master Pegawai
                        </a>

                        <a class="nav-link" href="<?= site_url('Dashboard/Payroll'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                            Payroll
                        </a>

                        <a class="nav-link" href="<?= site_url('Dashboard/Operational'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                            Hari Kerja dan Jam Masuk Kerja
                        </a>

                        <a class="nav-link" href="<?= site_url('Dashboard/Presence'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                            Absensi Karyawan
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

        </div>
    </div>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
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