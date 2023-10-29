<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <!-- Konten di atas -->
                <div class="bg-light text-dark">
                    <br>
                    <div class="container">
                        <?php foreach ($profile as $pf) : ?>
                            <center>
                                <img src="<?= base_url('assets/img/profile/' . $pf->foto); ?>" alt="Profile Image" class="img-thumbnail rounded-circle">
                            </center>
                            <br>
                            <br>
                            <div class="col">
                                <h6>Nama</h6>
                            </div>
                            <div class="col">
                                <?= $pf->nama; ?>
                            </div>
                            <br>
                            <div class="col">
                                <h6>NIK</h6>
                            </div>
                            <div class="col">
                                <?= $pf->nik; ?>
                            </div>
                            <br>
                            <div class="col">
                                <h6>Tanggal Lahir</h6>
                            </div>
                            <div class="col">
                                <?= $pf->tgl_lhr; ?>
                            </div>
                            <br>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-9">
                <div class="bg-light text-dark">
                    <div class="container">
                        <center>
                            <h5>Hasil Ujian Anda</h5>
                        </center>
                        <p>Skor Anda: <b>
                                <h5><?= $score ?></h5>
                            </b></p>
                        <?php $message = $this->session->flashdata('message'); ?>
                        <?php if (!empty($message)) : ?>
                            <?php if (strpos($message, 'Selamat') !== false) : ?>
                                <div class="alert alert-success alert-dismissible">
                                    <b><?= $message ?></b>
                                    <p>Anda dapat melanjutkan ke tahap selanjutnya.</p>
                                </div>
                    </div>
                <?php else : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <b><?= $message ?></b>
                        <p>Anda tidak bisa melanjutkan ke tahap selanjutnya.</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <center>
                <form method="post" action="postScore">
                    <?php foreach ($profile as $pf) : ?>
                        <input type="hidden" name="userid" value="<?= $pf->userid; ?>">
                    <?php endforeach; ?>
                    <input type="hidden" name="score" value="<?= $score; ?>">
                    <input type="hidden" name="status" value="<?= ($message === 'Selamat, Anda lulus!') ? 'Lulus' : 'Tidak Lulus' ?>">
                    <input type="hidden" name="historyTitle" value="Kamu telah mengerjakan ujian">
                    <input type="hidden" name="date" value="<?= date('d M y'); ?>">
                    <input type="hidden" name="historyDesc" value="<?= ($message === 'Selamat, Anda lulus!') ? 'Selamat kamu lulus, kamu akan mengikuti tahap test selanjutnya, tahap selanjutnya akan dikabari via Email / Whatsapp. Atau juga cek secara berkala pada halaman akun anda' : 'Kamu tidak lulus, proses akan berakhir sampai disini. Sampai jumpa pada test selanjutnya.' ?>">
                    <button class="btn btn-primary" type="submit">Selesai <i class="fa-solid fa-arrow-right"></i></button>
                </form>
            </center>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        window.addEventListener('popstate', function(event) {
            window.location.href = "UserDashboard/home";
        });
        history.pushState(null, null, document.URL);
    </script>

</body>

</html>