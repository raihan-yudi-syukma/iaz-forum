<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- header -->
<div class="row">

	<h1 class="font-weight-bold mb-2">Forum Institut Az Zuhra<h1>
		
	<h4 class="mb-4">
		Himpunan Mahasiswa
		<strong style="color: dodgerblue;" class="h4 font-weight-bold">Manajemen Informatika</strong> dan 
		<strong style="color: royalblue;" class="h4 font-weight-bold">Teknik Komputer</strong>
	</h4>
</div>

<!-- content -->
<div class="row">

	<!-- hero -->
	<div class="col-md-6">
		
		<h5>
			<a href="https://www.facebook.com/hashtag/adabdulubaruilmu" class="h5 mb-1">#AdabDuluBaruIlmu</a>
		</h5>

		<!-- carousel -->
		<div class="carousel slide" id="carouselHero" data-ride="carousel">

			<!-- indicator -->
			<ol class="carousel-indicators">
				<li data-target="#carouselHero" data-slide-to="0" class="active"></li>
				<li data-target="#carouselHero" data-slide-to="1"></li>
			</ol>

			<div class="carousel-inner">

				<!-- slide 1 -->
				<div class="carousel-item active">
					<img src="<?= base_url('assets/images/slide1.jpg') ?>" alt="Mahasiswa Manajemen Informatika" class="d-block active w-100">
				</div>

				<!-- slide 2 -->
				<div class="carousel-item">
					<img src="<?= base_url('assets/images/slide2.jpg') ?>" alt="Mahasiswa Teknik Komputer" class="d-block w-100">
				</div>
			</div>

			<!-- control -->
			<button class="carousel-control-prev" type="button" data-target="#carouselHero" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</button>

			<button class="carousel-control-next" type="button" data-target="#carouselHero" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</button>
		</div>
		<!-- /.carousel -->

	</div>
	<!-- /.hero -->

	<!-- about -->
	<div class="col-md-6">
		<h4 class="mb-1">Halo, teman-teman mahasiswa!</h4>
		<p class="text-justify lead">Kami dengan bangga mempersembahkan forum online ini sebagai wadah bagi seluruh mahasiswa Manajemen Informatika dan Teknik Komputer untuk saling berbagi informasi, berdiskusi, dan memperluas jaringan. Forum ini dirancang khusus untuk memenuhi kebutuhan akademik dan non-akademik kalian, serta menjadi tempat yang aman dan nyaman untuk berbagi ide, pengalaman, dan pengetahuan.</p>

		<!-- top threads -->
		<div>
			<h3 class="text-success font-weight-bold"><i class="fas fa-comments h3"></i> Top Thread</h3>
			<table class="table table-striped">
				<thead class="text-white">
					<th scope="col">#</th>
					<th scope="col">Judul</th>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach($topThread->getResult() as $thread) : ?>
					<tr>
						<td class="text-success font-weight-bold"><?= $i++ ?></td>
						<td>
							<a class="text-decoration-none font-weight-bold" href="<?= base_url('thread/view/'.$thread->thread_id) ?>">
								<?= htmlspecialchars(substr($thread->title, 0, 50)) ?>
							</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	
	</div>

</div>
<!-- /.content -->

<?= $this->endSection() ?>
