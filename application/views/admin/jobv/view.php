<!DOCTYPE html>
<html>

<head>
	<title>Tambah Job Vacancy</title>
</head>

<body>
	<h1 class="mt-4">Tambah Job Vacancy</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		<li class="breadcrumb-item active">Tambah Job Vacancy</li>
	</ol>

	<div class="container">
		<a href="<?= base_url('AdminDashboard/jobVacancy') ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</a>
		<br>
		<br>
		<?php foreach ($jobv as $jb) : ?>
			<?php
			$requirementArray = explode(',', $jb->jobv_requirement);
			$majorArray = explode(',', $jb->jobv_major);
			?>

			<form method="post" action="<?= base_url('AdminDashboard/updateJobVacancy/' . $jb->jobv_id) ?>">
				<div class="row">
					<div class="col-3">
						<input type="hidden" name="jobv_id" value="<?= $jb->jobv_id; ?>">
						<p>Jabatan</p>
					</div>
					<div class="col-8">
						<input type="text" name="jobv_title" class="form-control" value="<?= $jb->jobv_title; ?>">
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-3">
						<p>Deskripsi Pekerjaan</p>
					</div>
					<div class="col-8">
						<textarea class="form-control" name="jobv_desc"><?= $jb->jobv_desc; ?>
						</textarea>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-3">
						<p>Requirement</p>
					</div>
					<div class="col-8">
						<div id="requirement-container">
							<?php
							$requirementArray = explode(', ', $jb->jobv_requirement);
							foreach ($requirementArray as $requirement) {
								echo '<div class="requirement-inputs">';
								echo '<input type="text" class="form-control" name="jobv_requirement[]" value="' . $requirement . '">';
								echo '</div>';
							}
							?>
							<br>
							<button type="button" class="btn btn-primary" id="tambah-requirement"><i class="fas fa-plus"></i> Tambah Requirement</button>
						</div>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-3">
						<p>Pendidikan</p>
					</div>
					<div class="col-8">
						<div id="major-container">
							<?php
							$majorArray = explode(', ', $jb->jobv_major);
							foreach ($majorArray as $major) {
								echo '<div class="major-inputs">';
								echo '<input type="text" class="form-control" name="jobv_major[]" value="' . $major . '">';
								echo '</div>';
							}
							?>
							<br>
							<button type="button" class="btn btn-primary" id="tambah-major"><i class="fas fa-plus"></i> Tambah Pendidikan</button>
						</div>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-3">
						<p>Status Job Vacancy</p>
					</div>
					<div class="col-8">
						<select class="form-select" name="jobv_status">
							<option selected value="<?= $jb->jobv_status; ?>">
								<?php if ($jb->jobv_status == 1) {
									echo "Aktif";
								} elseif ($jb->jobv_status == 0) {
									echo "Tidak Aktif";
								}
								?>
							</option>
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
						</select>
					</div>
				</div>
				<br>
				<hr>
				<center>
					<input type="reset" class="btn btn-danger" value="RESET">
					<input type="submit" class="btn btn-primary" value="SIMPAN">
				</center>
				<br>
			</form>
	</div>
<?php endforeach ?>

<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		const requirementContainer = document.getElementById("requirement-container");
		const tambahRequirementButton = document.getElementById("tambah-requirement");

		tambahRequirementButton.addEventListener("click", function() {
			const newInput = document.createElement("input");
			newInput.type = "text";
			newInput.className = "form-control";
			newInput.name = "jobv_requirement[]";
			newInput.placeholder = "Tambah requirement...";
			requirementContainer.insertBefore(newInput, tambahRequirementButton);
		});

		requirementContainer.addEventListener("input", function() {
			const inputs = document.querySelectorAll("input[name='jobv_requirement[]']");
			const values = Array.from(inputs).map(input => input.value);
			const joinedValues = values.join(", ");
			console.log(joinedValues);
			const hiddenInput = document.querySelector("input[name='jobv_requirement']");
			hiddenInput.value = joinedValues;
		});
	});

	document.addEventListener("DOMContentLoaded", function() {
		const majorContainer = document.getElementById("major-container");
		const tambahMajorButton = document.getElementById("tambah-major");

		tambahMajorButton.addEventListener("click", function() {
			const newInput = document.createElement("input");
			newInput.type = "text";
			newInput.className = "form-control";
			newInput.name = "jobv_major[]";
			newInput.placeholder = "Tambah Pendidikan...";
			majorContainer.insertBefore(newInput, tambahMajorButton);
		});

		majorContainer.addEventListener("input", function() {
			const inputs = document.querySelectorAll("input[name='jobv_major[]']");
			const values = Array.from(inputs).map(input => input.value);
			const joinedValues = values.join(", ");
			console.log(joinedValues);
			const hiddenInput = document.querySelector("input[name='jobv_major']");
			hiddenInput.value = joinedValues;
		});
	});
</script>
</body