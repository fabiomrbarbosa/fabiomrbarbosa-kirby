<?php
// site/templates/article.php
/** @var Kirby\Cms\Page $page */
?>

<?php snippet('header') ?>

<section class="section wrapper gap-top-1000 gap-bottom-900">

	<article class="article flow flex">
		<header class="article__header flex-full flow">
			<h1 class="article__title"><?= $page->title()->html() ?></h1>
			<div class="article__meta text-400">
				<time class="article__published" datetime="<?= $page->published()->toDate('c') ?>" itemprop="datePublished">
					<?= svg('assets/img/article_published.svg') ?>
					<span><?= $page->published()->toDate('d F Y') ?></span>
				</time>
				<?php if ($page->lastModified()->isNotEmpty()) : ?>
					• <time class="article__modified" datetime="<?= $page->lastModified()->toDate('c') ?>" itemprop="dateModified">
						<?= svg('assets/img/article_updated.svg') ?>
						<span><?= $page->lastModified()->toDate('d F Y') ?></span>
					</time>
				<?php endif; ?>
				<?php if ($page->noteStatus()->isNotEmpty()) : $noteStatus = $page->noteStatus(); ?>
					• <span class="article__status article__status--<?= $noteStatus ?>">
						<?= svg('assets/img/article_' . $noteStatus . '.svg') ?>
						<span><?= Str::ucfirst($noteStatus) ?></span>
					</span>
				<?php endif; ?>
			</div>

			<?php if ($page->intro()->isNotEmpty()) : ?>
				<p class="page__intro text-600"><?= $page->intro()->kirbytext()->inline() ?></p>
			<?php endif; ?>

			<hr />
		</header>

		<div class="article__body flex-full flow">
			<?= $page->text()->kirbytext() ?>
		</div>

	</article>

	<div class="article__nav flow flex gap-top-1000">

		<a class="flex-full md:flex-third" href="<?= url('blog') ?>">Back to Blog</a>

		<div class="article__nav-links flex-full md:flex-two-thirds">
			<?php if ($page->hasPrevListed()) : ?>
				<a class="flex-half" href="<?= $page->prevListed()->url() ?>">
					<strong>Previous</strong> <br>
					<?= $page->prevListed()->title()->html() ?>
				</a>
			<?php endif ?>

			<?php if ($page->hasNextListed()) : ?>
				<a class="flex-half" href="<?= $page->nextListed()->url() ?>">
					<strong>Next</strong> <br>
					<?= $page->nextListed()->title()->html() ?></a>
			<?php endif ?>
		</div>
	</div>
</section>

<?php snippet('footer') ?>