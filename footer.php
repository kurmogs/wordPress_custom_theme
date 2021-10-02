<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>

<div class="footer_background">
	<div class="grid-container">
		<div class="grid-x">
			<div class="large-12 cell new_font">

				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>