<html>

<head></head>

<body>
    <h1 class="mt-4">Verifikasi Peserta</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Verifikasi Peserta</li>
    </ol>

    <?php foreach ($peserta as $ps) : ?>
        <div class="container-fluid">
            <div class="alert alert-danger">
                <i class="fas fa-triangle-exclamation"></i> Akun Belum Terverifikasi
            </div>
            <br>
            <center>
                <img src="<?= base_url('assets/img/profile/' . $ps->foto); ?>" alt="Profile Image" class="img-thumbnail rounded-circle" width="100" height="100">
            </center>
            <div class="container">

                <b><u>Data Diri</u></b><br><br>
                <div class="row">
                    <div class="col-3">
                        <p>NIK</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->nik; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Nama</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->nama; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Tanggal Lahir</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->tgl_lhr; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Jenis Kelamin</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->gender; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Status Marital</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->s_marital; ?></p>
                    </div>
                </div>
                <br>

                <b><u>Kontak</u></b><br><br>
                <div class="row">
                    <div class="col-3">
                        <p>Nomor Ponsel / WA</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->tlp; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Email</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->email; ?></p>
                    </div>
                </div>
                <br>

                <b><u>Alamat</u></b><br><br>
                <div class="row">
                    <div class="col-3">
                        <p>Alamat Domisili</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->dom_alamat_jalan; ?>, <?= $ps->dom_kelurahan; ?>, <?= $ps->dom_kecamatan; ?>, <?= $ps->dom_kota; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Alamat KTP</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->ktp_alamat_jalan; ?>, <?= $ps->ktp_kelurahan; ?>, <?= $ps->ktp_kecamatan; ?>, <?= $ps->ktp_kota; ?></p>
                    </div>
                </div>
                <br>

                <b><u>Pendidikan</u></b><br><br>
                <div class="row">
                    <div class="col-3">
                        <p>Pendidikan Terakhir</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->last_major; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Nama Sekolah / Institusi</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->institusi; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Tahun Lulus</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->tahun_lulus; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>IPK</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->last_ipk; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Keahlian</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->keahlian; ?></p>
                    </div>
                </div>
                <br>

                <b><u>Riwayat Pekerjaan Terakhir</u></b><br><br>
                <div class="row">
                    <div class="col-3">
                        <p>Jenis Pekerjaan</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->last_job; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Nama Perusahaan</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->inst_name; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Periode Kerja</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->from_year; ?> - <?= $ps->to_year; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p>Gaji</p>
                    </div>
                    <div class="col-8">
                        <p><?= $ps->gaji; ?></p>
                    </div>
                </div>
                <hr>
                <center>
                    <form action="<?= base_url('AdminDashboard/verified') ?>" method="post">
                        <input type="hidden" name="userid" value="<?= $ps->userid; ?>">
                        <?php
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomString = substr(str_shuffle($characters), 0, 10);
                        ?>
                        <input type="hidden" name="userid" value="<?= $ps->userid; ?>">
                        <input type="hidden" name="token" value="<?= $randomString; ?>">
                        <button type="submit" class="btn btn-primary">Verifikasi</button>
                    </form>
                </center>
                <br>
            </div>


        <?php endforeach ?>

</body>

</html>