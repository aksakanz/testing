<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1 class="mt-4">Verifikasi Peserta</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Verifikasi Peserta</li>
    </ol>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-triangle-exclamation"></i> PERHATIAN</strong> Mohon teliti dalam melakukan verifikasi data.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <table class="table table-hover table-striped table-borderless" id="pesertaTable">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Domisili</th>
                <th>Job Apllied</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peserta as $ps) : ?>
                <tr>
                    <td><?= $ps->nik; ?></td>
                    <td><?= $ps->nama; ?></td>
                    <td><?= $ps->dom_alamat_jalan; ?>, <?= $ps->dom_kelurahan; ?>, <?= $ps->dom_kecamatan; ?>, <?= $ps->dom_kota; ?></td>
                    <td><?= $ps->job_title; ?></td>
                    <td>
                        <?php
                        if ($ps->is_verified == 0) {
                            echo "<span class='badge rounded-pill text-bg-danger'>Belum Diverifikasi</span>";
                        } else if ($ps->is_verified == 1) {
                            echo "<span class='badge rounded-pill text-bg-success'>Terverifikasi</span>";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="<?= site_url('AdminDashboard/pesertaView/' . $ps->userid) ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#pesertaTable').DataTable();
        });
    </script>
</body>

</html>