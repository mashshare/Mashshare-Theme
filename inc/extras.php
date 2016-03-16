<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package rootstrap
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
 
 
 
/* index.php, single.php, search.php, archive.php -----------------------------*/
function rootstrap_post_before() { rootstrap_do_contextual_hook('rootstrap_post_before'); }
function rootstrap_post_after() { rootstrap_do_contextual_hook('rootstrap_post_after'); }
function rootstrap_post_start() { rootstrap_do_contextual_hook('rootstrap_post_start'); }
function rootstrap_post_end() { rootstrap_do_contextual_hook('rootstrap_post_end'); }

/* page.php -------------------------------------------------------------------*/
function rootstrap_page_before() { rootstrap_do_contextual_hook('rootstrap_page_before'); }
function rootstrap_page_after() { rootstrap_do_contextual_hook('rootstrap_page_after'); }
function rootstrap_page_start() { rootstrap_do_contextual_hook('rootstrap_page_start'); }
function rootstrap_page_end() { rootstrap_do_contextual_hook('rootstrap_page_end'); }

/* single.php, page.php, templates with comments ------------------------------*/
function rootstrap_comments_before() { rootstrap_do_contextual_hook('rootstrap_comments_before'); }
function rootstrap_comments_after() { rootstrap_do_contextual_hook('rootstrap_comments_after'); }

/* sidebar.php ----------------------------------------------------------------*/
function rootstrap_sidebar_before() { rootstrap_do_contextual_hook('rootstrap_sidebar_before'); }
function rootstrap_sidebar_after() { rootstrap_do_contextual_hook('rootstrap_sidebar_after'); }
function rootstrap_sidebar_start() { rootstrap_do_contextual_hook('rootstrap_sidebar_start'); }
function rootstrap_sidebar_end() { rootstrap_do_contextual_hook('rootstrap_sidebar_end'); }

/* footer.php -----------------------------------------------------------------*/
function rootstrap_content_end() { rootstrap_do_contextual_hook('rootstrap_content_end'); }
function rootstrap_footer_before() { rootstrap_do_contextual_hook('rootstrap_footer_before'); }
function rootstrap_footer_after() { rootstrap_do_contextual_hook('rootstrap_footer_after'); }
function rootstrap_footer_start() { rootstrap_do_contextual_hook('rootstrap_footer_start'); }
function rootstrap_footer_end() { rootstrap_do_contextual_hook('rootstrap_footer_end'); }
function rootstrap_body_end() { rootstrap_do_contextual_hook('rootstrap_body_end'); }
 
 
function rootstrap_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'rootstrap_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rootstrap_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'rootstrap_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function rootstrap_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'rootstrap' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'rootstrap_wp_title', 10, 2 );


// Mark Posts/Pages as Untiled when no title is used
add_filter( 'the_title', 'rootstrap_title' );

function rootstrap_title( $title ) {
  if ( $title == '' ) {
    return 'Untitled';
  } else {
    return $title;
  }
}

// Add Filters

add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function rootstrap_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'rootstrap_setup_author' );

/************* search form *****************/

// Search Form
function rootstrap_wpsearch($form) {
    $form = '<form method="get" class="form-search" action="' . home_url( '/' ) . '">
  <div class="row">
    <div class="col-lg-12">
      <div class="input-group">
        <input type="text" class="form-control search-query" value="' . get_search_query() . '" name="s" id="s" placeholder="'. esc_attr__('Search...','rootstrap') .'">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="Go"><span class="glyphicon glyphicon-search"></span></button>
        </span>
      </div>
    </div>
  </div>
</form>';
    return $form;
} // don't remove this bracket!

/****************** password protected post form *****/

add_filter( 'the_password_form', 'rootstrap_custom_password_form' );

function rootstrap_custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
  <div class="row">
    <div class="col-lg-10">
        ' . __( "<p>This post is password protected. To view it please enter your password below:</p>" ,'rootstrap') . '
        <label for="' . $label . '">' . __( "Password:" ,'rootstrap') . ' </label>
      <div class="input-group">
        <input class="form-control" value="' . get_search_query() . '" name="post_password" id="' . $label . '" type="password">
        <span class="input-group-btn"><button type="submit" class="btn btn-default" name="submit" id="searchsubmit" vvalue="' . esc_attr__( "Submit",'rootstrap' ) . '">' . __( "Submit" ,'rootstrap') . '</button>
        </span>
      </div>
    </div>
  </div>
