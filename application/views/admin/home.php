<html>

<head></head>

<body>
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <?php if ($this->session->flashdata('alert')) : ?>
        <div class="alert alert-success">
            Selamat datang, <b><?= $this->session->userdata('nama'); ?></b>
            <?php echo $this->session->flashdata('alert'); ?>
        </div>
    <?php endif; ?>

    <div class="card mb-4">

        <div class="card-body">

            <p class="mb-0">
                SELAMAT DATANG DI APLIKASI BRAINPROFILER
            </p>
        </div>
    </div>
    <!--<div style="height: 100vh"></div>-->

</body>

</html>