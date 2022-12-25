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

	<title><?= $site->title()->esc() ?> | <?= $page->title()->esc() ?></title>

	<?= css('assets/css/dist/styles.css') ?>

	<?php
	/*
    The `url()` helper is a great way to create reliable
    absolute URLs in Kirby that always start with the
    base URL of your site.
  */
	?>
	<link rel="me" href="https://mas.to/@fabiomrbarbosa">

	<link rel="icon" href="<?= url('assets/img/favicon.svg') ?>">
	<link rel="apple-touch-icon" href="<?= url('assets/img/icon-192x192.png') ?>">
	<link rel="mask-icon" href="<?= url('assets/img/favicon.svg') ?>" color="#000" />
	<link rel="mask-icon" href="<?= url('assets/img/favicon.svg') ?>" color="#fff" media="(prefers-color-scheme: dark)" />
</head>

<body>

	<header class="site-header pad-top-500 pad-bottom-500">
		<div class="wrapper">
			<div class="site-header__inner grid">
				<a class="site-logo" href="<?= $site->url() ?>">
					<?= svg('assets/img/logo.svg'); ?>
					<span class="visually-hidden"><?= $site->title()->esc() ?></span>
				</a>

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
	</header>

	<main>