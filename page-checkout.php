<?php
/*
Template Name: Checkout page Template EDD
*/
?>

<?php  include_once('header-checkout.php');?>

	<div id="page-wrap" class="container-fluid">
            <div id="header-image"><!--start header-image-->
<div id="header-content" class="container" style="padding-bottom:40px;"><!--start header-->
    <div class="row"><!--start row-->
        <?php if(has_post_thumbnail()){?>
        <div class="col-md-8">
            <h1><?php the_title(); ?></h1>
            <h2><?php the_excerpt();?></h2>
        </div>
        <div class="col-md-4">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php } else { ?>
        <div class="col-xs-12 col-md-offset-2 col-md-8" style="text-align:center;">
            <h1><?php the_title(); ?></h1>
            <h2><?php the_excerpt();?></h2>
        </div>
        <?php } ?>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
            <div class="row"><!-- start row -->
		<div class="col-xs-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
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