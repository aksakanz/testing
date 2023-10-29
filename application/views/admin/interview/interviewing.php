<html>

<head>
    <link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4">Interview</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Interview</li>
    </ol>


    <table class="table table-hover table-striped table-borderless" id="pesertaTable">
        <thead>
            <tr>
                <th>Antrian</th>
                <th>Nama</th>
                <th>Job Applied</th>
                <th>Domisili</th>
                <th>Tempat Interview</th>
                <th>Tanggal Ujian</th>
                <th>Nilai</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($data) : ?>
                <?php foreach ($data as $ps) : ?>
                    <?php if ($ps->statusInterview != "Lolos") : ?>
                        <tr>
                            <td><?= $ps->antrian; ?></td>
                            <td><?= $ps->nama; ?></td>
                            <td><b><?= $ps->job_title; ?></b></td>
                            <td><?= $ps->domisili; ?></td>
                            <td><?= $ps->tempat; ?></td>
                            <td><?= $ps->tanggal_ujian; ?></td>
                            <td><?= $ps->nilai; ?></td>
                            <td>
                                <?php
                                if ($ps->statusInterview == "Akan Berlangsung") {
                                    echo "<span class='badge rounded-pill text-bg-secondary'>$ps->statusInterview</span>";
                                } else if ($ps->statusInterview == "Lolos") {
                                    echo "<span class='badge rounded-pill text-bg-success'>$ps->statusInterview</span>";
                                } else if ($ps->statusInterview == "Tidak Lolos") {
                                    echo "<span class='badge rounded-pill text-bg-danger'>$ps->statusInterview</span>";
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?= site_url('AdminDashboard/viewInterviewing/' . $ps->userid) ?>" class="btn btn-primary"><i class="fas fa-calendar"></i></a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach ?>

            <?php else : ?>
                <tr>
                    <td colspan="6">Tidak ada data yang cocok.</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    <?php if ($data) : ?>
        <?php foreach ($data as $ps) : ?>
            <div class="modal fade" id="detail<?= $ps->userid; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
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

                                <b><u>Informasi Interview</u></b><br><br>
                                <div class="row">
                                    <div class="col-3">
                                        <p>Nomor Antrian</p>
                                    </div>
                                    <div class="col-8">
                                        <p><?= $ps->antrian; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <p>Tanggal</p>
                                    </div>
                                    <div class="col-8">
                                        <p><?= $ps->tanggal; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <p>Tempat Interview</p>
                                    </div>
                                    <div class="col-8">
                                        <p><?= $ps->tempat; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <p>Persyaratan</p>
                                    </div>
                                    <div class="col-8">
                                        <?php
                                        $persyaratan = $ps->persyaratan;

                                        if (strpos($persyaratan, ',') !== false) {
                                            $persyaratan_array = explode(',', $persyaratan);

                                            foreach ($persyaratan_array as $item) {
                                                $item = trim($item);

                                                echo '<div class="form-check">';
                                                echo '<input class="form-check-input" type="checkbox" value="' . $item . '" id="' . $item . '">';
                                                echo '<label class="form-check-label" for="' . $item . '">';
                                                echo $item;
                                                echo '</label>';
                                                echo '</div>';
                                            }
                                        } else {
                                            echo $persyaratan;
                                        }
                                        ?>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-3">
                                        <p>Status</p>
                                    </div>
                                    <div class="col-8">
                                        <form action="<?= base_url('AdminDashboard/setInterviewResult') ?>" method="post">
                                            <input type="text" name="userid" value="<?= $ps->userid; ?>">
                                            <input type="text" name="historyTitle" value="Kamu Sudah Melakukan Sesi Interview">
                                            <input type="text" name="historyDesc" value="Silahkan cek secara berkala pada halaman 'Hasil Test'">
                                            <input type="text" name="date" value="<?= date('d M y'); ?>">
                                            <select class="form-select" name="statusInterview">
                                                <option selected><?= $ps->statusInterview; ?></option>
                                                <option value="Lolos">Lolos</option>
                                                <option value="Tidak Lolos">Tidak Lolos</option>
                                            </select>
                                            <br>
                                            <input type="submit" class="btn btn-primary" value="Simpan">
                                        </form>
                                    </div>
                                </div>
                                <br>

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
        <?php else : ?>

        <?php endif ?>


        <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

        <script>
            $(document).ready(function() {
                $('#pesertaTable').DataTable();
            });
        </script>
</body>

</html>