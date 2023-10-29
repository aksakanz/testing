<html>

<head>
    <link href="<?= base_url('assets/css/homeuser.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="p-3 mb-2 bg-light text-dark">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> PERHATIAN <i class="fa-solid fa-exclamation"></i></strong>
                Seleksi penerimaan karyawan PT Infomedia Nusantara tidak dipungut biaya apapun selama proses rekrutmen berlangsung.

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php foreach ($detail as $d) : ?>
                <center>
                    <h3>
                        Job yang kamu apply adalah <b><?= $d->job_title; ?></b>
                    </h3>
                </center>
            <?php endforeach; ?>
            <br>

            <center>
                <h5>Akses Psikotes Anda Pada Form Di Bawah Ini</h5>
                <form action="<?= site_url('UserDashboard/test'); ?>" method="post">
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('message') ?>
                        </div>
                    <?php endif; ?>
                    <div class="input-group mb-3">
                        <input type="hidden" name="userid" value="<?= $this->session->userdata('userid'); ?>">
                        <input type="text" class="form-control" name="token" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </form>


                <p class="text-muted"><i class="fa-solid fa-circle-exclamation"></i> Untuk mengetahui token, akan diberikan oleh <b>Admin</b> dengan <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">Klik disini</a></p>
            </center>


            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Token Kelas Anda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-warning">
                                <strong>PERHATIAN !</strong> Token hanya dapat dilakukan 1(satu) kali untuk test, pastikan koneksi internet / perangkat anda sudah dipersiapkan.
                            </div>
                            <?php if (isset($token)) : ?>
                                <p>Token Anda adalah: <b><?= $token; ?></b></p>
                            <?php else : ?>
                                <p>Token tidak ditemukan.</p>
                            <?php endif; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>


            <hr>

            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h4>Proses Lamaran Kamu</h4>
                        <ul class="timeline">
                            <?php foreach ($tl as $item) : ?>
                                <li>
                                    <p class="text-info"><?= $item['historyTitle']; ?> - <?= date('d F, Y', strtotime($item['date'])); ?></p>
                                    <p><?= $item['historyDesc']; ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>



        </div>

    </div>
</body>

</html>