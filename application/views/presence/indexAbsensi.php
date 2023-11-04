<!DOCTYPE html>
<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">Absensi Karyawan</h1>
    <br>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <form action="<?= site_url('Presence/search'); ?>" method="post">
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
                <table class="table table-hover table-striped table-borderless" id="presence">
                    <thead>
                        <tr>
                            <th>PreId</th>
                            <th>Employee</th>
                            <th>CheckIn</th>
                            <th>CheckOut</th>
                            <th>WorkHours</th>
                            <th>Date</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($presenceData as $row) : ?>
                            <tr>
                                <td><?= $row->preId; ?></td>
                                <td><?= $row->fullName; ?></td>
                                <td><?= $row->checkIn; ?></td>
                                <td><?= $row->checkOut; ?></td>
                                <td>
                                    <?php
                                    if ($row->checkIn && $row->checkOut) {
                                        $checkInTime = new DateTime($row->checkIn);
                                        $checkOutTime = new DateTime($row->checkOut);
                                        $interval = $checkInTime->diff($checkOutTime);
                                        echo $interval->format('%H:%I:%S');
                                    } else {
                                        echo 'Tidak ada data CheckIn atau CheckOut.';
                                    }
                                    ?>
                                </td>
                                <td><?= $row->date; ?></td>
                                <td><?= $row->month; ?></td>
                                <td><?= $row->year; ?></td>
                                <td><?= $row->status; ?></td>
                                <td><?= $row->notes; ?></td>
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
            $('#presence').DataTable();
        });
    </script>
</body>

</html>