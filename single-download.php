<?php
/**
 * The Template for displaying all single downloads.
 *
 * @package Innovado
 */
 ?>

<?php get_header(); ?>
<?php //get_template_part( 'framework/inc/titlebar' ); ?>

<div id="page-wrap-download" class="container">
	<div id="main-content" class="row store-template">
		<div class="addon-offer notice info">
		Purchase 3 or more Add-Ons at once and save an automatic 10% off your purchase 
		<br>We charge EUR prices. During checkout your currency is automatically recalculated. Rate: 1 USD ~ 1.13 EUR
		<!-- <strong>BlackFriday - CyberMonday: </strong> 25% discount on all Add-Ons until Monday 23:59:59h. Discount code "blackfriday" -->
	</div>
	<div id="content" class="sidebar-right twelve columns">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

		</article>
		
		<?php if(!$data['check_disablecomments']) { ?>
			<?php comments_template(); ?>
		<?php } ?>

		<?php endwhile; endif; ?>
	</div> <!-- end content -->
	
	<div class="sidebar-on-right">
		<?php get_sidebar( 'download' ); ?>
	</div>
	
</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>