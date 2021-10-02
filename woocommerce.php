<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
get_header(); ?>

<div class="padding_page">
	<div class="grid-container">
		<div class="grid-x">
			<div class="large-12 cell new_font">
	
<?php woocommerce_content(); ?>

			</div>
		</div>
	</div>
</div>

<?php get_footer();