<!DOCTYPE html>
<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">Hari Kerja & Jam Masuk</h1>
    <br>
    <div class="container h-100">
        <form action="<?= site_url('Operational/updateOps'); ?>" method="post">
            <?php foreach ($getOps as $row) : ?>
                <input type="hidden" name="opId" value="<?= $row->opId; ?>">
                <div class="row">
                    <div class="col-3">
                        <p>Mulai Hari Operasional</p>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="dayFrom" value="<?= $row->dayFrom; ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <p>Akhir Hari Operasional</p>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="dayTo" value="<?= $row->dayTo; ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <p>Jam Mulai Operasional</p>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="checkInOp" value="<?= $row->checkInOp; ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <p>Jam Akhir Operasional</p>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="checkOutOp" value="<?= $row->checkOutOp; ?>">
                    </div>
                </div>
                <hr>
                <center>
                    <input type="submit" class="btn btn-success" value="Simpan">
                </center>
            <?php endforeach ?>
        </form>
    </div>
    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

</body>

</html>