<?php
/*
Template Name: page-faq
*/
?>

<?php get_header(); ?>

	

	<div id="page-wrap" class="container-fluid">
            <div id="header-image"><!--start header-image-->
<div id="header-content" class="container"><!--start header-->
    <div class="row"><!--start row-->
        <div class="col-md-7">
            <h1>Frequently <br>Asked Questions</h1>
            <h2>Read the FAQ first before <br>you  <a title="Mashshare support" href="<?php echo get_permalink('93'); ?>">open a ticket.</a></h2>
        </div>
        <div class="col-md-5">
            <img src="https://mashshare.net/dev2/wp-content/themes/wp-rootstrap/images/packshot-faq.png" alt="Packshot FAQ" style="margin-bottom:30px;"/>
        </div>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="https://mashshare.net/dev2/wp-content/uploads/2014/12/decor_top.png" alt="blue" /></div>
            <div class="row"><!-- start row -->
		<div id="content" class="col-xs-12 col-md-offset2 col-md-10 col-lg-offset2 col-lg-10">
                    <div class="container"><!-- start container -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
				<div class="entry">
	
					<?php the_content(); ?>
	
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
	
				</div>
	
                        </article>
			<?php endwhile; endif; ?>
                    </div><!-- end container -->
		</div> <!-- end content -->
            </div><!-- end row -->
	</div> <!-- end page-wrap -->
			<?php do_action( 'rootstrap_post_after' ); ?>
		<?php get_sidebar( 'home' ); ?>
<?php get_footer(); ?>