<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <style>
        /* Tambahkan CSS untuk membuat container dengan overflow scroll */
        .scroll-container {
            max-height: 300px;
            /* Tentukan ketinggian maksimum container */
            overflow-y: scroll;
            /* Tambahkan overflow-y: scroll untuk mengaktifkan scroll vertikal */
        }
    </style>
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
                    <div class="container scroll-container">
                        <center>
                            <b>PANDUAN DASAR PELAKSANAAN UJIAN</b>
                        </center>
                        <br>
                        <b>A. Aplikasi / Software</b>
                        <br>
                        <ol>
                            <li>
                                Penggunaan Aplikasi Zoom Meeting untuk kegiatan Sosialisasi teknis Pelaksanaan dan
                                Tes Online.
                            </li>

                            <li>
                                Penggunaan Web Browser / Peramban Web.
                            </li>

                            <li>
                                Web untuk Aplikasi Tes Online PT Infomedia Nusantara dalam pelaksanaan
                                asesmen daring sebagai pihak ke-3 pelaksana kegiatan.
                            </li>
                        </ol>
                        <br>
                        <b>B. STANDAR PERANGKAT TES ONLINE :</b>
                        <br>
                        <ol>
                            <li>
                                OS Android minimal 5(Jelly Bean) dengan RAM minimum 2Gb.
                            </li>

                            <li>
                                Komputer atau laptop yang digunakan minimal menggunakan Prosesor Dual Core
                                dengan memory RAM minimal 4 Gb, Mouse dan Keyboard Standar.
                            </li>

                            <li>
                                Sistem operasi minimal Windows 7, macOS/ OS X 10.9 dan Linux.
                            </li>

                            <li>
                                Web Browser / Peramban Web yang kompatibel untuk Tes Online adalah :
                            </li>
                            <span>a) Google Chrome update terbaru.</span><br>
                            <span>b) Mozilla Firefox update terbaru.</span><br>
                            <span>c) Opera update terbaru.</span><br>
                            <span>d) Safari update terbaru.</span><br>
                            <span>e) Microsoft Edge update terbaru.</span>

                            <li>
                                Harus ada koneksi Internet melalui kabel LAN maupun WiFi dengan Speed internet
                                minimal 10 Mbps setiap 1 smartphone/laptop di dalam jaringan yang sama.
                            </li>
                        </ol>
                        <br>

                        <b>C. KETENTUAN LAIN</b>
                        <ol>
                            <li>Untuk sesi yang belum berjalan dan mengalami kegagalan pada saat akan
                                pelaksanaan dikarenakan hal yang tidak dapat diperkirakan (misalnya karena aliran
                                listrik padam, force majeur, dll), maka dipastikan kembali dengan User.
                            </li>
                            <li>
                                Untuk sesi yang sedang berjalan dan mengalami kegagalan yang masih dapat diatasi
                                (misalnya error aplikasi): Sesi tersebut akan diteruskan kembali di hari yang sama
                                setelah kondisi berjalan normal.
                            </li>
                            <li>
                                Jawaban peserta akan tersimpan dalam sistem, dan peserta dapat melanjutkan
                                mengerjakan soal-soal asesmen yang belum dijawab.
                            </li>
                        </ol>
                    </div>
                    <br>
                    <br>
                    <div class="container">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="agreeCheckbox"> Saya telah membaca semua persyaratan di atas
                            </label>
                        </div>
                        <br>
                        <center>
                            <button class="btn btn-primary" id="startButton" disabled>Mulai Ujian <i class="fa-solid fa-arrow-right"></i></button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Dapatkan elemen checkbox dan tombol "Mulai Ujian"
        const agreeCheckbox = document.getElementById('agreeCheckbox');
        const startButton = document.getElementById('startButton');

        // Tambahkan event listener untuk checkbox
        agreeCheckbox.addEventListener('change', function() {
            if (this.checked) {
                // Aktifkan tombol jika checkbox dipilih
                startButton.removeAttribute('disabled');
            } else {
                // Nonaktifkan tombol jika checkbox tidak dipilih
                startButton.setAttribute('disabled', 'disabled');
            }
        });

        // Tambahkan event listener untuk tombol "Mulai Ujian"
        startButton.addEventListener('click', function() {
            // Arahkan ke controller "Testing" dan metodenya "exam"
            window.location.href = "<?= site_url('Testing/exam'); ?>";
        });
    </script>
</body>

</html>