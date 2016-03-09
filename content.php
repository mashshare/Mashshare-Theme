<?php
/**
 * @package rootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">
		
		<h1 class="entry-title"><?php if ( is_sticky() ) echo'<i class="fa fa-quote-left sticky-icon"></i>'; ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
<span class="entry-date"><?php echo get_the_date(); ?></span>

		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'rootstrap' ) );
				if ( $categories_list && rootstrap_categorized_blog() ) :
			?>
			<?php endif; // End if categories ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php _e( 'Continue reading', 'rootstrap' ); ?> <i class="fa fa-chevron-right"></i></a></p>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		

		<?php
			wp_link_pages( array( 
				'before'            => '<div class="page-links">'.__( 'Pages:', 'rootstrap' ),
				'after'             => '</div>',
				'link_before'       => '<span>',
				'link_after'        => '</span>',
				'pagelink'          => '%',
				'echo'              => 1 
       		) );
    	?>
		
		<footer class="entry-meta">


		
		
		
	</footer><!-- .entry-meta -->
		
	</div><!-- .entry-content -->
	<?php endif; ?>

	<hr class="section-divider"></hr>
</article><!-- #post-## -->
