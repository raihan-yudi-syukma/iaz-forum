<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div id="threadPage">
	<!-- thread -->
	<div class="bg-light pt-4 pb-4 pl-4 pr-4 card card-border border-purple ">

		<!-- title -->
		<h1 class="title font-weight-bold mb-1">
			<?= htmlspecialchars($thread->title) ?>
		</h1>

		<!-- rating -->
		<button class="btn btn-success">Beri Rating</button>

		<hr>

		<!-- content -->
		<div class="card-body row" style="gap: 30px;" id="threadSummary">
			<div class="col-sm-2 text-center" id="postedBy">

				<!-- created by -->
				<div class="mb-2">
					<div class="mb-1">Diposting oleh:</div>
					<!-- avatar -->
					<img src="<?= $created_by->avatar ? base_url('uploads/avatar/'.$created_by->avatar) : base_url('assets/images/user.jpeg') ?>" alt="<?= htmlspecialchars($created_by->username).'\'s avatar' ?>" class="rounded img-fluid" style="width: 100px; height: 100px">
					<br>
					<!-- username -->
					<a class="font-weight-bold" href="<?= base_url('user/view/'.$created_by->username) ?>">
						<?= htmlspecialchars($created_by->username) ?>
					</a>
				</div>
				<!-- created at -->
				<div>
					<div class="mb-1">Diposting pada:</div>
					<span class="font-weight-bold"><?= $thread->created_at ?></span>
				</div>

				<!-- updated by -->
				<?php if($thread->updated_by) : ?>
				<?php if($updated_by->username !== $created_by->username) : ?>
				<div class="mt-3 mb-2">
					<div class="mb-1">Diupdate oleh:</div>
					<!-- avatar -->
					<img src="<?= $updated_by->avatar ? base_url('uploads/avatar/'.$updated_by->avatar) : base_url('assets/images/user.jpeg') ?>" alt="<?= htmlspecialchars($updated_by->username).'\'s avatar' ?>" class="rounded img-fluid" style="width: 100px; height: 100px">
					<br>
					<!-- username -->
					<a class="font-weight-bold" href="<?= base_url('user/view/'.$updated_by->username) ?>">
						<?= htmlspecialchars($updated_by->username) ?>
					</a>
				</div>
				<?php endif ?> 
				<!-- updated at -->
				<div>
					<div class="<?= $updated_by->username !== $created_by->username ? '' : 'mt-3' ?> mb-1">Diupdate pada:</div>
					<span class="font-weight-bold"><?= $thread->updated_at ?></span>
				</div>
				<?php endif ?>
			</div>
			<!-- /.col -->
				
			<div class="col">
				<!-- content -->
				<div class="mb-5">
					<?= $thread->content ?>
				</div>

				<!-- meta -->
				<div id="meta">
					<!-- category -->
					<div style="background-color: lightgreen; width: fit-content;" class="rounded p-2 " id="category">
						<?= $category->category ?>
					</div>
					<!-- action -->
					<?php if(session()->role === 'Admin' || session()->username === $created_by->username) : ?>
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
		<a href="<?= base_url('reply/add/'.$thread->id) ?>" class="ml-auto btn btn-primary" role="button">Buat Reply <i class="fas fa-pencil"></i></a>
		<!-- /.body -->
	</div>
	<!-- /.thread -->

	<!-- replies count -->
	<h4 class="mt-3 mb-3 p-2 rounded font-weight-bold" style="background-color: lightblue; width: fit-content">
		<?php if(count($replies) < 1) : ?>
		<?= 'Belum ada reply'; ?>
		<?php elseif(count($replies) > 1) : ?>
		<?= count($replies).' Replies'; ?>
		<?php else : ?>
		<?= count($replies).' Reply'; ?>
		<?php endif ?>
	</h4>
	<!-- /.replies count -->
				
	<!-- replies -->
	<?php if($replies) : ?>
	<?php $i = 0; ?>
	<?php foreach ($replies as $reply) : ?>
	<?php $i++; ?>
	<div class="card mb-3" id="threadSummary">
		<!-- header -->
		<div class="card-header" style="background-color: purple;">
			<h6 class="text-white h3 font-weight-bold text-decoration-none">
				Reply #<?= $i ?>
			</h6>
		</div>

		<!-- body -->
		<div class="card-body row pt-4 pb-4 pl-4 pr-4" style="gap: 30px;">
			<div class="col-sm-2 text-center" id="postedBy">

				<!-- created by -->
				<div class="mb-2">
					<div class="mb-1">Dibalas oleh:</div>
					<!-- avatar -->
					<img src="<?= $reply->avatar ? base_url('uploads/avatar/'.$reply->avatar) : base_url('assets/images/user.jpeg') ?>" alt="<?= htmlspecialchars($reply->username).'\'s user avatar' ?>" class="rounded img-fluid" style="width: 100px; height: 100px">
					<br>
					<!-- username -->
					<a class="font-weight-bold" href="<?= base_url('user/view/'.$reply->username) ?>">
						<?= htmlspecialchars($reply->username) ?>
					</a>
				</div>
				<!-- created at -->
				<div>
					<div class="mb-1">Dibalas pada:</div>
					<span class="font-weight-bold"><?= $reply->created_at ?></span>
				</div>
				<!-- updated at -->
				<?php if($reply->updated_at) : ?>
					<div class="mb-1 mt-3">Diupdate pada:</div>
					<span class="font-weight-bold"><?= $reply->updated_at ?></span>
				<?php endif ?>
			</div>
			<!-- /.col -->
			
			<div class="col">
				<!-- content -->
				<div class="mb-5">
					<?= $reply->content ?>
				</div>

				<!-- meta -->
				<div id="meta">
					<!-- action -->
					<?php if(session()->role === 'Admin' || session()->username === $reply->username) : ?>
					<div id="action">
						<!-- edit -->
						<a href="<?= base_url('reply/edit/'.$reply->id) ?>" class="btn btn-info" role="button">
							Edit <i class="fas fa-pen"></i>
						</a>
						<!-- delete -->
						<a href="<?= base_url('reply/delete/'.$reply->id) ?>" class="btn btn-danger" role="button" onclick="return confirm('Anda yakin ingin menghapus reply ini?')">
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
	<?php endforeach ?>
	<!-- pagination -->
	<div class="d-flex" style="gap: 5px;">Halaman: <?= $pager->links() ?></div>
	<?php endif ?>
	<!-- /.replies -->
</div>

<?= $this->endSection() ?>
