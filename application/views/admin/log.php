<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">Log User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Log User</li>
    </ol>

    <table class="table table-hover table-striped table-borderless" id="pesertaTable">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($log as $l) : ?>
                <tr>
                    <td><?= $l->userid; ?></td>
                    <td><?= $l->historyTitle; ?></td>
                    <td><?= $l->historyDesc; ?></td>
                    <td><?= $l->date; ?></td>
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