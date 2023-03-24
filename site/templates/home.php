<?php snippet('header') ?>

<div class="home-hero pad-top-900 pad-bottom-900">
	<div class="home-hero__inner wrapper">
		<div class="home-hero__content flex">
			<h1 class="home-hero__title flex-full text-1000"><?= $page->title() ?></h1>
			<div class="gap-top-500 flex-full lg:flex-two-thirds text-700"><?= $page->intro()->kt() ?></div>
		</div>
		<div class="home-hero__bg">
			<div class="home-hero__gradient"></div>
		</div>
	</div>
</div>


<?php snippet('footer') ?>