<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">Penjadwalan Interview</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Penjadwalan Interview</li>
    </ol>

    <table class="table table-hover table-striped table-borderless" id="pesertaTable">
        <thead>
            <tr>
                <th>Job Applied</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Domisili</th>
                <th>Tanggal Lahir</th>
                <th>Nilai</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($data) : ?>
                <?php foreach ($data as $ps) : ?>
                    <tr>
                        <td><?= $ps->job_title; ?></td>
                        <td><?= $ps->nik; ?></td>
                        <td><?= $ps->nama; ?></td>
                        <td><?= $ps->dom_alamat_jalan; ?>, <?= $ps->dom_kelurahan; ?>, <?= $ps->dom_kecamatan; ?>, <?= $ps->dom_kota; ?></td>
                        <td><?= $ps->tgl_lhr; ?></td>
                        <td><b><?= $ps->score; ?></b></td>
                        <td><?= $ps->gender; ?></td>
                        <td>
                            <a href="<?= site_url('AdminDashboard/setInterviewDate/' . $ps->userid) ?>" class="btn btn-primary"><i class="fas fa-calendar"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Tidak ada data yang cocok.</td>
                </tr>
            <?php endif ?>
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