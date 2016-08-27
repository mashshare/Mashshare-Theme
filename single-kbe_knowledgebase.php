<?php
    get_header();
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
            <h1><?php the_title(); ?></h1>
        </div>
        <?php } ?>
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
<div id="page-wrap" class="container" style="margin-top:40px;">
	<!--<div id="content" class="sidebar-right twelve columns blog blog-large">-->
	<div id="content" class="sidebar-right twelve columns" style="">

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
    <div class="container_not_used">
        <div class="row">
            <div class="col-md-12">
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
            <!--Content Body-->
            <div class="kbe_leftcol" >
            <?php
                while(have_posts()) :
                    the_post();

                    //  Never ever delete it !!!
                    //kbe_set_post_views(get_the_ID());
            ?>
                    <h1><?php the_title(); ?></h1>
                <?php 
                    the_content();
                    if(KBE_COMMENT_SETTING == 1){
                ?>
                        <div class="kbe_reply">
                <?php
                            comments_template("/kbe_comments.php");
                ?>
                        </div> 
            <?php
                    }
                endwhile;

                //  Never ever delete it !!!
                //kbe_get_post_views(get_the_ID());
            ?>
            </div>
             </div>
            </div>
            </div>
            <!--/Content Body-->
        
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
 <?php dynamic_sidebar('documentation'); ?>
</div>
        </div>
<?php get_footer(); ?>