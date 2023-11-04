<!DOCTYPE html>
<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">Payroll Karyawan</h1>
    <br>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <form action="<?= site_url('Payroll/search'); ?>" method="post">
                    <center>
                        <h3>Pilih Periode</h3>
                    </center>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="year" value="<?= date('Y'); ?>">
                        <input type="number" class="form-control" name="month" value="<?= date('m'); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cari Data</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php if (isset($presenceData)) : ?>
                <h2>Hasil Pencarian:</h2>
                <table class="table table-hover table-striped table-borderless" id="payroll">
                    <thead>
                        <tr>
                            <th>Nama Karyawan</th>
                            <th>Jam Kerja Bulan Ini</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($presenceData as $row) : ?>
                            <tr>
                                <td><?= $row->fullName; ?></td>
                                <td> <?php
                                        if ($row->checkIn && $row->checkOut) {
                                            $checkInTime = new DateTime($row->checkIn);
                                            $checkOutTime = new DateTime($row->checkOut);
                                            $interval = $checkInTime->diff($checkOutTime);
                                            echo $interval->format('%H:%i:%s');
                                        } else {
                                            echo 'Tidak ada data CheckIn atau CheckOut.';
                                        }
                                        ?></td>
                                <td><a href="<?= site_url('Payroll/detail/' . $row->employeeId) ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Tidak ada hasil ditemukan untuk periode ini.</p>
            <?php endif; ?>

        </div>
    </div>
    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#payroll').DataTable();
        });
    </script>
</body>

</html>