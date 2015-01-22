<?php
/**
 * The Template for displaying all single posts.
 *
 * @package rootstrap
 */

get_header(); ?>
<div id="content" class="site-content container-fluid">
	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo rootstrap_get_option( 'site_layout', 'no entry' ); ?>">
		<div id="main" class="site-main" role="main">
		<?php do_action( 'rootstrap_post_before' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php rootstrap_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
		<?php do_action( 'rootstrap_post_after' ); ?>
		</div><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>