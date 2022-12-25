<?php snippet('header') ?>

<div class="home-hero wrapper">
	<div class="home-hero__inner flow">
		<div class="home-hero__doorway"></div>
		<div class="home-hero__content">
			<h1 class="home-hero__title text-1000"><?= $page->title() ?></h1>
			<div class="gap-top-500 text-700"><?= $page->intro()->kt() ?></div>
		</div>
	</div>
</div>

<?php snippet('footer') ?>