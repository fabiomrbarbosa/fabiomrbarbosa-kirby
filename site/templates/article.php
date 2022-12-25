<?php
// site/templates/article.php
/** @var Kirby\Cms\Page $page */
?>

<?php snippet('header') ?>

<section class="section wrapper gap-top-1000 gap-bottom-900">

	<article class="article flow grid">
		<header class="article__header flow">
			<h1 class="article__title"><?= $page->title()->html() ?></h1>
			<div class="article__meta">
				<time datetime="<?= $page->published()->toDate('c') ?>" pubdate="pubdate">
					<?= $page->published()->toDate('d.m.Y') ?>
				</time>
			</div>

			<?php if ($page->intro()->isNotEmpty()) : ?>
				<p class="page__intro text-600"><?= $page->intro()->kirbytext()->inline() ?></p>
			<?php endif; ?>

			<hr />
		</header>

		<div class="article__body flow">
			<?= $page->text()->kirbytext() ?>
		</div>

	</article>

	<div class="article__nav flow grid gap-top-1000">

		<a href="<?= url('blog') ?>">Back to Blog</a>

		<div class="article__nav-links">
			<?php if ($page->hasPrevListed()) : ?>
				<a class="width-half" href="<?= $page->prevListed()->url() ?>">
					<strong>Previous</strong> <br>
					<?= $page->prevListed()->title()->html() ?>
				</a>
			<?php endif ?>

			<?php if ($page->hasNextListed()) : ?>
				<a class="width-half" href="<?= $page->nextListed()->url() ?>">
					<strong>Next</strong> <br>
					<?= $page->nextListed()->title()->html() ?></a>
			<?php endif ?>
		</div>
	</div>
</section>

<?php snippet('footer') ?>