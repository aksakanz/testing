<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <div class="container">
        <div class="bg-light text-dark">
            <div class="container">
                <br>
                <center>
                    <h4><b>Profile</b></h4>
                </center>
                <br>
                <?php foreach ($detail as $pf) : ?>
                    <center>
                        <img src="<?= base_url('assets/img/profile/' . $pf->foto); ?>" alt="Profile Image" class="img-thumbnail rounded-circle" style="width: 100px; height: auto;">

                    </center>
                    <br>
                    <div class="container">
                        <b><u>Data Diri</u></b><br><br>
                        <div class="row">
                            <div class="col-3">
                                <p>NIK</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->nik; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Nama</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->nama; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Agama</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->agama; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Tanggal Lahir</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->tgl_lhr; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Jenis Kelamin</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->gender; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Status Marital</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->s_marital; ?></p>
                            </div>
                        </div>
                        <br>
                        <b><u>Kontak</u></b><br><br>

                        <div class="row">
                            <div class="col-3">
                                <p>Nomor Ponsel / WA</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->tlp; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Email</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->email; ?></p>
                            </div>
                        </div>

                        <br>
                        <b><u>Alamat</u></b><br><br>

                        <div class="row">
                            <div class="col-3">
                                <p>Alamat Domisili</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->dom_alamat_jalan; ?>, <?= $pf->dom_kelurahan; ?>, <?= $pf->dom_kecamatan; ?> - <?= $pf->dom_kota; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Alamat KTP</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->ktp_alamat_jalan; ?>, <?= $pf->ktp_kelurahan; ?>, <?= $pf->ktp_kecamatan; ?> - <?= $pf->ktp_kota; ?></p>
                            </div>
                        </div>

                        <br>
                        <b><u>Pendidikan</u></b><br><br>

                        <div class="row">
                            <div class="col-3">
                                <p>Pendidikan Terakhir</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->last_major; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Nama Sekolah / Institusi</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->institusi; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Tahun Lulus</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->tahun_lulus; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>IPK</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->last_ipk; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Keahlian</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->keahlian; ?></p>
                            </div>
                        </div>

                        <br>
                        <b><u>Riwayat Pekerjaan Terakhir</u></b><br><br>

                        <div class="row">
                            <div class="col-3">
                                <p>Jenis Pekerjaan</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->last_job; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Nama Perusahaan</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->inst_name; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Periode Kerja</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->from_year; ?> - <?= $pf->to_year; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <p>Gaji</p>
                            </div>
                            <div class="col-8">
                                <p><?= $pf->gaji; ?></p>
                            </div>
                        </div>

                    </div>
                <?php endforeach ?>
                <br>

                <br>
            </div>



        </div>
    </div>
    </div>
</body>

</html>