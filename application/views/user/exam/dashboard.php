<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">
                <img src="<?= base_url('assets/img/logo.png'); ?>" alt="PT Infomedia Nusantara" style="max-width: 100px; height: auto;"> <!-- Adjust the max-width to control the size -->
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <?php $this->load->view($content); ?>
    </div>

    <footer class="footer bg-dark text-light text-center">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> BrainProfiler. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>