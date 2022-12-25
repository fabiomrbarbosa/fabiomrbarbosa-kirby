<?php
// site/templates/article.php
/** @var Kirby\Cms\Page $page */
?>

<?php snippet('header') ?>

<section class="section wrapper gap-top-1000 gap-bottom-900">

	<article class="page flow ">
		<header class="page__header flow gap-bottom-900">
			<h1 class="page__title text-900 gap-bottom-500"><?= $page->publicTitle()->or($page->title())->html() ?></h1>

			<?php if ($page->intro()->isNotEmpty()) : ?>
				<p class="page__intro text-600"><?= $page->intro()->kirbytext()->inline() ?></p>
			<?php endif; ?>

			<hr />
		</header>

		<div class="grid">
			<?php snippet('toc', ['headlines' => $page->text()->headlines('h2')]) ?>

			<div class=" page__body flow">
				<?= $page->text()->kirbytext()->anchorHeadlines('h2') ?>
			</div>
		</div>

	</article>

</section>

<?php snippet('footer') ?>