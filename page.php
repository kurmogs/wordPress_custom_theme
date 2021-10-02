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
	
				<?php
				// Start the loop
				while ( have_posts() ) : the_post();

					// Include the page content template
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				// End the loop.
				endwhile;
				?> 

			</div>
		</div>
	</div>
</div>

<?php get_footer();