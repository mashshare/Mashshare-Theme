<?php
    get_header();
    
    $kbe_cat_slug = get_queried_object()->slug;
    $kbe_cat_name = get_queried_object()->name;
    
    $kbe_tax_post_args = array(
        'post_type' => KBE_POST_TYPE,
        'posts_per_page' => 999,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => KBE_POST_TAXONOMY,
                'field' => 'slug',
                'terms' => $kbe_cat_slug
            )
        )
    );
    $kbe_tax_post_qry = new WP_Query($kbe_tax_post_args);
?>
<div class="container-fluid">
            <div id="header-image"><!--start header-image-->
<div id="header-content" class="container" style="padding-bottom:40px;"><!--start header-->
    <div class="row"><!--start row-->
        <?php if(has_post_thumbnail()){?>
        <div class="col-md-8">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="col-md-4">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php } else { ?>
        <div class="col-xs-12 col-md-offset-2 col-md-8" style="text-align:center;">
            <h1><?php echo mash_get_tax_title(); ?></h1>
            <h2>Documentation</h2>
        </div>
        <?php } ?>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
<div id="page-wrap" class="container" style="margin-top: 40px;">
	<div id="content" class="sidebar-right twelve columns blog blog-large">
<div id="kbe_container" style="margin-bottom: 40px;">

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
            <div class="col-md-12" style="padding-left:50px; padding-right: 70px; padding-bottom: 40px;">
<?php
    if(KBE_SIDEBAR_INNER == 0){
?>
        <div id="kbe_content" class="kbe_content_full">
<?php
    }elseif(KBE_SIDEBAR_INNER == 1){
?>
        <div id="kbe_content" class="kbe_content_right">
<?php
    }elseif(KBE_SIDEBAR_INNER == 2){
?>
        <div id="kbe_content" class="kbe_content_left">
<?php
    }
?>        
            <!--leftcol--> 
            <div class="kbe_leftcol">

                <!--<articles>-->
                <div class="kbe_articles">
                    <h2><strong><?php echo $kbe_cat_name; ?></strong></h2>

                    <ul>
                <?php
                    if($kbe_tax_post_qry->have_posts()) :
                        while($kbe_tax_post_qry->have_posts()) :
                            $kbe_tax_post_qry->the_post();
                ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                <?php
                        endwhile;
                    endif;
                ?>
                    </ul>

                </div>
            </div>
            <!--/leftcol-->
        
	</div>
            </div>
            </div>
            </div>
        <!--/content-->
    
	<!--aside-->
<?php
    if(KBE_SIDEBAR_INNER == 0){
?>
        <div class="kbe_aside kbe_aside_none">
<?php
    }elseif(KBE_SIDEBAR_INNER == 1){
?>
	<div class="kbe_aside kbe_aside_left">
<?php
    }elseif(KBE_SIDEBAR_INNER == 2){
?>
	<div class="kbe_aside kbe_aside_right">
<?php
    }
        if((KBE_SIDEBAR_INNER == 2) || (KBE_SIDEBAR_INNER == 1)){
            dynamic_sidebar('kbe_cat_widget');
	}
?>
    </div>
    <!--/aside-->
    
</div>
</div>
</div>
            </div>
<?php
    get_footer();
?>