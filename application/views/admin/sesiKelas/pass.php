<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">Hasil Psikotes</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Hasil Psikotes</li>
    </ol>


    <table class="table table-hover table-striped table-borderless" id="pesertaTable">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Nama</th>
                <th>TOKEN</th>
                <th>Tanggal Pelaksanaan</th>
                <th>Nilai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $ps) : ?>
                <tr>
                    <td><?= $ps->userid; ?></td>
                    <td><?= $ps->nama; ?></td>
                    <td><b><?= $ps->token; ?></b></td>
                    <td>
                        <?php
                        if ($ps->date == NULL) {
                            echo "<span class='badge rounded-pill text-bg-secondary'>Belum Mengerjakan</span>";
                        } else {
                            echo $ps->date;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($ps->score == 0) {
                            echo "<span class='badge rounded-pill text-bg-secondary'>Belum Mengerjakan</span>";
                        } else {
                            echo "<b>$ps->score</b>";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($ps->status == 'Lulus') {
                            echo "<span class='badge rounded-pill text-bg-success'>Lulus</span>";
                        } else if ($ps->status == 'Tidak Lulus') {
                            echo "<span class='badge rounded-pill text-bg-danger'>Tidak Lulus</span>";
                        } else if ($ps->status == NULL) {
                            echo "<span class='badge rounded-pill text-bg-secondary'>Belum Mengerjakan</span>";
                        }
                        ?>
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