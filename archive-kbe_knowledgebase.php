<?php
    get_header();
?>

<div class="container-fluid"> <!--start container-fluid-->
<div id="header-image"><!--start header-image-->
<div id="header-content" class="container" style="padding-bottom:40px;"><!--start header-->
    <div class="row"><!--start row-->
        <?php if(has_post_thumbnail()){?>
        <div class="col-md-8">
            <h1>Documentation</h1>
        </div>
        <div class="col-md-4">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php } else { ?>
        <div class="col-xs-12 col-md-offset-2 col-md-8" style="text-align:center;">
            <h1>Documentation</h1>
        </div>
        <?php } ?>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
</div><!--End container fluid-->
<div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>

<div id="page-wrap" class="container">
	<div id="content" class="sixteen columns">
<div id="kbe_container">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center; margin-top: 40px;">
   
    <!--Breadcrum-->
    <?php
        if(KBE_BREADCRUMBS_SETTING == 1){
    ?>
        <div class="kbe_breadcrum">
            <?php echo kbe_breadcrumbs(); ?>
        </div>
    <?php
        }
    ?>
    <!--/Breadcrum-->
    
    <!--search field-->
    <?php
        if(KBE_SEARCH_SETTING == 1){
            kbe_search_form();
        }
    ?>
    <!--/search field-->
       </div>
    </div>
    </div> 
    <!--content-->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding-left:50px; padding-right: 70px;">
<?php
    if(KBE_SIDEBAR_HOME == 0){
?>
        <div id="kbe_content" class="kbe_content_full">
<?php
    }elseif(KBE_SIDEBAR_HOME == 1){
?>
        <div id="kbe_content" class="kbe_content_right">
<?php
    }elseif(KBE_SIDEBAR_HOME == 2){
?>
        <div id="kbe_content" class="kbe_content_left">
<?php
    }
?>
            <h1><?php //echo get_the_title(KBE_PAGE_TITLE) ?>Knowledgebase</h1>
        
            <!--leftcol-->
            <div class="kbe_leftcol">
                <div class="kbe_categories">
                <?php
                   $kbe_cat_args = array(
                                        'orderby'       => 'terms_order', 
                                        'order'         => 'ASC',
                                        'hide_empty'    => true, 
                                    );

                    $kbe_terms = get_terms(KBE_POST_TAXONOMY, $kbe_cat_args);

                    foreach($kbe_terms as $kbe_taxonomy){
                        $kbe_term_id = $kbe_taxonomy->term_id;
                        $kbe_term_slug = $kbe_taxonomy->slug;
                        $kbe_term_name = $kbe_taxonomy->name;
                ?>
                        <div class="kbe_category">
                            <h2>
                                <span class="kbe_count"><?php echo $kbe_taxonomy->count; _e(' Articles','kbe'); ?></span>
                                <a href="<?php echo get_term_link($kbe_term_slug, 'kbe_taxonomy') ?>" title="<?php sprintf( __( "View all posts in %s" ), $kbe_term_name ) ?>"><?php echo $kbe_term_name; ?></a>
                            </h2>

                            <ul class="kbe_article_list">
                            <?php
                                $kbe_tax_post_args = array(
                                                            'post_type' => KBE_POST_TYPE,
                                                            'posts_per_page' => KBE_ARTICLE_QTY,
                                                            'orderby' => 'menu_order',
                                                            'order' => 'ASC',
                                                            'tax_query' => array(
                                                                    array(
                                                                            'taxonomy' => KBE_POST_TAXONOMY,
                                                                            'field' => 'term_id',
                                                                            'terms' => $kbe_term_id
                                                                    )
                                                            )
                                                    );
                                $kbe_tax_post_qry = new WP_Query($kbe_tax_post_args);
                                if($kbe_tax_post_qry->have_posts()) :
                                    while($kbe_tax_post_qry->have_posts()) :
                                        $kbe_tax_post_qry->the_post();
                            ?>
                                        <li>
                                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                <?php echo substr(the_title('', '', FALSE), 0, 80); ?>
                                            </a>
                                        </li>
                            <?php
                                    endwhile;
                                else :
                                    echo __("No posts","kbe");
                                endif;
                            ?>
                            </ul>
                        </div>
                <?php
                    }
                 ?>
                </div>
            </div>
            <!--/leftcol-->
        
        </div>
        <!--content-->
    </div>
             </div>
            </div>
        <!--aside-->
<?php
    if(KBE_SIDEBAR_HOME == 0){
?>
        <div class="kbe_aside kbe_aside_none">
<?php
    }elseif(KBE_SIDEBAR_HOME == 1){
?>
        <div class="kbe_aside kbe_aside_left">
<?php
    }elseif(KBE_SIDEBAR_HOME == 2){
?>
        <div class="kbe_aside kbe_aside_right">
<?php
    }
    if((KBE_SIDEBAR_HOME == 2) || (KBE_SIDEBAR_HOME == 1)){
	dynamic_sidebar('kbe_cat_widget');
    }
?>
        </div>
        <!--/aside-->
    
</div>
</div>
</div>
<?php get_footer(); ?>