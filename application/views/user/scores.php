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
                    <h4><b>HASIL TEST ANDA</b></h4>
                </center>
                <br>
                <?php if (empty($score)) : ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p><i class="fas fa-exclamation-triangle"></i> Tidak Ada Data</p>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <?php foreach ($score as $sc) : ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Token</p>
                                </div>
                                <div class="col-md-8">
                                    <span class="badge bg-secondary"><?= $sc->token; ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Tanggal Pelaksanaan</p>
                                </div>
                                <div class="col-md-8">
                                    <p> <?= $sc->date; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Nilai Tes Anda</p>
                                </div>
                                <div class="col-md-8">
                                    <p> <?= $sc->score; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Status Test Anda</p>
                                </div>
                                <div class="col-md-8">
                                    <p>
                                        <?php
                                        if ($sc->status == "Lulus") {
                                            echo "<span class='badge rounded-pill text-bg-success'>Lulus</span>";
                                        } else if ($sc->status == "Tidak Lulus") {
                                            echo "<span class='badge rounded-pill text-bg-danger'>Tidak Lulus</span>";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <br>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
                <br>
                <center>
                    <h4><b>JADWAL INTERVIEW & PERSYARATAN YANG HARUS DIBAWA</b></h4>
                </center>
                <br>
                <div class="container">
                    <?php if (empty($interview)) : ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p><i class="fas fa-exclamation-triangle"></i> Tidak Ada Data</p>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php foreach ($interview as $iv) : ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Nomor Antrian</p>
                                </div>
                                <div class="col-md-8">
                                    <h4><b><?= $iv->antrian; ?></b></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Tanggal Pelaksanaan</p>
                                </div>
                                <div class="col-md-8">
                                    <p><?= $iv->tanggal; ?></p>
                                </div>
                            </div>
                            <div class "row">
                                <div class="col-md-3">
                                    <p>Tempat Pelaksanaan</p>
                                </div>
                                <div class="col-md-8">
                                    <p><?= $iv->tempat; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Persyaratan yang harus dibawa</p>
                                </div>
                                <div class="col-md-8">
                                    <ul>
                                        <li><?= str_replace(',', '</li><li>', $iv->persyaratan); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Status Interview Anda</p>
                                </div>
                                <div class="col-md-8">
                                    <p>
                                        <?php
                                        if ($iv->statusInterview == "Lolos") {
                                            echo "<span class='badge rounded-pill text-bg-success'>Lulus</span>";
                                        } else if ($iv->statusInterview == "Tidak Lolos") {
                                            echo "<span class='badge rounded-pill text-bg-danger'>Tidak Lulus</span>";
                                        } else if ($iv->statusInterview == "Akan Berlangsung") {
                                            echo "<span class='badge rounded-pill text-bg-secondary'>Akan Berlangsung</span>";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>