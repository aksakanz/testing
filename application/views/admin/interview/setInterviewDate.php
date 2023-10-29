<html>

<head></head>

<body>

    <div class="container-fluid">

        <h1 class="mt-4">Penjadwalan Interview</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Penjadwalan Interview</li>
        </ol>

        <a href="<?= base_url('AdminDashboard/createInterview') ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</a>
        <br>
        <br>
        <?php if (!empty($peserta)) : ?>
            <?php foreach ($peserta as $ps) : ?>
                <div class="alert alert-warning">
                    <i class="fas fa-triangle-exclamation"></i> Harap teliti sebelum submit jadwal interview
                </div>
                <br>
                <form action="<?= base_url('AdminDashboard/setInterview') ?>" method="post">
                    <label>User ID</label>
                    <input type="hidden" class="form-control" name="is_interview" value="1" readonly>
                    <input type="hidden" class="form-control" name="nilai" value="<?= $ps->score; ?>" readonly>
                    <input type="hidden" class="form-control" name="tanggal_ujian" value="<?= $ps->date; ?>" readonly>
                    <input type="hidden" class="form-control" name="domisili" value="<?= $ps->dom_alamat_jalan; ?>, <?= $ps->dom_kelurahan; ?>, <?= $ps->dom_kecamatan; ?>, <?= $ps->dom_kota; ?>" readonly>
                    <input type="number" class="form-control" name="userid" value="<?= $ps->userid; ?>" readonly>
                    <br>
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $ps->nama; ?>" readonly>
                    <br>
                    <label>Job Applied</label>
                    <input type="text" class="form-control" name="job_title" value="<?= $ps->job_title; ?>" readonly>
                    <br>
                    <label>Antrian</label>
                    <input type="number" class="form-control" name="antrian" require>
                    <br>
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" require>
                    <br>
                    <label>Tempat</label>
                    <textarea class="form-control" name="tempat" require></textarea>
                    <br>
                    <div id="persyaratan-container">
                        <div class="persyaratan-inputs">
                            <input type="text" class="form-control" name="persyaratan[]" required>
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary" id="tambah-persyaratan"><i class="fas fa-add"></i> Tambah Persyaratan</button>
                    </div>

                    <input type="hidden" name="persyaratan" value="">
                    <br>
                    <label>Status Inteview</label>
                    <input type="text" class="form-control" name="statusInterview" value="Akan Berlangsung" readonly>
                    <br>
                    <hr>
                    <center>
                        <input type="reset" class="btn btn-danger" value="Reset">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </center>
                </form>
            <?php endforeach ?>
        <?php endif ?>
    </div>

    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById("persyaratan-container");
            const tambahButton = document.getElementById("tambah-persyaratan");

            tambahButton.addEventListener("click", function() {
                const newInput = document.createElement("input");
                newInput.type = "text";
                newInput.className = "form-control";
                newInput.name = "persyaratan[]";
                newInput.placeholder = "Tambah persyaratan...";
                container.insertBefore(newInput, tambahButton);
            });
            container.addEventListener("input", function() {
                const inputs = document.querySelectorAll("input[name='persyaratan[]']");
                const values = Array.from(inputs).map(input => input.value);
                const joinedValues = values.join(", ");
                console.log(joinedValues);
                const hiddenInput = document.querySelector("input[name='persyaratan']");
                hiddenInput.value = joinedValues;
            });
        });
    </script>

</body>

</html>