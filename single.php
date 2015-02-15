<?php
/**
 * The Template for displaying all single posts.
 *
 * @package rootstrap
 */

get_header(); ?>

<div id="page-wrap" class="container-fluid">
    <div id="header-image"><!--start header-image-->
<div id="header-content" class="container"><!--start header-->
    <div class="row"><!--start row-->
        <div class="col-md-6">
            <h1>Documentation</h1>
            <h2>How to instal ... </h2>
        </div>
        <div class="col-md-6">
            <img id="packshot-addons" src="https://mashshare.net/dev2/wp-content/themes/wp-rootstrap/images/packshot_howto.png" alt="Packshot Documentation" />
        </div>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="https://mashshare.net/dev2/wp-content/uploads/2014/12/decor_top.png" alt="blue" />
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
<div class="col-xs-12 col-md-3 col-lg-3">
            <div class="sidebar-on-right">
		<?php dynamic_sidebar('login-page'); ?>
            </div>
            <div class="sidebar-on-right">
		<?php dynamic_sidebar('help'); ?>
            </div>
        </div>