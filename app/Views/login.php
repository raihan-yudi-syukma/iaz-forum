<?php
$username = [
	'name' => 'username',
	'id' => 'username',
	'type' => 'text',
	'placeholder' => 'Username atau email',
	'value' => set_value('username'),
	'required' => true,
];
$password = [
	'name' => 'password',
	'id' => 'password',
	'placeholder' => 'Password',
	'value' => set_value('password'),
	'required' => true,
];
$showPassword = [
	'id' => 'showPassword',
	'class' => 'mr-2',
];
$login = [
	'name' => 'submit',
	'type' => 'submit',
	'value' => 'Login',
	'class' => 'button mb-3',
];
?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card card-border border-purple pt-4 pb-4 pl-4 pr-4" id="loginPage">

	<img src="<?= base_url('assets/images/login-logo.jpeg') ?>" alt="Login picture" class="ml-auto mr-auto mb-3 img-fluid rounded-circle" style="max-width: 100%; height: 200px">

	<h4 class="font-weight-bold text-white rounded p-2 mb-3" style="background-color: purple;">
		<i class="fas fa-user-circle h4"></i>
		User Login
	</h4>

	<?= form_open('auth/login', ['autocomplete' => 'off']) ?>

	<!-- username or email -->
	<div class="form-group">
		<?= form_input($username) ?>
	</div>

	<!-- password -->
	<div class="form-group">
		<?= form_password($password) ?>
	</div>

	<!-- show password -->
	<div class="form-group d-flex">
		<?= form_checkbox($showPassword) ?>
		<?= form_label('Tampilkan Password', 'showPassword', ['class' => 'm-0']) ?>
	</div>

	<!-- submit -->
	<?= form_submit($login) ?>

	<!-- register -->
	<p class="text-center">
		Anda Belum terdaftar? <a href="<?= base_url('auth/register') ?>">Register disini!</a>
	</p>
</div>

<?= $this->endSection() ?>
