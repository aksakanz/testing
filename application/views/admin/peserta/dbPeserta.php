<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">Database Peserta</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Database Peserta</li>
    </ol>

    <table class="table table-hover table-striped table-borderless" id="pesertaTable">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Domisili</th>
                <th>Job Apllied</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peserta as $ps) : ?>
                <tr>
                    <td><?= $ps->nik; ?></td>
                    <td><?= $ps->nama; ?></td>
                    <td><?= $ps->dom_alamat_jalan; ?>, <?= $ps->dom_kelurahan; ?>, <?= $ps->dom_kecamatan; ?>, <?= $ps->dom_kota; ?></td>
                    <td><?= $ps->job_title; ?></td>
                    <td>
                        <?php
                        if ($ps->is_verified == 0) {
                            echo "<span class='badge rounded-pill text-bg-danger'>Belum Diverifikasi</span>";
                        } else if ($ps->is_verified == 1) {
                            echo "<span class='badge rounded-pill text-bg-success'>Terverifikasi</span>";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="<?= site_url('AdminDashboard/dbPesertaView/' . $ps->userid) ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php foreach ($peserta as $ps) : ?>
        <div class="modal fade" id="detail<?= $ps->nik; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailLabel">Detail Peserta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success">
                            <i class="fas fa-check"></i> Akun Telah Terverifikasi
                        </div>
                        <br>
                        <center>
                            <img src="<?= base_url('assets/img/profile/' . $ps->foto); ?>" alt="Profile Image" class="img-thumbnail rounded-circle">
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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

        <script>
            $(document).ready(function() {
                $('#pesertaTable').DataTable();
            });
        </script>
</body>

</html>