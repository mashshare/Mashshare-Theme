<?php
if(!empty($_GET['ajax']) ? $_GET['ajax'] : null) {
    if ( have_posts() ) {
?>
        <ul id="search-result">
    <?php
        while (have_posts()) : the_post();
    ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            
    <?php
        endwhile;
    ?>
        </ul>

<?php
    } else {
?>
        <span class="kbe_no_result"><?php _e('Search result not found......','kbe'); ?></span>
<?php
    }
} else {
    get_header();
?>
        <div class="container-fluid"></div>
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
            <h1><?php the_title(); ?></h1>
        </div>
        <?php } ?>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
<div id="kbe_container" class="container" style="margin-bottom: 40px; margin-top: 40px;">
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
        $kbe_search_term = $_GET['s'];
?>
	
            <h1><?php _e('Search Results for: '.$kbe_search_term, 'kbe'); ?></h1>
        
            <!--leftcol-->
            <div class="kbe_leftcol" >
                <!--<articles>-->
                <div class="kbe_articles_search">
                    <ul>
                <?php
                    while(have_posts()) :
                        the_post();
                ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <span class="post-meta">
                            Post By
                            <?php the_author(); ?>
                            | Date : <?php the_time('j F Y'); ?>
                        </span>
                        <p><?php echo kbe_short_content(300); ?></p>
                        <div class="kbe_read_more">
                            <a href="<?php the_permalink(); ?>">
                                <?php _e('Read more...','kbe') ?>
                            </a>
                        </div>
                    </li>
                <?php
                    endwhile;
                ?>
                    </ul>
                </div>
            </div>
            <!--/leftcol-->
        
	</div>
    
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
</div>
<?php
    get_footer();
}
?>