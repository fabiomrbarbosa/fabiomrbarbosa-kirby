<?php

/**
 * We're currently reimplementing the entire image tag.
 * Will try and refactor to extend the original tag later.
 */

Kirby::plugin('fabiomrbarbosa/image', [
	'tags' => [
		'image' => [
			'attr' => [
				'alt',
				'caption',
				'class',
				'height',
				'imgclass',
				'link',
				'linkclass',
				'rel',
				'target',
				'title',
				'width',
				'srcset'
			],
			'html' => function ($tag) {

				if ($tag->file = $tag->file($tag->value)) {
					$tag->src     = $tag->file->resize(300)->url();
					$tag->alt     = $tag->alt     ?? $tag->file->alt()->or(' ')->value();
					$tag->title   = $tag->title   ?? $tag->file->title()->value();
					$tag->caption = $tag->caption ?? $tag->file->caption()->value();
				} else {
					$tag->src = Url::to($tag->value);
				}

				$link = function ($img) use ($tag) {
					if (empty($tag->link) === true) {
						return $img;
					}

					$link   = $tag->file($tag->link)?->url();
					$link ??= $tag->link === 'self' ? $tag->src : $tag->link;

					return Html::a($link, [$img], [
						'rel'    => $tag->rel,
						'class'  => $tag->linkclass,
						'target' => $tag->target
					]);
				};

				$image = Html::img($tag->src, [
					'width'  => $tag->width,
					'height' => $tag->height,
					'class'  => $tag->imgclass,
					'title'  => $tag->title,
					'alt'    => $tag->alt ?? ' ',
					'srcset' => $tag->file($tag->value())->srcset($tag->srcset),
				]);

				if ($tag->kirby()->option('kirbytext.image.figure', true) === false) {
					return $link($image);
				}

				// render KirbyText in caption
				if ($tag->caption) {
					$options = ['markdown' => ['inline' => true]];
					$caption = $tag->kirby()->kirbytext($tag->caption, $options);
					$tag->caption = [$caption];
				}

				return Html::figure([$link($image)], $tag->caption, [
					'class' => $tag->class
				]);
			}
		],
	]
]);
