<?php
/**
 * The Template for displaying all single downloads.
 *
 * @package Innovado
 */
 ?>

<?php get_header(); ?>
    <div id="main-content" class="container-fluid">
            <div id="header-image"><!--start header-image-->
<div id="header-content" class="container"><!--start header-->
    <div class="row"><!--start row-->
        <div class="col-md-6">
            <h1><?php echo get_the_title(); ?></h1>
            <h2>Mashshare Add-On</h2>
        </div>
        <div class="col-md-6">
            <?php the_post_thumbnail('product-image'); ?>
        </div>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="https://mashshare.net/dev2/wp-content/uploads/2014/12/decor_top.png" alt="blue" /></div>
<div id="page-wrap-download" class="container">
    <div class="row">
	<div class="addon-offer notice info col-md-12">
		<a href="<?php echo get_permalink('21228'); ?>"><img src="https://www.mashshare.net/wp-content/uploads/2015/04/bundle_three_packages.png"></a>
		<!--Purchase 3 or more Add-Ons at once and save an automatic 10% off your purchase 
		<br>We charge EUR prices. During checkout your currency is automatically recalculated.-->
		<!-- <strong>BlackFriday - CyberMonday: </strong> 25% discount on all Add-Ons until Monday 23:59:59h. Discount code "blackfriday" -->
	</div>
        </div>
	<div id="content" class="sidebar-right twelve columns"> <!--start content-->
            <div class="row"> <!--start row-->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="entry entry-single col-md-8">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

		</article>
		
		<?php if(!$data['check_disablecomments']) { ?>
			<?php comments_template(); ?>
		<?php } ?>

		<?php endwhile; endif; ?>
            </div><!--end row-->
	</div> <!-- end content -->
	
	<div class="sidebar-on-right">
		<?php get_sidebar( 'download' ); ?>
	</div>
	
</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>