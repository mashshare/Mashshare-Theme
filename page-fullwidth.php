<?php
/*
Template Name: Page: page-fullwidth
*/
?>

<?php get_header(); ?>

	<?php get_template_part( 'framework/inc/titlebar' ); ?>

	<div id="page-wrap" class="container-fluid">
            <div id="header-image"><!--start header-image-->
<div id="header-content" class="container"><!--start header-->
    <div class="row"><!--start row-->
        <div class="col-md-6">
            <h1>Frequently Asked Questions1</h1>
            <h2>If you do not find any suitable answer get in contact with us at the <a title="Mashshare support" href="https://mashshare.net/contact-support/">support area</a></h2>
        </div>
        <div class="col-md-6">
            <img src="https://mashshare.net/dev2/wp-content/themes/wp-rootstrap/images/packshot-faq.png" alt="Packshot FAQ" />
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