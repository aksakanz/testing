<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">List Soal</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">List Soal</li>
    </ol>

    <table class="table table-hover table-striped table-borderless" id="pesertaTable">
        <thead>
            <tr>
                <th>Soal</th>
                <th>Pilihan A</th>
                <th>Pilihan B</th>
                <th>Pilihan C</th>
                <th>Pilihan D</th>
                <th>Kunci Jawaban</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $ps) : ?>
                <tr>
                    <td><?= $ps->question_text; ?></td>
                    <td><?= $ps->option_a; ?></td>
                    <td><?= $ps->option_b; ?></td>
                    <td><?= $ps->option_c; ?></td>
                    <td><?= $ps->option_d; ?></td>
                    <td><?= $ps->correct_option; ?></td>
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