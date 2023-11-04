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
            <?php endforeach ?>

            <?php
            $jumlah_hadir = $countHadir;
            $total_jam_kerja = $totalWorkHours;
            $employeePosition = $employeePosition;

            if ($employeePosition == 'Staff') {
                $upah_per_jam = 30000;
            } elseif ($employeePosition == 'Manager') {
                $upah_per_jam = 50000;
            } else {
                $upah_per_jam = 0;
            }

            $upah_kotor = $jumlah_hadir * $total_jam_kerja * $upah_per_jam;

            $pajak_penghasilan = 0;

            if ($employeePosition == 'Staff') {
                $pajak_penghasilan = 0.05 * $upah_kotor;
            } elseif ($employeePosition == 'Manager') {
                $pajak_penghasilan = 0.1 * $upah_kotor;
            }
            ?>

            <div class="row">
                <div class="col-3">
                    <p>Jumlah Hadir Dalam Sebulan</p>
                </div>
                <div class="col-8">
                    <?= $countHadir; ?>
                    <?php
                    $bulan_ini = date('n');
                    $tahun_ini = date('Y');
                    $jumlah_hari = cal_days_in_month(CAL_GREGORIAN, $bulan_ini, $tahun_ini);
                    echo "/ " . $jumlah_hari;
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <p>Total Jam Kerja</p>
                </div>
                <div class="col-8">
                    <?= $totalWorkHours; ?> Jam
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
                    <small>(Jumlah Hadir * Total Jam Kerja * Upah Perjam)</small>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <p>Pajak Penghasilan</p>
                </div>
                <div class="col-8">
                    <b>IDR <?= number_format($pajak_penghasilan, 0, ',', '.'); ?></b> <small>(Upah Kotor * 5%)</small>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <p>Upah Bersih</p>
                </div>
                <div class="col-8">
                    <b>IDR <?= number_format($upah_kotor - $pajak_penghasilan, 0, ',', '.'); ?></b> <small>(Upah Kotor - Pajak Penghasilan)</small>
                </div>
            </div>

        </div>
    </div>
    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
</body>

</html>