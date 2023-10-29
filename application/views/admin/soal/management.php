<html>

<head></head>

<body>
    <h1 class="mt-4">Management Soal</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item "><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active">Management Soal</li>
    </ol>

    <div class="card mb-4">

        <div class="card-body">
            <?php if ($this->session->flashdata('success_message')) : ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success_message'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('msg'); ?>
                </div>
            <?php endif; ?>
            <p class="mb-0">
            <div class="alert alert-warning">
                <strong><i class="fas fa-triangle-exclamation"></i> PERHATIAN</strong> Untuk mengupload soal dan jawaban ke sistem, maka file <b>Excel</b> harus diformat menjadi <b>csv</b> terlebih dahulu.
            </div>

            <p>Template untuk memasukan soal dan kunci jawaban : <a href="<?php echo base_url('AdminDashboard/downloadFile'); ?>">Download</a></p>

            <form method="post" action="<?php echo base_url('AdminDashboard/uploadSoal'); ?>" enctype="multipart/form-data">
                <input type="file" class="form-control" name="userfile" accept=".csv">
                <br>
                <input class="btn btn-primary" type="submit" name="import_data" value="Upload Soal">
            </form>
            <br>
            <hr>
            <center>
                <form method="post" action="<?php echo base_url('AdminDashboard/deleteSoal'); ?>">
                    <input class="btn btn-danger" type="submit" name="delete_data" value="Hapus Semua Soal ">
                </form>
            </center>
            </p>
        </div>
    </div>
    <!--<div style="height: 100vh"></div>-->


</body>

</html>