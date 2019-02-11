<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package mashshare
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- favicon -->

<?php if ( rootstrap_get_option( 'custom_favicon' ) ) { ?>
<link rel="icon" href="<?php echo rootstrap_get_option( 'custom_favicon' ); ?>" />
<?php } ?>

<!--[if IE]><?php if ( rootstrap_get_option( 'custom_favicon' ) ) { ?><link rel="shortcut icon" href="<?php echo rootstrap_get_option( 'custom_favicon' ); ?>" /><?php } ?><![endif]-->	

<?php wp_head(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-912289-17"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-912289-17');
</script>

<script src="https://mashshare.net/wp-content/themes/mashshare-theme/cookiebanner/cookies-eu-banner.js"></script>
</head>

<body <?php body_class(); ?>>
    <div id="cookies-eu-banner" style="display: none;">
    This website uses Cookies and Google Analytics
    <a href="https://mashshare.net/privacy-policy" id="cookies-eu-more">Read Privacy Policy</a>
    <button id="cookies-eu-reject" style="display:none;">Reject</button>
    <button id="cookies-eu-accept">Accept</button>
</div>
<script>
    new CookiesEuBanner(function(){
		
        // Your code to launch when user accept cookies
    });
</script>
<div style="background-color: #83c11f;color:white;padding:10px;text-align:center;display:none;">We are moving to another server. If you experience issues while browsing the site, please try again in 24 hours!</div>
<?php do_action( 'before' ); ?>	
<div id="page" class="hfeed site">
<?php do_action( 'nav-before' ); ?>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>						
					<div id="logo">
                                            <?php if(!is_front_page()){?>			    
                                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Mashshare " rel="home">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo_mashshare.jpg" alt="Logo Mashshare">
                                            </a>
                                             <?php } ?>
					</div>
		        </div>
				<?php rootstrap_header_menu(); ?>
		    </div>
		</nav><!-- .site-navigation -->	
		<?php do_action( 'nav-after' ); ?>