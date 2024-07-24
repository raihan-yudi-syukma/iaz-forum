<!-- Specifies to show two links. -->
<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">

  <ul class="pagination">

		<span>Page:</span>

		<!-- previous pages -->
    <?php if ($pager->hasPrevious()) : ?>

		<!-- Link to first page. -->
		<li>
			<a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
				<span aria-hidden="true">First</span>
			</a>
		</li>

		<!-- Link to previous page. -->
		<li>
			<a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
				<span aria-hidden="true"><?= htmlspecialchars('<< Previous') ?></span>
			</a>
		</li>

    <?php endif ?>
		<!-- /.previous pages -->

		<!-- page links -->
    <?php foreach ($pager->links() as $link): ?>
		<li <?= $link['active'] ? 'class="active"' : '' ?>>
			<a href="<?= $link['uri'] ?>">
				<?= $link['title'] ?>
			</a>
		</li>
    <?php endforeach ?>

		<!-- next pages. -->
    <?php if ($pager->hasNext()) : ?>

		<!-- next page -->
		<li>
			<a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
				<span aria-hidden="true"><?= htmlspecialchars('Next >>') ?></span>
			</a>
		</li>

		<!-- last page -->
		<li>
			<a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
				<span aria-hidden="true"><?= lang('Pager.last') ?></span>
			</a>
		</li>
    <?php endif ?>
		<!-- /.next pages -->
		
  </ul>
	<!-- /.pagination -->

</nav>