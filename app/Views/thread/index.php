<?php
$keyword = [
	'type' => 'search',
	'name' => 'keyword',
	'id' => 'keyword',
	'placeholder' => 'Cari berdasarkan judul atau isi...',
	'value' => set_value('keyword', $keyword, true),
	'maxlength' => 128,
];
$categoryId = [
	'name' => 'categoryId',
	'id' => 'categoryId',
	'required' => true,
];
$submit = [
	'name' => 'submit',
	'type' => 'submit',
	'class' => 'button w-100 rounded mb-3'
];
?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card card-border border-purple pt-4 pb-4 pl-4 pr-4" id="threadPage">

	<div class="mb-3" id="header">
		<!-- header -->
		<h1 class="font-weight-bold rounded p-2 h1 mb-0">
			<i class="fas fa-comments h1"></i> Daftar Thread
		</h1>
		<!-- add thread -->
		<a role="button" href="<?= base_url('thread/add') ?>" class="btn btn-primary" style="font-size: 25px;">
			Buat Thread <i class="fas fa-plus"></i>
		</a>
	</div>

	<!-- search thread -->
	<?= form_open('thread/index', ['method' => 'get', 'class' => 'mb-2']) ?>

	<!-- keyword -->
	<div class="form-group" id="threadSearch">
		<?= form_input($keyword) ?>
		<?= form_dropdown($categoryId, $categories, $categoryIdKey) ?>
	</div>

	<?= form_button($submit, 'Cari <i class="fas fa-search"></i>')?>

	<?= form_close() ?>
	
	<!-- thread list -->
	<?php if ($threads) : ?>
	<?php foreach ($threads as $key => $thread) : ?>
	<div class="card mb-3" id="threadSummary">
		
		<!-- header -->
		<div class="card-header" style="background-color: purple;">
			<a href="<?= base_url('thread/view/'.$thread->id) ?>" class="text-white h3 font-weight-bold text-decoration-none">
				<?= htmlspecialchars(substr($thread->title, 0, 50)) ?>
			</a>
		</div>

		<!-- body -->
		<div class="card-body row" style="gap: 30px;">
			<div class="col-sm-2 text-center" id="postedBy">

				<!-- created by -->
				<div class="mb-2">
					<div class="mb-1">Diposting oleh:</div>
					<!-- avatar -->
					<img src="<?= $thread->avatar ? base_url('uploads/avatar/'.$thread->avatar) : base_url('assets/images/user.jpeg') ?>" alt="<?= htmlspecialchars($thread->username).'\'s user avatar' ?>" class="rounded img-fluid" style="width: 100px; height: 100px">
					<br>
					<!-- username -->
					<a class="font-weight-bold" href="<?= base_url('user/view/'.$thread->username) ?>">
						<?= htmlspecialchars($thread->username) ?>
					</a>
				</div>

				<!-- created at -->
				<div>
					<div class="mb-1">Diposting pada:</div>
					<span class="font-weight-bold"><?= $thread->created_at ?></span>
				</div>
			</div>
			<!-- /.col -->
			
			<div class="col">
				<!-- content -->
				<div class="mb-5">
					<?php if(strlen($thread->content) > 500) : ?>
					<?= substr($thread->content, 0, 200).'...' ?>
					<?php else : ?>
					<?= $thread->content ?>
					<?php endif ?>
				</div>

				<!-- meta -->
				<div id="meta">
					<!-- category -->
					<div style="background-color: lightgreen; width: fit-content;" class="rounded p-2 " id="category">
						<?= $thread->category ?>
					</div>
					<!-- action -->
					<?php if (session()->role === 'Admin' || session()->username === $thread->username) : ?>
					<div id="action">
						<!-- edit -->
						<a href="<?= base_url('thread/edit/'.$thread->id) ?>" class="btn btn-info" role="button">
							Edit <i class="fas fa-pen"></i>
						</a>
						<!-- delete -->
						<a href="<?= base_url('thread/delete/'.$thread->id) ?>" class="btn btn-danger" role="button" onclick="return confirm('Anda yakin ingin menghapus thread ini?')">
							Hapus <i class="fas fa-trash"></i>
						</a>
					</div>
					<!-- /.action -->
					<?php endif ?>
				</div>
				<!-- /.meta -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.body -->
	</div>
	<!-- /.card-->
	<?php endforeach ?>

	<!-- pagination -->
	<div class="d-flex" style="gap: 5px;">Halaman: <?= $pager->links() ?></div>
	
	<?php else : ?>
	<h3 class="text-center">
		Tidak ada yang ditemukan... 
		<i class="fas fa-wind"></i>
		<i class="fas fa-leaf"></i>
	</h3 class="text-center">
	<?php endif ?>
</div>
<!-- /.container -->

<?= $this->endSection() ?>
		