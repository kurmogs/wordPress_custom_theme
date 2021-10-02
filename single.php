<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<div class="post_im_main_single">
			<?php echo get_the_post_thumbnail( $post_id, $size, $attr ); ?>
		</div>

		<div class="top_c">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="large-12 cell new_font single_post_box">
						<div class="single_padding_box">

							<h1 class="storytitle"><?php the_title(); ?></h1>
	
							<div class="category"><?php the_category(',') ?> / <?php echo get_the_date(); ?></div>
	
							<hr />

							<div class="storycontent">
								<?php 
								if (is_single() || is_page()) 
									the_content('Read the rest of this entry &raquo;');
								else {
									the_excerpt();
								}
								?> 
							</div>

		

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; else: ?>
<?php _e('Sorry, no post found.'); ?>
<?php endif; ?>

<?php get_footer();