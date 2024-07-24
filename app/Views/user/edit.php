<?php
$validation = service('validation');
$username = [
	'name' => 'username',
	'id' => 'username',
	'type' => 'text',
	'placeholder' => 'Minimal 6 karakter, Maksimal 30 karakter.',
	'minlength' => 6,
	'maxlength' => 30,
	'value' => set_value('username', $user->username),
	'required' => true,
	'class' => $validation->hasError('username') ? 'w-100 input-invalid' : 'w-100',
];
$name = [
	'name' => 'name',
	'id' => 'name',
	'type' => 'text',
	'placeholder' => 'Maksimal 100 karakter.',
	'maxlength' => 100,
	'value' => set_value('name', $user->name),
	'required' => true,
	'class' => $validation->hasError('name') ? 'w-100 input-invalid' : 'w-100',
];
$email = [
	'name' => 'email',
	'id' => 'email',
	'type' => 'email',
	'placeholder' => 'Input email yang valid.',
	'maxlength' => 50,
	'value' => set_value('email', $user->email),
	'required' => true,
	'class' => $validation->hasError('email') ? 'w-100 input-invalid' : 'w-100',
];
$birthdate = [
	'name' => 'birthdate',
	'id' => 'birthdate',
	'type' => 'date',
	'pattern' => '\d{2}-\d{2}-\d{4}',
	'value' => set_value('birthdate', $user->birthdate),
	'required' => true,
	'class' => $validation->hasError('birthdate') ? 'w-100 input-invalid' : 'w-100',
];
$address = [
	'name' => 'address',
	'id' => 'address',
	'placeholder' => 'Maksimal 255 karakter.',
	'maxlength' => 255,
	'value' => set_value('address', $user->address),
	'required' => true,
	'class' => $validation->hasError('address') ? 'w-100 input-invalid' : 'w-100',
];
$phoneNumber = [
	'name' => 'phone_number',
	'id' => 'phoneNumber',
	'type' => 'tel',
	'placeholder' => 'Format: 0000-0000-0000',
	'maxlength' => 15,
	'pattern' => '^\d{4}-\d{4}-\d{4}$',
	'value' => set_value('phone_number', $user->phone_number),
	'required' => true,
	'class' => $validation->hasError('phone_number') ? 'w-100 input-invalid' : 'w-100',
];
$avatar = [
	'name' => 'avatar',
	'id' => 'avatar',
	'accept' => 'image/*',
	'required' => true,
	'class' => $validation->hasError('avatar') ? 'w-100 input-invalid' : 'w-100',
];
$submit = [
	'name' => 'submit',
	'type' => 'submit',
	'value' => 'Edit',
	'class' => 'button w-100',
];
?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card card-border border-purple pt-5 pb-4 pl-4 pr-4" id="registerPage">

	<h4 class="font-weight-bold text-white p-2 rounded" style="background-color: purple;">
		<i class="h4 fas fa-edit"></i>
		Edit Profil
	</h4>
	
	<?= form_open_multipart('user/edit/'.$user->id, ['autocomplete' => 'off'], ['id' => $user->id]) ?>
	<div class="row">
		<div class="col">
			<!-- username -->
			<div class="form-group">
				<?= form_label('Username', 'username') ?>
				<?= form_input($username) ?>
				<small class="form-text text-muted">Username terdiri dari 6 sampai 30 karakter dan hanya terdiri dari huruf dan angka.</small>
				<span class="text-danger"><?= validation_show_error('username') ?></span>
			</div>

			<!-- name -->
			<div class="form-group">
				<?= form_label('Nama', 'name') ?>
				<?= form_input($name) ?>
				<span class="text-danger"><?= validation_show_error('name') ?></span>
			</div>

			<!-- email -->
			<div class="form-group">
				<?= form_label('Email', 'email') ?>
				<?= form_input($email) ?>
				<span class="text-danger"><?= validation_show_error('email') ?></span>
			</div>

			<!-- birthdate -->
			<div class="form-group">
				<?= form_label('Tanggal Lahir', 'birthdate') ?>
				<?= form_input($birthdate) ?>
				<span class="text-danger"><?= validation_show_error('birthdate') ?></span>
			</div>

			<!-- address -->
			<div class="form-group">
				<?= form_label('Alamat', 'address') ?>
				<?= form_input($address) ?>
				<span class="text-danger"><?= validation_show_error('address') ?></span>
			</div>
		</div>
		<!-- /.col -->

		<div class="col">
			<!-- phone number -->
			<div class="form-group" >
				<?= form_label('Nomor Telepon', 'phoneNumber') ?>
				<?= form_input($phoneNumber) ?>
				<small class="form-text text-muted">Nomot telepon harus terdiri dari 12 angka dengan format 1234-5678-9012.</small>
				<span class="text-danger"><?= validation_show_error('phone_number') ?></span>
			</div>

			<!-- avatar -->
			<div class="form-group">
				<?= form_label('Avatar', 'avatar') ?>
				<br>
				<img src="<?= $user->avatar ? base_url('uploads/avatar/'.$user->avatar) : base_url('assets/images/user-logo.jpeg') ?>" alt="User's uploaded avatar." class="rounded mb-2 img-fluid" style="width: 200px; height:200px;" id="uploadedFile">
				<?= form_upload($avatar) ?>
				<small class="form-text text-muted">Upload gambar dengan format .JPEG, .JPG, .PNG, atau .GIF dengan ukuran maksimal 1MB.</small>
				<span class="text-danger"><?= validation_show_error('avatar') ?></span>
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<!-- submit -->
	<?= form_submit($submit) ?>

	<?= form_close() ?>
</div>

<?= $this->endSection() ?>
