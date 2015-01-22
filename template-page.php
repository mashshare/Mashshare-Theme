<?php
/**
 * Template Name: template-page
 *
 * This is the template that displays full width page without sidebar
 *
 * @package rootstrap
 */

get_header(); ?>
<div id="content" class="site-content container">
<?php do_action( 'rootstrap_page_before' ); ?>
    <div id="primary" class="content-area col-sm-12 col-md-8 <?php echo rootstrap_get_option( 'site_layout', 'no entry' ); ?>">
        <?php do_action( 'rootstrap_page_start' ); ?>
        <div id="main" class="site-main container" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content-template-page', 'page' ); ?>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() ) :
                        comments_template();
                    endif;
                ?>

            <?php endwhile; // end of the loop. ?>
        <?php do_action( 'rootstrap_page_end' ); ?>
        </div><!-- #main -->
    </div><!-- #primary -->
<?php do_action( 'rootstrap_page_after' ); ?>
<?php get_footer(); ?>
