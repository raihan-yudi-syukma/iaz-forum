<?php
$validation = service('validation');
$submit = [
	'name' => 'submit',
	'type' => 'submit',
	'value' => 'Simpan Perubahan',
	'class' => 'button w-100',
];
?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card card-border border-purple pt-5 pb-4 pl-4 pr-4">

	<div class="text-left mb-3">
		<h1 class="font-weight-bold text-white rounded p-2 mb-3" style="background-color: purple;">
			<i class="fas fa-user h1"></i>
			Profil User: <strong class="h1 font-weight-bold"><?= $user->username ?></strong>
		</h1>

		<!-- user edit -->
		<?php if(session()->id === $user->id) : ?>
		<div class="d-flex flex-row" style="gap: 10px;">
			<a href="<?= base_url('user/edit') ?>" role="button" class="btn btn-primary">
				<i class="fas fa-edit"></i>
				Edit Profil
			</a>
			<a href="<?= base_url('user/passwordEdit') ?>" role="button" class="btn btn-warning">
				<i class="fas fa-lock"></i> Ubah Password
			</a>
		</div>
		<?php endif ?>
	</div>

	<div class="row mt-3">
		<!-- avatar -->
		<div class="m-auto">
			<img src="<?= $user->avatar ? base_url('uploads/avatar/'.$user->avatar) : base_url('assets/images/user-logo.jpeg')?>" alt="User's Avatar" class="rounded img-fluid" style="width: 300px; height: 300px">
		</div>

		<div class="col-md-8 table-responsive">
			<table class="table">
				<!-- name -->
				<tr>
					<th scope="row">Nama</th>
					<td><?= htmlspecialchars($user->name) ?></td>
				</tr>
				<!-- username -->
				<tr>
					<th scope="row">Username</th>
					<td><?=  htmlspecialchars($user->username) ?></td>
				</tr>
				<!-- email -->
				<tr>
					<th scope="row">Email</th>
					<td><?= htmlspecialchars($user->email) ?></td>
				</tr>

				<?php if(session()->role === 'Admin') : ?>
				<!-- birthdate -->
				<tr>
					<th scope="row">Tanggal Lahir</th>
					<td><?= $user->birthdate ?></td>
				</tr>
				<!-- address -->
				<tr>
					<th scope="row">Alamat</th>
					<td><?= htmlspecialchars($user->address) ?></td>
				</tr>
				<!-- phone_number -->
				<tr>
					<th scope="row">No. Telepon</th>
					<td><?= $user->phone_number ?></td>
				</tr>

				<?= form_open_multipart('user/view/'.$user->id, '', ['id' => $user->id])?>

				<!-- role -->
				<tr class="form-grpup">
					<th scope="row"><?= form_label('Role', 'role') ?></th>
					<td>
						<select name="role" id="role" required="true">
							<?php foreach ($roles as $role) : ?>
							<option value="<?= $role ?>" <?= set_select('role', $role, $role === $user->role ? true : false) ?>>
								<?= $role ?>
							</option>
							<?php endforeach?>
						</select>
					</td>
				</tr>

				<!-- status -->
				<tr class="form-group">
					<th scope="row"><?= form_label('Status', 'status') ?></th>
					<td>
					<select name="status" id="status" required="true">
						<?php foreach ($statuses as $status) : ?>
						<option value="<?= $status ?>" <?= set_select('status', $status, $status === $user->status ? true : false) ?>>
							<?= $status ?>
						</option>
						<?php endforeach?>
					</select>
					</td>
				</tr>

				<!-- submit -->
				<tr id="submitChanges" class="d-none">
					<td colspan="2"><?= form_submit($submit) ?></td>
				</tr>

				<?= form_close() ?>

				<?php else : ?>
				<!-- role -->
				<tr>
					<th scope="row">Role</th>
					<td><?= $user->role ?></td>
				</tr>	
				<?php endif ?>
			</table>
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- /.card -->

<script type="text/javascript">
	$(document).ready(function() {
		// Get elements
		const role = $("#role");
		const status = $("#status");
		const submitChanges = $("#submitChanges");

		// Show submit button.
		role.change(function() {
			submitChanges.removeClass("d-none");
		});
		status.change(function() {
			submitChanges.removeClass("d-none");
		});
	});
</script>

<?= $this->endSection() ?>
