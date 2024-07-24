<?php
$content = [
	'name' => 'content',
	'id' => 'content',
	'placeholder' => 'Maksimal 30.000 karakter',
	'minlength' => 20,
	'maxlength' => 30000,
	'value' => set_value('content', '', false),
];
$submit = [
	'name' => 'submit',
	'type' => 'submit',
	'value' => 'Post Reply',
	'class' => 'button',
]
?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card card-border border-purple pt-4 pb-4 pl-4 pr-4">
	<h1 class="text-left">
		<i class="fas fa-pencil h1"></i>
		Buat Reply: 
		<?php if (strlen($thread->title) > 20) : ?>
		<?= substr($thread->title, 0, 20).'...' ?>
		<?php else : ?>
		<?= $thread->title ?>
		<?php endif ?>
	</h1>

	<?= form_open_multipart('reply/add/'.$thread->id, ['method' => 'post'])?>

	<!-- content -->
	<div class="form-group">
		<?= form_textarea($content) ?>
		<span class="text-danger"><?= validation_show_error('content') ?></span>
	</div>

	<!-- submit -->
	<?= form_submit($submit) ?>
</div>

<!-- ckeditor -->
<script src="<?= base_url('assets/ckeditor5/ckeditor.js') ?>"></script>
<script>
	ClassicEditor
		.create(document.getElementById('content'), {
			ckfinder: {
				uploadUrl: "<?= base_url('thread/uploadImages') ?>"
			}
		})
		.then(editor => {	
			console.log(editor)
		})
		.catch(error => {
			console.log(error)
		})
</script>

<?= $this->endSection() ?>
