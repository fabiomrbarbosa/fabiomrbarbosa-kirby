<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.
  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.
  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<!DOCTYPE html>
<html lang="en" class="no-js font-base">

<head>

	<meta charset=" utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<?php if ($page->isHomePage()) : ?>
		<title><?= $site->title()->esc() ?></title>
	<?php else : ?>
		<title><?= $page->title()->esc() ?> | <?= $site->title()->esc() ?></title>
	<?php endif; ?>

	<?= css('assets/css/dist/styles.css') ?>

	<?php
	/*
    The `url()` helper is a great way to create reliable
    absolute URLs in Kirby that always start with the
    base URL of your site.
  */
	?>
	<link rel="me" href="https://social.fabiomrbarbosa.com/@fabio">

	<link rel="icon" href="<?= url('assets/img/favicon.svg') ?>">
	<link rel="apple-touch-icon" href="<?= url('assets/img/icon-192x192.png') ?>">
	<link rel="mask-icon" href="<?= url('assets/img/favicon.svg') ?>" color="#000" />
	<link rel="mask-icon" href="<?= url('assets/img/favicon.svg') ?>" color="#fff" media="(prefers-color-scheme: dark)" />
</head>

<body>

	<header class="site-header text-400 pad-top-500 pad-bottom-500">
		<div class="wrapper">
			<div class="site-header__inner flex">
				<a class="site-logo flex-two-thirds md:flex-third" href="<?= $site->url() ?>">
					<?= $site->title()->esc() ?>
				</a>

				<button id="menu-toggle">Menu</button>

				<div id="menu" class="nav-wrapper flex-full md:flex-two-thirds">
					<nav class="site-menu">
						<?php foreach ($site->children()->listed() as $item) : ?>
							<a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->esc() ?></a>
						<?php endforeach ?>

						<div class="user-toggle">
							<div role="status" class="visually-hidden js-mode-status"></div>
							<button class="toggle-button js-mode-toggle">
								<span class="toggle-button__text visually-hidden js-mode-toggle-text">Enable dark mode</span>
								<span class="toggle-button__icon" aria-hidden="true"></span>
							</button>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>

	<main>