</form>';
	return $o;
}

// Add Bootstrap classes for table
add_filter( 'the_content', 'rootstrap_add_custom_table_class' );
function rootstrap_add_custom_table_class( $content ) {
    return str_replace( '<table>', '<table class="table table-hover">', $content );
}

// //Display social links
function rootstrap_social(){
    $services = array ('facebook','twitter','googleplus','youtube','linkedin','pinterest','rss','tumblr','flickr','instagram','dribbble');
    
    echo '<div id="social" class="social"><ul>';
    
    foreach ( $services as $service ) :
        
        $active[$service] = rootstrap_get_option ('social_'.$service);
        if ($active[$service]) { echo '<li><a class="social-profile" href="'.$active[$service].'" class="social-icon '. $service .'" title="'. __('Follow us on ','rootstrap').$service.'"><i class="social_icon fa fa-'.$service.'"></i></a></li>';}
        
    endforeach;
    echo '</ul></div>';

}

// header menu (should you choose to use one)
function rootstrap_header_menu() {
        // display the WordPress Custom Menu if available
        wp_nav_menu(array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                    'menu_class'        => 'nav navbar-nav main-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker()
        ));
} /* end header menu */

function rootstrap_top_links() {
        // display the WordPress Custom Menu if available
        wp_nav_menu(array(
                'container' => '',                              // remove nav container
                'container_class' => 'top-links clearfix',   // class of container (should you choose to use it)
                'menu' => __( 'Secondary Menu', 'rootstrap' ),   // nav name
                'menu_class' => 'top-nav clearfix',      // adding custom nav class
                'theme_location' => 'seconday',             // where it's located in the theme
                'before' => '',                                 // before the menu
                'after' => '',                                  // after the menu
                'link_before' => '',                            // before each link
                'link_after' => '',                             // after each link
                'depth' => 0,                                   // limit the depth of the nav
                'fallback_cb' => 'rootstrap_top_links_fallback'  // fallback function
        ));
} /* end rootstrap footer link */

// footer menu (should you choose to use one)
function rootstrap_footer_links() {
        // display the WordPress Custom Menu if available
        wp_nav_menu(array(
                'container' => '',                              // remove nav container
                'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
                'menu' => __( 'Footer Links', 'rootstrap' ),   // nav name
                'menu_class' => 'nav footer-nav clearfix',      // adding custom nav class
                'theme_location' => 'footer-links',             // where it's located in the theme
                'before' => '',                                 // before the menu
                'after' => '',                                  // after the menu
                'link_before' => '',                            // before each link
                'link_after' => '',                             // after each link
                'depth' => 0,                                   // limit the depth of the nav
                'fallback_cb' => 'rootstrap_footer_links_fallback'  // fallback function
        ));
} /* end rootstrap footer link */
//* adding top menu and top solcialbar
function rootstrap_theme_topmenu_social() {
	 echo '<div class="top-link">' ?>
		<div  class="container">
			<div class="col-md-6">
			<?php rootstrap_top_links(); ?>
			</div>
			<div class="col-md-6 header-social">
			<?php rootstrap_social(); ?>
			</div>
		</div>
	</div>
<?php };
//add_action('before', 'rootstrap_theme_topmenu_social');
// header images
function rootstrap_theme_headerimage() {
	 if( get_header_image() != '' ) : ?>
		<div id="headerimage">
		<img src="<?php header_image(); ?>"   alt="<?php bloginfo( 'name' ); ?>"/>
		</div>

				<?php endif; // header image was removed ?>

<?php };
add_action('before', 'rootstrap_theme_headerimage');
// Get Post Views - for Popular Posts widget
function rootstrap_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function rootstrap_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Call for action text area
function rootstrap_call_for_action() {
  if ( is_front_page() && rootstrap_get_option('w2f_cfa_text')!=''){
    echo '<div class="callforaction">';
      echo '<div class="container">';
        echo '<div class="col-md-12">';
          echo '<span class="callforaction-text">'. rootstrap_get_option('w2f_cfa_text').'</span>';
          echo '</div>';
          echo '<div class="cfabtn"> <button class="btn btn-lg callforaction-button"> <a href="'. rootstrap_get_option('w2f_cfa_link'). '">'. rootstrap_get_option('w2f_cfa_button'). '&nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i></a>';
          echo ' </button> </div>';
      echo '</div>';
    echo '</div>';
  } else; {
  //Do nothing
  }
}

