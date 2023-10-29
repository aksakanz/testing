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
		<?php
		$message = $this->session->flashdata('message');
		$error = $this->session->flashdata('error');

		if (!empty($message)) {
			echo '<div class="alert alert-success">' . $message . '</div>';
		}

		if (!empty($error)) {
			echo '<div class="alert alert-danger">' . $error . '</div>';
		}
		?>

		<form method="post" action="<?= base_url('AdminDashboard/postJobVacancy') ?>">
			<div class="row">
				<div class="col-3">
					<p>Jabatan</p>
				</div>
				<div class="col-8">
					<input type="text" name="jobv_title" class="form-control">
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-3">
					<p>Deskripsi Pekerjaan</p>
				</div>
				<div class="col-8">
					<textarea class="form-control" name="jobv_desc"></textarea> <!-- Ganti name dengan jobv_desc -->
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-3">
					<p>Requirement</p>
				</div>
				<div class="col-8">
					<div id="requirement-container">
						<div class="requirement-inputs">
							<input type="text" class="form-control" name="jobv_requirement[]"> <!-- Ganti name dengan jobv_requirement[] -->
						</div>
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
						<div class="major-inputs">
							<input type="text" class="form-control" name="jobv_major[]"> <!-- Ganti name dengan jobv_major[] -->
						</div>
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
						<option value="1" selected>Aktif</option>
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