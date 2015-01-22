<?php
/**
 * @package rootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">
		
		<h1 class="entry-title"><?php if ( is_sticky() ) echo'<i class="fa fa-quote-left sticky-icon"></i>'; ?>&nbsp;<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php rootstrap_posted_on(); ?><?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><i class="fa fa-comment-o"></i><?php comments_popup_link( __( 'Leave a comment', 'rootstrap' ), __( '1 Comment', 'rootstrap' ), __( '% Comments', 'rootstrap' ) ); ?></span>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'rootstrap' ) );
				if ( $categories_list && rootstrap_categorized_blog() ) :
			?>
			<span class="cat-links"><i class="fa fa-folder-open-o"></i>
				<?php printf( __( ' %1$s', 'rootstrap' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( __( 'Edit', 'rootstrap' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>

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
		
		<?php if ( has_post_thumbnail()) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
		 	<?php the_post_thumbnail( 'medium', array( 'class' => 'thumbnail pull-left' )); ?>
		</a>
		<div class="col-sm-6">
			<?php the_excerpt(); ?>
		</div> 
		<?php else : ?>
			<?php the_excerpt(); ?>			
		<?php endif; ?>
		<p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php _e( 'Continue reading', 'rootstrap' ); ?> <i class="fa fa-chevron-right"></i></a></p>
		
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"></a>	


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
		<i class="fa fa-tags"></i>
		<?php
			
			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'rootstrap' ) );

			
			printf(
				$tag_list,
				get_permalink()
			);
		?>

		
		
		
	</footer><!-- .entry-meta -->
		
	</div><!-- .entry-content -->
	<?php endif; ?>

	<hr class="section-divider"></hr>
</article><!-- #post-## -->