// Featured image slider 
function rootstrap_featured_slider() {
    if ( is_front_page() && rootstrap_get_option('rootstrap_slider_checkbox') == 1 ) {	
      echo '<div id="da-slider" class="da-slider">';          
          $count = rootstrap_get_option('rootstrap_slide_number');
          $slidecat =rootstrap_get_option('rootstrap_slide_categories');

          $query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) );
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();  

            echo '<div class="da-slide">';             
                    if ( get_the_title() != '' ) echo '<h2>'. get_the_title().'</h2>';
					echo the_excerpt();
                    echo '<a class="da-link" href="'. get_permalink() .'">Read More &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i></a>'; 
					echo '<div class="da-img">';				 
					echo get_the_post_thumbnail();			
                  echo '</div></div>';
                endwhile;
              endif;
				
            echo '<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
			</nav></div>';
      echo '</div>';
    } else; {
      // Do nothing
    }
}


// Get theme options

if (!function_exists('get_rootstrap_theme_options'))  {
    function get_rootstrap_theme_options(){

      echo '<style type="text/css">';

      if ( rootstrap_get_option('link_color')) {
        echo 'a, #infinite-handle span {color:' . rootstrap_get_option('link_color') . '}';
      }
      if ( rootstrap_get_option('link_hover_color')) {
        echo 'a:hover {color: '.rootstrap_get_option('link_hover_color', '#000').';}';
      }
      if ( rootstrap_get_option('link_active_color')) {
        echo 'a:active {color: '.rootstrap_get_option('link_active_color', '#000').';}';
      }
      if ( rootstrap_get_option('element_color')) {
        echo '.btn-default, .label-default, .flex-caption h2, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus, .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {background-color: '.rootstrap_get_option('element_color', '#000').'; border-color: '.rootstrap_get_option('element_color', '#000').';} .btn.btn-default.read-more, .entry-meta .fa, .site-main [class*="navigation"] a, .more-link { color: '.rootstrap_get_option('element_color', '#000').'}';
      }
      if ( rootstrap_get_option('element_color_hover')) {
        echo '.btn-default:hover, .label-default[href]:hover, .label-default[href]:focus, #infinite-handle span:hover, .btn.btn-default.read-more:hover, .btn-default:hover, .scroll-to-top:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .site-main [class*="navigation"] a:hover, .more-link:hover, #image-navigation .nav-previous a:hover, #image-navigation .nav-next a:hover  { background-color: '.rootstrap_get_option('element_color_hover', '#000').'; border-color: '.rootstrap_get_option('element_color_hover', '#000').'; }';
      }
      if ( rootstrap_get_option('cfa_bg_color')) {
        echo '.callforaction { background-color: '.rootstrap_get_option('cfa_bg_color', '#000').'; } .callforaction-button:hover a {color: '.rootstrap_get_option('cfa_bg_color', '#000').';}';
      }
      if ( rootstrap_get_option('cfa_color')) {
        echo '.callforaction-text { color: '.rootstrap_get_option('cfa_color', '#000').';}';
      }
      if ( rootstrap_get_option('cfa_btn_color')) {
        echo '.callforaction-button {border-color: '.rootstrap_get_option('cfa_btn_color', '#000').';}';
      }
      if ( rootstrap_get_option('cfa_btn_txt_color')) {
        echo '.cfa-button a {color: '.rootstrap_get_option('cfa_btn_txt_color', '#000').';}';
      }
      if ( rootstrap_get_option('heading_color')) {
        echo 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .entry-title {color: '.rootstrap_get_option('heading_color', '#000').';}';
      }
      if ( rootstrap_get_option('top_nav_bg_color')) {
        echo '.navbar.navbar-default {background-color: '.rootstrap_get_option('top_nav_bg_color', '#000').';}';
      }
      if ( rootstrap_get_option('top_nav_link_color')) {
        echo '.navbar-default .navbar-nav > li > a, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus { color: '.rootstrap_get_option('top_nav_link_color', '#000').';}';
      }
      if ( rootstrap_get_option('top_nav_dropdown_bg')) {
        echo '.dropdown-menu, .dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {background-color: '.rootstrap_get_option('top_nav_dropdown_bg', '#000').';}';
      }
      if ( rootstrap_get_option('top_nav_dropdown_item')) {
        echo '.navbar-default .navbar-nav .dropdown-menu > li > a { color: '.rootstrap_get_option('top_nav_dropdown_item', '#000').'!important;}';
      }
      if ( rootstrap_get_option('footer_bg_color')) {
        echo '#colophon {background-color: '.rootstrap_get_option('footer_bg_color', '#000').';}';
      }
      if ( rootstrap_get_option('footer_text_color')) {
        echo '#footer-area, .site-info {color: '.rootstrap_get_option('footer_text_color', '#000').';}';
      }
      if ( rootstrap_get_option('footer_widget_bg_color')) {
        echo '#footer-area {background-color: '.rootstrap_get_option('footer_widget_bg_color', '#000').';}';
      }
      if ( rootstrap_get_option('footer_link_color')) {
        echo '.site-info a, #footer-area a {color: '.rootstrap_get_option('footer_link_color', '#000').';}';
      }
      if ( rootstrap_get_option('social_color')) {
        echo '.social-profile {color: '.rootstrap_get_option('social_color', '#000').' !important ;}';
      }
      if ( rootstrap_get_option('social_hover_color')) {
        echo '.social-profile:hover {color: '.rootstrap_get_option('social_hover_color', '#000').'!important ;}';
      }  
      if ( rootstrap_get_option('custom_css')) {
        echo rootstrap_get_option( 'custom_css', 'no entry' );
      }    
        echo '</style>';
    }   
}
add_action('wp_head','get_rootstrap_theme_options',10);

// Theme Options sidebar
add_action( 'rootstrap_after','rootstrap_options_display_sidebar' );

function rootstrap_options_display_sidebar() { ?>
  <div id="rootstrap-sidebar" class="metabox-holder">
    <div id="rootstrap" class="postbox">
        <h3><?php _e('Support and Documentation','rootstrap') ?></h3>
          <div class="inside">
              <div id="social-share">
               <iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2FUXbasanta&amp;width&amp;height=80&amp;colorscheme=light&amp;layout=standard&amp;show_faces=true&amp;appId=420648354656342" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
                <div class="tw-follow" ><a href="https://twitter.com/uxlogix" class="twitter-follow-button" data-show-count="false">Follow @uxlogix</a></div>
              </div>
                <p><b><a href="http://crayonux.com/projects/wp-rootstrap/" class="supportbtn"><?php _e('Rootstrap Documentation','rootstrap'); ?></a></b></p>
                <p><?php _e('The best way to contact us with <b>support questions</b> and <b>bug reports</b> is via','rootstrap') ?> <a href="http://crayonux.com/questions/"><?php _e('Crayonux support forum','rootstrap') ?></a>.</p>
                
                <ul>
                    <li><a class="button" href="http://wordpress.org/support/view/theme-reviews/wp-rootstrap" title="<?php esc_attr_e('Rate this Theme', 'rootstrap'); ?>" target="_blank"><?php printf(__('Rate this Theme','rootstrap')); ?></a></li>
                    <li><a class="button" href="https://www.facebook.com/UXbasanta" title="Like Crayonux on Facebook" target="_blank"><?php printf(__('Like on Facebook','rootstrap')); ?></a></li>
                    <li><a class="button" href="https://twitter.com/uxlogix" title="Follow Crayonux on Twitter" target="_blank"><?php printf(__('Follow on Twitter','rootstrap')); ?></a></li>
                </ul>
          </div>
      </div>
    </div>
<?php }

/*
 * This one shows/hides the an option when a checkbox is clicked.
 *
 */

add_action( 'rootstrap_custom_scripts', 'rootstrap_custom_scripts' );

function rootstrap_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

  jQuery('#rootstrap_slider_checkbox').click(function() {
      jQuery('#section-rootstrap_slide_categories').fadeToggle(400);
  });
  
  if (jQuery('#rootstrap_slider_checkbox:checked').val() !== undefined) {
    jQuery('#section-rootstrap_slide_categories').show();
  }

  jQuery('#rootstrap_slider_checkbox').click(function() {
      jQuery('#section-rootstrap_slide_number').fadeToggle(400);
  });
  
  if (jQuery('#rootstrap_slider_checkbox:checked').val() !== undefined) {
    jQuery('#section-rootstrap_slide_number').show();
  }

});
</script>


<?php
}