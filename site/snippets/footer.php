<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.
  This footer snippet is reused in all templates.
  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
</div>
</main>

<footer class="site-footer pad-top-800 pad-bottom-800">
	<div class="wrapper grid">
		<div class="colophon gap-bottom-600">
			<p>
				<strong>Fábio M.R. Barbosa</strong><br>
				<span class="text-400">&copy; <?= date('Y') ?></span>
			</p>
		</div>
		<div class="footer-menu">
			<ul>
				<?php foreach ($site->children()->listed() as $example) : ?>
					<li><a href="<?= $example->url() ?>"><?= $example->title()->esc() ?></a></li>
				<?php endforeach ?>
			</ul>

			<ul>
				<li><a href="https://mas.to/@fabiomrbarbosa">Mastodon</a></li>
				<li><a href="https://www.linkedin.com/in/fabiomrbarbosa/">LinkedIn</a></li>
				<li><a href="hello@fabiomrbarbosa.com">E-Mail</a></li>
				<li><a href="https://fabiobarbosa.us4.list-manage.com/subscribe/post?u=625744b98a0a6a6947db89f92&id=2bc0590b79">Newsletter</a></li>
			</ul>
		</div>
	</div>
</footer>

<?= js([
	'assets/js/index.js',
	'@auto'
]) ?>

</body>

</html>