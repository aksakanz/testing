<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">Token</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Token</li>
    </ol>

    <?php if ($token) : ?>
        <table class="table table-hover table-striped table-borderless" id="pesertaTable">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>TOKEN</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($token as $ps) : ?>
                    <tr>
                        <td><?= $ps->userid; ?></td>
                        <td><?= $ps->nama; ?></td>
                        <td><b><?= $ps->token; ?></b></td>
                        <td>
                            <?php
                            if ($ps->is_used == 0) {
                                echo "<span class='badge rounded-pill text-bg-danger'>Token Belum Dipakai</span>";
                            } else if ($ps->is_used == 1) {
                                echo "<span class='badge rounded-pill text-bg-success'>Token Sudah Dipakai</span>";
                            }
                            ?>
                        </td>
                        <td>
                            <form action="<?= base_url('AdminDashboard/resetToken') ?>" method="post">
                                <?php
                                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $randomString = substr(str_shuffle($characters), 0, 10);
                                ?>
                                <input type="hidden" name="userid" value="<?= $ps->userid; ?>">
                                <input type="hidden" name="token" value="<?= $randomString; ?>">
                                <input type="hidden" name="is_used" value="0">
                                <button class="btn btn-primary"> Reset </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-warning">No matching data found.</div>
    <?php endif; ?>


    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#pesertaTable').DataTable();
        });
    </script>
</body>

</html>