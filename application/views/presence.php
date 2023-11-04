<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Absensi di PT Four Best Synergy</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/index.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/fa/css/all.min.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>


</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <a href="<?= site_url('Index'); ?>" class="btn btn-primary">Kembali</a>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <center>
                    <div class="container">
                        <div class="clock">
                            <div id="real-time-clock" class="text-center" style="font-size: 48px;"></div>
                            <div id="date" class="text-center" style="font-size: 24px;"></div>
                        </div>
                    </div>
                    <br>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('Presence/Presence'); ?>" method="post">
                        <h3>Masukan Nama Anda</h3>

                        <input type="number" name="employeeId" class="form-control">
                        <input type="hidden" name="date" value="<?= date('d'); ?>">
                        <input type="hidden" name="month" value="<?= date('m'); ?>">
                        <input type="hidden" name="year" value="<?= date('Y'); ?>">
                        <input type="hidden" name="checkIn" value="<?= date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="checkOut" value="<?= date('Y-m-d H:i:s'); ?>">
                        <br>

                        <button type="submit" name="action" value="absensi" class="btn btn-success">Absensi</button>

                        <button type="submit" name="action" value="checkout" class="btn btn-primary">Check Out</button>
                    </form>

                </center>
            </div>
        </div>
    </section>


    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
    <script>
        function updateClock() {
            const now = new Date();
            const options = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            const time = now.toLocaleTimeString('id-ID', options);
            const date = now.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            document.getElementById('real-time-clock').textContent = time;
            document.getElementById('date').textContent = date;
        }

        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>

</html>