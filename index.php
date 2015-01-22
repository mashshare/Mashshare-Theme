<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rootstrap
 */

get_header(); ?>

	<div class="top-section">
	
		<?php rootstrap_featured_slider(); ?>
		
		<?php rootstrap_call_for_action(); ?>
	</div>
	
	<div id="content" class="site-content container">
		<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo rootstrap_get_option( 'site_layout', 'no entry' ); ?>">
			<div id="main" class="site-main" role="main">
			<?php do_action( 'rootstrap_post_before' ); ?>
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php do_action( 'rootstrap_post_start' ); ?>
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
				<?php do_action( 'rootstrap_post_end' ); ?>
				<?php endwhile; ?>

				<?php rootstrap_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>
		<?php do_action( 'rootstrap_post_after' ); ?>
			</div><!-- #main -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>