<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rootstrap
 */
?>
<?php do_action( 'rootstrap_content_end' ); ?>
	</div><!-- #content -->
<?php do_action( 'rootstrap_footer_before' ); ?>

	<div id="footer-area">
	<?php do_action( 'rootstrap_footer_start' ); ?>
            <div class="container">
		<div class="row">
			<?php get_sidebar( 'footer' ); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>What is Mashshare?</h4>
<p>Mashshare is an extensible free social share media ecosystem for the best possible social sharing optimization of your website. You find Add-Ons for Velocity Graph, Google Analytics integration, mobile sharing optimization, responsive design and much more in the <a href="https://www.mashshare.net/downloads">Add-On section</a></p>

                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3">
                    <h4>Developer</h4>
                    <p>
                        Create Mashshare Add-Ons:
                    <ul>                        
                        <li>Add-On boilerplate on <a href="https://github.com/mashshare/MASHSB-Add-On-Boilerplate" target="_blank">GitHub</a> </li>
                        <li>Mashshare on <a href="https://github.com/mashshare/Mashshare" target="_blank">GitHub</a></li>
                        <li><a href="http://docs.mashshare.net/collection/11-developer-docs">Theme Integration</a><br> Instructions for developers</li>
                    </ul>
                    </p>
<!--
<h4>Help and Support</h4><p>We respond to all support requests as soon as possible, weekdays between 9am – 6pm. Our Support Team is based in Germany (GMT+2) so please be aware of time differences.<br /></p>
-->
                    </p>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3">
                    <h4>Support</h4>
                    <p>
                    <ul>  
                        <li><a href="<?php echo get_permalink('59'); ?>">FAQ</a></li>
                        <li><a href="<?php echo get_permalink('91050'); ?>">Affiliate</a></li>
                        <li><a href="<?php echo get_permalink('127'); ?>">Legal Imprint</a></li>
						<li><a href="https://mashshare.net/privacy-policy/">Privacy Policy</a></li>
                        <li><a href="<?php echo get_permalink('93'); ?>">Contact us</a></li>
                    </ul>
                    </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h4>Our Plugins</h4>
						<div style="float: left;margin-right: 10px;"> <a href="https://wp-staging.com/?utm_source=mashshare&utm_medium=footer"><img src="https://mashshare.net/wp-content/uploads/2018/05/wpquads-logo75x75.png"></a></div>
						<div>
                        <a href="https://wp-staging.com/?utm_source=mashshare&utm_medium=footer">WP Staging</a><br>
                        The easiest way to create a website clone and staging copy of WordPress. Migrate all changes to the live site.
						</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h4>&nbsp;</h4>
						<div style="float: left;margin-right: 10px;"><a href="https://wpquads.com/?utm_source=mashshare&utm_medium=footer"><img src="https://mashshare.net/wp-content/uploads/2018/05/logo75x75.jpg"></a></div>
						<div>
                        <a href="https://wpquads.com/?utm_source=mashshare&utm_medium=footer">WP QUADS</a><br>
                        A full-featured ad solution to add AdSense and other monetization assets to WordPress.
						</div>
                    </div>
                </div>
                <div class="row" style="text-align: center;">
                    <div class="col-sm-12 col-md-12">Mashshare  &copy; <?php echo date("Y"); ?></div>
                </div>
            </div>

		<footer id="" class="site-footer" role="contentinfo">
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
	</div>
	<?php do_action( 'rootstrap_footer_end' ); ?>
</div><!-- #page -->
<?php do_action( 'rootstrap_footer_after' ); ?>
<?php do_action( 'rootstrap_body_end' ); ?>
<?php wp_footer(); ?>
</body>
</html>