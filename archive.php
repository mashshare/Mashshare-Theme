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
	<div class="row">
        <div id="content-sidebar" class=" col-xs-12 col-md-9 col-lg-9">
	<div id="main" class="site-main" role="main">
            <?php do_action( 'rootstrap_post_before' ); ?>
            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                            if ( is_category() ) :
                                single_cat_title();

                            elseif ( is_tag() ) :
                                single_tag_title();

                            elseif ( is_author() ) :
                                printf( __( 'Author: %s', 'rootstrap' ), '<span class="vcard">' . get_the_author() . '</span>' );

                            elseif ( is_day() ) :
                                printf( __( 'Day: %s', 'rootstrap' ), '<span>' . get_the_date() . '</span>' );

                            elseif ( is_month() ) :
                                printf( __( 'Month: %s', 'rootstrap' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'rootstrap' ) ) . '</span>' );

                            elseif ( is_year() ) :
                                printf( __( 'Year: %s', 'rootstrap' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'rootstrap' ) ) . '</span>' );

                            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                _e( 'Asides', 'rootstrap' );

                            elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                                _e( 'Galleries', 'rootstrap');

                            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                _e( 'Images', 'rootstrap');

                            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                _e( 'Videos', 'rootstrap' );

                            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                _e( 'Quotes', 'rootstrap' );

                            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                _e( 'Links', 'rootstrap' );

                            elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                                _e( 'Statuses', 'rootstrap' );

                            elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                                _e( 'Audios', 'rootstrap' );

                            elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                                _e( 'Chats', 'rootstrap' );

                            else :
                                _e( 'Archives', 'rootstrap' );

                            endif;
                        ?>
                    </h1>
                    <?php
                        // Show an optional term description.
                        $term_description = term_description();
                        if ( ! empty( $term_description ) ) :
                            printf( '<div class="taxonomy-description">%s</div>', $term_description );
                        endif;
                    ?>
                </header><!-- .page-header -->

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );
                    ?>

                <?php endwhile; ?>

                <?php rootstrap_paging_nav(); ?>

            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>
            <?php do_action( 'rootstrap_post_after' ); ?>
            </div><!-- #main -->
	</div> <!-- end content -->
        <div class="col-xs-12 col-md-3 col-lg-3">
            <div class="sidebar-on-right">
		<?php dynamic_sidebar('login-page'); ?>
            </div>
            <div class="sidebar-on-right">
		<?php dynamic_sidebar('help'); ?>
            </div>
        </div>
        </div>
	
</div> <!-- end page-wrap -->
				
<?php get_footer(); ?>