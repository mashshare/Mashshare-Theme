<?php
/*
Template Name: page-fullwidth
*/
?>

<?php get_header(); ?>

	

	<div id="page-wrap" class="container-fluid">
            <div id="header-image"><!--start header-image-->
<div id="header-content" class="container"><!--start header-->
    <div class="row"><!--start row-->
        <div class="col-md-6">
            <h1><?php the_title(); ?></h1>
            <h2><?php the_excerpt();?></h2>
        </div>
        <div class="col-md-6">
            <img src="<?php echo the_post_thumbnail(127); ?>" alt="<?php the_title(); ?>" />
        </div>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="https://mashshare.net/dev2/wp-content/uploads/2014/12/decor_top.png" alt="blue" /></div>
            <div class="row"><!-- start row -->
		<div id="content" class="col-xs-12 col-md-12 col-lg-12">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
				<div class="entry">
	
					<?php the_content(); ?>
	
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
	
				</div>
	
                        </article>
			<?php endwhile; endif; ?>
		</div> <!-- end content -->
            </div><!-- end row -->
	</div> <!-- end page-wrap -->
			<?php do_action( 'rootstrap_post_after' ); ?>
		<?php get_sidebar( 'home' ); ?>
<?php get_footer(); ?>