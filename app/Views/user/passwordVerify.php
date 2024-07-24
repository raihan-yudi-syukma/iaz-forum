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
$showPassword = [
	'id' => 'showPassword',
	'class' => 'mr-2',
];
$submit = [
	'name' => 'submit',
	'type' => 'submit',
	'value' => 'Verifikasi',
	'class' => 'button',
];
?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card border-purple pt-4 pb-4 pl-4 pr-4" id="passwordVerifyPage">

	<h4 class="text-white p-2 rounded font-weight-bold" style="background-color: purple;">
		<i class="fas fa-key h4"></i>
		Verifikasi Password
	</h4>

	<?= form_open('user/passwordVerify') ?>

	<!-- password -->
	<div class="form-group">
		<?= form_label('Input password yang aktif sekarang:', 'password') ?>
		<?= form_password($password) ?>
		<span class="text-danger"><?= validation_show_error('password') ?></span>
	</div>
	
	<!-- show password -->
	<div class="form-group d-flex">
		<?= form_checkbox($showPassword) ?>
		<?= form_label('Tampilkan Password', 'showPassword', ['class' => 'm-0']) ?>
	</div>

	<!-- submit -->
	<?= form_submit($submit) ?>

</div>

<?= $this->endSection() ?>
