<?php
// site/templates/blog.php
/** @var Kirby\Cms\Page $page */
?>

<?php snippet('header') ?>

<section class="wrapper gap-top-1000 gap-bottom-900 flow">
	<header class="blog__header flow gap-bottom-1000">
		<h1 class="blog__title text-1000"><?= $page->title()->html() ?></h1>
		<?= $page->text()->kirbytext() ?>
	</header>

	<div class="blog__feed flow">
		<?php foreach ($page->children()->listed()->flip() as $article) : ?>
			<article class="blog-item flow flex gap-bottom-800 pad-bottom-700">
				<header class="blog-item__header flow flex-full md:flex-third gap-bottom-400">
					<h2 class="blog-item__title text-600"><a href=" <?= $article->url() ?>"><?= $article->title()->html() ?></a></h2>
					<div class="blog-item__meta text-400">
						<time datetime="<?= $article->published()->toDate('c') ?>">
							<?= $article->published()->toDate('d F Y')  ?>
						</time>
					</div>
				</header>
				<p class="blog-item__intro flex-full md:flex-two-thirds gap-bottom-400"><?= $article->intro()->kirbytext()->inline() ?></p>
			</article>
		<?php endforeach ?>
	</div>
</section>

<?php snippet('footer') ?>