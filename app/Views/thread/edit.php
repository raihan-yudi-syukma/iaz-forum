<?php
$validation = service('validation');
$title = [
	'name' => 'title',
	'id' => 'title',
	'type' => 'text',
	'placeholder' => 'Maksimal 100 karakter',
	'maxlength' => 100,
	'value' => set_value('title', $thread->title),
	'required' => true,
	'class' => $validation->hasError('title') ? 'w-100 input-invalid' : 'w-100',
];
$category_id = [
	'name' => 'category_id',
	'options' => $categories,
	'selected' => $thread->category_id,
	'required' => true,
	'class' => $validation->hasError('category_id') ? 'w-100 input-invalid' : 'w-100',
];
$content = [
	'name' => 'content',
	'id' => 'content',
	'placeholder' => 'Maksimal 30.000 karakter',
	'minlength' => 20,
	'maxlength' => 30000,
	'value' => set_value('content', $thread->content, false),
];
$submit = [
	'name' => 'submit',
	'type' => 'submit',
	'value' => 'Update',
	'class' => 'button',
]
?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card card-border border-purple pt-4 pb-4 pl-4 pr-4">

	<h1 class="text-left">
		<i class="fas fa-edit h1"></i>
		Edit Thread:
		<?php if (strlen($thread->title) > 20) : ?>
		<?= substr($thread->title, 0, 20).'...' ?>
		<?php else : ?>
		<?= $thread->title ?>
		<?php endif ?>
	</h1>

	<?= form_open_multipart('thread/edit/'.$thread->id, ['method' => 'post'], ['id' => $thread->id])?>

	<!-- title -->
	<div class="form-group">
		<?= form_label('Judul', 'title') ?>
		<?= form_input($title) ?>
		<span class="text-danger"><?= validation_show_error('title') ?></span>
	</div>
	
	<!-- category -->
	<div class="form-group">
		<?= form_label('Kategori', 'category_id') ?>
		<?= form_dropdown($category_id) ?>
		<span class="text-danger"><?= validation_show_error('category_id') ?></span>
	</div>

	<!-- content -->
	<div class="form-group">
		<?= form_label('Isi', 'content') ?>
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
