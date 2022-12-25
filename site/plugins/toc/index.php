<?php

Kirby::plugin('fabiomrbarbosa/toc', [
	'fieldMethods' => [
		'headlines' => function ($field, $headline = 'h2') {

			preg_match_all('!<' . $headline . '.*?>(.*?)</' . $headline . '>!s', $field->kt()->value(), $matches);

			$headlines = new Collection();

			foreach ($matches[1] as $text) {
				$headline = new Obj([
					'id'   => $id = '#' . Str::slug(Str::unhtml($text)),
					'url'  => $id,
					'text' => trim(strip_tags($text)),
				]);

				$headlines->append($headline->url(), $headline);
			}

			return $headlines;
		},
		'anchorHeadlines' => function ($field, $headlines = 'h2|h3') {

			// create the regex pattern to be used as first argument in `preg_replace_callback()`
			$headlinesPattern = is_array($headlines) ? implode('|', $headlines) : $headlines;

			// use `preg_replace_callback()` to replace matches with anchors
			$field->value = preg_replace_callback('!<(' . $headlinesPattern . ')>(.*?)</\\1>!s', function ($match) {

				// create the id from the headline text
				$id = Str::slug(Str::unhtml($match[2]));

				// return the modified headline:
				// $match[1] contains the match for the first subpattern, i.e. `h2`, `h3` etc.
				// $match[2] contains the match for the second subpattern, i.e. the actual headline text
				return '<' . $match[1] . ' id="' . $id . '"><a href="#' . $id . '">' . $match[2] . '</a></' . $match[1] . '>';
			}, $field->value);

			return $field;
		}
	]
]);
