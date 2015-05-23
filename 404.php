<?php
/*
Template Name: 404 error template
*/
?>

<?php get_header(); ?>

	

	<div id="page-wrap" class="container-fluid">
            <div id="header-image"><!--start header-image-->
<div id="header-content" class="container"><!--start header-->
    <div class="row"><!--start row-->
        <div class="col-md-12">
            <h1 style="text-align:center;">404</h1>
        </div>
        
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
            <div class="row"><!-- start row -->
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                    <div id="content" class="sixteen columns">
				
			<article class="post">
	
				<div class="entry" id="error-404">
						
					<h3 class="error-404">"Oops! That page can’t be found.</h3>
					<h3 class="error-404">If you did not find what you are looking for tell us about it:</h3>
					<br />
					<?php echo do_shortcode('[contact-form-7 id="5152" title="404"]'); ?>
					<span align="center"><a href="<?php echo home_url(); ?>" target="_self" class="button alternative-1 large">Go to home</a></span>
	
				</div>
	
			</article>
		</div> <!-- end content -->
            </div><!-- end row -->
	</div> <!-- end page-wrap -->
			<?php do_action( 'rootstrap_post_after' ); ?>
		<?php get_sidebar( 'home' ); ?>
<?php get_footer(); ?>