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
                    <div class="col-sm-6 col-md-4">
                    <h4>What is Mashshare?</h4>
<p>Mashshare is a extensible free Share Button ecosystem for the best possible social sharing optimization of your website. You find Add-Ons for Velocity Graph, Google Analytics integration, mobile sharing optimization, responsive design and much more in the <a href="https://www.mashshare.net/downloads">Add-On section</a></p>
                    </div>
                    <div class="col-sm-6 col-md-4">
                    <h4>Are you a developer?</h4>
                    <p style="border-bottom: 1px solid #ccc;">
                        Do you like to create a official Mashshare extension and host it here? <br> <a id="mail" href="https://www.mashshare.net/contact-developer/">Get in touch with us</a> for more information or check out latest Mashshare revision at <a href="https://github.com/mashshare/Mashshare" target="_blank">GitHub</a></p>
<!--
<h4>Help and Support</h4><p>We respond to all support requests as soon as possible, weekdays between 9am – 6pm. Our Support Team is based in Germany (GMT+2) so please be aware of time differences.<br /></p>
-->
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fmashshare.net&amp;width=270&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=80&amp;appId=529531527150598&amp;colorscheme=dark" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:80px;" allowTransparency="true"></iframe>
                    </p>
                    </div>
                    <div class="col-sm-6 col-md-4">
                    <h4>Develope Mashshare Add-Ons</h4>
                    <p>
                        Download the Mashshare <a href="https://github.com/mashshare/MASHSB-Add-On-Boilerplate
" target="_blank">Add-On Boilerplate at GitHub</a> and start immediately creating your own free or commercial Mashshare Add-On. The Boilerplate is well documented and contains a full working Add-On for demonstration purposes which contains the most important native Mashshare functions.

<!--<h4>Are you a developer?</h4>
Are you looking for a platform to offer your own work? 
Find out how to create a Mashshare extension and host it here. <br> <a id="mail" href="https://www.mashshare.net/contact-developer/">Get in touch with us</a> for more information. -->
<!--
<h4>We are looking for paid support staff</h4>
We are looking for some technical skilled people who like to assist us on service and support questions.  If you are familiar with WordPress and plugin development this is one more reason to choose you. If you like to step into the Mashshare team <a id="mail" href="https://www.mashshare.net/contact-developer/">get in touch with us</a> for more information. -->
                    </p>
                    </div>
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