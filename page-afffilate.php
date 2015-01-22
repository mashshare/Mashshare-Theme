<?php 
/**
 * Template Name: template-page-affilate
 *
 * This is the template that displays full width page without sidebar
 *
 * @package rootstrap
 */
get_header(); ?>


<div id="page-wrap" class="container-fluid">
    <div id="header-image"><!--start header-image-->
<div id="header-content" class="container"><!--start header-->
    <div class="row"><!--start row-->
        <div class="col-md-6">
            <h1>Affilate</h1>
            <h2>Earn money width directing vistor to mashshare.net. Just sign up and you’ll receive commission on each customer order you refer. </h2>
        </div>
        <div class="col-md-6">
            <img src="https://mashshare.net/dev2/wp-content/themes/wp-rootstrap/images/packshot-affilate.png" alt="Packshot Affilate" />
        </div>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="https://mashshare.net/dev2/wp-content/uploads/2014/12/decor_top.png" alt="blue" />
	<div class="row">
        <div id="content-affilate" class=" col-xs-12 col-md-9 col-lg-9">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="entry">
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

		</article>
		
		

		<?php endwhile; endif; ?>
	</div> <!-- end content -->
        <div class="col-xs-12 col-md-3 col-lg-3">
            <div class="sidebar-on-right">
		<?php dynamic_sidebar('affiliate-sidebar'); ?>
            </div>
        </div>
        </div>
	
</div> <!-- end page-wrap -->
				
<?php get_footer(); ?>