<?php
/**
 * Template Name: Add-On Feed / Mashshare admin
 */
 $args = array(
	'posts_per_page'   => 1,
	'name'		   => 'add-ons',
	'offset'           => 0,
	'category'         => '',
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true );

$posts = get_posts($args);
?>
        <?php while(have_posts()) : the_post(); ?>
       
 
						<?php the_content() ?>

    
        <?php endwhile; ?>
