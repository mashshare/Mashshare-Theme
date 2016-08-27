<?php
/*
Template Name: Default blog post Template
*/
?>

<?php get_header(); ?>

	<div id="page-wrap" class="container-fluid">
            <div id="header-image"><!--start header-image-->
<div id="header-content" class="container" style="padding-bottom:40px;"><!--start header-->
    <div class="row"><!--start row-->
        <?php if(has_post_thumbnail()){?>
        <div class="col-md-8">
            <h1 class="entry-title"><?php the_title(); ?></h1>
			<span class="entry-date">Posted on <?php echo get_the_date() . ' by ' . get_the_author(); ?></span>
			
        </div>
        <div class="col-md-4 mash-single-featured">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php } else { ?>
        <div class="col-xs-12 col-md-offset-2 col-md-8" style="text-align:center;">
            <h1><?php the_title(); ?></h1>
            <?php //the_excerpt();?>
        </div>
        <?php } ?>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
            <div class="row"><!-- start row -->
		<div class="col-xs-12 col-sm-8 col-md-offset-1 col-md-7 col-lg-5 col-lg-offset-3">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
				<div class="entry">
	
					<?php the_content(); ?>
	
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
	
				</div>
	
                        </article>
			<?php endwhile; endif; ?>
			                <?php comments_template( '/comments.php', false ); ?>
		</div> <!-- end content -->
		<div id="secondary" class="col-xs-12 col-sm-4 col-md-3 col-lg-2" style="margin-top:30px;">
		<?php dynamic_sidebar( 'blanksidebar' ); ?>
		</div>
            </div><!-- end row -->
	</div> <!-- end page-wrap -->
			<?php do_action( 'rootstrap_post_after' ); ?>
		<?php //get_sidebar( 'home' ); ?>

<?php get_footer(); ?>