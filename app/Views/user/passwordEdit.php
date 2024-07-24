<?php
$validation = service('validation');
$password = [
	'name' => 'password',
	'id' => 'password',
	'minlength' => 8,
	'maxlength' => 50,
	'value' => set_value('password'),
	'required' => true,
	'class' => $validation->hasError('password') ? 'w-100 input-invalid' : 'w-100',
];
$repeatPassword = [
	'name' => 'repeat_password',
	'id' => 'repeatPassword',
	'minlength' => 8,
	'maxlength' => 50,
	'value' => set_value('repeat_password'),
	'required' => true,
	'class' => $validation->hasError('repeat_password') ? 'w-100 input-invalid' : 'w-100',
];
$submit = [
	'name' => 'submit',
	'type' => 'submit',
	'value' => 'Ubah',
	'class' => 'button',
];
?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card border-purple pt-4 pb-4 pl-4 pr-4" id="passwordEditPage">

	<h4 class="text-white p-2 rounded font-weight-bold" style="background-color: purple;">
		<i class="fas fa-lock h4"></i>
		Ubah Password
	</h4>

	<?= form_open('user/passwordEdit') ?>

	<!-- password -->
	<div class="form-group">
		<?= form_label('Password', 'password') ?>
		<?= form_password($password) ?>
		<small class="form-text text-muted">Password terdiri dari 8 sampai 50 karakter dan terdiri dari huruf kecil, huruf kapital dan angka.</small>
		<span class="text-danger"><?= validation_show_error('password') ?></span>
	</div>
	
	<!-- repeat password -->
	<div class="form-group">
		<?= form_label('Konfirmasi Password', 'repeatPassword', ['class' => 'mb-0']) ?>
		<?= form_password($repeatPassword) ?>
		<span class="text-danger"><?= validation_show_error('repeat_password') ?></span>
	</div>

	<!-- submit -->
	<?= form_submit($submit) ?>

</div>

<?= $this->endSection() ?>
