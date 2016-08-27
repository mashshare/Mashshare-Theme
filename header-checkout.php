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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-912289-17', 'mashshare.net');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
</script>
</head>

<body <?php body_class(); ?>>
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
					<div id="logo" style="line-height: 40px;">
                                            <?php if(!is_front_page()){?>			    
                                                <a href="https://www.mashshare.net"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_mashshare.jpg" alt="Logo Mashshare" style="height: 25px;"></a>
                                             <?php } ?>
					</div>
		        </div>
		    </div>
		</nav><!-- .site-navigation -->	
		<?php do_action( 'nav-after' ); ?>