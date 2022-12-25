<?php

/** @var \Kirby\Cms\Block $block */
$alt     = $block->alt();
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$link    = $block->link();
$ratio   = $block->ratio()->or('auto');
$src     = null;

if ($block->location() == 'web') {
	$src = $block->src()->esc();
} elseif ($image = $block->image()->toFile()) {
	$alt = $alt ?? $image->alt();
	$src = $image->resize(600)->url();
}

?>
<?php if ($src) : ?>
	<figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
		<?php if ($link->isNotEmpty()) : ?>
			<a href="<?= Str::esc($link->toUrl()) ?>">
				<img alt="<?= $alt->esc() ?>" src="<?= $src ?>" srcset="<?= $image->srcset() ?>" sizes="(min-width: 1200px) 25vw,
                (min-width: 900px) 33vw,
                (min-width: 600px) 50vw,
                100vw" width="<?= $image->resize(1800)->width() ?>" height="<?= $image->resize(1800)->height() ?>">
			</a>
		<?php else : ?>
			<img alt="<?= $alt->esc() ?>" src="<?= $src ?>" srcset="<?= $image->srcset() ?>" sizes="(min-width: 1200px) 25vw,
                (min-width: 900px) 33vw,
                (min-width: 600px) 50vw,
                100vw" width="<?= $image->resize(1800)->width() ?>" height="<?= $image->resize(1800)->height() ?>">
		<?php endif ?>

		<?php if ($caption->isNotEmpty()) : ?>
			<figcaption>
				<?= $caption ?>
			</figcaption>
		<?php endif ?>
		</figure>
	<?php endif ?>