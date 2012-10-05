<div id="category-column">
<?php if ($news): ?>
<h3><?php echo $news->getCategory()->getDescription(); ?></h3>
	<div id="summary">
		<img src="<?php echo
						$this['imagine']->filter(
							( $news->getImage() ) ? $news->getWebPath() : 'img/no_disponible.jpg', 'my_thumb'
							); ?>" />
		<p><?php echo $news->getContentSummary(); ?></p>
		<a href="">
			<span>Leer mas</span>
			<img src="<?php echo $view['assets']->getUrl('img/copa_2.png') ?>" id="copa_leer_mas">
		</a>
	</div>
<?php else: ?>
<h3>Column</h3>
	<div id="summary">
		<img src="<?php echo $this['imagine']->filter('img/no_disponible.jpg', 'my_thumb'); ?>">
		<p>Lorem Impsum Algun Porque</p>
	</div>
<?php endif; ?>
</div>