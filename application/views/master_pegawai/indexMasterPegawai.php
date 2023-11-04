<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">Master Pegawai</h1>
    <br>

    <div class="container">
        <table class="table table-hover table-striped table-borderless" id="masterEmployee">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Bergabung</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getEmp as $ps) : ?>
                    <tr>
                        <td><?= $ps->fullName; ?></td>
                        <td><?= $ps->address; ?></td>
                        <td><?= $ps->position; ?></td>
                        <td><?= $ps->joinedAt; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#masterEmployee').DataTable();
        });
    </script>
</body>

</html>