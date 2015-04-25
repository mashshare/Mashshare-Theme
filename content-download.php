<?php 
/**
 * Template Name: template-addons
 *
 * This is the template that displays full width page without sidebar
 *
 * @package mashshare
 */

get_header(); ?>

    <div id="main-content" class="container-fluid">
            <div id="header-image"><!--start header-image-->
<div id="header-content" class="container"><!--start header-->
    <div class="row"><!--start row-->
        <div class="col-md-8">
            <h1>Unleash the power with Add-Ons</h1>
            <h2 style="display: none;">Get them separate or all included in one of our bundle packages starting at 39 EUR.</h2>
        </div>
        <div class="col-md-4">
            <img id="packshot-addons" src="<?php echo get_template_directory_uri(); ?>/images/packshot.jpg" alt="Packshot Add-Ons" style="margin-bottom:30px;margin-top:15px;" />
        </div>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
        <div class="addon-offer notice info container">
		<a href="<?php echo get_permalink('21228'); ?>"><img src="https://www.mashshare.net/wp-content/uploads/2015/04/bundle_three_packages.png"></a>
		<!--Purchase 3 or more Add-Ons at once and save an automatic 10% off your purchase 
		<br>We charge EUR prices. During checkout your currency is automatically recalculated.-->
		<!-- <strong>BlackFriday - CyberMonday: </strong> 25% discount on all Add-Ons until Monday 23:59:59h. Discount code "blackfriday" -->
	</div>
        <div class="content container">
            <div class="row row-content-addons"><!--start row products-->
            <?php
            $current_page = get_query_var('page');
            //$per_page = get_option('posts_per_page');
            $per_page = 30;
            $offset = $current_page > 0 ? $per_page * ($current_page-1) : 0;
            $product_args = array(
                'post_type' => 'download',
                'posts_per_page' => $per_page,
                'offset' => $offset,
                'orderby' => "menu_order",
                'order' => 'ASC'
            );
            $products = new WP_Query($product_args);
            ?>
            <?php if ($products->have_posts()) : $i = 3; ?>
                <?php while ($products->have_posts()) : $products->the_post(); ?>    
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4"><!--start col outside product-->
                    <div class="row addons-row"><!--start row outside product-->
            <div class=" product<?php if($i % 3 == 0) { echo ' last'; } ?>"><!--start product-->
                        
                        <div class="product-image">
                            
                                
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('product-image'); ?>
                            </a>
                            <a href="<?php the_permalink(); ?>">
                            <h2 class="title"><?php the_title(); ?></h2>
                        </a>
                            <?php if(function_exists('edd_price')) { ?>
                                <div class="product-price">
                                    <?php 
                                       the_excerpt();
                                        /*if(edd_has_variable_prices(get_the_ID())) {
                                            // if the download has variable prices, show the first one as a starting price
                                            echo 'Starting at: '; edd_price(get_the_ID());
                                        } else {
                                            edd_price(get_the_ID()); 
                                        }*/
                                    ?>
                                </div><!--end .product-price-->
                            <?php } ?>
                                
                            
                        </div>
                
                        <?php if(function_exists('edd_price')) { ?>
                            <div class="product-buttons">
                                <?php //if(!edd_has_variable_prices(get_the_ID())) { ?>
                                    <?php //echo edd_get_purchase_link(get_the_ID(), 'Add to Cart', 'button'); ?>
                                <?php //} ?>
                                <a href="<?php the_permalink(); ?>" class="button alternative-1 small">View Details</a>
                            </div><!--end .product-buttons-->
                        <?php } ?>
                    </div><!--end .product-->
                    </div><!--end row outside product-->
                    </div><!--end col outside product-->
                    <?php $i+=1; ?>
                <?php endwhile; ?>
                
                <div class="pagination">
                    <?php                   
                        $big = 999999999; // need an unlikely intege                    
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, $current_page ),
                            'total' => $products->max_num_pages
                        ) );
                    ?>
                </div>
            <?php else : ?>
        
                <h2 class="center">Not Found</h2>
                <p class="center">Sorry, but you are looking for something that isn't here.</p>
                <?php get_search_form(); ?>
        
            <?php endif; ?>
        </div> <!--end row products-->
        </div><!--end .content-->
    </div><!--end #main-content.row-->

<?php get_footer(); ?>
