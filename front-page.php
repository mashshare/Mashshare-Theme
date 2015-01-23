<?php

/* Frontpage template for mashshare 
 * v. 1.0.1
 */
    
    if ( get_option( 'show_on_front' ) == 'posts' ) {
        get_template_part( 'index' );
    } elseif ( 'page' == get_option( 'show_on_front' ) ) {

get_header(); ?>
		
<?php rootstrap_featured_slider(); ?>
<?php rootstrap_call_for_action(); ?>
<div id="content" class="site-content container-fluid">
	<?php do_action( 'rootstrap_post_before' ); ?>
	<div id="primary" class="content-area col-sm-12 col-md-12">
		<div id="main" class="site-main" role="main">			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php do_action( 'rootstrap_post_start' ); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'rootstrap' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
					<?php edit_post_link( __( 'Edit', 'rootstrap' ), '<footer class="entry-meta"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>' ); ?>
				</article><!-- #post-## -->

				
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					//if ( comments_open() || '0' != get_comments_number() ) :
						//comments_template();
					//endif;
				?>
				<?php do_action( 'rootstrap_post_end' ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #main -->
	</div><!-- #primary -->
	</div>

		<?php do_action( 'rootstrap_post_after' ); ?>
		<?php get_sidebar( 'home' ); ?>

<?php 
	get_footer(); 
}
?>
