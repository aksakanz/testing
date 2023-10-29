<html>

<head></head>

<body>
    <h1 class="mt-4">Data Peserta</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Peserta</li>
    </ol>

    <?php foreach ($peserta as $ps) : ?>
        <div class="container-fluid">
            <div class="alert alert-success">
                <i class="fas fa-check"></i> Akun Sudah Terverifikasi
            </div>
            <br>
            <a href="<?= base_url('AdminDashboard/dbPeserta') ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</a>
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
                <br>
                <hr>
                <center>
                    <a class="btn btn-danger" href="<?= base_url('AdminDashboard/delUser/' . $ps->userid) ?>">Hapus Data</a>
                </center>
                <br>
            </div>


        <?php endforeach ?>

</body>

</html>