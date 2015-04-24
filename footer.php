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
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fmashshare.net&amp;width=270&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=80&amp;appId=529531527150598&amp;colorscheme=dark" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:80px;" allowTransparency="true"></iframe>

                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3">
                    <h4>Developer</h4>
                    <p>
                        Create a Mashshare extension:
                    <ul>                        
                        <li>Add-On boilerplate on <a href="https://github.com/mashshare/MASHSB-Add-On-Boilerplate" target="_blank">GitHub</a> </li>
                        <li>Mashshare on <a href="https://github.com/mashshare/Mashshare" target="_blank">GitHub</a></li>
                        <li><a id="mail" href="https://www.mashshare.net/contact-developer/">Contact us</a> for hosting your Add-On</li>
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
                        <li><a href="<?php echo get_permalink('1185'); ?>">Affiliate</a></li>
                        <li><a href="<?php echo get_permalink('127'); ?>">Legal</a></li>
                        <li><a href="<?php echo get_permalink('93'); ?>">Contact us</a></li>
                    </ul>
                    </p>
                    </div>
                </div>
                <div class="row" style="text-align: center;">
                    <div class="col-sm-12 col-md-12">Mashshare  &copy; 2014 - 2015</div>
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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-912289-17', 'mashshare.net');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
</script>

<?php wp_footer(); ?>
</body>
</html>