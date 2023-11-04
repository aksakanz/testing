<!DOCTYPE html>
<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <br>
    <a href="<?= site_url('Dashboard/Payroll'); ?>" class="btn btn-primary">Kembali</a>
    <h1 class="mt-4">Detail Payroll <b><?= $employeeName; ?></b></h1>
    <br>
    <div class="container h-100">
        <div class="p-3 mb-2 bg-secondary text-white">
            <?php foreach ($payrollData as $row) : ?>
                <div class="row">
                    <div class="col-3">
                        <p>Periode</p>
                    </div>
                    <div class="col-8">
                        <?= $row->date; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Tahun</p>
                    </div>
                    <div class="col-8">
                        <?= $row->year; ?>
                    </div>
                </div>

                <?php if ($countHadir > 0) : ?>
                    <div class="row">
                        <div class="col-3">
                            <p>Jumlah Hadir Dalam Sebulan</p>
                        </div>
                        <div class="col-8">
                            <?= $countHadir; ?> / <?= cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y')); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-3">
                        <p>Total Jam Kerja</p>
                    </div>
                    <div class="col-8">
                        <?php
                        if ($row->checkIn && $row->checkOut) {
                            $checkInTime = new DateTime($row->checkIn);
                            $checkOutTime = new DateTime($row->checkOut);
                            $interval = $checkInTime->diff($checkOutTime);
                            $totalHours = $interval->h + ($interval->i / 60) + ($interval->s / 3600);
                            echo $totalHours . " Jam";
                            $upah_per_jam = ($employeePosition == 'Staff') ? 30000 : 50000;
                            $upah_kotor = $totalHours * $upah_per_jam;
                        } else {
                            echo 'Tidak ada data CheckIn atau CheckOut.';
                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Jabatan</p>
                    </div>
                    <div class="col-8">
                        <b><?= $employeePosition; ?></b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Upah Per Jam</p>
                    </div>
                    <div class="col-8">
                        <b>IDR
                            <?php
                            if ($employeePosition == 'Staff') {
                                echo "30.000";
                            } elseif ($employeePosition == 'Manager') {
                                echo "50.000";
                            }
                            ?>
                        </b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Upah Kotor</p>
                    </div>
                    <div class="col-8">
                        <b>IDR <?= number_format($upah_kotor, 0, ',', '.'); ?></b>
                        <small>(Total Jam Kerja * Upah Per Jam)</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Pajak Penghasilan</p>
                    </div>
                    <div class="col-8">
                        <b>IDR
                            <?php
                            $pajak_penghasilan = $upah_kotor * 0.05;

                            echo number_format($pajak_penghasilan, 0, ',', '.');
                            ?>
                        </b> <small>(Upah Kotor * 5%)</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Denda Penghasilan</p>
                    </div>
                    <div class="col-8">
                        <b>IDR <?= $row->denda; ?></b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Upah Bersih</p>
                    </div>
                    <div class="col-8">
                        <b>IDR <?= number_format($upah_kotor - $pajak_penghasilan - $denda, 0, ',', '.'); ?></b> <small>(Upah Kotor - Pajak Penghasilan)</small>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
</body>

</html>