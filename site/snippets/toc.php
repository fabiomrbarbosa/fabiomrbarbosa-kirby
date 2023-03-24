<?php if ($headlines->count() >= 3) : ?>
	<aside class="toc gap-bottom-900 <?= $classes ?>">
		<nav class="toc__content flow">

			<h2>Table of Contents</h2>

			<ol class="flow">
				<?php foreach ($headlines as $headline) : ?>
					<li><a href="<?= $headline->url() ?>"><?= $headline->text() ?></a></li>
				<?php endforeach ?>
			</ol>

		</nav>
	</aside>

<?php endif ?>